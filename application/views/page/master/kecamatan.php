<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                // echo json_encode($districts);
                ?>                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>regency_id</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($districts as $prov) {
                                echo '<tr>
                                    <td>' . $prov['id'] . '</td>
                                    <td>' . $prov['name'] . '</td>
                                    <td>' . $prov['regency_id'] . '</td>
                                    <td><a href="' .site_url('pilpres/kecamatan/' . $prov['id']) . '">Detail</a></td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>