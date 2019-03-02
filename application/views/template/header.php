<!DOCTYPE html>
<html lang="en" ng-app="app">
  <header class="py-5 bg-image-full">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <meta name="baseUrl" content="<?php echo base_url(); ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>shop-homepage.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>shop-item.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>half-slider.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>custom.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap-grid.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>bootstrap-reboot.css">
    <script type="text/javascript" src="<?php echo base_url('application/assets/js/'); ?>jquery.js"></script>
    <!-- <link rel="stylesheet" href="</?php echo base_url('application/assets/vendor/bootstrap/css/'); ?>bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="</?php echo base_url('application/assets/RP/css/'); ?>bootstrap.css"> -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark  fixed-top bg-dark">
      <!-- <div class="container"> -->
        <a class="navbar-brand" href="<?php echo base_url();?>home">Prototype Shop <i class="fa fa-home" aria-hidden="true"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


          <ul class="navbar-nav ml-auto">

            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="account">My account -->
                <?php if (isset($custname)){ ?>
                     <?php if ($custname == '') { ?>
                               <a class="nav-link" href="<?php echo base_url();?>#" data-toggle="modal" data-target="#sModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> My account</a>
                      <?php } else{?><a  class="nav-link" href="<?php echo base_url();?>account"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Hi! <?php echo "$custname ";?></a><?php } ?>
                 <?php } ?>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <!-- check user priviledge and show dashboard only admin -->
              <?php if (isset($privid)){ ?>
                   <?php if ($privid == '2') { ?>
                              <a  class="nav-link" href="<?php echo base_url();?>user"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
                    <?php } else if ($privid == '3'){?>
                             <a  class="nav-link" href="<?php echo base_url();?>user"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a><?php } ?>
               <?php } else {}?>
            </li>
            <li class="nav-item">
              <a  class="nav-link" href="<?php echo base_url();?>cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
            </li>

            <li class="nav-item">
              <?php //echo $PrivilegeID;?>
              <?php if (isset($custname)){ ?>
                   <?php if ($custname == '') { ?>
                             <a class="nav-link" href="<?php echo base_url();?>#" data-toggle="modal" data-target="#sModal"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a>
                    <?php } else{?><a  class="nav-link" href="<?php echo base_url();?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                  <?php } ?>
                  <!-- end else -->
               <?php } ?>
                <!-- end if -->
            </li>
            <li class="nav-item">
            <form method="post" action="<?php echo base_url();?>search">
                <input type="text" name="searchProduct" placeholder="search" class="form-control pull-left"></li>
            <li class="nav-item">
                <button type="submit" name="buttonSearch" class="btn btn-outline-info pull-right">Search</button>
            </form>
            </li>

          </ul>
        </div>
      <!-- </div> container -->
    </nav>

  </header>
  <body style="margin: 0;">
    <!-- style="background-color: #000000;" -->
    <!-- Modal -->
    <div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="sModalLabel" ng-controller="loginController">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="sModalLabel">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

          <form method="post" id="formsignin"  enctype="multipart/form-data">
          <div class="modal-body">
            Username<br>
            <input type="text" name="username" id="username" class="form-control" required placeholder="username" maxlength="50"><br>
            Password<br>
            <input type="password" name="password" id="password" class="form-control" required placeholder="Password" maxlength="20"><br>
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-signIn">Sign In</button><br>
          </div>
        </form>

          <div class="modal-footer">
            <a href="register" button type="button" class="btn btn-outline-primary btn-lg btn-block">Create your Prototype Shop account</button></a>
          </div>
        </div>
      </div>
    </div>
