<?php

session_start();

use App\Controllers\UsersController;
use App\Http\Request;

include(__DIR__ . "/includes/auth/header.php");

if (isset($_POST['submit'])) {
    /* envia os dados para a controller responsável */
    UsersController::create((new Request)->getPostVars());
}

?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" action="register">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="inputFirstName" name="inputFirstName" placeholder="First Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="inputLastName" name="inputLastName" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="inputEmail" name="inputEmail" placeholder="Email Address" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="inputPassword" name="inputPassword" placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="repeatPassword" name="repeatPassword" placeholder="Repeat Password" required>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                            <hr>
                            <!-- <a href="index" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include(__DIR__ . "/includes/auth/footer.php"); ?>