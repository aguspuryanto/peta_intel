
<?=form_open('', array('id' => 'formDokumen', 'role' => 'form'));?>
            <div class="form-group">
                <label>Perkara</label>
                <?=form_dropdown('no_perkara', $listPerkara, '', array('class' => 'form-control', 'id' => 'input-no_perkara'));?>
                <div id="error"></div>
            </div>

            <?=get_form_input($model, 'nama_pelaku'); ?>

            <?=get_form_input($model, 'penyebab'); ?>

            <?=get_form_input($model, 'waktu'); ?>

            <div class="form-group">
                <label>Lokasi</label>
                <?=form_dropdown('lokasi', $listKab, '', array('class' => 'form-control', 'id' => 'input-lokasi'));?>
                <div id="error"></div>
            </div>

            <?=get_form_input($model, 'alamat'); ?>

            <?=get_form_input($model, 'kasus_posisi'); ?>

            <?=form_hidden('peta_tipe', $peta_tipe); ?>

            <button type="submit" class="btn btn-primary" id="formDokumen">Simpan Data</button>
        <?=form_close();?>