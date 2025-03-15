<?php
session_start();
require_once('koneksi.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $json['email'] = $_POST['email']; 
    //check table user email mysql table , use array email password.
    // $email_password_array = array(
    //     'bima@gmail.com' => 'Bima123!@#',
    //     'username2@gmail.com' => 'Password2@',
    //     'admin@admin.com' => 'Admin123!@#',
    // );
    $login = mysqli_query($conn, "SELECT * from users where email = '" . $email . "' and password = md5('" . $password . "')");
    if ($login) {
        $numrow = mysqli_num_rows($login);
        if ($numrow > 0) {
            $rows = mysqli_fetch_assoc($login);
            $_SESSION['login'] = 1;
            $_SESSION['email'] = $email;
            $_SESSION['user_level_id'] = $rows['user_level_id'];
            $_SESSION['username'] = $rows['username'];
            $_SESSION['fullname'] = $rows['fullname'];
            if (empty($rows['photoprofile']) || $rows['photoprofile'] == '' || $rows['photoprofile'] == null) {
                $_SESSION['photoprofile'] = '../uploads/profile/noprofile.png';
            } else {
                $_SESSION['photoprofile'] =  $rows['photoprofile'];
            }
            $_SESSION['userid'] = $rows['id'];
            $json['login_status'] = 1;
        } else {
            $_SESSION['login'] = 0;
            $json['message'] = 'Email atau password salah!';
            $json['login_status'] = 0;
        }
    } else {
        $_SESSION['login'] = 0;
        $json['message'] = 'Email atau password salah!';
        $json['login_status'] = 0;
    }
} else {
    $_SESSION['login'] = 0;
    $json['message'] = 'Error, Undifined Email & Password';
    $json['login_status'] = 0;
}
echo json_encode($json);
