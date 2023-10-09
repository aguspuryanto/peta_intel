<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-8">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Account Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile Picture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pwd-tab" data-toggle="tab" href="#pwd" role="tab" aria-controls="pwd" aria-selected="false">Ubah Password</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php include ('_account.php'); ?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card mb-4">
                    <div class="card-body text-center">                
                        <?=form_open_multipart('', array('id' => 'formProfile', 'role' => 'form'));?>
                            <!-- Profile picture image-->
                            <img class="img-account-profile mb-2" src="<?=($dataUser->picture_img) ? base_url() . 'uploads/' . $dataUser->picture_img : base_url() . 'assets/img/undraw_profile_1.svg'; ?>" alt="">
                            
                            <div class="form-group">
                                <input type="file" name="picture_img" id="input-picture_img" class="form-control" accept="image/*"/>
                                <div id="error"></div>
                            </div>

                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <div id="formError" class="text-danger"></div>
                            <!-- Profile picture upload button-->
                            <button type="submit" class="btn btn-primary" id="form-upload">Upload new image</button>

                            <?=form_hidden('id', $dataUser->id); ?>
                        
                        <?=form_close();?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pwd" role="tabpanel" aria-labelledby="pwd-tab">
                <?php include_once('_pwd.php'); ?>
            </div>
        </div>
    </div>
</div>

<div class="row" style="display:block">
    <div class="col-md-12">    
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">
                <h4 class="float-left">DATA USER</h4>
                <div class="float-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body text-center">                
                <?php include_once('_list_user.php'); ?>
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
        <h4 class="modal-title">Tambah <?=@$title; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?=form_open('', array('id' => 'formUser', 'role' => 'form'));?>

            <?=get_form_input($model, 'instansi'); ?>

            <div class="row">
                <div class="col-md-6">
                    <?=get_form_input($model, 'username'); ?>
                </div>
                <div class="col-md-6">
                    <?=get_form_input($model, 'nama'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?=get_form_input($model, 'divisi'); ?>
                </div>
                <div class="col-md-6">
                    <?//=get_form_input($model, 'role_id'); ?>
                    <div class="form-group">
                        <label>Role</label>
                        <?php $options = array(
                            // '1' => 'Administrator',
                            '2' => 'SuperAdmin',
                            '3' => 'Admin',
                            '4' => 'Assinten',
                            '5' => 'Kasi',
                            '6' => 'Ass & Koordinator',
                            '7' => 'User',
                        ); ?>
                        <?=form_dropdown('role_id', $options, "", array('class' => 'form-control', 'id' => 'input-role_id'));?>
                        <div id="error"></div>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?=get_form_input($model, 'email'); ?>
                </div>
                <div class="col-md-6">
                    <?=get_form_input($model, 'nohape'); ?>
                </div>
            </div>

            <?=form_hidden('id'); ?>

            <button type="submit" class="btn btn-primary" id="form-submit">Submit Permohonan</button>

        <?=form_close();?>
      </div>

    </div>
  </div>
</div>

<?php
$Urladd = base_url('user/setting');
$Urlpicture = base_url('user/picture');
?>

<script type="text/javascript">
$( document ).ready(function() {

    $('button#form-submit').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?=$Urladd;?>", 
            data: $('form#formUser').serialize(),
            dataType: "json",
            beforeSend : function(xhr, opts){
              // $('#form-submit').text('Loading...').prop("disabled", true);
            },
            success: function(data){
                console.log(data, "data");
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

    $("#input-picture").on("change",function(e){
        /* Current this object refer to input element */         
        var $input = $(this);
        var reader = new FileReader(); 
        reader.onload = function(){
            $("img.img-account-profile").attr("src", reader.result).removeClass('rounded-circle');
        } 
        reader.readAsDataURL($input[0].files[0]);
    });

    $('form#formProfile').submit(function (e) {
        e.preventDefault();

        var fd = new FormData();
        var files = $(this).find('#input-picture_img')[0].files[0];
        fd.append('file',files);

        $.ajax({
            type: "POST",
            url: "<?=$Urlpicture; ?>", 
            // data: fd,
            data:new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            async: false,
            beforeSend : function(xhr, opts){
                // $(formDokumen).text('Loading...').prop("disabled", true);
            },
            success: function(data){
                console.log(data, "data");
                if(data.success) {
                    // $('#myModalDokumen').modal('hide'); 
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                } else {
                    $('#formError').html(data.message);
                }
            }
        });
    });

});
</script>