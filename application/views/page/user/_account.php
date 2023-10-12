
        <div class="card mb-4">
            <!-- <div class="card-header">Account Details</div> -->
            <div class="card-body">
                <?=json_encode($dataUser); ?>
                <?=form_open('', array('id' => 'formUserAccount', 'role' => 'form'));?>

                    <div class="row">
                        <div class="col-md-6">
                            <?=get_form_input($model, 'username', array('value' => $dataUser['username'])); ?>
                        </div>
                        <div class="col-md-6">
                            <?=get_form_input($model, 'nama', array('value' => $dataUser->nama)); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?=get_form_input($model, 'instansi', array('value' => $dataUser->instansi)); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <?=form_dropdown('role_id', $role, $dataUser->role_id, array('class' => 'form-control', 'id' => 'input-role_id'));?>
                                <div id="error"></div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?=get_form_input($model, 'email', array('value' => $dataUser->email)); ?>
                        </div>
                        <div class="col-md-6">
                            <?=get_form_input($model, 'nohape', array('value' => $dataUser->nohape)); ?>
                        </div>
                    </div>

                    <?=form_hidden('id', $dataUser->id); ?>

                    <button type="submit" class="btn btn-primary" id="formUserSubmit">Buat Akun</button>

                <?=form_close();?>
            </div>
        </div>