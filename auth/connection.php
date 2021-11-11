<?php
    function connect(){
        $dbHost = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "inventory_management_system";

        $conn = new mysqli($dbHost, $user, $pass, $dbname);
        return $conn;
    }
    function closeConnect($cn){
        $cn->close();
    }
