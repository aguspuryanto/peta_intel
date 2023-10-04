
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-success text-white justify-content-between">
    <div class="container">
        <img src="<?=base_url('assets/');?>img/favicon.png" alt="logo Kejaksaan" class="mr-3">
        <a class="navbar-brand text-white" href="<?=site_url('') ?>"><?=getAppTitle(); ?> <p class="mb-0"><?=getAppDesc(); ?></p></a>
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
                <h1 class="h3 mb-0 text-gray-800"><?=@$title; ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <?php echo @$_content; ?>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <?php echo @$_js; ?>
</body>
</html>