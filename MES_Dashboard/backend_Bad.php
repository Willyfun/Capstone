<?php
include("connect.php");

if(isset($_POST['BadCount'])){
    $bad_count = $_POST['BadCount'];
    $query = "IF DATEPART(second,GETDATE()) = 59 AND DATEPART(minute,GETDATE()) = 59
	            INSERT INTO [MES_capstone].[dbo].[BadCount] (BadCount,Input_Timestamp) VALUES (0,GETDATE())
                ELSE
	            UPDATE [MES_capstone].[dbo].[BadCount] 
	            SET BadCount = '$bad_count', Input_Timestamp = GETDATE() 
	            WHERE ID = (select top 1 ID from [MES_capstone].[dbo].[BadCount] order by Input_Timestamp desc)";
    $results= sqlsrv_query($conn,$query);
    echo $_POST['BadCount'];

}else{
    echo json_decode("fail");
}
?>