
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CMS App</title>

    <!-- Bootstrap -->

    <link href="<?= App::$path; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= App::$path; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= App::$path; ?>css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <header>
          <nav class="navbar">
            <div class="container-edit">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#">CMS</a>
                <span onclick="openNav()"><i class="fa fa-bars fa-2x"></i></span>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->


                <?php if (isset($_SESSION['user'])) { ?>
                  <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="msg">35</span><i class="fa fa-envelope-open fa-lg"></i></a></li>
                  <li><a href="#"><span class="noti">15</span><i class="fa fa-flag fa-lg"></i></a></li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="img-circle" alt="" src="<?= App::$path; ?>images/millier.jpg">
                    <span>eslam</span>
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                     <li class="show-profile"> <img class="img-circle text-center" alt="" src="<?= App::$path; ?>images/users/<?php echo $_SESSION['user']->avater; ?>">
                        <p class="lead text-center"><?php echo $_SESSION['user']->fname." ".$_SESSION['user']->lname; ?></p>
                        <div class="row">
                        <div class="col-sm-6"> <a href="<?= App::$path; ?>users/profile" class="profile-btn btn btn-default pull-left">Profile</a></div>
                        <div class="col-sm-6"><a href="<?= App::$path; ?>users/logout" class="btn btn-danger pull-right">Logout</a></div>


                        </div>
                      </li>
                    </ul>
                  </li>


                  <li><a href="#"><i class="fa fa-globe fa-lg"></i></a></li>

                </ul>
                <?php } else { ?>
                  <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?= App::$path; ?>users/login"><i class="fa fa-flag fa-lg"></i>   Login</a></li>
                  </ul>
                <?php } ?>

            </div><!-- /.container-fluid -->
          </nav>
    </header>

    <section class="sidebar">

      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_articles) {?>
        <button class="accordion"><i class="fa fa-edit"></i>  Products</button>
          <div class="panel1">
            <a href="<?= App::$path; ?>articles/index"><i class="fa fa-product-hunt"></i>  Products</a> <hr>
            <?php if ($_SESSION['user']->aed_articles) {?>

            <a href="<?= App::$path; ?>articles/add"><i class="fa fa-plus-circle"></i>  Add New Product</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>category/index"><i class="fa fa-puzzle-piece"></i>  Categories</a><hr>
            <a href="<?= App::$path; ?>unit/index"><i class="fa fa-balance-scale"></i>  Units</a>

          </div>
          <?php } ?>

          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_suppliers) {?>

        <button class="accordion"><i class="fa fa-phone-square"></i>  Suppliers</button>
          <div class="panel1">
            <?php if ($_SESSION['user']->aed_suppliers) {?>

            <a href="<?= App::$path; ?>supplier/add"><i class="fa fa-plus-circle"></i>  Add Supplier</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>supplier/index"><i class="fa fa-gamepad"></i>  Manage Suppliers</a>


          </div>
          <?php } ?>


          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_sales) {?>

        <button class="accordion"><i class="fa fa-first-order"></i>  Price Requset</button>
          <div class="panel1">
            <?php if ($_SESSION['user']->aed_sales) {?>

            <a href="<?= App::$path; ?>prs_clt/add"><i class="fa fa-plus-circle"></i>  Add Price Requset</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>prs_clt/index"><i class="fa fa-gamepad"></i>  Manage Price Requset</a>


          </div>
          <?php } ?>


          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_clients) {?>

        <button class="accordion"><i class="fa fa-reddit-alien"></i>  Clients</button>
          <div class="panel1">
            <?php if ($_SESSION['user']->aed_clients) {?>

            <a href="<?= App::$path; ?>clients/add"><i class="fa fa-plus-circle"></i>  Add Client</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>clients/index"><i class="fa fa-gamepad"></i>  Manage Client</a>


          </div>
          <?php } ?>


          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_clients) {?>

        <button class="accordion"><i class="fa fa-users"></i>  Users</button>
          <div class="panel1">
            <?php if ($_SESSION['user']->aed_clients) {?>

            <a href="<?= App::$path; ?>users/add"><i class="fa fa-plus-circle"></i>  Add User</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>users/index"><i class="fa fa-gamepad"></i>  Manage Users</a><hr>

            <a href="<?= App::$path; ?>users/profile&id=<?= $_SESSION['user']->id; ?>"><i class="fa fa-gamepad"></i>  Profile</a><hr>
            <a href="<?= App::$path; ?>users/profileedit&id=<?= $_SESSION['user']->id; ?>"><i class="fa fa-id-card"></i>  Edit Profile</a>
          </div>
          <?php } ?>
          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_users_roles) {?>

        <button class="accordion"><i class="fa fa-lock"></i>  Rights Access</button>
          <div class="panel1">
            <?php if ($_SESSION['user']->aed_users_aed) {?>

            <a href="<?= App::$path; ?>role/add"><i class="fa fa-plus-circle"></i>  Add Rights</a><hr>
            <?php } ?>

            <a href="<?= App::$path; ?>role/index"><i class="fa fa-gamepad"></i>  Manage Rights Access</a>


          </div>
          <?php } ?>

          <?php if (isset($_SESSION['user']) && $_SESSION['user']->show_sales) {?>

          <button class="accordion"><i class="fa fa-usd"></i>  Prices Requests</button>
          <div class="panel1">
              <?php if ($_SESSION['user']->aed_sales) {?>

                  <a href="<?= App::$path; ?>prs_clt/add"><i class="fa fa-plus-circle"></i>  Add Prices Requests</a><hr>
              <?php } ?>

              <a href="<?= App::$path; ?>prs_clt/index"><i class="fa fa-gamepad"></i>  Manage Prices Requests</a>


          </div>
          <?php } ?>

    </section>

    <!-- Start Section Content -->
    <div id="main">
      <section class="content">
        <div class="container">
          <?= $content ?>
        </div>
      </section>
    </div>
    <!-- End Section Contetnt -->
    <footer>
        <!-- Content Footer -->
    </footer>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/try/public/js/jquery-3.1.1.min.js"></script>
    <script src="http://localhost/try/public/js/bootstrap.min.js"></script>

    <script src="http://localhost/try/public/js/form-validator/jquery.form-validator.min.js"></script>
    <script src="http://localhost/try/public/js/functions.js"></script>
    <script src="http://localhost/try/public/js/<?= App::getInstance()->cur_page; ?>.js"></script>
    <script src="http://localhost/try/public/js/custom.js"></script>
  </body>
</html>
