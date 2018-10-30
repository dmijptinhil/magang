<?php

namespace App\Classes;

class Common {
	//merubah tanggal ke bahasa Indonesia
	public static function indDate($date) {
		//bulan bahasa Inggris
		$engMonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		//bulan bahasa Indonesia
		$indMonth = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		//hari bahasa Inggris
		$engDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		//hari bahasa Indonesia
		$indDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
		//variabel untuk mengubah hari > fungsi str_ireplace untuk merubah tanggalnya
		$newMonth = str_ireplace($engMonth, $indMonth, $date);
		return str_ireplace( $engDay, $indDay, $newMonth);
	}

}
