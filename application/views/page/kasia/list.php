<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?=@$title; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <?=get_header_table_custom($model, ['kategori', 'sub_kategori'], false); ?>
                        </thead>
                        <tbody>
                        <?php
                        if($dataProvider) :
                            $id=1;
                            foreach($dataProvider as $row) {
                                $dokUrl = ($row->link_file) ? '<a target="_blank" href="'.base_url('kasia/download/') . $row->link_file.'" class="btn btn-link btn-block">Dokumen</a>' : '#';
                                echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$row->nama_file.'</td>
                                    <td>'.$dokUrl.'</td>
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

<script>
$(document).ready(function () {
    var table = $('#dataTable').DataTable();
    $('#error').html(" ");    
});
</script>