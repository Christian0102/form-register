<!DOCTYPE html>
<!-- saved from url=(0051)https: //getbootstrap.com/docs/4.0/examples/pricing/ -->
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="csrf" content="<?php echo csrf();?>">
   <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">
   <title>Task Manager</title>
   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
   </script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
   </script>
   <script src="https://kit.fontawesome.com/d0891b8210.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../public/assets/css/style.css" />
</head>

<body>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
      <?php if (SessionHelper::isGuest()) : ?>

      <a class="navbar-brand  btn-outline-success br-4 rg-bt " href="/home/register">Register</a>
      <a class="navbar-brand btn btn-outline-primary lg-bt" href="/home/login">Login</a>

      <?php endif; ?>
      <?php if (!SessionHelper::isGuest()) : ?>
      <div class="float-left"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars cl-white"></span></a>
      </div>
      <a class="btn btn-outline-light" id="logoutButton" href="/auth/logout" onClick="return confirm('You Are Sure ?')">Logout</a>
      <?php endif; ?>

   </nav>