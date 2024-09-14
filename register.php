
<?php
include('./config/connection.php');
session_start();

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: passanger.php'); exit;
}

	
// get the posted data
$doj = strip_tags( utf8_decode( $_POST['journey_date'] ) );
$name = strip_tags( utf8_decode( $_POST['user_name'] ) );
$address = strip_tags( utf8_decode( $_POST['address'] ) );
$mobile = strip_tags( utf8_decode( $_POST['mobile'] ) );

$userid = strip_tags( utf8_decode( $_POST['userid'] ) );

$email = strip_tags( utf8_decode( $_POST['email'] ) );
$password = strip_tags( utf8_decode( $_POST['password'] ) );

$rute_id = strip_tags( utf8_decode( $_POST['id_rute'] ) );

$tarif_rute = strip_tags( utf8_decode( $_POST['tarif_rute'] ) );
	
// check that name was entered
if (empty($name))
    $error = 'You must enter your name.';

// check that address was entered
if (empty($address))
    $error = 'You must enter your address.';

// check that mobile number was entered
if (empty($mobile))
    $error = 'You must enter your mobile number.';

// check that user id was entered
if (empty($userid))
    $error = 'You must enter your username.';

// check that an email address was entered
elseif (empty($email)) 
    $error = 'You must enter your email address.';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
    $error = 'You must enter a valid email address.';
	
// check that a message was entered
if (empty($password))
    $error = 'You must enter password.';

//Check whether the student is already registered.
$select = mysqli_query( $koneksi, "select * from register where userid = '" . $userid . "'");

$num_rows = mysqli_num_rows($select);

if ( $num_rows )
	$error = 'Anda sudah terdaftar.';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: passanger.php?e='.urlencode($error)); exit;
}



// Success
$query = "INSERT INTO register (userid, name, email, password, address, contact) VALUES ('" . $userid . "','" . $name . "','" . $email . "','" . $password . "','" . $address . "','" . $mobile . "')";

$results = mysqli_query($koneksi, $query);

if (!$results)
{
	die ("Tidak dapat melakukan register: <br />". mysqli_error($koneksi));
}

$seatNumber = NULL;

for($i=1; $i<11; $i++)
{
	$chparam = "ch" . strval($i);
	$calcPNR = $doj . "-" . strval($i);
	if( !empty($_POST[$chparam]) )
	{
		$query = "INSERT INTO seat(userid, number, PNR, date, id_rute, tarif_rute) VALUES ('". $userid ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."', '". $rute_id ."', '". $tarif_rute ."')";
		$results = mysqli_query($koneksi, $query);
		if (!$results)
		{
			die ("Tidak dapat memesan nomor kursi: <br />". mysqli_error($koneksi));
		}
		$seatNumber = $seatNumber .", ". "$i";
	}
}
if(!empty($message))
{
	$message = "Anda sudah '". $name ."' booking nomor kursi: '". $seatNumber ."'." . "Pesannya seperti di bawah ini." . $message;	
}
else
{
	$message = "Anda sudah '". $name ."' booking nomor kursi: '". $seatNumber;	
}

		
// write the email content


//header('Location: payment.php?s='.urlencode('Anda berhasil booking nomor kursi.')); exit;
header('Location: payment.php?id_rute='.$rute_id.'&userid='.$userid.''); exit;

?>
