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

<body class="skin-dark">

    <div class="main-wrapper">


        <!-- Content Body Start -->
        <div class="content-body">
            <div class="box-head">
                <h3 class="title">Vesika Sorgu</h3>
            </div>
            <div class="row">
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-body">
                            <div class="row mbn-20">

                                <!--Form Field-->
                                <div class="col-lg-12 col-12 mb-20">
                                    <div class="row mbn-15">
                                        <div class="col-12">
                                            <div class="col mb-15">
                                                <label for="tcno" style="color:#fff;">T.C. Kimlik Numarası</label>
                                                <input type="text" class="form-control" id="tcno" placeholder="___________" data-mask="99999999999">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-15" style="text-align:center;">
                                            <button class="button button-info" id="search"><span>Sorgula</span></button>
                                        </div>
                                    </div>

                                </div>
                                <!--Form Field-->
                        <style>
                            table *{text-align:center;}
                        </style>
                                <div class="col-lg-12 col-12 mb-20">
                                    <div class="row mbn-15">
                                        <img id="vesika-seo"style="width:200px;margin:auto;margin-bottom:10px;border-radius:10px;height:250px;"src="assets/images/user.jpg" alt="">
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>T.C.</th>
                                                <th>AD</th>
                                                <th>SOYAD</th>
                                                <th>DOĞUM TARİHİ</th>
                                                <th>İL</th>
                                                <th>İLÇE</th>
                                                <th>OKUL NO</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sonuc">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Content Body End -->
        <?php include("inc/footer.php");?>


    </div>

    <!-- JS
============================================ -->

    <script>
    $("#search").click(function() {

        $.Toast.showToast({
            "title": "Sorgulanıyor...",
            "icon": "loading",
            "duration": 60000
        });
        $.ajax({
            type: 'POST',
            url: 'api/vesika.php',
            data: {
                'tcno': $('#tcno').val()
            },
            error: function(donen_hata_degeri) {
                return swal({
                    title: "Sistem Hatası",
                    icon: "error"

                });
            },
            success: function(data) {
                
                console.log(data);
                $.Toast.hideToast();
                if (data == "empty") {

                    return swal({
                        title: "T.C. giriniz",
                        icon: "warning"

                    });
                }else if (data == "hata") {

                    return swal({
                        title: "çıkmıyorsa zorlama",
                        icon: "warning"

                    });
                } else if (data == "cooldown") {

                    return swal({
                        title: "Biraz Yavaş AMINA GOYİM",
                        icon: "warning"
                
                });
                } else {
                var json = JSON.parse(data);
                    $("#sonuc").html(json.message);
                    $("#vesika-seo").attr("src", "data:image/jpeg;base64," + json.vesika);
                }


            }
        });
    });
    </script>
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