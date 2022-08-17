<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['ajouter'])) {
        $intitule_obj = $_POST['intitule_obj'];
        $intitule1 = $_POST['intitule_indic0'];
        $intitule2 = $_POST['intitule_indic1'];
        $valeur1 = $_POST['valeur_indic0'];
        $valeur2 = $_POST['valeur_indic1'];
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
        <title>Gestion du risque opérationnel | Dekap Lah</title>
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
                                <h3 class="m-4">Gestion du risque opérationnel</h3>
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
                                                <option value="Gestion du risque opérationnel">Gestion du risque opérationnel</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td><label for="intitule_obj">Objectif:</label> </td>
                                        <td><select class="form-select" id="intitule_obj" name="intitule_obj">
                                                <option value="">-----</option>
                                                <option value="Mise à jour des informations clients (Compliance, Amplitude, Physique)">Mise à jour des informations clients (Compliance, Amplitude, Physique)</option>
                                                <option value="Recueil de la documentation manquante des dossiers de transferts">Recueil de la documentation manquante des dossiers de transferts</option>
                                                <option value="Gestion de levée des incidents bancaires">Gestion de levée des incidents bancaires</option>
                                                <option value="Régularisation des dépassements de plafond sur les cartes visa">Régularisation des dépassements de plafond sur les cartes visa</option>
                                                <option value="Levée de recommandations(DAI, DRCP, Qualité...)">Levée de recommandations(DAI, DRCP, Qualité...)</option>
                                              </select></td>
                                    </tr>
                                    <tr>
                                        <td><label for="moyen">Moyen:</label> </td>
                                        <td><select class="form-select" id="moyen" name="moyen">
                                                <option value="">-----</option>
                                                <option value="Etat de mise à jour de dossiers">Etat de mise à jour de dossiers</option>
                                                <option value="Etat des dossiers incomplets">Etat des dossiers incomplets</option>
                                                <option value="Etat des IB">Etat des IB</option>
                                                <option value="Etat monétique des dépassements sur carte VISA">Etat monétique des dépassements sur carte VISA</option>
                                                <option value="Etat de recommandation">Etat de recommandation</option>
                                            </select></td>
                                    </tr>

                                    <tr>
                                        <td id="indicateur_label" style="display:none;">
                                            Indicateurs:
                                        </td>
                                        <td id="indicateurs">

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
        <script>
    var intitule_obj_element = document.getElementById("intitule_obj");
    var indicateurs_element = document.getElementById("indicateurs");

    var objectif_selectionne = undefined;
    var indicateurs = undefined;
    var i = 0;
    var indicateur_element = undefined;

    var objectifs = {
        "Mise à jour des informations clients (Compliance, Amplitude, Physique)": [
            "Nombre de dossiers complets",
            "Nombre total de dossiers présentés"
        ],
        "Recueil de la documentation manquante des dossiers de transferts": [
            "Nombre de dossiers régularisés",
            "Nombre total de dossiers à régulariser"
        ],
        "Gestion de levée des incidents bancaires": [
            "Nombre de dossiers d'IB à lever",
            "Nombre total d'IB levés"
        ],
        "Régularisation des dépassements de plafond sur les cartes visa": [
            "Nombre de dépassements régularisés",
            "Nombre de dépassements"
        ],
        "Levée de recommandations(DAI, DRCP, Qualité...)": [
            "Nombre de recommandations appliquées",
            "Nombre total de recommadations"
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
</script>
    </body>


    </html>
<?php } ?>

