<?php
// 1. menggunakan faktorial
function faktorial($angka)
{
  $hasil = 1;
  for ($i = 2; $i <= $angka; $i++) {
    $hasil *= $i;
  }
  return $hasil;
}

$int1 = 4;
$int2 = 8;

echo "Faktorial dari " . $int1 . " adalah " . faktorial($int1) . "<br>";
echo "Faktorial dari " . $int2 . " adalah " . faktorial($int2) . "<br>";

// 2.
function reverseString($string)
{
  $length = strlen($string); // menghitung panjang string
  $reversed = '';
  for ($i = $length - 1; $i >= 0; $i--) {
    $reversed .= $string[$i]; // menambahkan string $i ke variabel $reversed
  }
  return $reversed;
}

$string = 'abcde';
$reversedString = reverseString($string);
echo $reversedString;


// 3.
function printDigitValue($string)
{
  $digits = preg_replace("/[^0-9]/", "", $string); // hapus karakter non-digit dari string
  echo $digits; // menampilkan angka di barisan pertama
  echo "<br>";
  $len = strlen($digits); // hitung panjang digit
  $result = "";

  for ($i = 0; $i < $len; $i++) {
    $digit = $digits[$i];
    $power = $len - $i - 1; // hitung pangkat 10 sesuai dengan posisi digit

    // hitung nilai digit dan tampilkan
    $value = $digit * pow(10, $power);
    $result .= $value;
    echo $value . "<br>";
  }
}

printDigitValue('9.86-A5.321');


// 4.
$a = 3;
$b = 7;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "a = " . $a . ", b = " . $b;

// 5.
function terbilang($angka)
{
  $angka = (int) $angka;
  $angka_huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

  if ($angka < 0) {
    return "minus " . terbilang(abs($angka));
  }

  if ($angka < 12) {
    return $angka_huruf[$angka];
  }

  if ($angka < 20) {
    return terbilang($angka - 10) . " belas";
  }

  if ($angka < 100) {
    return terbilang($angka / 10) . " puluh " . terbilang($angka % 10);
  }

  if ($angka == 100) {
    return "seratus";
  }

  return "silahkan masukkan bilangan 1-100";
}

echo terbilang(4);
echo "<br>";
echo terbilang(20);
echo "<br>";
echo terbilang(39);
echo "<br>";
echo terbilang(104);

// 6.
$data = array(1, 4, 7, 9, 12);
$low = 2;
$high = 15;

$output = array();

foreach ($data as $value) {
  if ($value >= $low && $value <= $high) {
    array_push($output, $value);
  }
}

print_r($output);

// 7.
$data = array(1, 4, 7, 9, 12);
$low = 2;
$high = 15;
$count = 0;

foreach ($data as $num) {
  if ($num >= $low && $num <= $high) {
    $count++;
  }
}

echo "$count";

// 8.
$int = 15;
for ($i = 1; $i <= $int; $i++) {
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo "EduWork";
  } else if ($i % 3 == 0) {
    echo "Edu";
  } else if ($i % 5 == 0) {
    echo "Work";
  } else {
    echo $i;
  }
  echo "<br>";
}

// 9.
function cariMinMax($arr)
{
  $n = count($arr);
  $min = $arr[0];
  $max = $arr[0];

  for ($i = 1; $i < $n; $i++) {
    if ($arr[$i] < $min) {
      $min = $arr[$i];
    } else if ($arr[$i] > $max) {
      $max = $arr[$i];
    }
  }

  echo "low : " . $min . ", high : " . $max;
}

$arr = [4, 2, 6, 88, 3, 11];
cariMinMax($arr);

// 10.
function isKabisat($year)
{
  if ($year % 4 != 0) {
    return "$year bukan tahun kabisat";
  } elseif ($year % 100 != 0) {
    return "$year adalah tahun kabisat";
  } elseif ($year % 400 != 0) {
    return "$year bukan tahun kabisat";
  } else {
    return "$year adalah tahun kabisat";
  }
}

echo isKabisat(2021);
echo "<br>";
echo isKabisat(2024);
