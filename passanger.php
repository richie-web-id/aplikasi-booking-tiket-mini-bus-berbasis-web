<?php 
include ("./config/connection.php"); include ("function/library_currency.php");?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
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
		<style type="text/css">
		label.error {
			font-size: 80%;
			color: #dc3545;
		}

		input.error {
			border: 1px solid rgb(220, 53, 69);
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
	


	<!-- data pemesan & penumpang -->
	<section class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="color-primary2-text"><span class="round-number mr-3">3</span>Data Penumpang</p>
					<div class="card radius1 shadow1 border-0">
						<div class="card-body">
							<div class="col-lg-12">

<?php

// check for a successful form post
if (isset($_GET['s'])) 
{
	echo "<div class=\"alert alert-success\">".$_GET['s']." You will be automatically redirected after 5 seconds.</div>";
//						echo "You will be automatically redirected after 5 seconds.";
	header("refresh: 5; index.php");
}

// check for a form error
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";

?> 

								<form action="register.php" method="post" id="formpemesan">
								<input type="hidden" name="doj" value="<?php echo $tgl;?>">
								<input type="hidden" name="no_seat" value="<?php echo $tgl;?>">
								<input type="hidden" name="id_rute" value="<?php echo $_POST['id_rute'];?>">
								<input type="hidden" name="tarif_rute" value="<?php echo $_POST['tarif_rute'];?>">

				<div class='control-group'>
				<!--	
				<label class='control-label' for='input1'>Seat Numbers</label>
                -->
					<div class='controls'>
					<?php 
						for($i=1; $i<11; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input type='hidden' class='span3' name=ch".$i." value=".$i." readonly/><br>";
							}
						}
					?>
	                </div>
	            </div>
				<?php
						if(isset($_POST['doj']))
						{
							echo "<div class='control-group'>";
							//echo "<label class='control-label' for='input1'>Date of Journey</label>";
								echo "<div class='controls'>";
									echo "<input type='hidden' name='journey_date' id='input1' class='span3' value=". $_POST['doj'] ." readonly />";
								echo "</div>";
							echo "</div>";
						}
				?>
									
									<div class="row">
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-user fa-1 pr-2" aria-hidden="true"></i>Nama</label>
											<input type="text" required name="user_name" id="pemesan" class="form-control" placeholder="Masukkan Nama" value="" maxlength="30">
										</div>
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-envelope fa-1 pr-2" aria-hidden="true"></i>Email</label>
											<input type="email" required name="email" id="email" class="form-control" placeholder="Masukkan Email" value="" maxlength="64">
								        </div>
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-id-card" aria-hidden="true"></i> Username</label>
											<input type="text" required name="userid" class="form-control" value="" placeholder="Masukkan Username" maxlength="16">
										</div>
									</div>
									<div class="row pt-sm-3">
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-map-marker-alt fa-1 pr-2" aria-hidden="true"></i>Alamat</label>
											<input type="text" required name="address" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="" maxlength="128">
										</div>
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-phone fa-1 pr-2"></i>Telepon</label>
											<input type="number" required name="mobile" id="telepon" class="form-control" inputmode="numeric" value="" placeholder="Masukkan Nomor Telepon" maxlength="16">
										</div>
										<div class="col-lg-4 pt-2">
											<label class="color-primary2-text"><i class="fa fa-key" aria-hidden="true"></i> Password</label>
											<input type="password" required name="password" class="form-control" placeholder="Masukkan Password" value="" maxlength="128">
										</div>
										
										<div class="col-lg-4">
										</div>
									</div>
									
									<div class="row mt-5">
							
										<div class="col-sm-4 col-md-4 col-lg-4">
										<input type="hidden" name="save" value="contact">
											<button class="btn btn-radius color-primary btn-block" type="submit" id="submit-button">
		                                    	Selanjutnya&nbsp;
		                                    	<i class="fa fa-arrow-right fa-1" aria-hidden="true"></i>
		                                    </button>
											<br>
											<button onClick="history_goback()" class="btn btn-radius color-primary btn-block">
											
											<i class="fa fa-arrow-left" aria-hidden="true"></i>
											Kembali&nbsp;
					                      
					                        </button>
								
		                                </div>
									
									</div>
	                                
								</form>

			
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ./data pemesan & penumpang -->
	</div>
	<!-- ./CONTENT -->

	<!-- SCRIPTS -->

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

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
	<script>
        function history_goback() {
            window.history.go(-1);
        }
    </script>
	<script type="text/javascript">
        $('#submit-button').click(function(){
            if($('#formpemesan').valid()){
                showLoadPage();
            }
        });

		var validator = $('#formpemesan').validate({
			rules : {
				pemesan : {
					required: true,
					lettersAndSpaces: true,
					minlength: 3,
					maxlength: 30,
				},
				email : {
					required : true,
					email : true,
					validEmail: true,
					minlength: 8,
					maxlength: 64,
				},
				alamat : {
					required : true,
					noLeadingTrailingSpaces: true,
					maxlength: 128,
				},
				telepon : {
					required : true,
					numbersNoSpaces: true,
					minlength: 9,
					maxlength: 16,
				},
				
			},
			messages : {
				pemesan : {
					required : "Silahkan mengisi nama pemesan",
					minlength : "Nama pemesan minimal 3 huruf",
					maxlength : "Nama pemesan maksimal 30 huruf",
				},
				email : {
					required : "Silahkan mengisi email",
					email : "Email tidak valid",
					minlength : "Email minimal 8 huruf",
					maxlength : "Email maksimal 64 huruf",
				},
				alamat : {
					required : "Silahkan mengisi alamat",
					maxlength : "Alamat maksimal 128 huruf",
				},
				telepon : {
					required : "Silahkan mengisi no telepon",
					minlength : "No telepon minimal 9 digit",
					maxlength : "No telepon maksimal 16 digit",
				},
				
				
			},
		});
		
		
	</script>


	<!-- ./SCRIPTS -->
</body>
</html>