<?php

/*

 date();
 time();
 mktime();
 getdate();
 gmdate();
 gmmktime();
 strtotime();
 checktime();


echo date('d/m/Y')."<br>";
echo gmdate("M-d-Y H:i:s")."<br>";
echo time()."<br>";
echo gmdate("d/m/Y")."<br>"; 
echo print_r(getdate())."<br>";
echo mktime(0,0,0)."<br>";

*/

$Date1 = "2023-03-27";
$Date2 = "2023-03-28";
$Date3 = date('Y-m-d', strtotime($Date1. ' + 3 days'));

if(strtotime($Date2)>strtotime($Date3)){
 
  echo "la date 2 est plus récente";
}else{
 
    echo "la date 3 est plus récente";
}

/*
$date = '2023-03-29';
$newdate = date('Y-m-d', strtotime($date. ' + 1 months'));
$weekendday = date('w', strtotime($newdate));

if ($weekendday == 0 || $weekendday == 6) {
   
  echo 'la date est un weekend';

} else {

  echo "la date n'est pas un weekend";
}


$start = date_create('2023-05-10');
$end = date_create('2023-05-04');
$nbdays = date_diff($start, $end);


if(strtotime($start)>strtotime($end)){

  echo "La date de départ doit être antérieure à la date de fin";

} else {


echo $nbdays->format("%a");
}
*/


$Date1 = "2023-03-27";
$Date2 = "2023-04-27";


$start = date_create($Date1);
$end = date_create($Date2);
$diffdays = date_diff($start, $end);
$nbdays= $diffdays->format("%a");


echo "La liste de toutes les dates:"; 


for($i=1; $i<=$nbdays; $i++){
   
    $Date3 = date('Y-m-d', strtotime($Date1. ' + '.$i.' days'));
    $check=date('N', strtotime($Date3));
   
    if($check>=6 ){
       
        echo $Date3."<br/>";
      
    }
}


