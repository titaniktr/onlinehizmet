<?php
include('C:/xampp/htdocs/server/auth-control.php');
if($member!=4):
  header("Location:/dashboard");
  exit;
endif;
if(isset($_GET["id"])){
  
  $sql="SELECT * FROM `agahyt-duyuru` WHERE `id` LIKE \"".$_GET["id"]."\" ";

  $sonuc= mysqli_query($conn,$sql);
  $satirsay=mysqli_num_rows($sonuc);

  if ($satirsay>0)
  {
      while( $rows=mysqli_fetch_assoc($sonuc) ){
        extract($rows);
      }
  }else{
      header("Location:/admin-duyuru");
      exit;
  }
}else{
  header("Location:/admin-duyuru");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>
<title><?=$config["title"]?> - Admin Duyuru Düzenle</title>
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
    <?php include("inc/sidebar.php");include("inc/topheader.php");?>
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			
			<!-- partial -->

			<div class="page-content">

      
      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3">
                </div>


                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-5">Duyurular</h5>
                                </div>
                                <?php 
                                    if(isset($_POST["baslik"])): 
                                        if($_POST["baslik"]!="none"){
                                            extract($_POST);
                                            $id=$_GET["id"];
                                            $aciklama=$metin;
                                            $sql="UPDATE `agahyt-duyuru` SET `baslik` = \"$baslik\", `aciklama` = \"$metin\" WHERE `id` = \"$id\"";
                                            $sonuc=mysqli_query($conn,$sql);
	                                        if ($sonuc>0){
                                                echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-success" style="margin:0px;">Güncellendi</p>
                                                </div><br>';
	                                        }else{
                                            echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-danger" style="margin:0px;">HATA</p>
                                                </div>';
	                                        }
                                        }else{
                                            echo '
                                            <div class="col-12" style="text-align:center;">
                                                <p class="btn btn-danger" style="margin:0px;">Başlık Seçin</p>
                                            </div>';
                                        }
                                    endif;?>
                                <form action="" method="POST" style="text-align:center;">
                                    <div class="col-3" style="display:inline-block;">
                                        <label class="form-label">Başlık Seçin:</label>
                                        <select class="form-select mb-3" name="baslik" aria-label="Başlık Seçiniz"
                                            required>
                                            <option <?php if($baslik=="duyuru"){echo "selected";}?> value="duyuru">Duyuru</option>
                                            <option <?php if($baslik=="guncelleme"){echo "selected";}?> value="guncelleme">Güncelleme</option>
                                        </select>
                                    </div>
                                    <div class="col-5" style="display:inline-block;">
                                        <label class="form-label">Duyuru Metni:</label>
                                        <input type="text" name="metin" class="form-control" value="<?=$aciklama?>" required>
                                    </div>
                                    <div class="col-3" style="display:inline-block;">
                                        <button style="display:inline-block;width:100%" type="submit"
                                            class="btn btn-primary">DÜZENLE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
               

			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Youtube : <a href="https://www.youtube.com/channel/UCRpsnYpX4tALSebUDrX0eNw" target="_blank">Agah</a></p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Quatrox<i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->
		
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
	<!-- end custom js for this page -->
</body>
</html>    