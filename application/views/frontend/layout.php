
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
    <nav class="navbar navbar-expand-lg navbar-success bg-success text-white justify-content-between">
        <div class="container">
            <img src="<?=base_url('assets/');?>img/favicon.png" alt="logo Kejaksaan" class="mr-3">
            <a class="navbar-brand text-white" href="#"><?=@$title; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mr-auto" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <!-- <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bank Data</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->

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
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <?php echo @$_content; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <?php echo @$_js; ?>
</body>
</html>