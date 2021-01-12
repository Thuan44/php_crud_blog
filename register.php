<?php
include_once 'admin/pdo.php';
include_once 'admin/fonctions.php';
?>

<?php 

$firstname = $name = $email = "";
$nameError = $emailError = $passwordError =  "";
$isSuccess = false;

function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL); // Check if email is valid, returns a boolean
}

function verifyInput($var) {
    $var = trim($var); // Remove white spaces and line breaks
    $var = stripslashes($var); // Remove backslashes
    $var = htmlspecialchars($var);
    return $var;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Dev</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <h1 class="rounded border p-2 m-4 text-center text-white bg-primary">BECOME A DEV</h1>
    <p class="text-center font-italic">The blog that will make you become a more professional developer</p>


    <div class="heading">
        <h2 class="text-center mb-3 mt-5">Sign up</h2>
    </div>

    <div class="container shadow-sm rounded" style="max-width: 600px;">

        <div class="row justify-content-center border rounded p-5">
            <div class="col-lg-10 col-lg-offset-1">
                <form action="index.php" id="signup-form" method="POST" role="form">

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label for="name">Your name*</label>
                            <input type="text" id="name" name="name" class="form-control" value="">
                            <p class="comments"><?php echo $nameError; ?></p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" class="form-control" value="">
                            <p class="comments"><?php echo $emailError; ?></p>
                        </div>

                        <!-- Password-->
                        <div class="col-md-12">
                            <label for="password">Téléphone</label>
                            <input type="password" id="password" name="password" class="form-control" value="">
                            <p class="comments"><?php echo $passwordError; ?></p>
                        </div>

                        <!-- Required info -->
                        <div class="col-md-12">
                            <p><strong>*These fields are required</strong></p>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary w-100" value="Create account">
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>