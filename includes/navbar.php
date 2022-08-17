<?php session_start();
require_once('includes/config.php'); ?>

<nav class="sb-topnav navbar navbar-expand bg-white">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#top"><img class="img-fluid hover-shadow align-content-center" src="assets/img/logo.jpg" width="80" height="80" /></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            &nbsp;
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4"><?php
                                                        $userid = $_SESSION['id'];
                                                        $query = mysqli_query($con, "select * from commerciaux where id='$userid'");
                                                        while ($result = mysqli_fetch_array($query)) {


                                                            echo $result['noms'] . " " . $result['prenoms'];
                                                        } ?></ul>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
            </ul>
        </li>
    </ul>

</nav>