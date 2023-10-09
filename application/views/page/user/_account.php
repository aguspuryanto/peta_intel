
        <div class="card mb-4">
            <!-- <div class="card-header">Account Details</div> -->
            <div class="card-body">
                <?=form_open('', array('id' => 'formUserAccount', 'role' => 'form'));?>

                    <?=get_form_input($model, 'instansi', array('value' => $dataUser->instansi)); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?=get_form_input($model, 'username', array('value' => $dataUser->username)); ?>
                        </div>
                        <div class="col-md-6">
                            <?=get_form_input($model, 'nama', array('value' => $dataUser->nama)); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?=get_form_input($model, 'divisi', array('value' => $dataUser->divisi)); ?>
                        </div>
                        <div class="col-md-6">
                            <?//=get_form_input($model, 'role_id'); ?>
                            <div class="form-group">
                                <label>Role</label>
                                <?php $options = array(
                                    '1' => 'Administrator',
                                    '2' => 'SuperAdmin',
                                    '3' => 'Admin',
                                    '4' => 'Assinten',
                                    '5' => 'Kasi',
                                    '6' => 'Ass & Koordinator',
                                    '7' => 'User',
                                ); ?>
                                <?=form_dropdown('role_id', $options, $dataUser->role_id, array('class' => 'form-control', 'id' => 'input-role_id'));?>
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

                    <button type="submit" class="btn btn-primary" id="formUserSubmit">Submit Permohonan</button>

                <?=form_close();?>
            </div>
        </div>