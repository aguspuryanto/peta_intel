<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- <div class="col-md-12">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
        </div>
    </div> -->

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
                            <?=get_header_table_custom($model, ['thn','prov_id', 'kec_id']); ?>
                        </thead>
                        <tbody>
                        <?php
                        if($dataProvider) :
                            $id=1;
                            foreach($dataProvider as $row) {
                                echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$row->periode.'</td>
                                    <td>'.$row->nama_anggota.'</td>
                                    <td>'.$row->nama_partai.'</td>
                                    <td>'.$row->nama_dapil.'</td>
                                    <td>'.$row->jml_suara.'</td>
                                    <td>'.$row->keterangan.'</td>
                                    <td style="min-width:115px">
                                        <div class="btn-group" role="group">
                                            <button type="button" data-id="'.$row->id.'" class="btn btn-secondary btnEdit" data-toggle="modal" data-target="#myModal">Edit</button>
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
        <?=form_open('', array('id' => 'formDprd', 'role' => 'form'));?>

            <?=get_form_input($model, 'periode'); ?>

            <?=get_form_input($model, 'nama_anggota'); ?>

            <div class="form-group">
                <label>Nama Partai</label>
                <?=form_dropdown('partai_id', $listPartai, '', array('class' => 'form-control', 'id' => 'input-partai_id'));?>
                <div id="error"></div>
            </div>
            
            <div class="form-group">
                <label>Nama Dapil</label>
                <?=form_dropdown('dapil_id', $listDapil, '', array('class' => 'form-control', 'id' => 'input-dapil_id'));?>
                <div id="error"></div>
            </div>

            <?=get_form_input($model, 'jml_suara'); ?>

            <?=form_hidden('id', ''); ?>
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
$Urladd = base_url('pileg/create_anggota');
$Urldetail = base_url('pileg/view_anggota');
$Urlremove = base_url('pileg/remove_anggota');
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
            data: $("#formDprd").serialize(),
            dataType: "json",  
            beforeSend : function(xhr, opts){
                $('#form-submit').text('Loading...').prop("disabled", true);
            },
            success: function(data){
                console.log(data, "data");
                $(this).prop("disabled", false);
                if(data.success == true){
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
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