// Hanya huruf dan spasi diantara kalimat yang diperbolehkan
$.validator.addMethod("lettersAndSpaces", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/.test(value) && value.trim() === value;
}, "Tidak boleh mengandung angka/simbol");


// Hanya angka dan tidak ada spasi
$.validator.addMethod("numbersNoSpaces", function(value, element) {
    return this.optional(element) || /^[0-9]*$/.test(value) && value.trim() === value && !/\s{2,}/.test(value);
}, "Hanya angka yang diperbolehkan");


// Email (Regular expression for valid email with yahoo.com or gmail.com domain)
$.validator.addMethod("validEmail", function(value, element) {
    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return this.optional(element) || emailPattern.test(value) && value.trim() === value;
}, "Email tidak valid");


// Tidak ada spasi di awal, tengah, akhir kalimat
$.validator.addMethod("noLeadingTrailingSpaces", function(value, element) {
    return this.optional(element) || (value.trim() !== '' && value === value.trim());
}, "Tidak boleh ada spasi di awal dan akhir kata");


// Hapus spasi di awal dan akhir kalimat
function removeSpaces(input) {
    var trimmedValue = input.value.trim();
    input.value = trimmedValue;
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