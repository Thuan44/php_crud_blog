<?php
include_once 'admin/pdo.php';
include_once 'admin/fonctions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Become a Dev</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand font-weight-bold" href="index.php">BECOME A DEV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Articles</a>
        </li>
      </ul>
    </div>

    <!-- Greeting  -->
    <?php if (isset($_SESSION['user_name'])) { ?>
      <small class="text-white mr-2 greeting">Hi, <?php echo $_SESSION['user_name'] ?>.</small>
    <?php } ?>

    <!-- Sign out button -->
    <?php if (isset($_SESSION['user_name'])) { ?>
      <a href="logout.php" class="btn text-white sign-out"><i class="fas fa-sign-out-alt"></i></a>
    <?php } else { ?>
      <a href="login.php" class="btn text-white sign-out">Sign in <i class="fas fa-sign-in-alt"></i></a>
    <?php } ?>

  </nav>

  <h1 class="rounded border p-2 m-4 text-center text-white bg-primary">BECOME A DEV</h1>
  <p class="text-center font-italic">The blog that will make you become a more professional developer</p>