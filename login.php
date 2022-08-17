<?php session_start();
include_once('includes/config.php');
// Code for login 
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $useremail = $_POST['email'];
    $ret = mysqli_query($con, "SELECT id,noms FROM commerciaux WHERE email='$useremail' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {

        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['noms'];
        header("location:welcome.php");
    } else {
        echo "<script>alert('Email ou mot de passe invalide');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Se Connecter | Dekap Lah</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.ico" sizes="32x32" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-image" style="background-image: url('assets/img/background.png');
background-position: center center; background-size: cover; backdrop-filter: blur(3px);
    height: 100vh;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">

                                <div class="card-header text-center align-content-center">
                                    <img class="img-fluid hover-shadow align-content-center" src="assets/img/logo.jpg" width="90" height="90" />
                                    
                                    <h3 class="text-center font-weight-light my-4">Se Connecter</h3>
                                </div>
                                <div class="card-body">

                                    <form method="post">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="abc@dekaplah.com" required />
                                            <label for="email">Adresse Mail</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="password" type="password" placeholder="*******" required />
                                            <label for="password">Mot de passe</label>
                                        </div>


                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-decoration-none" href="password-recovery.php">Mot de passe oublié?</a>
                                            <button class="btn btn-success" name="login" type="submit">Connexion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a class="small text-decoration-none" href="signup.php">Pas de compte? S'Enregistrer!</a></div>
                                    <div class="small"><a class="small text-decoration-none" href="index.php">Accueil</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>