<!DOCTYPE html>
<html lang="en" ng-app="app">
  <header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <meta name="baseUrl" content="<?php echo base_url(); ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>shop-homepage.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>shop-item.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>custom.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/vendor/bootstrap/css/'); ?>bootstrap.css">
    <!-- <link rel="stylesheet" href="</?php echo base_url('application/assets/RP/css/'); ?>bootstrap.css"> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home">CindyBite Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="account">My account
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart">Cart</a>
            </li>
            <li class="nav-item">
              <?php //echo $PrivilegeID;?>
              <a class="nav-link" href="#" data-toggle="modal" data-target="#sModal">Sign in</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="sModalLabel" ng-controller="loginController">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="sModalLabel">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form id="formsignin"  enctype="multipart/form-data">
          <div class="modal-body">
            Username<br>
            <input type="text" name="username" id="username" class="form-control" required placeholder="username" maxlength="50"><br>
            Password<br>
            <input type="text" name="password" id="password" class="form-control" required placeholder="Password" maxlength="20"><br>
            <button type="button" class="btn btn-primary btn-lg btn-block" id="btn-signIn">Sign In</button><br>
          </div>
        </form>
          <div class="modal-footer">
            <a href="register" button type="button" class="btn btn-outline-primary btn-lg btn-block">Create your CindyBite Shop account</button></a>
          </div>
        </div>
      </div>
    </div>
