<html>
    <head>
        <title>La manipulation des dates PHP</title>
    </head>
    <body>
        <?php 
        $date1 = '2023-04-01';
        $date2 = '2023-04-11';
        $solde = 10; // déclaration et initialisation de la variable $solde
        
        $datestart = date_create($date1); //get current server time
        $dateend = date_create($date2);//some future date
        $diff = date_diff($datestart, $dateend);

        // Fonction qui permet de verifier si une date est fériée en France(à l'exception des fetes religieuses)
        function isholiday($timestamp) {
            $jour = date("d", $timestamp);
            $mois = date("m", $timestamp);
            $annee = date("Y", $timestamp);
            $EstFerie = 0;
            // dates fériées fixes
            if($jour == 1 && $mois == 1) $EstFerie = 1; // 1er janvier
            if($jour == 1 && $mois == 5) $EstFerie = 1; // 1er mai
            if($jour == 8 && $mois == 5) $EstFerie = 1; // 8 mai
            if($jour == 14 && $mois == 7) $EstFerie = 1; // 14 juillet
            if($jour == 15 && $mois == 8) $EstFerie = 1; // 15 aout
            if($jour == 1 && $mois == 11) $EstFerie = 1; // 1 novembre
            if($jour == 11 && $mois == 11) $EstFerie = 1; // 11 novembre
            if($jour == 25 && $mois == 12) $EstFerie = 1; // 25 décembre
            return $EstFerie;
        }

        $nbdiff = intval($diff->format("%d"));
        $conge=0;
        for($i=0;$i<=$nbdiff;$i++){           
            $newdate = date('Y-m-d', strtotime($date1. ' + '.$i.' days'));
            $weekendday = date('w', strtotime($newdate));
            if ($weekendday == 0 || $weekendday == 6 || isholiday(strtotime($date1. ' + '.$i.' days'))==1) {
            } else {
            $conge++;
            }
        }
        echo "Nombre de jour de congés : ".$conge."<br>";
        if($conge>$solde){
            $diff=$conge-$solde;
            echo "Congé refusé : solde insuffisant, il manque encore ".$diff." jour(s) de solde";
        } else {
            echo "Congé accepté";
        }
        ?> 
    </body>
</html>

<?php

function reduction($productname,$date,$price){

    $today=date("Y-m-d"); /* Tester le 17/04/2023 */
    $datestart = date_create($today); //get current server time
    $dateend = date_create($date);//some future date
    $diff = date_diff($datestart, $dateend);
    $daydiff = intval($diff->format("%d"));

    if($daydiff<=5){
        $newprice = $price-($price*(10*$daydiff)/100);
    }
    echo "Nom du produit :".$productname."<br>";
    echo "Prix en promotion :".$newprice."€<br>";
}
reduction("Laitue",date("Y-m-d", mktime(0, 0, 0, 04, 20, 2023)),5);

?>

