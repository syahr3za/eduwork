<?php

function convert_date($value) {
		return date('d M Y - H:i:s', strtotime($value));
	}

function format_uang ($angka) {
    return number_format($angka, 0, ',', '.');
}

?>