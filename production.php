<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['ajouter'])) {
        $intitule_obj = $_POST['intitule_obj'];
        $intitule1 = $_POST['intitule_indic1'];
        $intitule2 = $_POST['intitule_indic2'];
        $valeur1 = $_POST['indic1'];
        $valeur2 = $_POST['indic2'];
        $moyen = $_POST['moyen'];
        $nature = $_POST['nature'];
        $date_deb = $_POST['date_deb'];
        $date_fin = $_POST['date_fin'];
        $userid = $_SESSION['id'];

        $msg = mysqli_query($con, "INSERT into objectifs(intitule,moyen,nature,date_deb,date_fin,id) VALUES('$intitule_obj','$moyen','$nature','$date_deb','$date_fin','$userid')");
        $id = mysqli_insert_id($con);
        $query = "INSERT into indicateurs(intitule_indic,valeur_indic,id_obj) VALUES('$intitule1','$valeur1','$id')";
        $msg1 = mysqli_query($con, $query);
        $query1 = "INSERT into indicateurs(intitule_indic,valeur_indic,id_obj) VALUES('$intitule2','$valeur2','$id')";
        $msg2 = mysqli_query($con, $query1);


        if ($msg && $msg1 && $msg2) {
            echo "<script>alert('Ajout réussi!');</script>";
            echo "<script type='text/javascript'> document.location ='action.php'; </script>";
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
        <title>Production | Dekap Lah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="/assets/img/favicon.ico" sizes="32x32" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed" style="background-image: url('assets/img/background.png');
        background-position: center center; background-size: cover;
        height: 100vh;">
        <?php include_once('includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card m-5">
                            <div class="card-header">
                                <h3 class="m-4">Production</h3>
                            </div>
                            <table class="m-4">
                                <form method="post">
                                    <tr>
                                        <td><label for="annee_debut">Date de début: </label></td>
                                        <td><input class="form-control" type="date" id="date_deb" name="date_deb" required /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="annee_fin">Date de fin: </label></td>
                                        <td><input class="form-control" type="date" id="date_fin" name="date_fin" required /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nature">Nature:</label> </td>
                                        <td><select class="form-select" id="nature" name="nature">
                                                <option value="Production">Production</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td><label for="intitule_obj">Objectif:</label> </td>
                                        <td><select class="form-select" id="intitule_obj" name="intitule_obj">
                                                <option value="">-----</option>
                                                <option value="Dépôts">Dépôts</option>
                                                <option value="Emplois par trésorerie">Emplois par trésorerie</option>
                                                <option value="Emplois par signature">Emplois par signature</option>
                                                <option value="DEKAP LAH ALERT">DEKAP LAH ALERT</option>
                                                <option value="ORANGE MONEY">ORANGE MONEY</option>
                                                <option value="MTN MONEY">MTN MONEY</option>
                                                <option value="VISA PREPAID">VISA PREPAID</option>
                                                <option value="Crédit DEKAP LAH ROBUST">Crédit DEKAP LAH ROBUST</option>
                                                <option value="Crédit DEKAP LAH INVESTISSEMENT">Crédit DEKAP LAH INVESTISSEMENT</option>
                                                <option value="Crédit DEKAP LAH IMMO">Crédit DEKAP LAH IMMO</option>
                                                <option value="Crédit DEKAP LAH BAIL">Crédit DEKAP LAH BAIL</option>
                                                <option value="Crédit DEKAP LAH SERENITE">Crédit DEKAP LAH SERENITE</option>
                                                <option value="Crédit DEKAP LAH LIFESTYLE">Crédit DEKAP LAH LIFESTYLE</option>
                                                <option value="Crédit DEKAP LAH FONCTIONNAIRE">Crédit DEKAP LAH FONCTIONNAIRE</option>
                                                <option value="Crédit DEKAP LAH AGRISOFTPOWER">Crédit DEKAP LAH AGRISOFTPOWER</option>
                                                <option value="Crédit DEKAP LAH AUTOMOTO">Crédit DEKAP LAH AUTOMOTO</option>
                                                <option value="Crédit DEKAP LAH SHOPPING">Crédit DEKAP LAH SHOPPING</option>
                                                <option value="Crédit DEKAP LAH ANTIFOIRAGE">Crédit DEKAP LAH ANTIFOIRAGE</option>
                                                <option value="Crédit DEKAP LAH SUKUL">Crédit DEKAP LAH SUKUL</option>
                                                <option value="MARGE D'INTERMEDIATION">MARGE D'INTERMEDIATION</option>
                                                <option value="PNB">PNB</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><label for="moyen">Moyen:</label> </td>
                                        <td><select class="form-select" id="moyen" name="moyen">
                                                <option value="">-----</option>
                                                <option value="Trousse commerciale">Trousse commerciale</option>
                                                <option value="Communication">Communication</option>
                                                <option value="Parrainage client">Parrainage client</option>
                                                <option value="Campagnes produits">Campagnes produits</option>
                                                <option value="Action commerciale">Action commerciale</option>
                                                <option value="Campagne de télécontact">Campagne de télécontact</option>
                                                <option value="Formations">Formations</option>
                                                <option value="Séminaires en entreprise">Séminaires en entreprise</option>
                                                <option value="Bulletins d'information">Bulletin d'information</option>
                                                <option value="Product Program">Product Program</option>
                                            </select></td>
                                    </tr>

                                    <tr>
                                        <td id="indicateur_label">
                                            Indicateurs:
                                        </td>

                                        <td id="indicateurs">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="intitule_indic" name="intitule_indic1">
                                                            <option value="Niveau de production">Niveau de production</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0"><input class="form-control" id="valeur_indic" name="indic1" type="text" placeholder="0" required="true"></input></div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="intitule_indic" name="intitule_indic2">
                                                            <option value="Objectif">Objectif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0"><input class="form-control" id="valeur_indic" name="indic2" type="text" placeholder="0" required="true"></input></div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="5" style="text-align:center ;"><button type="submit" class="btn btn-block mt-3" style="background-color: rgb(1,66,3); color: white;" name="ajouter">Ajouter</button></td>
                                    </tr>
                                </form>

                            </table>
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
        <!-- <script>
    var intitule_obj_element = document.getElementById("intitule_obj");
    var indicateurs_element = document.getElementById("indicateurs");

    var objectif_selectionne = undefined;
    var indicateurs = undefined;
    var i = 0;
    var indicateur_element = undefined;

    var objectifs = {
        "Taux de transformation des prospects en clients": [
            "Nombre de prospects rencontrés",
            "Nombre d'entrée en relation"
        ],
        "Entrée en Relation": [
            "Nombre d'entrée en relation effectuée",
            "Nombre d'entrée en relation à effectuer"
        ],
        "Conformité des formulaires à remplir et des documents à fournir": [
            "Nombre de prospects rencontrés",
            "Nombre d'entrée en relation"
        ]
    }

    intitule_obj_element.onchange = function(event) {
        objectif_selectionne = event.target.value;

        if (objectif_selectionne != "") {
            document.getElementById("indicateur_label").style.display ="block";
        }

        indicateurs = objectifs[objectif_selectionne];
        // Effacer le contenu HTML pour afficher les nouveau indicateurs.
        indicateurs_element.innerHTML = "";
        // Afficher les nouveaux indicateurs.
        for (i = 0; i < indicateurs.length; i++) {
            indicateur_element = document.createElement("div");
            indicateur_element.setAttribute("class", "row mb-3");
            indicateur_element.innerHTML = creerIndicateurHTML(indicateurs[i],i);
            // Ajouter l'indicateur sur la page html.
            indicateurs_element.appendChild(indicateur_element);
        }

    }

    // Creer un element html pour un indicateur en precisant son intitule.
    function creerIndicateurHTML(intitule,nb) {
        return '<div class="col-md-6"><div class="form-floating mb-3 mb-md-0"><select class="form-select" id="intitule_indic" name="intitule_indic'+nb+'"><option value="' + intitule + '">' + intitule + '</option></select></div></div><div class="col-md-6"><div class="form-floating mb-3 mb-md-0"><input class="form-control" id="valeur_indic" name="valeur_indic'+nb+'" type="text" placeholder="0" required="true"></input></div></div>'
    }
</script> -->
    </body>


    </html>
<?php } ?>