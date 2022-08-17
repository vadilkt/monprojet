<?php session_start();
require_once('includes/config.php');

//Code pour l'enregistrement
if (isset($_POST['submit'])) {
    $poste = $_POST['poste'];
    $anciennete = $_POST['anciennete'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $agence = $_POST['agence'];
    $classification = $_POST['classification'];
    $direction = $_POST['direction'];
    $departement = $_POST['departement'];
    $superieur = $_POST['superieur'];
    $sql = mysqli_query($con, "select id from commerciaux where email='$email'");
    $row = mysqli_num_rows($sql);
    if ($row > 0) {
        echo "<script>alert('Cet utilisateur existe déjà! Essayez avec une autre adresse mail');</script>";
    } else {
        $msg = mysqli_query($con, "insert into commerciaux(noms,prenoms,email,password,poste,anciennete, classification, superieur, direction, departement, agence) values('$fname','$lname','$email','$password','$poste','$anciennete','$classification','$superieur', '$direction', '$departement','$agence')");

        if ($msg) {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="ancienneteription" content="" />
    <meta name="author" content="" />
    <title>S'enregistrer| Dekap Lah</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.ico" sizes="32x32" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert('Confirmation de mot de passe échoué!');
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body class="bg-image" style="background-image: url('assets/img/background.png');
background-position: center center; background-size: fit;backdrop-filter: blur(3.5px);
    height: 100vh;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                <div class="card-header text-center align-content-center small">
                                    <img class="img-fluid hover-shadow align-self-center ml-5" src="assets/img/logo.jpg" width="100" height="100" />

                                    <h3 class="text-center font-weight-light my-4">Collecte | S'inscrire</h3>
                                    <h5 class="text-center font-light my-4">Gérer vos données Commerciales| Constituer votre base de données commerciales</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" name="signup" onsubmit="return checkpass();">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="fname" name="fname" type="text" placeholder="Votre nom" required />
                                                    <label for="inputFirstName">Nom(s)</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="lname" name="lname" type="text" placeholder="Votre prénom" required />
                                                    <label for="inputLastName">Prénom(s)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="poste" name="poste" type="text" required />
                                                    <label for="poste">Poste</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input class="form-control" type="number" id="anciennete" name="anciennete" placeholder="Ancienneté" />
                                                    <label for="anciennete">Ancienneté</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 py-3">
                                                <p> Mois</p>
                                            </div>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="text" placeholder="abc@dekaplah.com" required />
                                            <label for="email">Adresse Mail</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="superieur" name="superieur" type="text" placeholder="" required />
                                            <label for="superieur">Supérieur Hiérarchique</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" id="agence" name="agence">
                                                        <option value="" selected>Agence</option>
                                                        <option value="Douala">Douala</option>
                                                        <option value="Yaounde">Yaoundé</option>
                                                        <option value="Bafoussam">Bafoussam</option>
                                                        <option value="Bangan">Bangan</option>
                                                        <option value="Bamendjou">Bamendjou</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="classification" name="classification" type="text" placeholder="Classification" required />
                                                    <label for="classification">Classification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" id="direction" name="direction">
                                                        <option value="" selected>Direction</option>
                                                        <option value="Douala">Douala (Direction Générale)</option>
                                                        <option value="Bamendjou">Bamendjou (Siège Social)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="departement" name="departement" type="text" placeholder="Département" required />
                                                    <label for="departement">Département</label>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" name="password" type="password" placeholder="Créer un mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Au moins un chiffre, une majuscule et une minuscule | 6 caractères ou plus" required />
                                                    <label for="inputPassword">Mot de passe</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirmer le mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Au moins un chiffre, une majuscule et une minuscule | 6 caractères ou plus" required />
                                                    <label for="inputPasswordConfirm">Confirmation du mot de passe</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-success btn-block" name="submit">Créer un compte</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small "><a class="text-decoration-none" href="login.php">Vous avez un compte? Connectez-vous!</a></div>
                                    <div class="small "><a class="text-decoration-none" href="index.php">Retourner à l'accueil</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>