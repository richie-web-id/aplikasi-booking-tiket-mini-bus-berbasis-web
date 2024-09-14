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
     $id_rute=$_GET['id_rute'];
	 $userid=$_GET['userid'];


 $select = mysqli_query( $koneksi, "SELECT *,SUM(tarif_rute) AS total FROM seat WHERE userid='$userid'");

 $num_rows = mysqli_fetch_array($select);
 $liat = $num_rows['total'];

 

	?>

<form action="confirmation.php" method="POST">


							            <input type="hidden" name="id_rute" value="<?php echo $num_rows['id_rute'];?>">
					                  	<input type="hidden" name="userid" value="<?php echo $num_rows['userid'];?>">
										<input type="hidden" name="bayar" value="<?php echo $liat;?>">
										<input type="hidden" name="tgl" value="<?php echo $num_rows['date'];?>">

	<!-- metoda pembayaran -->
	<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="color-primary2-text"><span class="round-number mr-3">4</span>Pilih Metode Pembayaran</p>
					<div class="card radius1 shadow1 border-0">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="row mx-0 d-none" id="load-container-payment" style="height:170px;">
									<div  class="spinner-border text-info mx-auto my-auto" style="width: 50px; height:50px;" role="status">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
				
								<div id="container-payment" class="px-3 pt-3 pb-0">
									
								</div>
							<!-- syarat & ketentuan -->
							<div class="pt-3">
								<h6>SYARAT & KETENTUAN RESERVASI ONLINE MINI BUS</h6>	
								<div class="border">
									<div class="card-body scroll">
										Syarat dan Ketentuan<br>

<ol type="1">
			<li> Jangan lupa untuk memakai masker sebelum berangkat</li>
				<li>Dengan ini Anda menyatakan persetujuan terhadap Persyaratan dan Ketentuan Angkutan Penumpang Mini Bus termasuk tetapi tidak terbatas ketentuan reservasi.</li>

			</ol>



									</div>
								</div>
							</div>
							<!-- ./syarat & ketentuan -->

							


							<!-- harga -->
							<div class="col-lg-12">
								<div class="row mx-0 d-none" id="load-container-price" style="height:170px;">
									<div  class="spinner-border text-info mx-auto my-auto" style="width: 50px; height:50px;" role="status">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
								<table class="table mt-3" id="container-price">
									<tr>
										<td class="valign-center"><h6 class="px-2">Harga Tiket</h6></td>
										<td><p class="px-2 hargaTiketNormal">Rp. 130.000</p></td>
									</tr>
									
									
									<tr>
										<td class="valign-center"><h6 class="px-2">Total Bayar</h6></td>
										<td><p class="px-2" id="totalbayar"><?php echo rupiah($liat);?></p></td>
									</tr>
								</table>
							</div>

							

							<!-- ./harga -->
							<!-- persetujuan -->
							<div class="form-row mt-4">
								<div class="form-group col-12">
									
<?php
								$query = mysqli_query($koneksi,"SELECT * FROM method");


            while($data = mysqli_fetch_array($query)){
?>

										<label  >
										<input type="checkbox" name="kd_item" value="<?php echo $data['id_method'];?>" onClick="ckChange(this)" required/> <?php echo $data['kode_method'];?> - <?php echo $data['nama_method'];?>
												</label>
												<br>
			<?php } ?>
	</br>

												<label>
								
								*Jika setuju, Silahkan lanjut sebagai bukti bahwa anda mengerti dan menerima ketentuan-ketentuan yang diberlakukan oleh operator Mini Bus
									
							</label>

								</div>
							</div>
							<!-- ./persetujuan -->
							<!-- button -->
							<div class="form-row mt-5 mb-0 pb-0">

								<div class="form-group col-lg-4">
			                		
										<button class="btn btn-radius color-primary btn-block" type="submit" name="btn_simpan">
		                                    	Selanjutnya&nbsp;
		                                    	<i class="fa fa-arrow-right fa-1" aria-hidden="true"></i>
		                                </button>

		            			</div>
								
							</div>
							<!-- ./button -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ./metoda pembayaran -->

	</form>

	
	
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

    
<!-- if chek singel, uncek all -->
<script>
function ckChange(el) {
  var ckName = document.getElementsByName(el.name);
  for (var i = 0, c; c = ckName[i]; i++) {
   c.disabled = !(!el.checked || c === el);
  }
}
</script>
   

	<!-- SCRIPTS -->
	<!-- jquery -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<!-- bootstrap tooltips -->
	<script src="js/popper.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- flatpickr -->
	<script src="js/flatpickr.js"></script>
	<!-- slimselect -->
	<script src="js/slimselect.min.js"></script>
	<!-- filterinput -->
	<script src="js/filterinput.js"></script>
    <script src="js/moment.js"></script>

	<script src="js/jquery.validate.js"></script>
	<script src="js/custom.jquery.validate.js"></script>

	<script type="text/javascript" src="js/date-id.js"></script>
    
	<script type="text/javascript">
		function showLoadPage(){
			$('#modal-load').modal('show');
		}

        function hideLoadPage(){
            $('#modal-load').modal('hide')
        }
	</script>
	<!-- ./SCRIPTS -->
</body>
</html>