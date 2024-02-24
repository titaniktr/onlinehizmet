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
          
      <!-- partial:partials/_navbar.html -->
      
      <!-- partial --><div class="main-content">


<div class="main-content">

                <div class="page-content">

                  <div class="container-fluid">



            <div class="container-xxl flex-grow-1 container-p-y">

               <div class="row">

                <div class="col-xl">

                  <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between align-items-center">

                      <h5 class="mb-0">Sicil Sorgu Premium</h5>

                      <small class="text-primary float-end">Lütfen Sorgulanacak Kişinin Tc Bilgisini Giriniz.</small>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                          <label class="form-label" for="basic-default-fullname">Tc No</label>

                          <input type="text" class="form-control" name="tcno"  id="basic-default-fullname" placeholder="00000000000"/ required>

                        </div>

                      

                       <button id="btnAngeris" type="submit" class="btn btn-primary">Sorgula</button>

                       <br><br>

                          <div class="table-responsive">

                          <table id="example" class="table table-striped table-bordered text-nowrap w-100">



                                  <br><br>

                    <thead>

                      <tr>

                        <th>Kimlik No</th>

                        <th>Ad</th>

                        <th>Soyad</th>

                        <th>Emniyet Kayıtlı Olduğu İl</th>

                        <th>Sicil Durumu</th>

                      </tr>

                    </thead>

                        <tbody id="angerisapi">

                  

                    </tbody>

                  </table>

                  </div>

                </div>

               </div>

             </div>

           </div>

          </div>

        </div>

       </div>

      </div>

     </div>

    </div>

</div>

<script type="text/javascript">

    

    $("#btnAngeris").click(function(){

        var tc = $("[name=tcno]").val();

        $("#angerisapi").html(

            ''

        );



        if (tc == "") {



            Swal.fire ({

                icon : "error",

                title : "Oopss...",

                text : "Tc Boş Bırakılmaz",

                footer: '<a href="https://t.me/decartonline">t.me/decartonline</a>',

                showConfirmButton: false,

                timer: 1500

            })

            

        }else{



            Swal.fire ({

            imageUrl: 'https://thumbs.gfycat.com/MetallicSmugDavidstiger-max-1mb.gif',

            imageHeight: 100,

            title : 'Sorgu Çözümü Başladı !',

            text : 'Sorgulanıyor...',

            footer: '<a href="https://t.me/decartonline">t.me/decartonline</a>',

            showConfirmButton: false,

            })



            $.ajax({



            type : 'POST',

            url : 'api/maliye/api.php',

            data : {tc},



            success : function(data){

                swal.close();

             var json = data;

             

           

             $("#angerisapi").html(data);



             if (json == false) {



              Swal.fire ({

                icon : "error",

                title : "Oopss...",

                text : "Sorguladığınız Tc Numarasına Ait Bir Bilgi Bulunamadı.",

                footer: '<a href="https://t.me/decartonline">t.me/decartonline</a>',

            })

            return;

              

             }





             }





          });



        }



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