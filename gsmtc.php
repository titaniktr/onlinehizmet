<?php
include('C:/xampp/htdocs/server/auth-control.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");
$site_title = "Gsm'Den Tc"; ?>
<title><?= $config["title"] ?> - <?= $site_title ?></title>
</head>
<body>
  <div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <?php include("inc/sidebar.php");
    include("inc/topheader.php"); ?>
    <!-- partial -->
  
    <div class="page-wrapper">
          
      <!-- partial:partials/_navbar.html -->
      
      <!-- partial -->
<br>
<br>
<br>  
<br>
<br>
<br>              
             <div class="content-wrapper">
              <div class="container-xxl flex-grow-1 container-p-y">
               <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Gsm Tc Sorgu 2023</h5>
                      <small class="text-primary float-end">Lütfen Sorgulanacak Kişinin Tc Bilgisini Giriniz.</small>
                    </div>
                    <div class="card-body">
                      <form method="post" id="angeris">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Gsm No</label>
                          <input type="text" name="gsm"  class="form-control" id="basic-default-fullname" placeholder="00000000000"/>
                        </div>
                        
                                              <button name="sorgu" id ="btn"type="submit" class="btn btn-primary">Sorgula</button>
                                              <br><br>
                                              <?php echo $message; ?>


 
                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                  <br><br>
                    <thead>
                      <tr>
                        <th>Telefon Numarası</th>
                        <th>Kimlik No</th>
                        <th>CODER</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                     $aangeris = new mysqli('localhost', 'root' , '' , '120mgsm');
                     mysqli_query($aangeris,"SET CHARACTER SET'utf8'");
                      if (isset($_POST['sorgu'])) {
                      $gsm = $_POST['gsm'];
                      $aanger = "SELECT * FROM data";
                      $sql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE GSM ='$gsm'";
                      $result = $aangeris->query($sql);



                       
                       while ($row = $result->fetch_assoc()) {
                         ".<br><br>.";
                    echo "<tr>
                    <td>" . $row["GSM"] . "</td>
                    <td>" . $row["TC"] . "</td>
                    <td>Worex Sorgu YouTube</td>
                      </tr>";

                     }
                     
                       }

                      ?>

                    </tbody>
                  </table>
                </div>
              </div>

 <!-- core:js -->
  <script src="../assets/vendors/core/core.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../assets/vendors/chartjs/Chart.min.js"></script>
  <script src="../assets/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="../assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/vendors/feather-icons/feather.min.js"></script>
  <script src="../assets/js/template.js"></script>
  <!-- endinject -->
  <!-- custom js for this page -->
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/datepicker.js"></script>
  <script src="assets/js/seooo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <!-- end custom js for this page -->
  