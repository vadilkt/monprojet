<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tableau de bord | Dekap Lah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="/assets/img/favicon.ico" sizes="32x32" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed" style="background-image: url('assets/img/background.png');
background-position: center center; background-size: cover; backdrop-filter: blur(3px);
    height: 100vh;">
        <?php include_once('includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tableau de Bord</h1>
                        <hr />
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                        <?php
                        $userid = $_SESSION['id'];
                        $query = mysqli_query($con, "select * from commerciaux where id='$userid'");
                        while ($result = mysqli_fetch_array($query)) { ?>
                            <div class="row mb-4 pb-4">
                                <div class="col-xl-5 col-md-6 col-lg-12 col-xl-12">
                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">Bienvenu <?php echo $result['noms'] . " " . $result['prenoms']; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="action.php">Consulter votre action commerciale</a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Données de Production de <?php echo $result['noms'] . " " . $result['prenoms']; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="production.php">Consulter vos données de Production</a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Données de Montage des dossiers crédits de <?php echo $result['noms'] . " " . $result['prenoms']; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="montage.php">Consulter vos données de montage des dossiers crédits</a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Données liées au respect des engagements de service de <?php echo $result['noms'] . " " . $result['prenoms']; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="respect.php">Consulter vos données liées au respect des engagements de service</a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Données liées à la gestion du risque et de la qualité du portefeuille <?php echo $result['noms'] . " " . $result['prenoms']; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="risque_qualite.php">Gestion du risque et de la qualité du portefeuille</a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Données liées à la gestion du risque opérationnel</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-black stretched-link text-decoration-none" href="risque_operationnel.php">Gestion du risque opérationnel </a>
                                            <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>

            </div>

        </div>
        </main>
        <?php include('includes/footer.php'); ?>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>
<?php } ?>