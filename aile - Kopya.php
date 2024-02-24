<?php
include('C:/xampp/htdocs/server/auth-control.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");
$site_title = "Aile Sorgu"; ?>
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
	  <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">

</h4>



</div>
</div>




                <br>
				<br>
                <br> 
              <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
               <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Aile Sorgu</h5>
                      <small class="text-primary float-end">Lütfen Sorgulanacak Kişinin Tc Kimlik Numarasını Giriniz. </small>
                    </div>
                    <div class="card-body">
                  <form method="post" id="angeris">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tc No</label>
                          <input type="text" name="tc"class="form-control" id="basic-default-fullname" placeholder="00000000000"/>
                        </div>
                        
                   <button name="ara" id ="btn"type="submit" class="btn btn-primary">Sorgula</button>
                   <br><br>
                   <?php echo $message; ?>


                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                  <br><br>
                    <thead>
                      <tr>
                        <th>Yakınlık</th>
                        <th>Kimlik No</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Doğum Tarihi</th>
                        <th>İl</th>
                        <th>İlçe</th>
                        <th>Coder</th>
                        <th>Telefon Numarası</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
             <?php
            $baglanti = new mysqli('localhost', 'root', '', '101m');
             mysqli_query($baglanti,"SET CHARACTER SET 'utf8'");
            if ($angerisnewpanel['role'] != 3 && $angerisnewpanel['role'] != 1) {
  if (isset($_POST['ara'])) 
    
     if (isset($_POST["ara"])) {
                $tc = $_POST['tc'];
                $angerisnewapi = $baglanti->prepare("SELECT * FROM 101m");
                $angerisgsm = $baglanti->prepare("SELECT * FROM illegalplatform_hackerdede1_gsm");

              $sql = "SELECT * FROM 101m WHERE TC = '$tc'";
                $result = $baglanti->query($sql);


                         

    while($row = $result->fetch_assoc()) {
                         ".<br><br>.";
        
                echo "<tr>
                    <td> Kendisi </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>Worex Sorgu YouTube</td>
                        ";


                $sqlcocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                $resultcocugu = $baglanti->query($sqlcocugu);

                $sqlkardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                $resultkardesi = $baglanti->query($sqlkardesi);
                $sqlbabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                $resultbabasi = $baglanti->query($sqlbabasi);
                
                $sqlannesi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                $resultannesi = $baglanti->query($sqlannesi);

                $gsmkendisi = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC ='".$row["TC"]."' LIMIT 1";
                $gsmresult = $baglanti->query($gsmkendisi);

                while ($row = $gsmresult->fetch_assoc()) {

                    echo "
                <td>" . $row["GSM"] . "</td>
                </tr>";
                    
                }



                while($row = $resultkardesi->fetch_assoc()) {
                    

                     echo "<tr>
                        <td> Kardeşi </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                         <td>Worex Sorgu YouTube</td>
                                           ";
                     $sqlkendikendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resultkendikendicocugu = $baglanti->query($sqlkendikendicocugu);  


                    $gsmkardesi = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                    $gsmkardesiresult = $baglanti->query($gsmkardesi);
                    while ($row = $gsmkardesiresult->fetch_assoc()) {

                        echo "
                        <td>" . $row["GSM"] . "</td>
                        </tr>";
                        
                    }
                    while($row = $resultkendikendicocugu->fetch_assoc()) {
                        
                        echo "<tr>
                            <td> Kardeşinin Çocuğu </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>Worex Sorgu YouTube</td>
                            ";

                        $yigensql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                        $yigenresult = $baglanti->query($yigensql);

                        while ($row = $yigenresult->fetch_assoc()) {
                                 echo "
                        <td>".$row["GSM"]."</td>
                        </tr>";

                       
                        
                    }

                    }
                    
                }

                while ($row = $resultbabasi->fetch_assoc()) {
                    
                     echo "<tr>
                        <td> Babası </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>Worex Sorgu YouTube</td>
                           ";

                    $babasql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                        $babaresult = $baglanti->query($babasql);

                         while ($row = $babaresult->fetch_assoc()) {

                        echo "
                        <td>".$row["GSM"]."</td>
                        </tr>";
                        
                    }

                    
                }
                while ($row = $resultannesi->fetch_assoc()) {
                    
                     echo "<tr>
                        <td> Annesi </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>Worex Sorgu YouTube</td>
                    ";

                    $annesql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                        $anneresult = $baglanti->query($annesql);

                         while ($row = $anneresult->fetch_assoc()) {

                        echo "
                        <td>" . $row["GSM"] . "</td>
                        </tr>";
                        
                    }
                }
                while ($row = $resultcocugu->fetch_assoc()) {
                    
                     echo "<tr>
                        <td>Çocuğu </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>Worex Sorgu YouTube</td>
                    ";
                                         $sqltorunu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resulttorunu = $baglanti->query($sqltorunu);
                    $cocugusql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                        $cocuguresult = $baglanti->query($cocugusql);

                         while ($row = $cocuguresult->fetch_assoc()) {

                            echo "
                        <td>" . $row["GSM"] . "</td>
                        </tr>";
                        }

                        

                

                    while($row = $resulttorunu->fetch_assoc()) {

                        echo "<tr>
                            <td> Torunu </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>Worex Sorgu YouTube</td>
                            ";

                        $torunusql = "SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
                        $torunuresult = $baglanti->query($torunusql);

                         while ($row = $torunuresult->fetch_assoc()) {

                        echo "
                        <td>" . $row["GSM"] . "</td>
                        </tr>";
                        

                    }

                    }

                   
                }
            }

               
    
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