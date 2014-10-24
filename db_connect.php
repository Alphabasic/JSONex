<?php
function openConn(){
    $server = 'PTPSV50137';
    $options = array( "Database" => "EmpDir", "UID"=>"u_no", "PWD"=>"bro");
    $conn = sqlsrv_connect($server, $options);
    if ($conn === false) die("<pre>".print_r(sqlsrv_errors(), true));
    return $conn;}
