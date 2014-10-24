<?php

include 'db_connect.php';
$response = array();
$data = array();
$i=0;
$conn=openConn();
$sql="SELECT * FROM EmpDir.dbo.UserAccount";
$stmt=sqlsrv_query($conn, $sql);

if($stmt){
    while($row=sqlsrv_fetch_array($stmt)){
        if(isset($row['userid'])){$i++;}
        $index = (int)$row['userid'];
        $data=array(
            'userid'=>$row['userid'],
            'LastName'=>$row['LastName'],
            'FirstName'=>$row['FirstName'],
            'Picture'=>$row['Picture'],
            'Title'=>$row['Title']
        );
        $response[$i]=$data;
        $toOpen='json.json';
        $fp = fopen($toOpen, 'w');
        fwrite($fp, json_encode($response));
        fclose($fp);
    }
}

?>

    <!DOCTYPE html >

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <head>
        <link href="test.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="images/favicon2.png">

    </head>

    <section class="flexArea">
        <div class="direction prev">Prev</div>
        <div class="placeholder-prev ph"></div>
        <div>

            <div id="main">Content Box</div>
            <div id="toggle"><span><a href="">Delete</a>  <a href="">Modify</a></span></div>

        </div>
        <div class="placeholder-next ph"></div>

        <div class="direction next">Next</div>

    </section>

    <script src="jquery-2.1.1.js"></script>
    <script src="script.js"></script>

    <footer></footer><?php
