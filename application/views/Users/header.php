<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="http://localhost/firstwebapp/Assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url("Assets/css/bootstrap.min.css") ?>"  rel="stylesheet">
    <?= link_tag("Assets/css/bootstrap.min.css") ?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


  <link href="<?= base_url("Assets/css/bootstrap.min.css") ?>"  rel="stylesheet">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style>
/* body {
  background-image: url('https://picsum.photos/200/300');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
} */
</style>


</head>
<body>
   
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Article List</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="navbar-brand" href="<?=base_url('home')?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="login/index">Admin Panel</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('login/index')?>">Admin Panel</a>
      </li>




      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('login/register')?>">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" id="srch" >
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


</body>
</html>