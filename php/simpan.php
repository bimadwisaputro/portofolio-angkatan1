<?php
session_start();
include('koneksi.php');

if (isset($_POST)) {
    if ($_POST['tipe'] == 'settings') {
        // var_dump($_FILES);
        // die();
        $website_name = $_POST['website_name'];
        $website_address = $_POST['website_address'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address =  mysqli_escape_string($conn, $_POST['address']);
        $birthday = $_POST['birthday'];
        $zipcode = $_POST['zipcode'];
        $about =  mysqli_escape_string($conn, $_POST['about']);

        $getdata = mysqli_query($conn, "SELECT * from settings ");
        $numdata = mysqli_num_rows($getdata);
        if ($numdata > 0) {

            if (isset($_POST['foto'])) {
                $rows = mysqli_fetch_assoc($getdata);
                $foto = $rows['logo'];
            } else {
                if ($_FILES['foto']['error'] == 0) {
                    $fillname = $_SESSION['userid'];
                    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $fillpath = "../uploads/settings-foto/" . $fillname . '.' . $ext;
                    if ($_FILES['foto']['error'] == 0) {
                        $foto = "../uploads/settings-foto/" . $fillname . '.' . $ext;
                    }
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                        //xxx
                    }
                } else {
                    $rows = mysqli_fetch_assoc($getdata);
                    $foto = $rows['logo'];
                }
            }

            $runsql = mysqli_query($conn, "
                                    UPDATE settings 
                                    SET 
                                    website_name = '" . $website_name . "',
                                    website_address = '" . $website_address . "',
                                    phone_number = '" . $phone_number . "',
                                    birthday = '" . $birthday . "',
                                    email = '" . $email . "', 
                                    logo = '" . $foto . "', 
                                    zipcode = '" . $zipcode . "', 
                                    about = '" . $about . "', 
                                    address = '" . $address . "'  
                                    
                                    ");
        } else {

            if (isset($_POST['foto'])) {
                $foto = '';
            } else {
                if ($_FILES['foto']['error'] == 0) {
                    $fillname = $_SESSION['userid'];
                    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $fillpath = "../uploads/logo/" . $fillname . '.' . $ext;
                    if ($_FILES['foto']['error'] == 0) {
                        $foto = "../uploads/logo/" . $fillname . '.' . $ext;
                    }

                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                        //xxx
                    }
                }
            }
            $runsql = mysqli_query($conn, "INSERT INTO settings 
                ( website_name, website_address, phone_number, email, `address`, logo , zipcode , about, created_id) 
                VALUES
                ('$website_name', '$website_address', '$phone_number', '$email', '$address', '$foto', '$zipcode','$about','" . $_SESSION['userid'] . "')                                    
                    ");
        }
    }


    if ($_POST['tipe'] == 'services') {
        $tid = $_POST['tid'];
        $name = $_POST['name'];
        $description = mysqli_escape_string($conn, $_POST['description']);
        $status = $_POST['status'];
        $mode = $_POST['mode'];
        if ($mode == 'Edit') {
            $getdata = mysqli_query($conn, "SELECT * from services where id='$tid' ");
            $rows = mysqli_fetch_assoc($getdata);
        }
        $statusfoto = 0;
        if (isset($_POST['foto'])) {
            $foto = '';
            if ($mode == 'Edit') {
                $foto = $rows['foto'];
            }
        } else {
            if ($_FILES['foto']['error'] == 0) {
                $fillname = rand() . '_' . $_SESSION['userid'];
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $fillpath = "../uploads/sevices-foto/" . $fillname . '.' . $ext;
                if ($_FILES['foto']['error'] == 0) {
                    $foto = "../uploads/sevices-foto/" . $fillname . '.' . $ext;
                }
                $statusfoto = 1;
            } else {
                $foto = '';
                if ($mode == 'Edit') {
                    $foto = $rows['foto'];
                }
            }
        }

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO services 
                                                        (`name`,`description`,`status`,foto,created_id) 
                                                        VALUES
                                                        ('$name','$description','$status','$foto','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE services 
                                    SET 
                                    name = '" . $name . "',
                                    description = '" . $description . "',
                                    status = '" . $status . "', 
                                    foto = '" . $foto . "' 
                                    where id='$tid'  
                                    ");
        }

        if ($runsql) {
            if ($statusfoto == 1) {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                    //xxx
                }
            }
        }
    }

    if ($_POST['tipe'] == 'comments') {

        $mode = $_POST['mode'];
        if ($mode == 'Add') {
            $name = mysqli_escape_string($conn, $_POST['name']);
            $blogs_id =   base64_decode($_POST['blogs_id']);
            $message = mysqli_escape_string($conn, $_POST['message']);
            $runsql = mysqli_query($conn, "INSERT INTO comments 
                                    (`name`,`blogs_id`,`message`) 
                                    VALUES
                                    ('$name','$blogs_id','$message')                                    
                                ");
        }
    }

    if ($_POST['tipe'] == 'contacts') {

        $mode = $_POST['mode'];
        if ($mode == 'Add') {
            $name = mysqli_escape_string($conn, $_POST['name']);
            $email = mysqli_escape_string($conn, $_POST['email']);
            $subject = mysqli_escape_string($conn, $_POST['subject']);
            $message = mysqli_escape_string($conn, $_POST['message']);
            $runsql = mysqli_query($conn, "INSERT INTO contacts 
                                    (`name`,`email`,`subject`,`message`) 
                                    VALUES
                                    ('$name','$email','$subject','$message')                                    
                                ");
        }

        if ($mode == 'sendemail') {

            $email = $_POST['email'];
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            //$message = $_POST['message'];

            $message = '
            
            <!doctype html>
                <html>
                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Notification - LoremIpsum</title>
                    <style>body,table td{font-family:sans-serif;font-size:16px}.body,body{background-color:#f6f6f6}.btn,.btn a,.content,.wrapper{box-sizing:border-box}.btn a,h1{text-transform:capitalize}.align-center,.btn table td,.footer,h1{text-align:center}.clear,.footer{clear:both}.first,.mt0{margin-top:0}.last,.mb0{margin-bottom:0}img{border:none;-ms-interpolation-mode:bicubic;max-width:100%}body{-webkit-font-smoothing:antialiased;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.container,.content{display:block;max-width:580px;padding:10px}table{border-collapse:separate;mso-table-lspace:0;mso-table-rspace:0;width:100%}table td{vertical-align:top}.body{width:100%}.btn a,.btn table td{background-color:#fff}.container{Margin:0 auto!important;width:580px}.btn,.footer,.main{width:100%}.content{Margin:0 auto}.main{background:#fff;border-radius:3px}.wrapper{padding:20px}.content-block{padding-bottom:10px;padding-top:10px}.footer{Margin-top:10px}h1,h2,h3,h4,ol,p,ul{font-family:sans-serif;margin:0}.footer a,.footer p,.footer span,.footer td{color:#999;font-size:12px;text-align:center}h1,h2,h3,h4{color:#000;font-weight:400;line-height:1.4;Margin-bottom:30px}.btn a,a{color:#3498db}h1{font-size:35px;font-weight:300}.btn a,ol,p,ul{font-size:14px}ol,p,ul{font-weight:400;Margin-bottom:15px}ol li,p li,ul li{list-style-position:inside;margin-left:5px}a{text-decoration:underline}.btn a,.powered-by a{text-decoration:none}.btn>tbody>tr>td{padding-bottom:15px}.btn table{width:auto}.btn table td{border-radius:5px}.btn a{border:1px solid #3498db;border-radius:5px;cursor:pointer;display:inline-block;font-weight:700;margin:0;padding:12px 25px}.btn-primary a,.btn-primary table td{background-color:#3498db}.btn-primary a{border-color:#3498db;color:#fff}.align-right{text-align:right}.align-left{text-align:left}.preheader{color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}hr{border:0;border-bottom:1px solid #f6f6f6;Margin:20px 0}@media only screen and (max-width:620px){table[class=body] h1{font-size:28px!important;margin-bottom:10px!important}table[class=body] a,table[class=body] ol,table[class=body] p,table[class=body] span,table[class=body] td,table[class=body] ul{font-size:16px!important}table[class=body] .article,table[class=body] .wrapper{padding:10px!important}table[class=body] .content{padding:0!important}table[class=body] .container{padding:0!important;width:100%!important}table[class=body] .main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}table[class=body] .btn a,table[class=body] .btn table{width:100%!important}table[class=body] .img-responsive{height:auto!important;max-width:100%!important;width:auto!important}}@media all{.btn-primary a:hover,.btn-primary table td:hover{background-color:#34495e!important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}.btn-primary a:hover{border-color:#34495e!important}}
                        .im {
                color: #000000 !important;
                } 
                    </style>
                </head>
                <body>
                    <table border="0" cellpadding="0" cellspacing="0" class="body">
                    <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                        <div class="content">
                            <span class="preheader">LoremIpsum.com</span>
                            <p>
                            <img src="https://res.cloudinary.com/vistaprint/images/c_scale,w_448,h_448,dpr_2/f_auto,q_auto/v1705580343/ideas-and-advice-prod/en-us/adidas/adidas.png?_i=AA" style="width: 150px; display: block; margin: 0 auto;">
                            <hr style="border-width: 1px;color:gray;line-height:1; width:100%; margin: 5px;">
                            <div style="width: 100%; color:#000 !important;background: #FAFAFA; padding: 10px; ">
                                Dear ' . $name . ', <br>
                                <br>
                                    ' . $_POST['message'] . '
                                <br>
                                <br>
                                Hope to see you there! <br>
                            </div>
                            </p>
                            <p>
                            <div style="background: #FAFAFA; width: 100%; height: 30px; padding-top: 15px;">
                            <p style="color:#999;line-height:1.5; text-align: center;">  LoremIpsum.com
                            </p>
                            </div>
                            </p>
                        </div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </table>
                </body>
                </html>
            ';

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset: utf8\r\n";
            //Kirim
            if (mail($email, $subject, $message, $headers)) {
                $runsql = true;
            } else {
                $runsql = false;
            }
        }
    }

    if ($_POST['tipe'] == 'testimonies') {
        $tid = $_POST['tid']; //table id
        $name = $_POST['name'];
        $position = $_POST['position'];
        $message = mysqli_escape_string($conn, $_POST['message']);
        $status = $_POST['status'];
        $mode = $_POST['mode'];

        if ($mode == 'Edit') {
            $getdata = mysqli_query($conn, "SELECT * from blogs where id='$tid' ");
            $rows = mysqli_fetch_assoc($getdata);
        }
        $statusfoto = 0;
        if (isset($_POST['foto'])) {
            $foto = '';
            if ($mode == 'Edit') {
                $foto = $rows['foto'];
            }
        } else {
            if ($_FILES['foto']['error'] == 0) {
                $fillname = rand() . '_' . $_SESSION['userid'];
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $fillpath = "../uploads/testimonies-foto/" . $fillname . '.' . $ext;
                if ($_FILES['foto']['error'] == 0) {
                    $foto = "../uploads/testimonies-foto/" . $fillname . '.' . $ext;
                }
                $statusfoto = 1;
            } else {
                $foto = '';
                if ($mode == 'Edit') {
                    $foto = $rows['foto'];
                }
            }
        }

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO testimonies 
                                                        (`name`, `position`, `message`, `foto`, `status`, `created_id`)
                                                        VALUES
                                                        ('$name','$position','$message','$foto', '$status','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE testimonies 
                                    SET 
                                    name = '" . $name . "',
                                    position = '" . $position . "',
                                    message = '" . $message . "', 
                                    foto = '" . $foto . "', 
                                    status = '" . $status . "'
                                    where id='$tid'  
                                    ");
        }

        if ($statusfoto == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                //xxx
            }
        }
    }

    if ($_POST['tipe'] == 'skills') {
        $tid = $_POST['tid']; //table id 
        $name = mysqli_escape_string($conn, $_POST['name']);
        $percentage = $_POST['percentage'];
        $status = $_POST['status'];
        $mode = $_POST['mode'];

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO skills 
                                                        (`name`, `percentage`, `status`, `created_id`)
                                                        VALUES
                                                        ('$name','$percentage','$status','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE skills 
                                    SET 
                                    name = '" . $name . "',
                                    percentage = '" . $percentage . "', 
                                    status = '" . $status . "'
                                    where id='$tid'  
                                    ");
        }
    }

    if ($_POST['tipe'] == 'categories') {
        $tid = $_POST['tid']; //table id 
        $name = mysqli_escape_string($conn, $_POST['name']);
        $status = $_POST['status'];
        $mode = $_POST['mode'];

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO categories 
                                                        (`name`,  `status`, `created_id`)
                                                        VALUES
                                                        ('$name', '$status','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE categories 
                                    SET 
                                    name = '" . $name . "', 
                                    status = '" . $status . "'
                                    where id='$tid'  
                                    ");
        }
    }


    if ($_POST['tipe'] == 'blogs') {
        $tid = $_POST['tid'];
        // $categories_id = $_POST['categories_id']; 
        $title =  mysqli_escape_string($conn, $_POST['title']);
        $subtitle =  mysqli_escape_string($conn, $_POST['subtitle']);
        $description =  mysqli_escape_string($conn, $_POST['description']);
        $writer = $_POST['writer'];
        $tags = $_POST['tags'];
        $status = $_POST['status'];
        $mode = $_POST['mode'];
        if ($mode == 'Edit') {
            $getdata = mysqli_query($conn, "SELECT * from blogs where id='$tid' ");
            $rows = mysqli_fetch_assoc($getdata);
        }
        $statusfoto = 0;
        if (isset($_POST['foto'])) {
            $foto = '';
            if ($mode == 'Edit') {
                $foto = $rows['foto'];
            }
        } else {
            if ($_FILES['foto']['error'] == 0) {
                $fillname = rand() . '_' . $_SESSION['userid'];
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $fillpath = "../uploads/blogs-foto/" . $fillname . '.' . $ext;
                if ($_FILES['foto']['error'] == 0) {
                    $foto = "../uploads/blogs-foto/" . $fillname . '.' . $ext;
                }
                $statusfoto = 1;
            } else {
                $foto = '';
                if ($mode == 'Edit') {
                    $foto = $rows['foto'];
                }
            }
        }

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO blogs 
                                                        ( `title`,subtitle, `description`, `writer`, `foto`, `tags`, `status`, `created_id`)
                                                        VALUES
                                                        ( '$title','$subtitle','$description','$writer','$foto','$tags','$status','" . $_SESSION['userid'] . "')                                    
                                    ");
            $last_id = $conn->insert_id;
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE blogs 
                                    SET  
                                    title = '" . $title . "',
                                    subtitle = '" . $subtitle . "',
                                    description = '" . $description . "',
                                    writer = '" . $writer . "', 
                                    tags = '" . $tags . "',
                                    status = '" . $status . "', 
                                    foto = '" . $foto . "' 
                                    where id='$tid'  
                                    ");
            $last_id = $tid;
        }





        if ($runsql) {

            if (isset($_POST['categories']) && $_POST['categories'] != '') {
                $res_cat = explode(",", $_POST['categories']);
                $getdata = mysqli_query($conn, "SELECT * from blogs_categories where blogs_id='$last_id' ");
                $cekdata = mysqli_num_rows($getdata);
                if ($cekdata  > 0) {
                    $deletedata = mysqli_query($conn, "DELETE from blogs_categories where blogs_id='$last_id' ");
                }
                foreach ($res_cat as $rowcat) {
                    $insert_detail_categories = mysqli_query($conn, "INSERT INTO blogs_categories 
                        (`categories_id`, `blogs_id`)
                        VALUES
                        ('" . $rowcat . "','" . $last_id . "')                                    
                    ");
                }
            }

            if ($statusfoto == 1) {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                    //xxx
                }
            }
        }
    }


    if ($_POST['tipe'] == 'projects') {
        $tid = $_POST['tid'];
        $categories = $_POST['categories'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $mode = $_POST['mode'];
        if ($mode == 'Edit') {
            $getdata = mysqli_query($conn, "SELECT * from projects where id='$tid' ");
            $rows = mysqli_fetch_assoc($getdata);
        }
        $statusfoto = 0;
        if (isset($_POST['foto'])) {
            $foto = '';
            if ($mode == 'Edit') {
                $foto = $rows['foto'];
            }
        } else {
            if ($_FILES['foto']['error'] == 0) {
                $fillname = rand() . '_' . $_SESSION['userid'];
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $fillpath = "../uploads/projects-foto/" . $fillname . '.' . $ext;
                if ($_FILES['foto']['error'] == 0) {
                    $foto = "../uploads/projects-foto/" . $fillname . '.' . $ext;
                }
                $statusfoto = 1;
            } else {
                $foto = '';
                if ($mode == 'Edit') {
                    $foto = $rows['foto'];
                }
            }
        }

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO projects 
                                                        (`categories`, `name`, `foto`, `status`, `created_id`)
                                                        VALUES
                                                        ('$categories','$name','$foto','$status','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE projects 
                                    SET 
                                    categories = '" . $categories . "',
                                    name = '" . $name . "',  
                                    status = '" . $status . "', 
                                    foto = '" . $foto . "' 
                                    where id='$tid'  
                                    ");
        }

        if ($runsql) {
            if ($statusfoto == 1) {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                    //xxx
                }
            }
        }
    }


    if ($_POST['tipe'] == 'slidings') {
        $tid = $_POST['tid'];
        $subheading = mysqli_escape_string($conn, $_POST['subheading']);
        $heading1 = mysqli_escape_string($conn, $_POST['heading1']);
        $heading2 = mysqli_escape_string($conn, $_POST['heading2']);
        $status = $_POST['status'];
        $mode = $_POST['mode'];
        if ($mode == 'Edit') {
            $getdata = mysqli_query($conn, "SELECT * from slidings where id='$tid' ");
            $rows = mysqli_fetch_assoc($getdata);
        }
        $statusfoto = 0;
        if (isset($_POST['foto'])) {
            $foto = '';
            if ($mode == 'Edit') {
                $foto = $rows['foto'];
            }
        } else {
            if ($_FILES['foto']['error'] == 0) {
                $fillname = rand() . '_' . $_SESSION['userid'];
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $fillpath = "../uploads/slidings-foto/" . $fillname . '.' . $ext;
                if ($_FILES['foto']['error'] == 0) {
                    $foto = "../uploads/slidings-foto/" . $fillname . '.' . $ext;
                }
                $statusfoto = 1;
            } else {
                $foto = '';
                if ($mode == 'Edit') {
                    $foto = $rows['foto'];
                }
            }
        }

        if ($mode == 'Add') {
            $runsql = mysqli_query($conn, "INSERT INTO slidings 
                                                        (`subheading`,heading1,heading2,`status`,foto,created_id) 
                                                        VALUES
                                                        ('$subheading','$heading1','$heading2','$status','$foto','" . $_SESSION['userid'] . "')                                    
                                    ");
        }
        if ($mode == 'Edit') {
            $runsql = mysqli_query($conn, "
                                    UPDATE slidings 
                                    SET 
                                    subheading = '" . $subheading . "',
                                    heading1 = '" . $heading1 . "',
                                    heading2 = '" . $heading2 . "',
                                    status = '" . $status . "', 
                                    foto = '" . $foto . "' 
                                    where id='$tid'  
                                    ");
        }

        if ($runsql) {
            if ($statusfoto == 1) {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $fillpath)) {
                    //xxx
                }
            }
        }
    }


    if ($runsql) {
        $json['status'] = 1;
    } else {
        $json['status'] = 0;
    }
    echo json_encode($json);
}
