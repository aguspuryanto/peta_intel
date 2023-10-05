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
                            <?=get_header_table_custom($model, ['peta_tipe', 'keterangan'], '<th>Aksi</th>'); ?>
                        </thead>
                        <tbody>
                        <?php
                        if($dataProvider) :
                            $id=1;
                            foreach($dataProvider as $row) {
                                // $dokUrl = ($row->link_file) ? '<a target="_blank" href="'.base_url('kasia/download/') . $row->link_file.'" class="btn btn-link btn-block">Dokumen</a>' : '#';
                                echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$row->no_perkara.'</td>
                                    <td>'.$row->nama_pelaku.'</td>
                                    <td>'.$row->penyebab.'</td>
                                    <td>'.$row->waktu.'</td>
                                    <td>'.$row->lokasi.'</td>
                                    <td>'.$row->alamat.'</td>
                                    <td>'.$row->kasus_posisi.'</td>
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
        <?=form_open('', array('id' => 'formDokumen', 'role' => 'form'));?>
            <?=get_form_input($model, 'no_perkara'); ?>

            <?=get_form_input($model, 'nama_pelaku'); ?>

            <?=get_form_input($model, 'penyebab'); ?>

            <?=get_form_input($model, 'waktu'); ?>

            <?=get_form_input($model, 'lokasi'); ?>

            <?=get_form_input($model, 'alamat'); ?>

            <?=get_form_input($model, 'kasus_posisi'); ?>

            <?=form_hidden('peta_tipe', $peta_tipe); ?>

            <button type="submit" class="btn btn-primary" id="formDokumen">Simpan Data</button>
        <?=form_close();?>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="form-submit">Submit</button>
      </div> -->

    </div>
  </div>
</div>

<?php
$Urlpeta = base_url('kasia/create_peta');
$Urldetail = base_url('kasia/view');
$Urlremove = base_url('kasia/remove');
?>

<script>
$(document).ready(function () {
    var table = $('#dataTable').DataTable();
    $('#error').html(" ");

    $('form#formDokumen').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?=$Urlpeta; ?>", 
            data: $(this).serialize(),
            dataType: "json",  
            beforeSend : function(xhr, opts){
                $('button#formDokumen').text('Loading...').prop("disabled", true);
            },
            success: function(data){
                console.log(data, "data");
                if(data.success) {
                    $('#myModal').modal('hide'); 
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                } else {
                    $('<p class="text-danger">' + data.message + '</p>').insertBefore('#formDokumen');
                }
            }
        });
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