<?php

function getAppTitle() {
    return "SI-METAL BATIN";
}

function getAppDesc() {
	return "Sistem Peta Digital & Bank Data Intelijen";
}

function is_logged_in($role = false)
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        // redirect('auth');
        redirect('home');
    }

    if ($role) {
        $role_id = $ci->session->userdata('role_id');

		if($role_id != $role) {
			redirect('admin/blocked');
		}
    }

    return $role;
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

// MSG
function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
    if ($content != '') {
        return  '<p class="box-msg">
                    <div class="info-box alert-' .$type .'">
                        <div class="info-box-icon">
                        <i class="fa ' .$icon .'"></i>
                        </div>
                        <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                    .'</div>
                    </div>
                </p>';
    }
}

function show_succ_msg($content='', $size='14px') {
    if ($content != '') {
        return   '<p class="box-msg">
                    <div class="info-box alert-success">
                        <div class="info-box-icon">
                        <i class="fa fa-check-circle"></i>
                        </div>
                        <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                    .'</div>
                    </div>
                </p>';
    }
}

function show_err_msg($content='', $size='14px') {
    if ($content != '') {
        return   '<p class="box-msg">
                    <div class="info-box alert-error">
                        <div class="info-box-icon">
                        <i class="fa fa-warning"></i>
                        </div>
                        <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                    .'</div>
                    </div>
                </p>';
    }
}

// MODAL
function show_my_modal($content='', $id='', $data='', $size='md') {
    $_ci = &get_instance();

    if ($content != '') {
        $view_content = $_ci->load->view($content, $data, TRUE);

        return '<div class="modal fade" id="' .$id .'" role="dialog">
                    <div class="modal-dialog modal-' .$size .'" role="document">
                    <div class="modal-content">
                        ' .$view_content .'
                    </div>
                    </div>
                </div>';
    }
}

function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
    $_ci = &get_instance();

    if ($id != '') {
        echo   '<div class="modal fade" id="' .$id .'" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                            <h3 style="display:block; text-align:center;">' .$title .'</h3>
                            
                            <div class="col-md-6">
                            <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
                            </div>
                            <div class="col-md-6">
                            <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>';
    }
}

function show_my_menu($userdata, $menu) {
    return ($userdata->rule=="admin" || $userdata->area_kerja==$menu) ? TRUE : FALSE;
}

function isUserKasi($userdata) {
    return ($userdata->rule=="kasi") ? TRUE : FALSE;
}

function isUserStaff($userdata) {
    return ($userdata->rule=="staff") ? TRUE : FALSE;
}

function tahap1_type($id) {
    // if($id == "0") return "P-18";
    // if($id == "1") return "P-19";
    // if($id == "2") return "P-21";
    return $id;
}

function get_header_table($model, $extra="") {
    if(empty($extra)) $extra = '<th>AKSI</th>';

    $header_tag = '<tr><th>NO</th>';
    foreach ($model->rules() as $key => $val) {
        $header_tag .= '<th>' . $val['label'] . '</th>';
    }

    if($extra) $header_tag .= $extra;

    $header_tag .= '</tr>';

    return $header_tag;
}

function get_header_table_inkracth($model, $field="", $extra="") {
    // echo json_encode($field);
    if(!$field && empty($field)) {
        $field = array('setor_negara', 'ntb', 'ntpn', 'b18', 'bast_barang', 'ba21', 'pendapat_hkm', 'p48', 'putusan', 'pnetapan', 'ba_sita', 'sp_sita');
    }

    return get_header_table_custom($model, $field, $extra);
}

function get_header_table_lelang($model, $field="", $extra="") {
    if(!$field && empty($field)) $field = array('setor_negara', 'ntb', 'ntpn');

    return get_header_table_custom($model, $field);
}

function get_header_table_custom($model, $field=[], $extra=null) {
    // echo json_encode($field);
    if(!$field || empty($field)) {
        $field = array('jenis_module');
        // echo json_encode($field);
    }

    foreach ($model->rules() as $key => $object) {
        if (!in_array($object['field'], $field)) {
            $newmodel[] = $object;
        }
    }

    $header_tag = '<tr><th>NO</th>';
    foreach ($newmodel as $key => $val) {
        $header_tag .= '<th>' . $val['label'] . '</th>';
    }

    // if(empty($extra)) {
    // 	$extra = '<th>#</th>';
    // 	$header_tag .= $extra;
    // }
    if($extra!=false) {
        $header_tag .= ($extra) ? $extra : '<th>#</th>';
    }
    
    $header_tag .= '</tr>';

    return $header_tag;
}

function get_header_table_admin($row, $userdata="") {
    $tableHeader = '';
    if(!isUserStaff($userdata)) {
        $tableHeader = '<td style="min-width:115px">
            <p>
                <button type="button" data-id="'.$row->id.'" class="btn btn-info btn-block btnNote" data-toggle="modal" data-target="#myModalNote">Tambah Note</button>
                <button type="button" data-id="'.$row->id.'" class="btn btn-warning btn-block btnTinjut" data-toggle="modal" data-target="#myModalTinjut">Tindak Lanjut</button>
                <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-block btnDokumen" data-toggle="modal" data-target="#myModalDokumen">Dokumen</button>
            </p>
            <div class="btn-group" role="group">
                <button type="button" data-id="'.$row->id.'" class="btn btn-secondary btnEdit" data-toggle="modal" data-target="#myModalPerkara">Edit</button>
                <button type="button" data-id="'.$row->id.'" class="btn btn-danger btnRemove">Hapus</button>
            </div>
        </td>';
    }

    return $tableHeader;
}

function get_form_input($model, $field="", $options=array()) {
    $attributes = array('class' => 'form-control', 'id' => 'input-' .  $field);

    if ($options) {
        foreach($options as $key => $val) {
            $attributes[$key] = $val;
        }
    }
    // echo json_encode($attributes);

    $key = array_search($field, array_column($model->rules(), 'field'));
    if($key >= 0) {
        $form = '<div class="form-group">' . form_label($model->rules()[$key]['label']);

        if(isset($attributes['type']) && $attributes['type'] === 'textarea') {
            if ($field) $attributes['name'] = $field;
            $form .= form_textarea($attributes);

        } elseif(isset($attributes['type']) && $attributes['type'] === 'password') {
            if ($field) $attributes['name'] = $field;
            $form .= form_input($attributes);

        } elseif(isset($attributes['type']) && $attributes['type'] === 'file') {
            if ($field) $attributes['name'] = $field;
            $form .= form_input($attributes);

        } else {
            $form .= form_input($field, ($attributes['value']) ?? '', $attributes);
        }

        $form .= '<div id="error"></div>
        </div>';
        
        return $form;
    }
}

function http_request($url){
    // persiapkan curl
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // $output contains the output string 
    $output = curl_exec($ch);
    // tutup curl 
    curl_close($ch);
    // mengembalikan hasil curl
    return $output;
}

function getListMenu() {

    $listMenu = [
        array(
            'title' => 'DATA PEMILU - PRESIDEN',
            'url' => 'pilpres',
            'show_menu' => false,
            'submenu' => [
                // array('title' => 'Input Data', 'link' => 'create'),
                array('title' => 'Lihat Data', 'link' => 'index')
            ]
        ),
        array(
            'title' => 'DATA PEMILU - KEPALA DAERAH',
            'url' => 'pilkada',
            'show_menu' => false,
            'submenu' => [
                array('title' => 'Lihat Data Pilgub', 'link' => 'pilgub'),
                array('title' => 'Lihat Data Pilbup', 'link' => 'index'),
            ]
        ),
        array(
            'title' => 'DATA PEMILU - DPRD',
            'url' => 'pileg',
            'show_menu' => false,
            'submenu' => [
                array('title' => 'Lihat Partai', 'link' => 'index'),
                array('title' => 'Lihat Anggota DPRD', 'link' => 'anggota')
            ]
        ),
        // array(
        //     'title' => 'Penerangan dan  Penyuluhan Hukum',
        //     'url' => 'penyuluhan',
        //     'show_menu' => false,
        //     'submenu' => [
        //         array('title' => 'Lihat Data', 'link' => 'index')
        //     ]
        // ),
        array(
            // 'title' => 'DATA PKN & TINDAK PIDANA',
            'title' => 'PENGAMANAN PERKARA',
            'url' => 'pkn',
            'show_menu' => false,
            'submenu' => [
                array('title' => 'Lihat Data', 'link' => 'index')
            ]
        ),                
    ];

    return $listMenu;
}

function getBankDataMenu() {	

    $bankData = [
        array(
            'title' => 'SEKSI A',
            'title_desc' => 'Bidang Ideologi, Politik, Pertahanan dan Keamanan',
            'url' => 'home/kasia',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Pemerintahan', 'link' => 'Pemerintahan'),
                array('title' => 'Stakeholder & Obyek Vital', 'link' => 'stakeholder'),
                array('title' => 'Pengamanan Sumber Daya Organisasi', 'link' => 'sdo'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.2', 'link' => 'peta'),
                // array('title' => 'Perda', 'link' => 'perda'),
                // array('title' => 'Pergub', 'link' => 'pergub'),
            )
        ),
        array(
            'title' => 'SEKSI B',
            'title_desc' => 'Bidang Sosial, Budaya dan Kemasyarakatan',
            'url' => 'home/kasib',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Sosial', 'link' => 'Sosial'),
                array('title' => 'Budaya', 'link' => 'Budaya'),
                array('title' => 'Kemasyarakatan', 'link' => 'Kemasyarakatan'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.3', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI C',
            'title_desc' => 'Bidang Ekonomi dan Keuangan',
            'url' => 'home/kasic',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Perdagangan', 'link' => 'Perdagangan'),
                array('title' => 'Industri', 'link' => 'Industri'),
                array('title' => 'Perbankan dan Investasi', 'link' => 'Perbankan'),
                array('title' => 'Keuangan Daerah', 'link' => 'KeuanganDaerah'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.4', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI D',
            'title_desc' => 'Bidang Pengamanan Pembangunan Strategis',
            'url' => 'home/kasid',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Daftar Pengawalan & Pengamanan', 'link' => 'DaftarPengawalan'),
                array('title' => 'Daftar Pendampingan DATUN', 'link' => 'DaftarPendampingan'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.5', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI E',
            'title_desc' => 'Bidang Teknologi Informasi dan Produksi Intelijen',
            'url' => 'home/kasie',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Lapinhar', 'link' => 'Lapinhar'),
                array('title' => 'Lapinsus', 'link' => 'Lapinsus'),
                array('title' => 'Lapopsin', 'link' => 'Lapopsin'),
                array('title' => 'Kirka', 'link' => 'Kirka Intelijen'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.6', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI PENKUM',
            'title_desc' => 'Bidang Penerangan Hukum dan Penyuluhan Hukum',
            'url' => 'home/kasipenkum',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Data Grafik', 'link' => 'grafik'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                // array('title' => 'Peta Luhkum Penkum', 'link' => 'PetaLuhkum'),
                array('title' => 'Penerangan dan  Penyuluhan Hukum', 'link' => 'Penyuluhan'),
                array('title' => 'Peta Intelijen Luhkum Penkum', 'link' => 'PetaIntelijen'),
            )
        ),
    ];

    return $bankData;
}

function getBankDataMenuDash() {	

    // $role_id = $this->session->userdata('userdata')['nama'];
    $bankData = [
        array(
            'title' => 'SEKSI A',
            'url' => 'kasia',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Pemerintahan', 'link' => 'Pemerintahan'),
                array('title' => 'Stakeholder & Obyek Vital', 'link' => 'stakeholder'),
                array('title' => 'Pengamanan Sumber Daya Organisasi', 'link' => 'sdo'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.2', 'link' => 'peta'),
                // array('title' => 'Perda', 'link' => 'perda'),
                // array('title' => 'Pergub', 'link' => 'pergub'),
            )
        ),
        array(
            'title' => 'SEKSI B',
            'url' => 'kasib',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Sosial', 'link' => 'Sosial'),
                array('title' => 'Budaya', 'link' => 'Budaya'),
                array('title' => 'Kemasyarakatan', 'link' => 'Kemasyarakatan'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.3', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI C',
            'url' => 'kasic',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Perdagangan', 'link' => 'Perdagangan'),
                array('title' => 'Industri', 'link' => 'Industri'),
                array('title' => 'Perbankan dan Investasi', 'link' => 'Perbankan'),
                array('title' => 'Keuangan Daerah', 'link' => 'KeuanganDaerah'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.4', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI D',
            'url' => 'kasid',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Daftar Pendampingan', 'link' => 'DaftarPendampingan'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.5', 'link' => 'PetaIntelijen'),
            )
        ),
        array(
            'title' => 'SEKSI E',
            'url' => 'kasie',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Lapinhar', 'link' => 'Lapinhar'),
                array('title' => 'Lapinsus', 'link' => 'Lapinsus'),
                array('title' => 'Lapopsin', 'link' => 'Lapopsin'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                array('title' => 'Peta Intelijen D.IN.6', 'link' => 'PetaIntelijen'),
                array('title' => 'Kirka', 'link' => 'Kirka'),
            )
        ),
        array(
            'title' => 'SEKSI P',
            'url' => 'kasiPenkum',
            'show_menu' => false,
            'submenu' => array(
                array('title' => 'Data Grafik', 'link' => 'grafik'),
                array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                // array('title' => 'Peta Luhkum Penkum', 'link' => 'PetaLuhkum'),
                array('title' => 'Penerangan dan  Penyuluhan Hukum', 'link' => 'Penyuluhan'),
                array('title' => 'Peta Intelijen Luhkum Penkum', 'link' => 'PetaIntelijen'),
            )
        ),
    ];

    return $bankData;
}

function getListPeta() {

    $listMenu = array(
        'D.IN.2' => 'Peta Intelijen D.IN.2',
        'D.IN.3' => 'Peta Intelijen D.IN.3',
        'D.IN.4' => 'Peta Intelijen D.IN.4',
        'D.IN.5' => 'Peta Intelijen D.IN.5',
        'D.IN.6' => 'Peta Intelijen D.IN.6',
        'D.IN.7' => 'Peta Intelijen D.IN.7'
    );
    
    return $listMenu;
}

function getListRole() {
    $role = array(
        '1' => 'Administrator',
        '2' => 'Super admin',
        '3' => 'Admin kasi A',
        '4' => 'Admin kasi B',
        '5' => 'Admin kasi C',
        '6' => 'Admin kasi D',
        '7' => 'Admin kasi E',
        '8' => 'Admin kasi penkum',
        '9' => 'Asintel',
        '10' => 'Kajati',
        '11' => 'Wakajati',
        '12' => 'Kasi A',
        '13' => 'Kasi B',
        '14' => 'Kasi C',
        '15' => 'Kasi D',
        '16' => 'Kasi E',
        '17' => 'Kasi penkum'
    );

    return $role;
}