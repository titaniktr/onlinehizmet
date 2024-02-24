<?php
include('C:/xampp/htdocs/server/auth-control.php');
?>
<head>
<?php include("inc/header.php");
$site_title = "Tc Sorgu"; ?>
<title><?= $config["title"] ?> - <?= $site_title ?></title>
</head>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
</style>
<body>
  <div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <?php include("inc/sidebar.php");
    include("inc/topheader.php"); ?>
    <!-- partial -->
  
    <div class="page-wrapper">
          
      <!-- partial:partials/_navbar.html -->
      
      <!-- partial -->

			<div class="page-content">
      <div class="row">	
				<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
                      <h5 class="mb-0">Tc Sorgu 2023</h5>
                      
                      <small class="text-primary float-end">Lütfen Sorgulanacak Tc Kimlik Numarasını Giriniz.</small>
                    </div>
                    <div class="card-body">
                      <form id="angeris"method="POST">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tc No</label>
                          <input type="text" class="form-control" name="tc"  id="basic-default-fullname" placeholder="00000000000"/>
                        </div>
                      
                       <button name="sorgu" id ="btn"type="submit" class="btn btn-primary">Sorgula</button>
                       <br><br>
                       <?php echo $message; ?>
                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                  <br><br>
                    <thead>
                      <tr>
                        <th>Kimlik No</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Doğum Tarihi</th>
                        <th>Anne Adı</th>
                        <th>Anne Tc</th>
                        <th>Baba Adı</th>
                        <th>Baba Tc</th>
                        <th>İl</th>
                        <th>İlçe</th>
                        <th>CODER</th>
                      </tr>
                    </thead>
                        <tbody class="table-border-bottom-0">
                     <?php
                     $aangeris = new mysqli('localhost', 'root' , '' , '101m');
mysqli_query($aangeris,"SET CHARACTER SET 'utf8'");
                     if (isset($_POST['sorgu'])) {
                       $str = $_POST['tc'];
                       $monar = $aangeris->prepare("SELECT * FROM 101m");
                       $sql = "SELECT * FROM 101m WHERE TC = '$str'";
                       $result = $aangeris->query($sql);
                      
                       while($row = $result->fetch_assoc()) {
    echo "<tr>
                    <td>" . $row["TC"] . "</td>
                    <td>" . $row["ADI"] . "</td>
                    <td>" . $row["SOYADI"] . "</td>
                    <td>" . $row["DOGUMTARIHI"] . "</td>
                    <td>" . $row["ANNEADI"] . "</td>
                    <td>" . $row["ANNETC"] . "</td>
                    <td>" . $row["BABAADI"] . "</td>
                    <td>" . $row["BABATC"] . "</td>
                    <td>" . $row["NUFUSIL"] . "</td>
                    <td>" . $row["NUFUSILCE"] . "</td>
                    <td>Worex Sorgu YouTube</td>
                      </tr>";

                         
                       }

                     

                      }


                      ?>
                    </tbody>
                  </table>


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
             
<?php 

include("inc/main.min.php");

?>