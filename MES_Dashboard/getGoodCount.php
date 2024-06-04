<?php
 include("connect.php");
$query = "select top 1 [GoodCount],[Input_Timestamp] from [MES_capstone].[dbo].[GoodCount] order by Input_Timestamp desc ";
$results= sqlsrv_query($conn,$query);

if($results == true){

   $data = sqlsrv_fetch_array($results, SQLSRV_FETCH_NUMERIC);

   if(isset($data[0])){
   $return_arr = array("goodcount"=>$data[0]); 
   echo json_encode($return_arr);

   }else{
    echo"Index not present";
   }
}

?>