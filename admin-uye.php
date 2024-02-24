<?php
include('C:/xampp/htdocs/server/auth-control.php');
if($member==0||$member==1||$member==2):
  header("Location:/dashboard");
  exit;
endif;

if(isset($_GET["id"])&&isset($_GET["name"])):
  if($member==4){
      $sql="DELETE FROM `agahyt-user` WHERE `id` = \"".$_GET["id"]."\"";
      $sonuc=mysqli_query($conn,$sql);
  }else{
      if($_GET["rid"]==$id){
          $sql="DELETE FROM `agahyt-user` WHERE `id` = \"".$_GET["id"]."\"";
          $sonuc=mysqli_query($conn,$sql);
      }
  }
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>
<title><?=$config["title"]?> - Admin Üye</title>
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
                                    <h5 class="mb-5">Üyeler</h5>
                                </div>
                                <form action="" method="POST" style="text-align:center;">
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Üyelik Türü Seçiniz</label>
                                        <select class="form-select mb-3" name="member" aria-label="Üyelik Türü Seçiniz"
                                            required>
                                            <option selected=""  value="1">PREMİUM</option>
                                            <option value="2">VİP</option>
                                            <?php if($member==4):?>
                                            <option value="3">ADMİN</option>
                                            <option value="4">KURUCU</option>
                                            <?php endif;?>
                                        </select>
                                    </div>
									
									<label class="form-label">⠀</label>
									
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Üyelik İsmi</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
									
																		<label class="form-label">⠀</label>
									
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Kaç Gün (Sınırsız: -1)</label>
                                        <input type="number" name="gun" class="form-control" required>
                                    </div>
									
																		<label class="form-label">⠀</label>
									
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Multi Giriş İzni</label>
                                        <select class="form-select mb-3" name="multi" aria-label="Multi Access"
                                            required>
                                            <option value="1">AÇIK</option>
                                            <option  selected="" value="0">KAPALI</option>
                                        </select>
                                    </div>
									
																		<label class="form-label">⠀</label>
																		
                                    <div class="col" style="display:inline-block;">
                                        <button style="display:inline-block;width:100%" type="submit"
                                            class="btn btn-success">EKLE</button>
                                    </div>
                                </form>
                                
                                <?php 
                                    if(isset($_POST["member"])): 
                                        if($_POST["member"]!="none"){
                                            if($member==3){
                                                if($_POST["member"]==3||$_POST["member"]==4){
                                                    header("Location:/admin-uye");
                                                    exit;
                                                }
                                            }
                                            function generatePassword() {
                                                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                                $password = '';
                                                for ($i = 0; $i < 25; $i++) {
                                                  $password .= $chars[rand(0, strlen($chars) - 1)];
                                                }
                                                global $conn;
                                                $sql="SELECT * FROM `agahyt-user` WHERE `key` LIKE \"$password\" ";
                                                                
                                                $sonuc= mysqli_query($conn,$sql);
                                                $satirsay=mysqli_num_rows($sonuc);
                                                
                                                if ($satirsay>0){
                                                    generatePassword();
                                                }
                                                else{
                                                    return $password;
                                                }
                                              }
                                              $key=generatePassword();
                                            extract($_POST);
                                            if($gun!=-1){
                                              $gun=strtotime('+'.$gun.' days');
                                            }
	                                        $sqlekle="INSERT INTO `agahyt-user` (`name`, `key`, `member`, `end`, `multi_access`, `user_id`) VALUES (\"$name\", \"$key\", \"$member\", \"$gun\", \"$multi\", \"$id\")";
	                                        $sonuc=mysqli_query($conn,$sqlekle);

	                                        if ($sonuc>0){
                                                echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-success" style="user-select: auto;margin:0px;">Başarıyla Oluşturuldu<br><b>Site:</b>'.$config["domain"].'<br><b>Key:</b>'.$key.'</p>
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
                                                <p class="btn btn-danger" style="margin:0px;">Üyelik Türü Seçin</p>
                                            </div>';
                                        }
                                    endif;

                                ?>
                                <?php if(isset($_GET["id"])&&isset($_GET["name"])&&!isset($_POST["member"])): if($sonuc>0):?>
                                <div class="col-12" style="text-align:center;">
                                    <p class="btn btn-success" style="margin:0px;">ID: <?=$_GET["name"]?>, Başarıyla
                                        Silindi</p>
                                </div>
                                <?php endif;endif;?>
                                <div class="table-responsive mt-3">
                                    <table class="table align-middle" style="text-align:center;">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Name</th>
                                                <th>Key</th>
                                                <th>Üyelik Tür</th>
                                                <th>Eklenen Gün</th>
                                                <th>Kalan Gün</th>
                                                <th>Ekleyen</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if($member==4){
                                                    
                                                    $sql="SELECT * FROM `agahyt-user`";

                                                    $sonuc= mysqli_query($conn,$sql);
                                                    $satirsay=mysqli_num_rows($sonuc);
                                                    while( $rows=mysqli_fetch_assoc($sonuc) ){
                                                        
                                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $rows["start"]);

                                                        $turkish_date_str = $date->format('d F Y H:i');
                                                        $rows["start"] = str_replace(
                                                            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                                                            array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'),
                                                            $turkish_date_str
                                                        );
                                                        if($rows["member"]==3||$rows["member"]==4){
                                                            $rows["end"]="Sınırsız";
                                                        }elseif ($rows["end"] ==-1) {
                                                            $rows["end"]="Sınırsız";
                                                        }elseif ($rows["end"] <= $current_date) {
                                                            $rows["end"]="Sonlandırıldı.";
                                                        }else{
                                                            
                                                        $diff_seconds = abs($current_date - $rows["end"]);
                                                        $rows["end"] = floor($diff_seconds / 86400)." GÜN";
                                                        }
                                                        if($rows["member"]==4){
                                                            $rows["member"]="<span class='badge bg-secondary'>KURUCU</span>";
                                                        }elseif($rows["member"]==3){
                                                            $rows["member"]="<span class='badge bg-info'>ADMİN</span>";
                                                        }elseif($rows["member"]==2){
                                                            $rows["member"]="<span class='badge bg-primary'>VİP</span>";
                                                        }elseif($rows["member"]==1){
                                                            $rows["member"]="<span class='badge bg-warning'>PREMİUM</span>";
                                                        }elseif($rows["member"]==0){
                                                            $rows["member"]="<span class='badge bg-danger'>YASAKLI</span>";
                                                        }
                                                        
                                                        $sqla="SELECT * FROM `agahyt-user` WHERE id=".$rows["user_id"];

                                                        $sonuca= mysqli_query($conn,$sqla);
                                                        while( $rowsa=mysqli_fetch_assoc($sonuca) ){
                                                            $rows["user_id"]=$rowsa["name"];
                                                        }
                                                      echo '
                                                      <tr>
                                                        <td>'.$rows["name"].'</td>
                                                        <td>'.$rows["key"].'</td>
                                                        <td>'.$rows["member"].'</td>
                                                        <td>'.$rows["start"].'</td>
                                                        <td>'.$rows["end"].'</td>
                                                        <td>'.$rows["user_id"].'</td>
                                                        <td>
                                                        
                                                  <a href="admin-uye-duzenle?id='.$rows["id"].'" class="badge bg-info"><i  style="font-size:16px;color:#fff;" class="fadeIn animated bx bx-pencil"></i></a>
                                                  <a href="admin-uye?id='.$rows["id"].'&name='.$rows["name"].'" class="badge bg-danger"><i  style="font-size:16px;color:#fff;" class="fadeIn animated bx bx-trash-alt"></i></a>
                                                  
                                                        </td>
                                                      </tr>
                                                      ';
                                                    }
                                                }else{
                                                    
                                                    $sql="SELECT * FROM `agahyt-user` WHERE `user_id`=".$id;

                                                    $sonuc= mysqli_query($conn,$sql);
                                                    $satirsay=mysqli_num_rows($sonuc);
                                                    while( $rows=mysqli_fetch_assoc($sonuc) ){
                                                        
                                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $rows["start"]);

                                                        $turkish_date_str = $date->format('d F Y H:i');
                                                        $rows["start"] = str_replace(
                                                            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
                                                            array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'),
                                                            $turkish_date_str
                                                        );
                                                        if($rows["member"]==3||$rows["member"]==4){
                                                            $rows["end"]="Sınırsız";
                                                        }elseif ($rows["end"] ==-1) {
                                                            $rows["end"]="Sınırsız";
                                                        }elseif ($rows["end"] <= $current_date) {
                                                            $rows["end"]="Sonlandırıldı.";
                                                        }else{
                                                            
                                                        $diff_seconds = abs($current_date - $rows["end"]);
                                                        $rows["end"] = floor($diff_seconds / 86400)." GÜN";
                                                        }
                                                        if($rows["member"]==4){
                                                            $rows["member"]="<span class='badge bg-secondary'>KURUCU</span>";
                                                        }elseif($rows["member"]==3){
                                                            $rows["member"]="<span class='badge bg-info'>ADMİN</span>";
                                                        }elseif($rows["member"]==2){
                                                            $rows["member"]="<span class='badge bg-primary'>VİP</span>";
                                                        }elseif($rows["member"]==1){
                                                            $rows["member"]="<span class='badge bg-warning'>PREMİUM</span>";
                                                        }elseif($rows["member"]==0){
                                                            $rows["member"]="<span class='badge bg-danger'>YASAKLI</span>";
                                                        }
                                                        
                                                        $sqla="SELECT * FROM `agahyt-user` WHERE id=".$rows["user_id"];

                                                        $sonuca= mysqli_query($conn,$sqla);
                                                        while( $rowsa=mysqli_fetch_assoc($sonuca) ){
                                                            $rows["user_ida"]=$rowsa["name"];
                                                        }
                                                        if($rows["id"]!=$id){
                                                      echo '
                                                      <tr>
                                                        <td>'.$rows["name"].'</td>
                                                        <td>'.$rows["key"].'</td>
                                                        <td>'.$rows["member"].'</td>
                                                        <td>'.$rows["start"].'</td>
                                                        <td>'.$rows["end"].'</td>
                                                        <td>'.$rows["user_ida"].'</td>
                                                        <td>
                                                        
                                                  <a href="admin-uye-duzenle?id='.$rows["id"].'" class="badge bg-info"><i  style="font-size:16px;color:#fff;" class="fadeIn animated bx bx-pencil"></i></a>
                                                  <a href="admin-uye?id='.$rows["id"].'&name='.$rows["name"].'&rid='.$rows["user_id"].'" class="badge bg-danger"><i  style="font-size:16px;color:#fff;" class="fadeIn animated bx bx-trash-alt"></i></a>
                                                  
                                                        </td>
                                                      </tr>
                                                      ';
                                                    }
                                                }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- row -->

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