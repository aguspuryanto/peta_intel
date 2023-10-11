<?php 
$listPeta = getListPeta();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url('assets/');?>img/favicon.png" type="image/x-icon">
    <title><?=@$title; ?></title>
    <style>
        .jumbotron {
            background-image:url("<?=base_url('assets/');?>img/ilustrasi-kejaksaan.jpg");
            background-size: cover;
            border-radius: 0%;
        }
    </style>

<!-- css --> 
<?php echo @$_css; ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success text-white justify-content-between">
    <div class="container">
        <a class="navbar-brand text-white" href="<?=site_url('') ?>">
            <img src="<?=base_url('assets/');?>img/SI_METAL_BATIN_LOGO.png" alt="logo Kejaksaan" class="mr-3">
            <div class="sr-only"><?=@$title; ?> <p class="mb-0"><?=@$desc; ?></p></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <span class="navbar-toggler-icon">   
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php foreach($bankData as $bank) {
                    echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="'. base_url($bank['url']) . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $bank['title'] . '</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                    if(isset($bank['submenu']) && $bank['submenu']) {
                        foreach($bank['submenu'] as $submenu) {
                            echo '<a class="dropdown-item" href="'. base_url($bank['url']) . '/' . $submenu['link'] . '">' . $submenu['title'] . '</a>';
                        }
                    }
                    echo '</div>
                    </li>';             
                }
                ?>
            </ul>
            <span class="navbar-text">
                <?php if (!$this->session->userdata('email')) { ?>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">LOGIN</a>
                <?php } else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata['userdata']['nama']?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-dark" href="<?=site_url('logout') ?>">LOGOUT</a>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </span>
        </div>
    </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Pilih Menu Peta
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="pelayanan">Kategori</label>
                                    <select name="pelayanan" id="pelayanan" class="form-control">
                                        <?php foreach($listPeta as $key => $pta) {
                                            echo '<option value="' . $key . '">' . $pta . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tahun">Tahun</label>
                                    <select class="form-control " name="tahun" id="tahun">
                                        <option value="2023" selected>2023</option>
                                        <option value="2022" >2022</option>
                                        <option value="2021" >2021</option>
                                        <option value="2020" >2020</option>
                                        <option value="2019" >2019</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success" id="cari"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="30000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-box">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <h4>PEMILU: PRESIDEN</h4>
                                        <iframe src="<?=base_url('api/pemilu_1') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>                                    
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <h4>PEMILU: KEPALA DAERAH</h4>
                                        <iframe src="<?=base_url('api/pemilu_2') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <h4>PEMILU: DPRD</h4>
                                        <iframe src="<?=base_url('api/pemilu_3') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                <?= $this->session->flashdata('message'); ?>
            </div>
            <form class="user" method="POST" action="<?=site_url('admin') ?>">
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete="off" name="email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" autocomplete="off">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <input type="hidden" name="redirect" value="home" />
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
            </form>
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/bantenkota.js"></script>
    <script type="text/javascript">
        function petaScroll() {
            $('html, body').animate({
                scrollTop: $('#peta').offset().top
            }, 500);
        }
        document.addEventListener('DOMContentLoaded', function () {
            const url = "https://www.peta.intel.kejati-banten.go.id";
            const cari = document.getElementById('cari');
            const tahunSekarang = new Date();
            $('#map').attr('src',`${url}/peta/konflik/1/${tahunSekarang.getFullYear()}`);
            $('#grafik').attr('src',`${url}/grafik/konflik/1`);
            $('.card-title').text(`PETA INTELIJEN KONFLIK SOSIAL BANTEN di SEMUA SATKER TAHUN ${tahunSekarang.getFullYear()}`);
            $('.grafik').text('GRAFIK PETA INTELIJEN KONFLIK SOSIAL BANTEN di SEMUA SATKER');
            /* Cari Peta */
            cari.addEventListener('click', function () {
                var markers = [];
                var pelayanan = $('#pelayanan').val();
                var satker = $('#satker').val();
                var tahun = $('#tahun').val();
                var satkerText = document.getElementById('satker');
                var satkerTextContent = satkerText.options[satkerText.selectedIndex].text;
                petaScroll();
                $('.loading').show();
                $('#map').hide();
                $('#grafik').hide();
                setTimeout(() => {
                    switch(pelayanan) {
                        case '1' : 
                            $('#map').attr('src',`${url}/peta/konflik/${satker}/${tahun}`);
                            $('#grafik').attr('src',`${url}/grafik/konflik/${satker}`);
                            $('.loading').hide();
                            $('#map').show();
                            $('#grafik').show();
                            $('.card-title').text(`PETA INTELIJEN KONFLIK SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} TAHUN ${tahun}`);
                            $('.grafik').text(`GRAFIK PETA INTELIJEN KONFLIK SOSIAL BANTEN di ${satkerTextContent.toUpperCase()}`);
                        break;
                        case '2' :
                            $('#map').attr('src',`${url}/peta/radikalisme/${satker}/${tahun}`);
                            $('#grafik').attr('src',`${url}/grafik/radikalisme/${satker}`);
                            $('.loading').hide();
                            $('#map').show();
                            $('#grafik').show();
                            $('.card-title').text(`PETA INTELIJEN KERAWANAN RADIKALISME SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} TAHUN ${tahun}`);
                            $('.grafik').text(`GRAFIK  PETA INTELIJEN KERAWANAN RADIKALISME SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} `);
                        break;
                        case '3' : 
                            $('#map').attr('src',`${url}/peta/pakem/${satker}/${tahun}`);
                            $('#grafik').attr('src',`${url}/grafik/pakem/${satker}`);
                            $('.loading').hide();
                            $('#map').show();
                            $('#grafik').show();
                            $('.card-title').text(`PETA INTELIJEN PENGAWASAN KEPERCAYAAN MASYARAKAT SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} TAHUN ${tahun} `);
                            $('.grafik').text(`GRAFIK PETA INTELIJEN PENGAWASAN KEPERCAYAAN MASYARAKAT SOSIAL BANTEN di ${satkerTextContent.toUpperCase()}`);
                        break;
                        case '4' : 
                            $('#map').attr('src',`${url}/peta/orangasing/${satker}/${tahun}`);
                            $('#grafik').attr('src',`${url}/grafik/orangasing/${satker}`);
                            $('.loading').hide();
                            $('#map').show();
                            $('#grafik').show();
                            $('.card-title').text(`PETA INTELIJEN PENGAWASAN ORANG ASING SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} TAHUN ${tahun}`);
                            $('.grafik').text(`GRAFIK PETA INTELIJEN PENGAWASAN ORANG ASING SOSIAL BANTEN di ${satkerTextContent.toUpperCase()}`);
                        break;
                        case '5' :
                            $('#map').attr('src',`${url}/peta/lsm/${satker}/${tahun}`);
                            $('#grafik').attr('src',`${url}/grafik/lsm/${satker}`);
                            $('.loading').hide();
                            $('#map').show();
                            $('#grafik').show();
                            $('.card-title').text(`PETA INTELIJEN LSM/ORMAS SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} TAHUN ${tahun}`);
                            $('.grafik').text(`GRAFIK PETA INTELIJEN PENGAWASAN ORANG ASING SOSIAL BANTEN di ${satkerTextContent.toUpperCase()} `);
                        break;
                        default:
                        alert('anda memilih pilihan salah')
                        break;
                    }
                }, 3000);
            });
        })

    </script>

	<!-- js -->
    <?php echo @$_js; ?>

	<!-- Custom js -->
	<?php echo @$_loadjs; ?>
</body>

</html>