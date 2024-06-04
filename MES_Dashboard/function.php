<?php
function check_login($conn)
{

    if(isset($_SESSION['$user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "select * from [MES_capstone].[dbo].[User_Account] where User_ID = '$id' ";

        $result = sqlsrv_query($conn, $query);
        if($result && sqlsrv_num_rows($result) > 0)
        {

            $user_data = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
            return $user_data;

        }
    }
    
    header("Location:login.php");
    die;
}

function random_num($length)
{

    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for($i = 0; $i < $len; $i++ ){

        $text .= rand(0,9);
    }

    return $text;
}

?>

