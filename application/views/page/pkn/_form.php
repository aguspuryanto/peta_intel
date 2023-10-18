<?=form_open('', array('id' => 'formModal', 'role' => 'form'));?>
            <div class="form-group">
                <label>Kecamatan</label>
                <?=form_dropdown('kec_id', $listKab, '', array('class' => 'form-control', 'id' => 'input-kecamatan'));?>
                <div id="error"></div>
            </div>

            <?//=get_form_input($model, 'pkn'); ?>

            <div class="form-group">
                <label>Jenis</label>
                <?php $listJenis = getListPerkara(); ?>
                <?=form_dropdown('jenis', $listJenis, '', array('class' => 'form-control', 'id' => 'input-jenis'));?>
                <div id="error"></div>
            </div>
            
            <?=get_form_input($model, 'nama_pelaku'); ?>
            <?=get_form_input($model, 'penyebab'); ?>
            <?=get_form_input($model, 'waktu'); ?>
            <?=get_form_input($model, 'lokasi'); ?>
            <?=get_form_input($model, 'alamat'); ?>
            <?=get_form_input($model, 'kasus_posisi', array('type' => 'textarea', 'rows' => '3', 'cols' => '10')); ?>

            <?=form_hidden('id', ''); ?>

            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <?=form_close();?>