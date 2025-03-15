<?php
session_start();
include('koneksi.php');
if (isset($_POST)) {
    $getdata = mysqli_query($conn, "SELECT * from settings ");
    $numdata = mysqli_num_rows($getdata);
    if ($numdata > 0) {
        $update = mysqli_query($conn, "
        UPDATE settings 
            SET 
             website_name = '',
             website_address = '',
             phone_number = '',
             email = '',
             logo = '', 
             zipcode = '', 
             birthday = '', 
             address = ''
     
    ");
        if ($update) {
            $json['status'] = 1;
        } else {
            $json['status'] = 0;
        }
    } else {
        $json['status'] = 2;
    }
    echo json_encode($json);
}
