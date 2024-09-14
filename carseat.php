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
	<!-- title -->
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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


	<style type="text/css">
    .seat-space {
        background-image: url('../../../global/images/seat.png');
        background-size: contain;
        background-repeat: no-repeat;
    }

	.table-responsive {
		overflow-x: auto;
		overflow-y: hidden;
	}
</style>
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
	

	<!-- pilih kursi -->
	<section class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="color-primary2-text"><span class="round-number mr-3">2</span>Pilih Kursi</p>
					<div class="card radius1 shadow1 border-0">
						<div class="card-body">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-3 table-responsive">
																					<table class="ml-auto mr-auto">
												<tr>
													<td colspan="3">
														<h4 id="countdown" class="text-center"></h4> 
													</td>
												</tr>
												<tr>
												<td>
													
<center><img src="img/legend.png" height="90%"></center>
			
				
												</td>
												</tr>
												
																					</table>
											
									</div>
									<div class="col-lg-9">
										<div class="container pt-4">
					<form action="passanger.php" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							//$date = $_POST['doj'];
							$date = isset($_POST['doj']) ? $_POST['doj'] : '';
							$rute_id = isset($_POST['id_rute']) ? $_POST['id_rute'] : '';
							$tarif_rute = isset($_POST['tarif_rute']) ? $_POST['tarif_rute'] : '';

						//if(!empty($date)){

							$query = "select * from seat where date = '" . $date . "'";
							$result = mysqli_query($koneksi, $query);
							if ( mysqli_num_rows($result) == 0 )
							{
								for($i=1; $i<9; $i++)
								{
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Tersedia'>";
											echo "<img src='img/available.png' alt='Kursi Tersedia'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>No. ".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";								
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysqli_fetch_array($result))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<9; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>No ".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Tersedia'>";
												echo "<img src='img/available.png' alt='Kursi Tersedia'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>No ".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}

						//}
						?>
						</ul>
						<section>
						                    
										
											<p class="mb-1">
											    <img src='img/available.png' alt='Booked Seat'/></i> Kosong
											</p>
											<p class="mb-1">
											    <img src='img/occupied.png' alt='Booked Seat'/> Sudah Dibooking
											</p>
											
											<p class="m-t-60">
												<small>
													<strong>Catatan :</strong> Kursi sewaktu-waktu dapat dibooking oleh penumpang lain yang terlebih dulu menyelesaikan pembayaran.
												</small>
												
											</p>
						</section>
						
							<input type="hidden" name="doj" value="<?php echo $date;?>">
							<input type="hidden" name="id_rute" value="<?php echo $rute_id;?>">
							<input type="hidden" name="tarif_rute" value="<?php echo $tarif_rute;?>">
							
							<button type="submit" class="btn btn-danger" >
							Selanjutnya<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i>
                            </button>
							<button type="reset" class="btn btn-danger">
								<i class="icon-refresh icon-white"></i> Cancel
							</button>
						
							
						  
							<!--
							<a href="./schedule.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Batal </a>
						    -->
					
					</form>
					        <button onClick="history_goback()" class="btn btn-danger">
											
							<i class="icon-arrow-left icon-white"></i> Kembali 
					                      
					        </button>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ./pilih kursi -->
	</div>
	<!-- ./CONTENT -->


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

		<script src="js/jquery.countdown360.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#countdown").countdown360({
				radius      : 30,
				seconds     : 300,
				label		: ["second", "detik"],
				strokeWidth : 4,
				fillStyle   : '#FFFFFF',
				strokeStyle : '#004963',
				fontFamily	: "Poppins",
				fontSize    : 25,
				fontColor   : '#004963',
				autostart	: false,
				onComplete  : function () { 
					window.location = 'index.php';
				}
			}).start()
		});
	</script>
	
	
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Silahkan pilih minimal 1 tiket.');
				return false;
			}
		</script>
		<script>
        function history_goback() {
            window.history.go(-1);
        }
    </script>
</body>
</html>