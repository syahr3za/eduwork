<?php
// 1.
function faktorial($angka) {
    if ($angka < 2) {
        return 1;
    } else {
        return ($angka * faktorial($angka-1));
    }
}
echo "faktorial 5 adalah " . faktorial(4);
echo "<br>";
echo "faktorial 8 adalah " . faktorial(8);

// 2.
$string = 'abcde';
$reverse = '';
$i = 0;

while(!empty($string[$i])){
        $reverse = $string[$i].$reverse;
        $i++;
}
echo $reverse;

//4.
$a = 3;
$b = 7;

$a ^= $b;
$b ^= $a;
$a ^= $b;

echo "a =" .$a . "<br/>";
echo "b =" .$b;

// 8.
for ($i=1; $i<=15; $i++) {
    if($i % 3 == 0) {
        echo "edu";
    } elseif($i % 5 == 0) {
        echo "work";
    } elseif($i % 3 == 0 && $i % 5 == 0) {
        echo "eduwork";
    } 
    echo $i;
    echo "<br>";
}

// 9.
function nilaiMax($array)
{
    $n = count($array);
    $max = $array[0];
    for ($i = 1; $i < $n; $i++)
        if ($max < $array[$i])
            $max = $array[$i];
    return $max;
}
function nilaiMin($array)
{
    $n = count($array);
    $min = $array[0];
    for ($i = 1; $i < $n; $i++)
        if ($min > $array[$i])
            $min = $array[$i];
    return $min;
}

$array = array(4,2,6,88,3,11);
echo "low :".nilaiMin($array);
echo "<br>";
echo "high :".nilaiMax($array);

// 10.
$tahun=2024;

if($tahun %4==0 AND $tahun %100!=0 OR $tahun%400==0) {
    echo "$tahun adalah tahun kabisat";
    } else{
        echo "$tahun bukan merupakan tahun kabisat";
    }
?>
