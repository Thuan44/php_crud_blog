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
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<h1 class="rounded border p-2 m-4 text-center text-white bg-primary">BECOME A DEV</h1>
<p class="text-center font-italic">The blog that will make you become a more professional developer</p>


<?php 
if(isset($_POST)) {
    @$userEmail = $_POST['user_email'];
    @$userPassword = $_POST['user_password'];
    $login = login($userEmail, $userPassword);

    if(isset($_POST['destroy_session'])) {
        session_destroy();
    }
}


?>


<!-- FORM -->
<div class="container d-flex flex-column justify-content-center align-items-center">

    <h2 class="text-center mb-3">Login</h2>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <input class="input-group mb-2" type="email" name="user_email" placeholder="Your email" value="admin@gmail.com" required>
        <input class="input-group mb-2"  type="password" name="user_password" placeholder="Your Pasword" value="admin" required >
        <input class="btn btn-primary w-100" type="submit" name="submit" value="Submit">

    </form>

    <!-- <form action="">
        <input class="btn btn-secondary w-100" type="submit" name="destroy_session" value="Destroy Session">
    </form> -->
</div>

<?php include_once 'footer.php' ?>