
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
    <link rel="stylesheet" href="<?=base_url('assets/');?>/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="<?=base_url('assets/');?>img/favicon.png" type="image/x-icon">
    <title><?=@$title; ?></title>
    <style>
        .jumbotron {
            background-image:url("<?=base_url('assets/');?>img/ilustrasi-kejaksaan.jpg");
            background-size: cover;
            border-radius: 0%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-success bg-success text-white">
        <div class="container">
            <img src="<?=base_url('assets/');?>img/favicon.png" alt="logo Kejaksaan" class="mr-3">
            <a class="navbar-brand text-white" href="#"><?=@$title; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mr-auto" id="navbarNavAltMarkup">
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
                                <!-- <div class="form-group col-md-5">
                                    <label for="satker">Pilih Satker</label>
                                    <select name="satker" id="satker" class="form-control">
                                        <option value="semua">Semua Satker</option>
                                        <option value="1">Kejati banten</option>
                                        <option value="3">Kejari Serang</option>
                                        <option value="4">Kejari Tangerang</option>
                                        <option value="5">Kejari Cilegon</option>
                                        <option value="6">Kejari Tigaraksa</option>
                                        <option value="7">Kejari Pandeglang</option>
                                        <option value="8">Kejari Lebak</option>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-5">
                                    <label for="pelayanan">Kategori</label>
                                    <select name="pelayanan" id="pelayanan" class="form-control">
                                        <option value="1">Peta Kerawanan Konflik Sosial</option>
                                        <option value="2">Peta Kerawanan Radikalisme</option>
                                        <option value="3">Peta Aliran Kepercayaan Masyarakat</option>
                                        <option value="4">Peta Pengawasan Orang Asing</option>
                                        <option value="5">Peta LSM/ORMAS</option>
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
                                        <option value="2018" >2018</option>
                                        <option value="2017" >2017</option>
                                        <option value="2016" >2016</option>
                                        <option value="2015" >2015</option>
                                        <option value="2014" >2014</option>
                                        <option value="2013" >2013</option>
                                        <option value="2012" >2012</option>
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

    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="30000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-12">
                    <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>PENYELAMATAN KEUANGAN NEGARA DAN PENANGGULANGAN TINDAK PIDANA </h4>
                                <iframe src="<?=base_url('api/penyelamatan_keuangan') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>

                                    <div class="col-6">
                                        <h4>PENYULUHAN DAN PENERANGAN HUKUM</h4>
                                        <iframe src="<?=base_url('api/penyuluhan_hukum') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="carousel-item">
                    <div class="col-12">
                    <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>POLITIK, SOSIAL BUDAYA DAN SUMBER DAYA ORGANISASI</h4>
                                        <iframe src="<?=base_url('api/politik') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                    <div class="col-6">
                                        <h4>PEMILU: PRESIDEN</h4>
                                        <iframe src="<?=base_url('api/pemilu_1') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                    <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>PEMILU: KEPALA DAERAH</h4>
                                        <iframe src="<?=base_url('api/pemilu_2') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                    <div class="col-6">
                                        <h4>PEMILU: DPRD</h4>
                                        <iframe src="<?=base_url('api/pemilu_3') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                    <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>PENYELAMATAN KEUANGAN NEGARA DAN PENANGGULANGAN TINDAK PIDANA 2019</h4>
                                        <iframe src="<?=base_url('api/penyelamatan_keuangan_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>PENYULUHAN DAN PENERANGAN HUKUM</h4>
                                        <iframe src="<?=base_url('api/penyuluhan_hukum_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>POLITIK, SOSIAL BUDAYA DAN SUMBER DAYA ORGANISASI</h4>
                                        <iframe src="<?=base_url('api/politik_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Pemilu Presiden</h4>
                                        <iframe src="<?=base_url('api/pemilu_1_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                    <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Pemilu Kepala Daerah</h4>
                                        <iframe src="<?=base_url('api/pemilu_2_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Pemilu DPRD</h4>
                                        <iframe src="<?=base_url('api/pemilu_3_k') ?>" width="100%" height="500" scrolling="no"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
</body>

</html>