<?php
 include("connect.php");
$query = "select top 1 [BadCount],[Input_Timestamp] from [MES_capstone].[dbo].[BadCount] order by Input_Timestamp desc ";
$results= sqlsrv_query($conn,$query);

if($results == true){

   $data = sqlsrv_fetch_array($results, SQLSRV_FETCH_NUMERIC);

   if(isset($data[0])){
   $return_arr = array("badcount"=>$data[0]); 
   echo json_encode($return_arr);

   }else{
    echo"Index not present";
   }
}

?>