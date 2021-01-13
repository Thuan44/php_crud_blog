<?php
include_once 'admin/pdo.php';
include_once 'admin/fonctions.php';
?>

<?php 

$firstname = $name = $email = "";
$nameError = $emailError = $passwordError = $passwordCheckError = "";
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // if the request method used is POST
    $name = verifyInput($_POST['name']);
    $email = verifyInput($_POST['email']);
    $isSuccess =  true;
    
    if(empty($name)) {
        $nameError = "Please enter your name";
        $isSuccess = false;
    }
    if(!isEmail($email)) { // If $email is not valid
        $emailError = "The email address is invalid";
        $isSuccess = false;
    }    
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
                <form 
                    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    id="signup-form" method="POST" role="form">

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label for="name">Your name*</label>
                            <input type="text" id="name" name="name" class="form-control" value="">
                            <p class="comments text-danger"><?php echo $nameError; ?></p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <label for="email">Email*</label>
                            <input type="text" id="email" name="email" class="form-control" value="">
                            <p class="comments text-danger"><?php echo $emailError; ?></p>
                        </div>

                        <!-- Password-->
                        <div class="col-md-12">
                            <label for="password">Choose a password*</label>
                            <input type="password" id="password" name="password" class="form-control" value="">
                            <p class="comments"><?php echo $passwordError; ?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="password2">Confirm your password*</label>
                            <input type="password" id="password2" name="password2" class="form-control" value="">
                            <p class="comments"><?php echo $passwordCheckError; ?></p>
                        </div>

                        <!-- Required info -->
                        <div class="col-md-12">
                            <p class="font-italic">*These fields are required</p>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary p-2 w-100" value="Create account">
                        </div>

                        
                    </div>
                    
                </form>

            </div>
            
            <a href="login.php" class="text-center" style="color: #979797"><small>Back to login</small></a>

        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>