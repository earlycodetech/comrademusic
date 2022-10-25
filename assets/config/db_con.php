<?php

//     $server = "localhost";
//     $dbuser = "root";
//     $dbpass = "";
//     $dbname = "comrade_music";


    $server = "localhost";
    $dbuser = "u162278070_comrade";
    $dbpass = "a|iEmn8@W";
    $dbname = "u162278070_comrade";
    
   $connectDb = mysqli_connect($server,$dbuser,$dbpass,$dbname);

   if (!$connectDb) {
        echo "<script> alert('Failed to connect to database')</script>";
   }