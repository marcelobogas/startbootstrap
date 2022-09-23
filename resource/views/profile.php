<?php 

session_start();

/* redireciona o usuário para a tela de login caso não exista um id de sessão criado */
if (!$_SESSION['sessionId']) {
    header('location: login');
}

include(__DIR__ . "/includes/pages/header.php"); 

?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include(__DIR__ . '/includes/components/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include(__DIR__ . '/includes/components/topbar.php'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Profile Page</h1>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include(__DIR__ . "/includes/components/footer-content.php"); ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include(__DIR__ . "/includes/pages/footer.php"); ?>