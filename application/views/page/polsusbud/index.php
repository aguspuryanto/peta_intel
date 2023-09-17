<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left"><?=@$title; ?></h6>
                <div class="float-right"> <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#myModal">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </span>
                    <span class="text">Input Data Baru</span>
                </a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <?=get_header_table_custom($model); ?>
                        </thead>
                        <tbody>
                        <?php
                        if($dataProvider) :
                            $id=1;
                            foreach($dataProvider as $row) {
                                echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$row->nama_kec.'</td>
                                    <td>'.strtoupper($row->jenis).'</td>
                                    <td>'.$row->lokasi.'</td>
                                    <td style="min-width:115px">
                                        <div class="btn-group" role="group">
                                            <button type="button" data-id="'.$row->id.'" class="btn btn-default btnEdit" data-toggle="modal" data-target="#myModal">Edit</button>
                                            <button type="button" data-id="'.$row->id.'" class="btn btn-danger btnRemove">Hapus</button>
                                        </div>
                                    </td>
                                </tr>';
                                $id++;
                            }
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?=@$title; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?=form_open('', array('id' => 'formModal', 'role' => 'form'));?>
            <div class="form-group">
                <label>Kecamatan</label>
                <?=form_dropdown('kecamatan', $listKab, '', array('class' => 'form-control', 'id' => 'input-kecamatan'));?>
                <div id="error"></div>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <?php $listJenis = array(
                    'Tindak Pidana Keamanan Negara' => 'Tindak Pidana Keamanan Negara',
                    'Perampokan' => 'Perampokan / Pembunuhan',
                    'Dakwah Negatif' => 'Dakwah Negatif',
                    'Poster Gelap' => 'Poster Gelap',
                    'Unjuk Rasa' => 'Unjuk Rasa',
                    'Rapat Gelap' => 'Rapat Gelap',
                    'Kasus Sara' => 'Kasus Sara',
                    'Teror' => 'Teror',
                    'Pelanggaran Batas Wilayah' => 'Pelanggaran Batas Wilayah',
                    'Keimigrasian' => 'Keimigrasian',
                    'Cegah Tangkal' => 'Cegah Tangkal',
                    'Media Elektronik' => 'Media Elektronik',
                    'Media Cetak' => 'Media Cetak',
                    'Aliran Agama' => 'Aliran Agama',
                    'Kepercayaan' => 'Kepercayaan',
                    'Perkosaan' => 'Perkosaan',
                    'Pelanggaran HAM' => 'Pelanggaran HAM',
                    'Generasi Muda' => 'Generasi Muda',
                    'Peranan Wanita' => 'Peranan Wanita',
                    'Narkoba' => 'Narkoba',
                    'Perjudian' => 'Perjudian',
                    'Senjata Api' => 'Senjata Api',
                    'KDRT' => 'KDRT',
                ); ?>
                <?=form_dropdown('jenis', $listJenis, '', array('class' => 'form-control', 'id' => 'input-jenis'));?>
                <div id="error"></div>
            </div>

            <?=get_form_input($model, 'perkara'); ?>

            <?=form_hidden('id', ''); ?>

            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <?=form_close();?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="form-submit">Submit</button>
      </div>

    </div>
  </div>
</div>

<?php
$Urladd = base_url('polsosbud/create');
$Urldetail = base_url('polsosbud/view');
$Urlremove = base_url('polsosbud/remove');
?>

<script>
$(document).ready(function () {
    var table = $('#dataTable').DataTable();
    $('#error').html(" ");

    $('#form-submit').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?=$Urladd;?>", 
            data: $("#formModal").serialize(),
            dataType: "json",  
            beforeSend : function(xhr, opts){
                // $('#form-submit').text('Loading...').prop("disabled", true);
            },
            success: function(data){
                console.log(data, "data");
                $(this).prop("disabled", false);
                if(data.success == true){
                    setTimeout(function(){
                        window.location.reload();
                    }, 3000);
                } else {
                    $.each(data, function(key, value) {
                        $('#input-' + key).addClass('is-invalid');
                        $('#input-' + key).parents('.form-group').find('#error').html(value);
                    });
                }
            }
        });
    });

    $('#form input').on('keyup', function () { 
        $(this).removeClass('is-invalid').addClass('is-valid');
        $(this).parents('.form-group').find('#error').html(" ");
    });

    $(document).on('click', '.btnEdit', function (e) {
        e.preventDefault();
        var dataId = $(this).attr("data-id");
        console.log(dataId, '_dataId');

        $('#formModal input[name=id]').val(dataId);

        $.get("<?=$Urldetail;?>/" + dataId, function(data, status){
            console.log(data, "data");
            $.each(data.data, function(key, value) {
                if(key == 'kecamatan') {
                    $('#input-' + key).val(value).change();
                } else {
                    $('#input-' + key).val(value);
                }
            });

            $('#form input[name=kegiatan]').val(data.data.kegiatan);
        });
    });

    $(document).on('click', '.btnRemove', function (e) {
        e.preventDefault();
        var dataId = $(this).attr("data-id");
        console.log(dataId, '_dataId');

        if (confirm("Apakah anda yakin ingin menghapus data ini?")==true){
            // $(this).closest("tr").remove();
            table.row( $(this).parents('tr') ).remove().draw();
            $.post("<?=$Urlremove;?>/", {id: dataId}, function(result){
                console.log(result, "_result");
            });
        };
    });
});
</script>