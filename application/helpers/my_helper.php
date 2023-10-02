<?php


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
			redirect('auth/blocked');
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

function get_header_table_custom($model, $field=[], $extra="") {
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
    $header_tag .= ($extra) ? $extra : '<th>#</th>';
    
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
            $form .= form_input($field, '', $attributes);
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