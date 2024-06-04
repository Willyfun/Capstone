<?php  
    $serverName = "ADMIN-PC\TEW_SQLEXPRESS";
    $ConnectionOptions = ["Database"=>"MES_capstone" , "Uid"=>"Testing" , "PWD"=>"greentea12345"];

    $conn = sqlsrv_connect($serverName,$ConnectionOptions);
?>