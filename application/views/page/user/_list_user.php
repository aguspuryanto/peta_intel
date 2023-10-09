<div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <?=get_header_table_custom($model, array('password'));?>
        </thead>
        <tbody>
            <?php
            if($dataProvider) :
                foreach($dataProvider as $row) {
                    $imgPct = ($dataUser->picture_img) ? base_url() . 'uploads/' . $dataUser->picture_img : base_url() . 'assets/img/undraw_profile_1.svg';
                    echo '<tr>
                        <td>'.$row->id.'</td>
                        <td>'.$row->instansi.'</td>
                        <td>'.$row->username.'</td>
                        <td>'.$row->role_id.'</td>
                        <td>'.$row->nama.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->nohape.'</td>
                        <td><img class="img-account-profile mb-2" src="' . $imgPct . '" alt=""></td>
                        <td>'.$row->divisi.'</td>
                    </tr>';
                }
            endif;
            ?>
        </tbody>
    </table>
</div>