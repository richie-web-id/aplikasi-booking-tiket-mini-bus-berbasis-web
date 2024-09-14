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
	

	<!-- jadwal -->
	<section class="pt-4">
		<div class="container">
			<div class="row" id="users">
				<div class="col-lg-12 pb-4">
																
						<p class="color-primary2-text"><span class="round-number mr-3">1</span>Pilih Jam Keberangkatan</p>
<?php

$asal = isset($_POST['asal']) ? $_POST['asal'] : '';
$tujuan = isset($_POST['tujuan']) ? $_POST['tujuan'] : '';
$jum = isset($_POST['jum']) ? $_POST['jum'] : '';
$orgDate=$_POST['doj'];
$tgl=date("Y-m-d", strtotime($orgDate)); 
 
//setcookie('asal', $asal, time() + (60 * 60 * 24 * 1), '/');
//setcookie('tujuan', $tujuan, time() + (60 * 60 * 24 * 1), '/');

if(!empty($asal) && !empty($tujuan) && !empty($jum) && !empty($orgDate)){

$sql = " SELECT * FROM rute WHERE asal='$asal' AND tujuan='$tujuan' AND tgl='$tgl' "; 
$query = mysqli_query($koneksi, $sql);
$count = mysqli_num_rows($query);
//$sql = "SELECT * FROM pasien WHERE id_user='$_SESSION[id_user]' ";

//$no=1;
if($count > 0){

while ($row=mysqli_fetch_array($query)){

?>                                  							
                        <ul class="list px-0">
								<li class="card mb-3 border-0 shadow-sm">
                                                <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 col-lg-7">
                                                        <p class="f20 text-dark mb-1"><?php echo (strtoupper($row['asal']));?> - <?php echo (strtoupper($row['tujuan']));?></p>
                                                        <p class="mb-2">
                                                            <span class="jam color-primary2-text"><i class="fa fa-clock pr-1"></i><?php echo ($row['jam']);?></span>
                                                        
                                                            <span class="kursi color-primary2-text"><i class="fa fa-wheelchair pl-3 pr-1"></i><?php echo ($row['kapasitas']);?> kursi</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-5 col-lg-5 text-right">
                                                                                           
                                                                <p class="f20 mb-2 harga text-dark"><?php echo (rupiah($row['tarif']));?></p>
                                                            <form action="carseat.php" method="post">
                                            
                                                                <input type="hidden" name="id_rute" value="<?php echo ($row['id_rute']);?>">
                                                                <input type="hidden" name="tarif_rute" value="<?php echo ($row['tarif']);?>">
                                                                <input type="hidden" name="doj" value="<?php echo $tgl;?>">
                                                            <button type="submit" class="btn btn-radius color-primary2 px-4 mb-1" >
                                                                Pilih<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i>
                                                            </button>
                                                            
                                                            </form>
                                                                
                                                               
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
    
                                    </ul>
                                    
<?php       
                                   }
?>
                                                            <button onClick="history_goback()" class="btn btn-radius color-primary2 px-4 mb-1" >
                                                             <i class="fa fa-angle-double-left pl-2" aria-hidden="true"></i> Kembali
                                                            </button>
<?php
                } else { 
                    echo "JADWAL BUS TIDAK DITEMUKAN.";
                    header("refresh: 5; index.php");
                }

            }
 
        else { 
            echo "SILAHKAN MASUKKAN JADWAL BUS.";
            header("refresh: 5; index.php");
        }
            

?>								
				</div>
			</div>
		</div>
	</section>
	<!-- ./jadwal -->
   
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