<?php
session_start();
include('php/koneksi.php');
$gettable = mysqli_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'portofolio' and table_name not in ('profile','profile_skill','users','users_level','comments') ");
$rowtablearr = mysqli_fetch_all($gettable, MYSQLI_ASSOC);
// var_dump($rowtablearr);
// die();
foreach ($rowtablearr as $rowtable) {
	// var_dump($rowtable);
	// die();
	$where = " WHERE status='1' ";
	$field_condition = " * ";
	$jointable = "";
	if ($rowtable['table_name'] == 'projects') {
		$where = " WHERE status='1' order by id desc"; //last 6 updated rows 
		$field_condition = " * ";
		$jointable = "";
	}


	if ($rowtable['table_name'] == 'blogs') {
		$where = " WHERE blogs.status='1' "; //last 6 updated rows 
		$field_condition = " blogs.*,mid(blogs.description,91,200) as descfront,ifnull(b.totalcomment,0) totalcomment ";
		$jointable = " left join (select count(id) totalcomment,blogs_id from comments group by blogs_id ) b on blogs.id=b.blogs_id ";
	}

	$get['' . $rowtable['table_name'] . ''] = mysqli_query($conn, "SELECT  " . $field_condition . " from " . $rowtable['table_name'] . " " . $jointable . "  " . $where . "");
	$num['' . $rowtable['table_name'] . ''] = mysqli_num_rows($get['' . $rowtable['table_name'] . '']);
	$rows['' . $rowtable['table_name'] . ''] = mysqli_fetch_all($get['' . $rowtable['table_name'] . ''], MYSQLI_ASSOC);
}
// var_dump($rows['services']);
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bima - Portofolio</title>
	<link rel="icon" type="image/x-icon" href="images/logos.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="assets/iziToast/dist/css/iziToast.css" rel="stylesheet">
	<style>
		.typewriter {
			font-family: sans-serif;
			color: #fff;
			display: block;
		}

		.typewriter-text {
			padding-right: 10px;
			color: #ffe509;
			border-right: solid #ffe509 7px;
			text-transform: uppercase;
			animation: cursor 1s ease-in-out infinite;
			font-weight: bold;
		}

		@keyframes cursor {
			from {
				border-color: #ffe509;
			}

			to {
				border-color: transparent;
			}
		}

		@media (max-width: 767.98px) {
			.typewriter {
				font-size: 35px;
			}
		}

		@media (min-width: 768px) {
			.typewriter {
				font-size: 60px;
			}
		}
	</style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target effectbounce"
		id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand effectbounce_logo" href="index.html"><img src="images/logo.png" style="width: 70px;"></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
				data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
					<li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">

			<?php
			if ($num['slidings'] > 0) {
				foreach ($rows['slidings'] as $rowsliding) {
			?>
					<div class="slider-item">
						<div class="overlay"></div>
						<div class="container-fluid px-md-0"
							style="background: linear-gradient(90deg, rgba(54, 69, 254, 1), rgba(34, 167, 255, 1));">
							<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
								data-scrollax-parent="true">
								<div class="one-third order-md-last img"
									style="background-image:url(<?= str_replace('../', '', $rowsliding['foto']); ?>);z-index: 9;">
								</div>
								<div class="one-forth d-flex  align-items-center ftco-animate"
									data-scrollax=" properties: { translateY: '70%' }" style="z-index: 99;">
									<div class="text">
										<span class="subheading"><?= $rowsliding['subheading']; ?></span>
										<h1 class="mb-4 mt-3"><?= $rowsliding['heading1']; ?></h1>
										<h2 class='typewriter'><?= $rowsliding['heading2']; ?>
											<span class='typewriter-text'
												data-text='["Web Developer. " , "Fullstack Developer. ","Photographer. ","Web Designer. " ]'></span>
										</h2>
										<p><a href="#" class="btn btn-primary">Hire me</a> <a href="#"
												class="btn btn-primary btn-outline-primary">Download CV</a>
										</p>

									</div>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>

		</div>

	</section>

	<section class="ftco-counter img" id="section-counter">
		<div class="container">
			<div class="row">
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 d-flex">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-suitcase"></span>
						</div>
						<div class="text">
							<strong class="number" data-number="750">0</strong>
							<span>Project Complete</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 d-flex">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-loyalty"></span>
						</div>
						<div class="text">
							<strong class="number" data-number="568">0</strong>
							<span>Happy Clients</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 d-flex">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-coffee"></span>
						</div>
						<div class="text">
							<strong class="number" data-number="478">0</strong>
							<span>Cups of coffee</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 d-flex">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-calendar"></span>
						</div>
						<div class="text">
							<strong class="number" data-number="780">0</strong>
							<span>Years experienced</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section"
		style="background: linear-gradient(90deg, rgba(54, 69, 254, 1), rgba(34, 167, 255, 1));">
		<svg xmlns="http://www.w3.org/2000/svg"
			style="background: linear-gradient(90deg, rgba(54, 69, 254, 1), rgba(34, 167, 255, 1));"
			viewBox="0 0 1440 320">
			<path fill="#fff" fill-opacity="1"
				d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
			</path>
		</svg>
		<div class="container">
			<div class="row d-flex no-gutters ftco-animate">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center"
							style="background-image:url(<?= str_replace('../', '', $rows['settings'][0]['logo']); ?>);">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5" style="background-color:white;">
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<span>My Intro</span>
								<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Me</h2>
								<p><?= $rows['settings'][0]['about']; ?></p>

								<ul class="about-info mt-4 px-md-0 px-2">
									<li class="d-flex"><span>Name</span>
										<span class='typewriter2'>:
											<span class='typewriter-text2'
												data-text='["<?= $rows['settings'][0]['name']; ?>"]' style="color:rgba(54, 69, 254, 1);"></span>
										</span>
									</li>
									<li class=" d-flex"><span>Date of birth</span> <span>: <?= date_format(date_create($rows['settings'][0]['birthday']), ' F d, Y'); ?></span>
									</li>
									<li class="d-flex"><span>Address</span> <span>: <?= $rows['settings'][0]['address']; ?></span>
									</li>
									<li class="d-flex"><span>Zip code</span> <span>: <?= $rows['settings'][0]['zipcode']; ?></span></li>
									<li class="d-flex"><span>Email</span> <span>: <?= $rows['settings'][0]['email']; ?></span></li>
									<li class="d-flex"><span>Phone </span> <span>: <?= $rows['settings'][0]['phone_number']; ?></span></li>
								</ul>
							</div>
							<div class="col-md-12">
								<div class="my-interest d-lg-flex w-100">
									<div class="interest-wrap d-flex align-items-center effectbounce">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-facebook"></span>
										</div>
										<div class="text">Facebook</div>
									</div>
									<div class="interest-wrap d-flex align-items-center effectbounce">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-instagram"></span>
										</div>
										<div class="text">Instagram</div>
									</div>
									<div class="interest-wrap d-flex align-items-center effectbounce">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-twitter"></span>
										</div>
										<div class="text">Twitter</div>
									</div>
									<div class="interest-wrap d-flex align-items-center effectbounce">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-youtube"></span>
										</div>
										<div class="text">Youtube</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg"
			style="background: linear-gradient(90deg, rgba(54, 69, 254, 1), rgba(34, 167, 255, 1));"
			viewBox="0 0 1440 320">
			<path fill="#fff" fill-opacity="1"
				d="M0,96L48,128C96,160,192,224,288,213.3C384,203,480,117,576,117.3C672,117,768,203,864,202.7C960,203,1056,117,1152,117.3C1248,117,1344,203,1392,245.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
			</path>
		</svg>
	</section>

	<section class="ftco-section bg-light" id="skills-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Skills</span>
					<h2 class="mb-4">My Skills</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row progress-circle mb-5">
				<?php
				foreach ($rows['skills'] as $rowskills) {
				?>
					<div class="col-lg-4 mb-4 ftco-animate">
						<div class="bg-white rounded-lg shadow p-4">
							<h2 class="h5 font-weight-bold text-center mb-4"><?= $rowskills['name']; ?></h2>

							<!-- Progress bar 1 -->
							<div class="progress mx-auto" data-value='<?= $rowskills['percentage']; ?>'>
								<span class="progress-left">
									<span class="progress-bar border-primary"></span>
								</span>
								<span class="progress-right">
									<span class="progress-bar border-primary"></span>
								</span>
								<div
									class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
									<div class="h2 font-weight-bold"><strong class="number" data-number="<?= $rowskills['percentage']; ?>">0</strong><sup
											class="small">%</sup></div>
								</div>
							</div>
							<!-- END -->

							<!-- Demo info -->
							<div class="row text-center mt-4">
								<div class="col-6 border-right">
									<div class="h4 font-weight-bold mb-0"><strong class="number"
											data-number="<?= $rowskills['percentage']; ?>">0</strong>%</div><span class="small text-gray">Last
										week</span>
								</div>
								<div class="col-6">
									<div class="h4 font-weight-bold mb-0"><strong class="number"
											data-number="<?= $rowskills['percentage']; ?>">0</strong>%</div><span class="small text-gray">Last
										month</span>
								</div>
							</div>
							<!-- END -->
						</div>
					</div>
				<?php
				}
				?>


			</div>
		</div>
	</section>

	<section class="ftco-section" id="services-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">I am grat at</span>
					<h2 class="mb-4">We do awesome services for our clients</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>

			<div class="row">

				<?php
				if ($num['services'] > 0) {
					foreach ($rows['services'] as $rowservices) {
				?>
						<div class="col-md-6 col-lg-3">
							<div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate" style="height:30vh;">
								<div class="icon shadow d-flex align-items-center justify-content-center"><span
										class="flaticon-web-programming"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3"><?= $rowservices['name']; ?></h3>
									<p><?= $rowservices['description']; ?></p>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<section class="ftco-hireme">
		<div class="container">
			<div class="row justify-content-between ftco-animate">
				<div class="col-md-8 col-lg-8 d-flex align-items-center">
					<div class="w-100 py-4 ftco-animate">
						<h2>Have a project on your mind.</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
							It is a paradisematic country, in which roasted parts of sentences fly.</p>
						<p class="mb-0"><a href="#" class="btn btn-white py-3 px-4 ftco-animate">Contact me</a></p>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 d-flex align-items-end">
					<img src="images/author.png" class="img-fluid" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-project" id="projects-section">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Accomplishments</span>
					<h2 class="mb-4">Our Projects</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row">
				<?php
				if ($num['projects'] > 0) {
					foreach ($rows['projects'] as $rowprojects) {
				?>
						<div class="col-md-3">
							<div class="project img shadow ftco-animate d-flex justify-content-center align-items-center"
								style="background-image: url(<?= str_replace('../', '', $rowprojects['foto']); ?>);">
								<div class="overlay"></div>
								<div class="text text-center p-4">
									<h3><a href="#"><?= $rowprojects['name']; ?></a></h3>
									<span><?= $rowprojects['categories']; ?></span>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<section class="ftco-section testimony-section bg-primary">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
					<span class="subheading">Testimonies</span>
					<h2 class="mb-4">What client says about?</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">

						<?php
						if ($num['testimonies'] > 0) {
							foreach ($rows['testimonies'] as $rowtestimonies) {
						?>
								<div class="item">
									<div class="testimony-wrap py-4" style="height:30vh;">
										<div class="text">
											<span class="fa fa-quote-left"></span>
											<p class="mb-4 pl-5"><?= $rowtestimonies['message']; ?></p>
											<div class="d-flex align-items-center">
												<div class="user-img" style="background-image: url(<?= str_replace('../', '', $rowtestimonies['foto']); ?>)"></div>
												<div class="pl-3">
													<p class="name"><?= $rowtestimonies['name']; ?></p>
													<span class="position"><?= $rowtestimonies['position']; ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section bg-light" id="blog-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Blog</span>
					<h2 class="mb-4">Our Blog</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row d-flex">

				<?php
				if ($num['blogs'] > 0) {
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
											<a href="#" class="meta-chat"><span class="icon-chat"></span> <?= $rowsblogs['totalcomment']; ?> <i class="fa fa-comment"></i> </a>
										</p>
									</div>
									<h3 class="heading"><a href="single.php?blogs=<?= base64_encode($rowsblogs['id']); ?>"><?= $rowsblogs['title']; ?></a></h3>
									<p><?= $rowsblogs['subtitle']; ?></p>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3 ftco-animate">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Contact us</span>
					<h2 class="mb-4">Have a Project?</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>

			<div class="row block-9 ftco-animate">
				<div class="col-md-8">
					<div action="#" class="bg-light p-4 p-md-5 contact-form">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" id="name" class="form-control contactsform" placeholder="Your Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" id="email" class="form-control contactsform" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" id="subject" class="form-control contactsform" placeholder="Subject">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" id="message" cols="30" rows="7" class="form-control contactsform"
										placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="button" id="simpan_contacts" tipe="contacts" mode="Add" value="Send Message" class="btn btn-primary py-3 px-5">
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-4 d-flex pl-md-5 ftco-animate">
					<div class="row">
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
								<p><span>Address:</span> <?= $rows['settings'][0]['address']; ?></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Phone:</span> <a href="tel://<?= $rows['settings'][0]['phone_number']; ?>"><?= $rows['settings'][0]['phone_number']; ?></a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Email:</span> <a href="mailto:<?= $rows['settings'][0]['email']; ?>"><?= $rows['settings'][0]['email']; ?></a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-globe"></span>
							</div>
							<div class="text">
								<p><span>Website</span> <a href="#"><?= $rows['settings'][0]['website_address']; ?></a></p>
							</div>
						</div>
					</div>
					<!-- <div id="map" class="map"></div> -->
				</div>
			</div>
			<div class="row mt-4 mb-5 ftco-animate">
				<div class="col-12">
					<!-- Map Start -->
					<div class="container-xxl pt-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
						<div class="container-xxl pt-5 px-0">
							<div class="bg-dark">
								<iframe
									src="https://maps.google.com/maps?width=600&height=400&hl=en&q=ppkd%20jakarta%20pusat&t=&z=14&ie=UTF8&iwloc=B&output=embed"
									frameborder="0" style="width: 100%; height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
									tabindex="0"></iframe>
							</div>
						</div>
					</div>
					<!-- Map End -->
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Lets talk about</h2>
						<p><?= $rows['settings'][0]['about']; ?></p>
						<p><a href="#" class="btn btn-primary">Learn more</a></p>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Links</h2>
						<ul class="list-unstyled">
							<li><a href="#home-section"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
							<li><a href="#about-section"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
							<li><a href="#projects-section"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
							<li><a href="#contact-section"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Web Design</a></li>
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Web Development</a></li>
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Business Strategy</a></li>
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Data Analysis</a></li>
							<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Graphic Design</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text"><?= $rows['settings'][0]['address']; ?></span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text"><?= $rows['settings'][0]['phone_number']; ?></span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
											class="text"><?= $rows['settings'][0]['email']; ?></span></a></li>
							</ul>
						</div>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | @bimadwisaputro
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<!-- gsap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<!-- <script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script> -->


	<script src="js/main.js"></script>
	<script src="assets/iziToast/dist/js/iziToast.js"></script>
	<script src="js/custom.js?v=<?= time(); ?>"></script>
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

	<script>
		$(document).ready(function() {

			gsap.from(".effectup", {
				y: 50,
				duration: 3,
				ease: "power3.out",
			});

			gsap.from(".effectbounce", {
				y: 50,
				duration: 3,
				ease: "bounce",
			});


			gsap.to(".effectbounce_logo", {
				rotation: 360,
				duration: 2,
				repeat: -1,
				repeatDelay: 2,
				ease: 'bounce.out'
			})


			typing(0, $('.typewriter-text').data('text'), '');
			typing(0, $('.typewriter-text2').data('text'), '2');

			function typing(index, text, label) {

				var textIndex = 1;

				var tmp = setInterval(function() {
					if (textIndex < text[index].length + 1) {
						$('.typewriter-text' + label).text(text[index].substr(0, textIndex));
						textIndex++;
					} else {
						setTimeout(function() {
							deleting(index, text, label)
						}, 2000);
						clearInterval(tmp);
					}

				}, 150);

			}

			function deleting(index, text, label) {

				var textIndex = text[index].length;

				var tmp = setInterval(function() {

					if (textIndex + 1 > 0) {
						$('.typewriter-text' + label).text(text[index].substr(0, textIndex));
						textIndex--;
					} else {
						index++;
						if (index == text.length) {
							index = 0;
						}
						typing(index, text, label);
						clearInterval(tmp);
					}

				}, 150)

			}

		});
	</script>

</body>

</html>