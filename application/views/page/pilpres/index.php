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
                <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Example</h6>
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
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
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
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label for="email">Kecamatan</label>
                <input type="text" class="form-control" placeholder="Enter Kecamatan" id="kecamatan">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Nama Capres 1</label>
                        <input type="text" name="nama_capres" class="form-control" placeholder="Nama Capres">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Jumlah Suara 1</label>
                        <input type="text" class="form-control" placeholder="Enter Jumlah Suara">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Nama Capres 2</label>
                        <input type="text" name="nama_capres" class="form-control" placeholder="Nama Capres">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Jumlah Suara 2</label>
                        <input type="text" class="form-control" placeholder="Enter Jumlah Suara">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>