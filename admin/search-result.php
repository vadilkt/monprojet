<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gérer les Etudiants | Insert Pro</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">
Résultats de Recherche</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Résultats de Recherche</li>
                        </ol>
            <h3>Résultats de Recherche avec mot-clé <?php echo $_POST['searchkey'];?>'</h3>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Résultats de Recherche
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Sno.</th>
                                  <th>Prénom(s) </th>
                                  <th> Nom(s) </th>
                                  <th> E-mail </th>
                                  <th>Numéro de téléphone</th>
                                  <th>Poste</th>
                                  <th>Institution</th>
                                  <th>Références</th>
                                  <th>Date d'enregistrement</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Sno.</th>
                                  <th>Prénom(s) </th>
                                  <th> Nom(s) </th>
                                  <th> E-mail </th>
                                  <th>Numéro de téléphone</th>
                                  <th>Poste</th>
                                  <th>Institution</th>
                                  <th>Références</th>
                                  <th>Date d'enregistrement</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
$searchkey=$_POST['searchkey'];
$ret=mysqli_query($con,"select * from users natural join professionel where (fname like '%$searchkey%' || email like '%$searchkey%' || contactno like '%$searchkey%' || intitule_poste like '%$searchkey%' || institution like '%$searchkey%')");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>  
                                  <td><?php echo $row['intitule_poste'];?></td>
                                  <td><?php echo $row['institution'];?></td>
                                  <td><?php echo $row['reference'];?></td>
                                  <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                     
                                     <a href="user-profile.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-edit"></i></a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>" onClick="return confirm('Souhaitez-vous vraiment supprimer cet étudiant?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>