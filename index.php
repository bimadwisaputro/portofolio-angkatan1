<?php
session_start();
include('php/koneksi.php');
$gettable = mysqli_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'portofolio' and table_name not in ('profile','profile_skill','users','users_level') ");
$rowtablearr = mysqli_fetch_all($gettable, MYSQLI_ASSOC);
// var_dump($rowtablearr);
// die();
foreach ($rowtablearr as $rowtable) {
    // var_dump($rowtable);
    // die();
    $query_condition = "";
    if ($rowtable['table_name'] == 'projects') {
        $query_condition = "order by id asc limit 6";
    }
    $get['' . $rowtable['table_name'] . ''] = mysqli_query($conn, "SELECT * from " . $rowtable['table_name'] . " WHERE status='1' " . $query_condition . "");
    $num['' . $rowtable['table_name'] . ''] = mysqli_num_rows($get['' . $rowtable['table_name'] . '']);
    $rows['' . $rowtable['table_name'] . ''] = mysqli_fetch_all($get['' . $rowtable['table_name'] . ''], MYSQLI_ASSOC);
}
// var_dump($rows['services']);
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portofolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/clark-master/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/clark-master/css/animate.css">

    <link rel="stylesheet" href="assets/clark-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/clark-master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/clark-master/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/clark-master/css/aos.css">

    <link rel="stylesheet" href="assets/clark-master/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/clark-master/css/flaticon.css">
    <link rel="stylesheet" href="assets/clark-master/css/icomoon.css">
    <link rel="stylesheet" href="assets/clark-master/css/style.css">
    <link href="assets/iziToast/dist/css/iziToast.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Clark</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    <li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
                    <li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
                    <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
                    <li class="nav-item"><a href="#blog-section" class="nav-link"><span>My Blog</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">

            <?php
            foreach ($rows['slidings'] as $rowsliding) {
            ?>
                <div class="slider-item ">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                            <div class="one-third js-fullheight order-md-last img" style="background-image:url(<?= str_replace('../', '', $rowsliding['foto']); ?>);">
                                <div class="overlay"></div>
                            </div>
                            <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading"><?= $rowsliding['subheading']; ?></span>
                                    <h1 class="mb-4 mt-3"><?= $rowsliding['heading1']; ?> </h1>
                                    <h2 class="mb-4">
                                        <?php if ($rowsliding['heading2'] != '') { ?>
                                            <h2 class="mb-4"><?= $rowsliding['heading2']; ?> </h2>
                                        <?php } ?>
                                        <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img" style="background-image:url(assets/clark-master/images/bg_2.png);">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Hello!</span>
                                <h1 class="mb-4 mt-3">I'm a <span>web designer</span> based in London</h1>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?= str_replace('../', '', $rows['settings'][0]['logo']); ?>);">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h1 class="big">About</h1>
                            <h2 class="mb-4">About Me</h2>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                            <ul class="about-info mt-4 px-md-0 px-2">
                                <li class="d-flex"><span>Name:</span> <span><?= $rows['settings'][0]['website_name']; ?></span></li>
                                <li class="d-flex"><span>Date of birth:</span> <span><?= date_format(date_create($rows['settings'][0]['birthday']), ' F d, Y'); ?></span></li>
                                <li class="d-flex"><span>Address:</span> <span><?= $rows['settings'][0]['address']; ?></span></li>
                                <li class="d-flex"><span>Zip code:</span> <span><?= $rows['settings'][0]['zipcode']; ?></span></li>
                                <li class="d-flex"><span>Email:</span> <span><?= $rows['settings'][0]['email']; ?></span></li>
                                <li class="d-flex"><span>Phone: </span> <span><?= $rows['settings'][0]['phone_number']; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text">
                            <p class="mb-4">
                                <span class="number" data-number="120">0</span>
                                <span>Project complete</span>
                            </p>
                            <p><a href="print-pdf.php" class="btn btn-primary py-3 px-3">Download CV</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Resume</h1>
                    <h2 class="mb-4">Resume</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($rows['resumes'] as $rowresumes) {
                ?>
                    <div class="col-md-6">
                        <div class="resume-wrap ftco-animate">
                            <span class="date"><?= $rowresumes['from_year']; ?>-<?= $rowresumes['to_year']; ?></span>
                            <h2><?= $rowresumes['title']; ?></h2>
                            <span class="position"><?= $rowresumes['subtitle']; ?></span>
                            <p class="mt-4"><?= $rowresumes['description']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center ftco-animate">
                    <p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" id="services-section">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Services</h1>
                    <h2 class="mb-4">Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-analysis"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Web Design</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-flasks"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Phtography</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-ideas"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Web Developer</h3>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-analysis"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">App Developing</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-flasks"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Branding</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="#" class="services-1">
                        <span class="icon">
                            <i class="flaticon-ideas"></i>
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Product Strategy</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section" id="skills-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Skills</h1>
                    <h2 class="mb-4">My Skills</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($rows['skills'] as $rowskills) {
                ?>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3><?= $rowskills['name']; ?></h3>
                            <div class="progress">
                                <div class="progress-bar color-1" role="progressbar" aria-valuenow="<?= $rowskills['percentage']; ?>"
                                    aria-valuemin="0" aria-valuemax="<?= $rowskills['percentage']; ?>" style="width:<?= $rowskills['percentage']; ?>%">
                                    <span><?= $rowskills['percentage']; ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>


    <section class="ftco-section ftco-project" id="projects-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Projects</h1>
                    <h2 class="mb-4">Our Projects</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <?php
                $n  = 1;
                $m = 0;
                $an = 1;
                $nl = 0;
                foreach ($rows['projects'] as $rowpro) {

                    if ($n % 2 == 0) {
                        $nl = $m % 2;
                    } else {
                        $nl = $an % 2;
                    }

                    if ($nl == 0) {
                        $col = "8";
                    } else {
                        $col = "4";
                    }
                ?>

                    <div class="col-md-<?= $col; ?>">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rowpro['foto']); ?>);">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#"><?= $rowpro['name']; ?></a></h3>
                                <span><?= $rowpro['categories']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                    if ($n % 2 == 0) {
                        $m++;
                    } else {
                        $an++;
                    }
                    $n++;
                } ?>

                <!-- 
                        <div class="col-md-4">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][3]['foto']); ?>);">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#"><?= $rows['projects'][3]['name']; ?></a></h3>
                            <span><?= $rows['projects'][3]['categories']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][4]['foto']); ?>);">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#"><?= $rows['projects'][4]['name']; ?></a></h3>
                            <span><?= $rows['projects'][4]['categories']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][0]['foto']); ?>);">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#"><?= $rows['projects'][0]['name']; ?></a></h3>
                            <span><?= $rows['projects'][0]['categories']; ?></span>
                        </div>
                    </div>

                    <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][5]['foto']); ?>);">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#"><?= $rows['projects'][5]['name']; ?></a></h3>
                            <span><?= $rows['projects'][5]['categories']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][1]['foto']); ?>);">
                                <div class="overlay"></div>
                                <div class="text text-center p-4">
                                    <h3><a href="#"><?= $rows['projects'][1]['name']; ?></a></h3>
                                    <span><?= $rows['projects'][1]['categories']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?= str_replace('../', '', $rows['projects'][2]['foto']); ?>);">
                                <div class="overlay"></div>
                                <div class="text text-center p-4">
                                    <h3><a href="#"><?= $rows['projects'][2]['name']; ?></a></h3>
                                    <span><?= $rows['projects'][2]['categories']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    -->
            </div>
        </div>
    </section>


    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Blog</h1>
                    <h2 class="mb-4">Our Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row d-flex">
                <?php
                foreach ($rows['blogs'] as $rowsblogs) {
                ?>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.php?blogs=<?= base64_encode($rowsblogs['id']); ?>" class="block-20" style="background-image: url('<?= str_replace('../', '', $rowsblogs['foto']); ?>');">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2"><?= date_format(date_create($rowsblogs['created_date']), ' F d, Y'); ?></span>
                                        <a href="#" class="mr-2"><?= $rowsblogs['writer']; ?></a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                                <h3 class="heading"><a href="single.php?blogs=<?= base64_encode($rowsblogs['id']); ?>"><?= $rowsblogs['title']; ?></a></h3>
                                <p><?= $rowsblogs['description']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="100">0</strong>
                            <span>Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Complete Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="500">0</strong>
                            <span>Cups of coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-hireme img margin-top" style="background-image: url(assets/clark-master/images/bg_1.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>I'm <span>Available</span> for freelancing</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>

            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p><?= $rows['settings'][0]['address']; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="assets/clark-master/tel://<?= $rows['settings'][0]['phone_number']; ?>"><?= $rows['settings'][0]['phone_number']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="assets/clark-master/mailto:<?= $rows['settings'][0]['email']; ?>"><?= $rows['settings'][0]['email']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#"><?= $rows['settings'][0]['website_address']; ?></a></p>
                    </div>
                </div>
            </div>

            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <div class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control contactsform" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" class="form-control contactsform" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" class="form-control contactsform" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="message" cols="30" rows="7" class="form-control contactsform" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" id="simpan_contacts" tipe="contacts" mode="Add" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </div>

                </div>

                <div class="col-md-6 d-flex">
                    <div class="img" style="background-image: url(assets/clark-master/images/about.jpg);"></div>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <!-- <script src=" https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
    <script src="assets/clark-master/js/jquery.min.js"></script>
    <script src="assets/clark-master/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/clark-master/js/popper.min.js"></script>
    <script src="assets/clark-master/js/bootstrap.min.js"></script>
    <script src="assets/clark-master/js/jquery.easing.1.3.js"></script>
    <script src="assets/clark-master/js/jquery.waypoints.min.js"></script>
    <script src="assets/clark-master/js/jquery.stellar.min.js"></script>
    <script src="assets/clark-master/js/owl.carousel.min.js"></script>
    <script src="assets/clark-master/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/clark-master/js/aos.js"></script>
    <script src="assets/clark-master/js/jquery.animateNumber.min.js"></script>
    <script src="assets/clark-master/js/scrollax.min.js"></script>

    <script src="assets/clark-master/js/main.js"></script>
    <script src="assets/iziToast/dist/js/iziToast.js"></script>
    <script src="js/custom.js"></script>
    <script>
        iziToast.settings({
            timeout: 3000, // default timeout
            resetOnHover: true,
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            onOpen: function() {
                console.log('callback abriu!');
            },
            onClose: function() {
                console.log("callback fechou!");
            }
        });
    </script>

</body>

</html>