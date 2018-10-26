<?php

namespace App\Classes;

class Common {

	public static function indDate($date) {
		$engMonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		$indMonth = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		$engDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		$indDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
		$newMonth = str_ireplace($engMonth, $indMonth, $date);
		return str_ireplace( $engDay, $indDay, $newMonth);
	}

}
