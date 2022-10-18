<?php

    $server = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "comrade_music";
    
   $connectDb = mysqli_connect($server,$dbuser,$dbpass,$dbname);

   if (!$connectDb) {
        echo "<script> alert('Failed to connect to database')</script>";
   }