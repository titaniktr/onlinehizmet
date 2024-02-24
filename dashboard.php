<?php
include('C:/xampp/htdocs/server/auth-control.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>
<title><?=$config["title"]?> - Dashboard</title>
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
          <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                <img src="<?=$config["logo_url"]?>" class="img-fluid radius-10" alt="Aybüke Tek Zaaf'ım" width="200" height="100">

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h2 class="card-title" style="color: #079bff;">HoşGeldin,  <span style="color: red;"><?=$name?></span></h2> 
                                        <p class="card-text" style="font-size:16px;">
                                          <b>Discord Adresimiz:</b> <a href="<?=$config["discord"]?>"><?=$config["discord"]?></a><br>
                                          <b>Youtube Adresim:</b> <a href="<?=$config["youtube"]?>"><?=$config["youtube"]?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
<?php
                        $sql="SELECT * FROM `agahyt-user`";
                        $sonuc= mysqli_query($conn,$sql);
                        $satirsay=mysqli_num_rows($sonuc);
                        $members=array(
                          'toplam_member'=>0,
                          'premium_member'=>0,
                          'vip_member'=>0,
                          'admin_member'=>0,
                          'kurucu_member'=>0,
                        );
                        while( $rows=mysqli_fetch_assoc($sonuc) ){
                          $members['toplam_member']++;
                          if($rows["member"]==1){
                            $members['premium_member']++;
                          }
                          if($rows["member"]==2){
                            $members['vip_member']++;
                          }
                          if($rows["member"]==3){
                            $members['admin_member']++;
                          }
                          if($rows["member"]==4){
                            $members['kurucu_member']++;
                          }
                        }
                      ?>
    <div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title">Toplam Kullanıcı</h6>
              <div class="dropdown">
                
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h4 class="mb-2"><?=$members['toplam_member']?></h4>
              </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                      <h6 class="card-title mb-0">Üyelik Tipi</h6>
                      <div class="dropdown mb-2">
                       
                      </div>
                    </div>
                    <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h4 class="mb-2"><?=$uyelik_turu?></h4>
              </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline  mb-2">
                      <h6 class="card-title mb-0">Kalan Gün</h6>
                      <div class="dropdown mb-2">
                       
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h4 class="mb-2"><?=$kalan_gun?></h4>
                       
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->
      
        <div class="row">
          <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                                    <h5 class="mb-0">Duyurular</h5>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table align-middle">
                                        <thead class="table-secondary">
										
                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                  <br><br>
                                            <tr>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Tarih</th>
                                                <th>Paylaşan</th>
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

       
        <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Kurallar</h6>
                  <div class="dropdown mb-2">
                  
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0"></th>
                    
                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                  <br><br>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Key Paylaşımı</td>
                        <td>Multi Kullanımdan Ban Yiyebilirsiniz.</td>

                        
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sorgu</td>
                        <td>Ünlü / devlet yetkilisi ve küçük kız çocuklarına sorgu atmak yasaktır. </td>

                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Satış Yerimiz</td>
                        <td>https://discord.gg/qfyZqkeHZa</td>

                      </tr>
                      
                     
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Editör  <a href="https://www.youtube.com/channel/UCRpsnYpX4tALSebUDrX0eNw" target="_blank">W O R E X</a></p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">A Y B Ü K E<i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
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