<!-- aplikasi-booking-tiket-mini-bus-berbasis-web
**********************************************
* Developer   : Richie
* Release     : September 2024
* Update      : -
* Website     : www.richie.web.id
* WhatsApp    : +62 899-8560-080
-->

<?php
	include('./config/connection.php');
	//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- title -->
	<title>Mini Bus Travel</title>

	<link rel="stylesheet" href="font/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker.min.css" />


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
		
<!-- CONTENT -->
<div class="container-fluid px-0" style="min-height: 80vh">
	<section>
		<div class="col-12 px-0">
			<div class="divhead">
				
								<!-- reservasi -->
				<div class="container pb-5">
					<p class="text-white"><!--Pesan Tiket Anda Sekarang--></p>
					<form action="schedule.php" method="post">
						
						<div class="card shadow1 radius1 text-muted border-0">
							<div class="card-body py-3 mb-3">
								<div class="row">
									<div class="col-lg-3 small">
										<p class="mb-1 mt-3"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Keberangkatan</p>
	<select name="asal" required class="form-control">
	<option disabled selected value="">Dari</option>
      <option value="barru">Barru</option>
      <option value="makassar">Makassar</option>
      <option value="maros">Maros</option>
	  <option value="parepare">Parepare</option>
      <option value="pinrang">Pinrang</option>
  
    </select>
									</div>
									<div class="col-lg-3 small">
										<p class="mb-1 mt-3"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Tujuan</p>
	<select name="tujuan" required class="form-control">
	<option disabled selected value="">Ke</option>							
	  <option value="barru">Barru</option>
      <option value="makassar">Makassar</option>
      <option value="maros">Maros</option>
	  <option value="parepare">Parepare</option>
      <option value="pinrang">Pinrang</option>
  
    </select>
									</div>
									<div class="col-lg-2 small">
										<p class="mb-1 mt-3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Tanggal Berangkat</p>
   
										<input name="doj" type="date" class="form-control"  />
										
									</div>
									<div class="col-lg-2 small">
										<p class="mb-1 mt-3"><i class="fa fa-users" aria-hidden="true"></i> Penumpang</p>
	<select name="jum" class="form-control" required>						
      <option value="1">1 Orang</option>
      <option value="2">2 Orang</option>
      <option value="3">3 Orang</option>
	  <option value="4">4 Orang</option>
      <option value="5">5 Orang</option>
      <option value="6">6 Orang</option>
	  <option value="7">7 Orang</option>
	  <option value="8">8 Orang</option>
    </select>
									</div>
									<div class="col-lg-2 small">
										<p class="mb-1 mt-3" style="color: white;">Pesan Tiket Anda Sekarang</p>
   
							
							<button type="submit" class="btn btn-radius color-primary2 px-4 mb-1" >
                                                                Cari Tiket<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i>
                            </button>
							<!--
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Batal
							</button>
                            -->
									</div>
									
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- reservasi  -->
                
			</div>
		</div>
	</section>
    </div>

<!--
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
-->

<script type="text/javascript">
        $(function () {
            $('[id*=txtDate]').datepicker({
                changeMonth: true,
                changeYear: true,
                format: "dd/mm/yyyy",
                autoclose: true,
                immediateUpdates: true,
                todayHighlight: true,
                language: "tr"
            });
        });
	</script>
	
	
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		
		</body>
		</html>

