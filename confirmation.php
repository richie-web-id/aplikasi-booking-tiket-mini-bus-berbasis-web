<?php 
include ("./config/connection.php"); include ("function/library_currency.php");?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="author" content="">
		<title></title>
	


		<!-- shortcut icon EXT. PNG-->
	<link rel="shortcut icon" href="">
	<!-- bootstrap -->
	<link href="css/bootstrap.min2.css" rel="stylesheet">
	<!-- flatpickr -->
	<link href="css/flatpickr.min.css" rel="stylesheet">
	<!-- slimselect -->
	<link href="css/slimselect.min.css" rel="stylesheet">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- custom -->
	<link href="css/mystyle.css" rel="stylesheet">
	<!-- another styling -->
		<style type="text/css">
		.fokom9 {
			font-size: 0.9rem;
		}

		.btn-copy {
            border: 1px solid grey;
            color: grey;
            font-size: 13px;
        }

        .dropdown:hover .dropdown-menu {
            /*display: block;*/
        }

        .dropdown-item {
            font-size: .9rem !important;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background: rgb(255 231 231)!important;
            color: #d84851 !important;
            cursor: pointer;
        }

        .ddaccount {
            background: rgb(255 231 231);
            color: #d84851 !important;
            border-radius: .2rem;
        }
	</style>
</head>
<body>
	
<?php
	
// get the posted data
$id_rute = $_POST['id_rute'];
$userid = $_POST['userid'];
$bayar = $_POST['bayar'];
$tgl = $_POST['tgl'];

$kd_item = $_POST['kd_item'];



if (isset($_POST['btn_simpan'])){
// Success

//CODE ACAK UNIQUE AUTOMATIC
$RandomNumber = mt_rand(1000000000,9999999999);

$sql = "INSERT INTO orderan (id_o, rute_id, iduser, bayar, date, kode_book, metode_bayar) VALUES ('', '".$id_rute."', '".$userid."', '".$bayar."', '".$tgl."', '".$RandomNumber."', '".$kd_item."')";
$simpan = mysqli_query($koneksi, $sql);


?>

	<!-- CONTENT -->
	<div class="container-fluid px-0" style="min-height: 80vh">
			<!-- selesai -->
	<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 ml-auto mr-auto">
					<h5 class="color-primary2-text mb-0"><i class="fas fa-check-circle pr-2 pb-3" aria-hidden="true"></i>Transaksi Sukses !</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 ml-auto mr-auto">
					<div class="card radius1 border-0 shadow-lg text-muted px-2">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 pt-2">
									<p class="mb-0">Kode Booking</p>
									<h3 class="color-primary2-text"><?php echo $RandomNumber;?></h3>
									
<?php } ?>                  
										                                	                                    	                                	                                									<p class="mb-0 mt-4">Tanggal Booking</p>
									<h3 class="color-primary2-text"><?php echo $tgl;?></h3>
								</div>
								<div class="col-md-6 pt-2">
									<p class="mb-0"></p>
									<h3 class="color-primary2-text"></h3>
									
									<p class="mb-0 mt-4">Total Bayar</p>
									<h3 class="color-primary2-text"><?php echo rupiah($bayar);?></h3>
								</div>
								<!-- <div class="col-lg-12">
									<div class="card border">
										<div class="card-body">
											<p class="mb-0 text-justify" style="font-size: 0.8em">
												Pastikan juga untuk memeriksa email anda, karena kami juga mengirimkan kode pembayaran dan tiket elektronik anda ke email anda.
											</p>
										</div>
									</div>
								</div> -->
                                <!-- cara bayar -->
                                                                  <div class="col-12 pt-2">
                                    <div class="card card-body border">

<?php
	$qq = mysqli_query($koneksi,"SELECT * FROM method WHERE id_method='$kd_item'");
	$dd = mysqli_fetch_array($qq);
?>

                                      <p class="color-primary2-text text-uppercase font-weight-bold">Cara Pembayaran Via <?php echo $dd['kode_method'];?> - <?php echo $dd['nama_method'];?></p>
                                                                            <ol class="px-3 fs-14 mb-0">
                                                                                <li>
                                          <p class="mb-0 fs-14">Pembayaran dapat dilakukan di Seluruh Indonesia.</p>
                                        </li>
                                                                                <li>
                                          <p class="mb-0 fs-14">Anda akan mendapatkan Kode Pembayaran.</p>
                                        </li>
                                                                                <li>
                                          <p class="mb-0 fs-14">Catat Kode Pembayaran yang tertera.</p>
                                        </li>
                                             
                                                                                                                                                                    </ol>
                                                                          </div>
                                  </div>
                                                                    <!-- cara bayar -->
                                  <div class="col-lg-12 mt-3">
                                    <div class="card-body border">
                                        <p class="mb-0 text-justify fs-14">
                                            Untuk tiket tidak hangus, Anda bisa selesaikan pembayaran melalui Aplikasi ataupun Ke Loket.
                                            <br><br>
                                            Melalui Aplikasi: Login terlebih dahulu menggunakan mobile banking Anda.
                                            <br><br>
                                            Melalui Loket: Datang langsung  ke Loket Kami dan selesaikan pembayaran sesuai nominal.
                                        </p>
                                    </div>
                                </div>
								<div class="col-lg-8 mt-auto pt-3">
									<p class="mb-0">Terimakasih Telah Menggunakan Mini Bus Travel.</p>
								</div>
								<div class="col-lg-4 pt-3">
									<p class="mb-0">
										<a href="#" class="btn btn-radius btn-block color-primary2">Detail Tiket<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ./selesai -->
	</div>
	<!-- ./CONTENT -->


    <div class="modal fade" id="modal-load" data-keyboard="false" tabindex="-1" aria-labelledby="modal-load-label" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="spinner-border m-auto text-light" role="status" style="width: 60px; height:60px;">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

<script>
    function showLoadPage(){
        $('#modal-load').modal({
            show: true
        })
    }
</script>

    
    <div class="modal fade dark-backdrop" id="logoutModal"  tabindex="-1" role="dialog" aria-labelledby="logoutModal">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="pb-0 mb-0">Yakin Ingin Keluar ?</p>
                </div>
                <div class="modal-footer border-0 mx-auto">
                    <button class="btn btn-danger f0kom9 px-4 py-1" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary f0kom9 px-4 py-1" onclick="logout()">Ya</button>
                </div>
            </div>
        </div>
    </div>

	<script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("scrollup").style.display = "block";
			} else {
				document.getElementById("scrollup").style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			$('html, body').animate({scrollTop:0}, '300');
		}
	</script>


	    
	<script type="text/javascript">
		function showLoadPage(){
			$('#modal-load').modal('show');
		}

        function hideLoadPage(){
            $('#modal-load').modal('hide')
        }
	</script>
	<!-- ./SCRIPTS -->

  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
        function history_goback() {
            window.history.go(-1);
        }
    </script>
</body>
</html>