<?=form_open('', array('id' => 'formModal', 'role' => 'form'));?>
            <div class="form-group">
                <label>Kecamatan</label>
                <?=form_dropdown('kecamatan', $listKab, '', array('class' => 'form-control', 'id' => 'input-kecamatan'));?>
                <div id="error"></div>
            </div>

            <?//=get_form_input($model, 'pkn'); ?>

            <div class="form-group">
                <label>Jenis</label>
                <?php $listJenis = array(
                    'Tindak Pidana Cukai' => 'Tindak Pidana Cukai',
                    'Tindak Pidana Pemilukada' => 'Tindak Pidana Pemilukada',
                    'Pencurian Kayu' => 'Pencurian Kayu',
                    'Persaingan Curang' => 'Persaingan Curang',
                    'Pencucian Uang' => 'Pencucian Uang',
                    'Hak Intelektual' => 'Hak Intelektual',
                    'Bursa Efek Komuditi' => 'Bursa Efek Komuditi',
                    'Sumber daya Manusia' => 'Sumber daya Manusia',
                    'Daerah Rawan Penyelundupan' => 'Daerah Rawan Penyelundupan',
                    'Tindak Pidana Korupsi' => 'Tindak Pidana Korupsi',
                    'Tindak Pidana Ekonomi' => 'Tindak Pidana Ekonomi',
                    'Pertahanan' => 'Pertahanan',
                    'Lingkungan Hidup' => 'Lingkungan Hidup',
                    'Sumber Daya Alam' => 'Sumber Daya Alam',
                    'Tindak Pidana Perbankan' => 'Tindak Pidana Perbankan',
                    'Penimbunan / Manipulasi Produksi' => 'Penimbunan / Manipulasi Produksi',
                    'Penanaman Modal Dalam Negeri' => 'Penanaman Modal Dalam Negeri',
                    'Penanaman Modal Asing' => 'Penanaman Modal Asing',
                    'Datun' => 'Datun',
                ); ?>
                <?=form_dropdown('jenis', $listJenis, '', array('class' => 'form-control', 'id' => 'input-jenis'));?>
                <div id="error"></div>
            </div>
            
            <?=get_form_input($model, 'lokasi'); ?>
            <?=get_form_input($model, 'perkara'); ?>

            <?=form_hidden('id', ''); ?>

            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <?=form_close();?>