<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
 // for  password change   
if(isset($_POST['update']))
{
$oldpassword=$_POST['currentpassword']; 
$newpassword=$_POST['newpassword'];
$sql=mysqli_query($con,"SELECT password FROM users where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$userid=$_SESSION['id'];
$ret=mysqli_query($con,"update users set password='$newpassword' where id='$userid'");
echo "<script>alert('Votre mot de passe a été changé avec succès !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
}
else
{
echo "<script>alert('L'ancien mot de passe ne correspond pas !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
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
        <title>Changer de Mot de Passe | Dekap Lah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="/assets/img/favicon.ico" sizes="32x32" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
function valid()
{
if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
{
alert("Les mots de passe ne correspondent pas !!");
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}
</script>

    </head>
    <body class="sb-nav-fixed"  style="background-image: url('assets/img/background.png');
background-position: center center; background-size: cover;
    height: 100vh;">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                        <h1 class="mt-4">Changer de mot de passe</h1>
                        <div class="card mb-4">
                     <form method="post" name="changepassword" onSubmit="return valid();">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Mot de passe actuel</th>
                                       <td><input class="form-control" id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Nouveau Mot de passe</th>
                                       <td><input class="form-control" id="newpassword" name="newpassword" type="password" value=""  required /></td>
                                   </tr>
                                         <tr>
                                       <th>Confirmation du Mot de passe</th>
                                       <td colspan="3"><input class="form-control" id="confirmpassword" name="confirmpassword" type="password"    required /></td>
                                   </tr>
                  
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update" style="background-color: rgb(1,66,3); color: white;">Changer</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>


                    </div>
                </main>
          <?php include('includes/footer.php');?>
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