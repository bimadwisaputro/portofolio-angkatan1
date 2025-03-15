<?php
session_start();
require_once '../php/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$id = base64_decode($_GET['tid']);
$getdata = mysqli_query($conn, "SELECT * from resumes where id='$id' ");
$numdata = mysqli_num_rows($getdata);
$rows = mysqli_fetch_assoc($getdata);

$content = '
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
                        <td class="container" style="text-align:center;">
                        <div class="content">
                            <span class="preheader"></span>
                            <p>
                            <img src="../uploads/profile/noprofile.png" style="width: 150px; display: block; margin: auto;">
                            <hr style="border-width: 1px;color:gray;line-height:1; width:100%; margin: 5px;">
                            <div style="width: 100%; color:#000 !important;background: #FAFAFA; padding: 10px; ">
                                 <h1>' . $rows['title'] . '</h1>
                                 <h2>' . $rows['subtitle'] . '</h2>
                                 <h4>' . $rows['from_year'] . ' - ' . $rows['to_year'] . '</h4>
                                 <br>
                                 <br>
                                 <h3>' . $rows['description'] . '</h3>
                                 <br>
                                 <br>
                            </div>
                            </p>
                            <p>
                            <div style="background: #FAFAFA; width: 100%; height: 30px; padding-top: 15px;">
                            <p style="color:#999;line-height:1.5; text-align: center;">   
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

$mpdf->WriteHTML($content);
$mpdf->Output();
