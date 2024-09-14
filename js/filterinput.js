
/*
 keterangan kode ascii :
 >=65 dan <=90 berarti huruf besar
 >=97 dan <122 berarti huruf kecil
 32 berarti spasi
 46 berarti titik
 >=48 dan <=57 berarti 0-9
 39 berarti kutip
 45 berarti tanda hubung (-)
 40 berarti (
 41 berarti )
 47 berarti /
 */

//filter huruf (huruf besar, huruf kecil, spasi, titik)
function huruf(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode==32 || charCode==46)
		return true; //jika kondisi benar
	return false;
}

//filter huruf (huruf besar, huruf kecil, spasi, titik, tanda hubung)
function abjad(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode==32 || charCode==46 || charCode==45)
		return true; //jika kondisi benar
	return false;	
}

//filter angka (spasi, angka 0-9)
function angka(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false; //jika kondisi benar
	return true;
}

//filter angka (spasi, angka 0-9)
function telepon(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false; //jika kondisi benar
	return true;
}

//filter alamat (huruf besar, huruf kecil, spasi, angka, titik, tanda hubung, tanda garismiring)
function alamat(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode==32 || (charCode>=48 && charCode<=57) || charCode==46 || charCode==45 || charCode==47 ||charCode==40 ||charCode==41 || charCode==44)
		return true; //jika kondisi benar
	return false;
}

//filter huruf dan angka (huruf besar, huruf kecil, spasi, 0-9)
function hurufangka(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122) || charCode==32 || (charCode>=48 && charCode<=57))
		return true; //jika kondisi benar
	return false;
}