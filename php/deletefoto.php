<?php
session_start();
include('koneksi.php');
if (isset($_POST)) {
    if (in_array($_POST['tipe'], ['settings'])) {
        $update = mysqli_query($conn, "
        UPDATE " . $_POST['tipe'] . " 
            SET 
        logo = ''  
    ");
    } else {
        $update = mysqli_query($conn, "
        UPDATE " . $_POST['tipe'] . " 
            SET 
        foto = '' 
        where id= '" . $_POST['tid'] . "' 
    ");
    }
    if ($update) {
        $json['status'] = 1;
    } else {
        $json['status'] = 0;
    }
    echo json_encode($json);
}
