<?php
include('C:/xampp/htdocs/server/auth-control.php');
if($member!=4):
  header("Location:/dashboard");
  exit;
endif;
if(isset($_GET["id"])):
  $sql="DELETE FROM `agahyt-duyuru` WHERE `id` = \"".$_GET["id"]."\"";
$sonuc=mysqli_query($conn,$sql);
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>
<title><?=$config["title"]?> - Admin Duyuru</title>
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
                                <form action="" method="POST" style="text-align:center;">
                                    <div class="col-3" style="display:inline-block;">
                                        <label class="form-label">Başlık Seçin:</label>
                                        <select class="form-select mb-3" name="baslik" aria-label="Başlık Seçiniz"
                                            required>
                                            <option selected="" value="none" disabled>Başlık Seçiniz</option>
                                            <option value="duyuru">Duyuru</option>
                                            <option value="guncelleme">Güncelleme</option>
                                        </select>
                                    </div>
                                    <div class="col-5" style="display:inline-block;">
                                        <label class="form-label">Duyuru Metni:</label>
                                        <input type="text" name="metin" class="form-control" required>
                                    </div>
                                    <div class="col-3" style="display:inline-block;">
                                        <button style="display:inline-block;width:100%" type="submit"
                                            class="btn btn-success">EKLE</button>
                                    </div>
                                </form>
                                <?php 
                                    if(isset($_POST["baslik"])): 
                                        if($_POST["baslik"]!="none"){
                                            extract($_POST);
	                                        $sqlekle="INSERT INTO `agahyt-duyuru` (`baslik`, `aciklama`, `user_id`) VALUES (\"$baslik\", \"$metin\", \"$id\")";
	                                        $sonuc=mysqli_query($conn,$sqlekle);

	                                        if ($sonuc>0){
                                                echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-success" style="margin:0px;">Duyuru Başarıyla Eklendi</p>
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

                                ?>
                                <?php endif;?>
                                <?php if(isset($_GET["id"])): if($sonuc>0):?>
                                <div class="col-12" style="text-align:center;">
                                    <p class="btn btn-success" style="margin:0px;">ID: <?=$_GET["id"]?>, Başarıyla
                                        Silindi</p>
                                </div>
                                <?php endif;endif;?>
                                <div class="table-responsive mt-3">
                                    <table class="table align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Tarih</th>
                                                <th>Paylaşan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql="SELECT * FROM `agahyt-duyuru` ORDER BY `tarih` DESC";
                                            $sonuc= mysqli_query($conn,$sql);
                                            $satirsay=mysqli_num_rows($sonuc);
                                            $duyuru=array();
                                            if($satirsay>0){
                                              while( $rows=mysqli_fetch_assoc($sonuc) ){
                                                if($rows["baslik"]=="duyuru"){
                                                  $rows["baslik"]='<span class="badge bg-danger">Duyuru</span>';
                                                }else if($rows["baslik"]=="guncelleme"){
                                                  $rows["baslik"]='<span class="badge bg-primary">Güncelleme</span>';
                                                }
                                                array_push($duyuru,$rows);
                                              }
                                              foreach($duyuru as $rows){
                                                $id=$rows["user_id"];
                                                $sql="SELECT * FROM `agahyt-user` WHERE id = $id";
                                                $sonuc= mysqli_query($conn,$sql);
                                                $satirsay=mysqli_num_rows($sonuc);
                                                if($satirsay>0){
                                                  while( $row=mysqli_fetch_assoc($sonuc) ){
                                                    $rows["user_id"]=$row["name"];
                                                  }
                                                }else{
                                                  $rows["user_id"]="none";
                                                }
                                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $rows["tarih"]);

$turkish_date_str = $date->format('d F Y H:i');
$rows["tarih"] = str_replace(
    array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
    array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'),
    $turkish_date_str
);
                                                echo "
                                                <tr>
                                                  <td>".$rows["baslik"]."</td>
                                                  <td>".$rows["aciklama"]."</td>
                                                  <td>".$rows["tarih"]."</td>
                                                  <td>".$rows["user_id"]."</td>
                                                  <td>
                                                  <a href='admin-duyuru-duzenle?id=".$rows["id"]."' class=\"badge bg-info\"><i  style='font-size:16px;color:#fff;' class=\"fadeIn animated bx bx-pencil\"></i></a>
                                                  <a href='admin-duyuru?id=".$rows["id"]."' class=\"badge bg-danger\"><i  style='font-size:16px;color:#fff;' class=\"fadeIn animated bx bx-trash-alt\"></i></a>
                                                  </td>
                                                  
                                                </tr>
                                                ";
                                              }
                                            }else{
                                              echo "<tr><td colspan='4'>Duyuru Bulunmamaktadır.</td></tr>";
                                            }
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
               

			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © Rohhemxroot <a href="https://t.me/rohhem" target="_blank">Rohhem</a></p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
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