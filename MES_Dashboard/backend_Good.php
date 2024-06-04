<?php
include("connect.php");

if(isset($_POST['GoodCount'])){
    $good_count = $_POST['GoodCount'];
    $query = "IF DATEPART(second,GETDATE()) = 0 AND DATEPART(minute,GETDATE()) = 21
	            INSERT INTO [MES_capstone].[dbo].[GoodCount] (GoodCount,Input_Timestamp) VALUES (0,GETDATE())
                ELSE
	            UPDATE [MES_capstone].[dbo].[GoodCount] 
	            SET GoodCount = '$good_count', Input_Timestamp = GETDATE() 
	            WHERE ID = (select top 1 ID from [MES_capstone].[dbo].[GoodCount] order by Input_Timestamp desc)";
    $results= sqlsrv_query($conn,$query);
    echo $_POST['GoodCount'];
    
}else{
    echo json_decode("fail");
}
?>