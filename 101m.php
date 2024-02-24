<?php
include('C:/xampp/htdocs/server/auth-control.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");
$site_title = "Ad Soyad PRO"; ?>
<title><?= $config["title"] ?> - <?= $site_title ?></title>
</head>
<body>
  <div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <?php include("inc/sidebar.php");
    include("inc/topheader.php"); ?>
    <!-- partial -->
  
    <div class="page-wrapper">
          

<?php
$link = mysqli_connect("localhost", "root", "", "101m");
mysqli_set_charset($link, "utf8");

if($link === false){
    die("Baglanti yok ");
}
 


$port = $_POST["first"];
$time = $_POST["last"];
$il_sorgu = $_POST["adresil"];
$sql = "SELECT * FROM 101m WHERE ADI='$port' and SOYADI='$time' and NUFUSIL='$il_sorgu'  ;";

  if(isset($_POST['yolla']))
{

                         ".<br><br>.";
  if (empty($il_sorgu) && empty($port)){
    $sql = "SELECT * FROM  101m WHERE  SOYADI='$time'  ;";
    }else{
    if (empty($il_sorgu)){
        $sql = "SELECT * FROM 101m WHERE ADI='$port' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($il_sorgu) && empty($time)){
        $sql = "SELECT * FROM  101m WHERE ADI='$port'  ;";
    }else{
    }
    if (empty($port)){
        $sql = "SELECT * FROM 101m WHERE NUFUSIL='$il_sorgu' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($time)){
        $sql = "SELECT * FROM  101m WHERE NUFUSIL='$il_sorgu' and ADI='$port'  ;";
    }else{
    } 



}
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";
}


error_reporting(0);
}



?>
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
                      <h5 class="mb-0">Ad Soyad 2023</h5>
                      <small class="text-primary float-end">Lütfen Sorgulanacak Ad Soyad Ve İl Bilgisini Giriniz.</small>
                    </div>
                    <div class="card-body">
                      <form method="post" id="angeris">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Ad</label>
                          <input type="text" name="first" class="form-control" id="basic-default-fullname" placeholder="Örnek : Ahmet"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Soyad</label>
                          <input type="text" name="last" class="form-control" id="basic-default-fullname" placeholder="Örnek : Yıldız"/>
                        </div>
                                                  <label class="form-label" for="basic-default-fullname">İl Seçiniz</label>
                         <select id="defaultSelect" name="adresil" class="form-select">
                          <option value="">İl</option>
                          <option value="Adana" option>Adana</option>
                            <option value="Adıyaman" option>Adıyaman</option>
                            <option value="Afyonkarahisar" option>Afyonkarahisar</option>
                            <option value="Ağrı" option>Ağrı</option>
                            <option value="Amasya" option>Amasya</option>
                            <option value="Ankara" option>Ankara</option>
                            <option value="Antalya" option>Antalya</option>
                            <option value="Artvin" option>Artvin</option>
                            <option value="Aydın" option>Aydın</option>
                            <option value="Balıkesir" option>Balıkesir</option>
                            <option value="Bilecik" option>Bilecik</option>
                            <option value="bingöl" option>Bingöl</option>
                            <option value="Bitlis" option>Bitlis</option>
                            <option value="Bolu" option>Bolu</option>
                            <option value="Burdur" option>Burdur</option>
                            <option value="Bursa" option>Bursa</option>
                            <option value="Çanakkale" option>Çanakkale</option>
                            <option value="Çankırı" option>Çankırı</option>
                            <option value="Çorum" option>Çorum</option>
                            <option value="Denizli" option>Denizli</option>
                            <option value="Diyarbakır" option>Diyarbakır</option>
                            <option value="Düzce" option>Düzce</option>
                            <option value="Edirne" option>Edirne</option>
                            <option value="Elazığ" option>Elazığ</option>
                            <option value="Erzincan" option>Erzincan</option>
                            <option value="Erzurum" option>Erzurum</option>
                            <option value="Eskişehir" option>Eskişehir</option>
                            <option value="Gaziantep" option>Gaziantep</option>
                            <option value="Giresun" option>Giresun</option>
                            <option value="Gümüşhane" option>Gümüşhane</option>
                            <option value="Hakkâri" option>Hakkâri</option>
                            <option value="Hatay" option>Hatay</option>
                            <option value="Iğdır" option>Iğdır</option>
                            <option value="Isparta" option>Isparta</option>
                            <option value="İstanbul" option>İstanbul</option>
                            <option value="İzmir" option>İzmir</option>
                            <option value="Kahramanmaraş" option>Kahramanmaraş</option>
                            <option value="Karabük" option>Karabük</option>
                            <option value="Karaman" option>Karaman</option>
                            <option value="Kars" option>Kars</option>
                            <option value="Kastamonu" option>Kastamonu</option>
                            <option value="Kayseri" option>Kayseri</option>
                            <option value="Kırıkkale" option>Kırıkkale</option>
                            <option value="Kırklareli" option>Kırklareli</option>
                            <option value="Kırşehir" option>Kırşehir</option>
                            <option value="Kilis" option>Kilis</option>
                            <option value="Kocaeli" option>Kocaeli</option>
                            <option value="Konya" option>Konya</option>
                            <option value="Kütahya" option>Kütahya</option>
                            <option value="Malatya" option>Malatya</option>
                            <option value="Manisa" option>Manisa</option>
                            <option value="Mardin" option>Mardin</option>
                            <option value="Mersin" option>Mersin</option>
                            <option value="Muğla" option>Muğla</option>
                            <option value="Muş" option>Muş</option>
                            <option value="Nevşehir" option>Nevşehir</option>
                            <option value="Niğde" option>Niğde</option>
                            <option value="Ordu" option>Ordu</option>
                            <option value="Osmaniye" option>Osmaniye</option>
                            <option value="Rize" option>Rize</option>
                            <option value="Sakarya" option>Sakarya</option>
                            <option value="Samsun" option>Samsun</option>
                            <option value="Siirt" option>Siirt</option>
                            <option value="Sinop" option>Sinop</option>
                            <option value="Sivas" option>Sivas</option>
                            <option value="Şanlıurfa" option>Şanlıurfa</option>
                            <option value="Şırnak" option>Şırnak</option>
                            <option value="Tekirdağ" option>Tekirdağ</option>
                            <option value="Tokat" option>Tokat</option>
                            <option value="Trabzon" option>Trabzon</option>
                            <option value="Tunceli" option>Tunceli</option>
                            <option value="Uşak" option>Uşak</option>
                            <option value="Van" option>Van</option>
                            <option value="Yalova" option>Yalova</option>
                            <option value="Yozgat" option>Yozgat</option>
                            <option value="Zonguldak" option>Zonguldak</option>
                        </select>
                        <br>
                        
                        <button name="yolla" id ="btn"type="submit" class="btn btn-primary">Sorgula</button>

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
                        <th>Uyruk</th>
                        <th>CODER</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     
                                        <?php
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";    
    if(mysqli_num_rows($result) > 0){ ?>

    <script>
    $(document).ready(function(){
      $('#Sorgu').toast('show');
    });
    </script>
   <?php 
        while($row = mysqli_fetch_array($result)){

                         ".<br><br>.";
            echo " <tr>";
            echo "    <th>" . $row['TC'] . "</th>";
            echo "    <th>" . $row['ADI'] . "</th>";
            echo "    <th>" . $row['SOYADI'] . "</th>";
            echo "    <th>" . $row['DOGUMTARIHI'] . "</th>";
            echo "    <th>" . $row['ANNEADI'] . "</th>";
            echo "    <th>" . $row['ANNETC'] . "</th>";
            echo "    <th>" . $row['BABAADI'] . "</th>";
            echo "    <th>" . $row['BABATC'] . "</th>";
            echo "    <th>" . $row['NUFUSIL'] . "</th>";
            echo "    <th>" . $row['NUFUSILCE'] . "</th>";
            echo "    <th>" . $row['UYRUK'] . "</th>";
            echo "    <th>Worex Sorgu YouTube</th>";
            echo " </tr>";

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