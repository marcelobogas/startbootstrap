<?php

session_start();

use App\Actions\SessionStart;
use App\Http\Request;

include(__DIR__ . "/includes/auth/header.php");

if (isset($_POST['validar'])) {
    /* envia os dados para a controller responsável */
    SessionStart::validate((new Request)->getPostVars());
}

?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <?php
                                if ($_SESSION['flash_message']) { ?>
                                    <div class="text-center pb-3">
                                        <span class="text-danger"><?php echo $_SESSION['flash_message']; ?></span>
                                    </div>
                                <?php
                                }
                                /* libera as variáveis de sessão */
                                unset($_SESSION['flash_message']);
                                ?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="login">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="inputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="validar" value="validar" class="btn btn-primary btn-user btn-block">Login</button>
                                    <button type="reset" class="btn btn-danger btn-user btn-block">Cancelar</button>
                                    <!-- <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> -->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include(__DIR__ . "/includes/auth/footer.php"); ?>