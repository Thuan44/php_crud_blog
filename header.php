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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control search mr-sm-2" type="search" placeholder="Search for an article..." aria-label="Search">
      <button class="btn btn-outline-white my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

  <!-- Sign out button -->
<a href="logout.php" class="btn text-white sign-out"><i class="fas fa-sign-out-alt"></i></a>

</nav>

<h1 class="rounded border p-2 m-4 text-center text-white bg-primary">BECOME A DEV</h1>
<p class="text-center font-italic">The blog that will make you become a more professional developer</p>

