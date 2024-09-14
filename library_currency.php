<?php
/**
 * Menampilkan format rupiah dengan PHP.
 *
 */
function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
}

//echo rupiah(15000);