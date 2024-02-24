<?php
include('C:/xampp/htdocs/server/auth-control.php');
if($member==0||$member==1||$member==2):
    header("Location:/dashboard");
    exit;
endif;

if(isset($_GET["id"])){
    if(isset($_GET["multiban"])){
        $sqlekle="UPDATE `agahyt-user` SET `os` = \"\", `browser` = \"\", `browserdetails` = \"\" WHERE `id` = \"$id\"";
        $sonuc=mysqli_query($conn,$sqlekle);
    }
    $sql="SELECT * FROM `agahyt-user` WHERE `id` LIKE \"".$_GET["id"]."\" ";

    $sonuc= mysqli_query($conn,$sql);
    $satirsay=mysqli_num_rows($sonuc);

    if ($satirsay>0)
    {
        while( $rows=mysqli_fetch_assoc($sonuc) ){
            if($member!=4){
                
            if($rows["user_id"]!=$id){
                header("Location:/admin-uye");
                exit;

            }
            }
            $me_member=$member;
            $me_name=$name;
          extract($rows);
          $user_name=$name;
          $user_member=$member;
          $member=$me_member;
          $name=$me_name;
        }
        if($end!=-1){
      $diff_seconds = abs($current_date - $end);
      $kalan_gun = floor($diff_seconds / 86400);
    }
    }else{
        header("Location:/admin-uye");
        exit;
    }
}else{
    header("Location:/admin-uye");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>
<title><?=$config["title"]?> - Admin Üye Düzenle</title>
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
                                <?php 
                                    if(isset($_POST["member"])): 
                                        if(isset($_POST["update"])){
                                            if($_POST["member"]!="none"){
                                                if($me_member==3){
                                                    if($_POST["member"]==3||$_POST["member"]==4){
                                                        header("Location:/admin-uye");
                                                        exit;
                                                    }
                                                }
                                                extract($_POST);
                                                if($kalan_gun!=$gun){
                                                    $kalan_gun=$gun;
                                                    $gun=strtotime('+'.$gun.' days');
                                                }else{
                                                    $gun=$end;
                                                }
                                                $multi_access=$multi;
                                                $user_member=$member;
                                                $user_name=$name;
	                                            $sqlekle="UPDATE `agahyt-user` SET `name` = \"$name\", `member` = \"$member\", `end` = \"$gun\", `multi_access` = \"$multi\" WHERE `id` = \"$id\"";
	                                            $sonuc=mysqli_query($conn,$sqlekle);

	                                            if ($sonuc>0){
                                                    echo '
                                                    <div class="col-12" style="text-align:center;">
                                                        <p class="btn btn-success" style="user-select: auto;margin:0px;">Başarıyla Güncellendi</p>
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
                                            
                                        }else if (isset($_POST["multiban"])){
                                            $os="";
                                            $browser="";
                                            $browserdetails="";
                                            $sqlekle="UPDATE `agahyt-user` SET `os` = \"\", `browser` = \"\", `browserdetails` = \"\" WHERE `id` = \"$id\"";
                                            $sonuc=mysqli_query($conn,$sqlekle);
                                            if ($sonuc>0){
                                                echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-success" style="user-select: auto;margin:0px;">Başarıyla Multi Ban Kalktı</p>
                                                </div><br>';
                                            }else{
                                            echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-danger" style="margin:0px;">HATA</p>
                                                </div>';
                                            }
                                        }else if (isset($_POST["ban"])){
                                            if($user_member!=0){
                                                $user_member=0;
                                            }else{
                                                $user_member=1;
                                            }
                                            $sqlekle="UPDATE `agahyt-user` SET `member` = \"$user_member\" WHERE `id` = \"$id\"";
                                            $sonuc=mysqli_query($conn,$sqlekle);
                                            if ($sonuc>0){
                                                if($user_member==0){
                                                    echo '
                                                    <div class="col-12" style="text-align:center;">
                                                        <p class="btn btn-warning" style="user-select: auto;margin:0px;">Başarıyla Ban Atıldı</p>
                                                    </div><br>';
                                                }else{
                                                    echo '
                                                    <div class="col-12" style="text-align:center;">
                                                        <p class="btn btn-primary" style="user-select: auto;margin:0px;">Başarıyla Ban AÇILDI</p>
                                                    </div><br>';
                                                }
                                            }else{
                                            echo '
                                                <div class="col-12" style="text-align:center;">
                                                    <p class="btn btn-danger" style="margin:0px;">HATA</p>
                                                </div>';
                                            }
                                        }
                                    endif;

                                ?>
                                <form action="" method="POST" style="text-align:center;">
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Üyelik Türü Seçiniz</label>
                                        <select class="form-select mb-3" name="member" aria-label="Üyelik Türü Seçiniz"
                                            required>
                                            <option  <?php if($user_member==0){echo "selected";}?> value="0">YASAKLI</option>
                                            <option  <?php if($user_member==1){echo "selected";}?> value="1">PREMİUM</option>
                                            <option  <?php if($user_member==2){echo "selected";}?> value="2">VİP</option>
                                            <?php if($me_member==4):?>
                                            <option  <?php if($user_member==3){echo "selected";}?> value="3">ADMİN</option>
                                            <option  <?php if($user_member==4){echo "selected";}?> value="4">KURUCU</option>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Üyelik İsmi</label>
                                        <input type="text" name="name" class="form-control" value="<?=$user_name?>" required>
                                    </div>
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Kaç Gün (Sınırsız: -1)</label>
                                        <input type="number" name="gun" value="<?=$kalan_gun?>" class="form-control" required>
                                    </div>
                                    <div class="col" style="display:inline-block;">
                                        <label class="form-label">Multi Giriş İzni</label>
                                        <select class="form-select mb-3" name="multi" aria-label="Multi Access"
                                            required>
                                            <option <?php if($multi_access==1){echo "selected";}?>value="1">AÇIK</option>
                                            <option <?php if($multi_access==0){echo "selected";}?> value="0">KAPALI</option>
                                        </select>
                                    </div>
                                    <div class="col" style="display:inline-block;">
                                        <button style="display:inline-block;width:100%" type="submit"
                                            class="btn btn-primary" name="update">GÜNCELLE</button>
                                    </div>
                                    <div class="col" style="display:inline-block;">
                                        <button style="display:inline-block;width:100%" type="submit"
                                            class="btn btn-secondary" name="multiban">MULTİ BAN AÇ</button>
                                    </div>
                                    <?php
                                        
                                        if($user_member!=0){
                                            echo '
                                            <div class="col" style="display:inline-block;">
                                                <button style="display:inline-block;width:100%" type="submit"
                                                    class="btn btn-danger" name="ban">BAN AT</button>
                                            </div>';
                                        }else{
                                            echo '
                                            <div class="col" style="display:inline-block;">
                                                <button style="display:inline-block;width:100%" type="submit"
                                                    class="btn btn-warning" name="ban">BAN KALDIR</button>
                                            </div>';
                                        }
                                    ?>
                                </form>
                                <div class="table-responsive mt-3">
                                    <table class="table align-middle" style="text-align:center;">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>İşletim Sistemi</th>
                                                <th>Tarayıcı</th>
                                                <th>Tarayıcı Detay</th>
                                                <th>Key</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=$os?></td>
                                                <td><?=$browser?></td>
                                                <td><?=$browserdetails?></td>
                                                <td><?=$key?></td>
                                            </tr>
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