<?php
session_start();
include('php/koneksi.php');
$getblogs = mysqli_query($conn, "SELECT * FROM blogs WHERE id = '" . base64_decode($_GET['blogs']) . "'  ");
$rows = mysqli_fetch_all($getblogs, MYSQLI_ASSOC);
// die("SELECT a.*,b.name categoriesname FROM blogs_categories a left join categories b on a.categories_id=b.id where a.blogs_id='" . base64_decode($_GET['blogs']) . "' ");
$getcat = mysqli_query($conn, "SELECT a.*,b.name categoriesname FROM blogs_categories a left join categories b on a.categories_id=b.id where a.blogs_id='" . base64_decode($_GET['blogs']) . "' ");
$numdatacheck = mysqli_num_rows($getcat);
$rowscat = mysqli_fetch_all($getcat, MYSQLI_ASSOC);


$rowtablearr = array("settings", "blogs", "comments");
foreach ($rowtablearr as $rowtable) {
  $where = " WHERE status='1' ";
  $field_condition = " * ";
  $jointable = "";
  if ($rowtable == 'comments') {
    $where = " WHERE blogs_id='" . base64_decode($_GET['blogs']) . "'"; //last 6 updated rows 
    $field_condition = " * ";
    $jointable = "";
  }
  if ($rowtable == 'blogs') {
    $where = " WHERE blogs.status='1' "; //last 6 updated rows 
    $field_condition = " blogs.*,mid(blogs.description,91,200) as descfront,ifnull(b.totalcomment,0) totalcomment ";
    $jointable = " left join (select count(id) totalcomment,blogs_id from comments group by blogs_id ) b on blogs.id=b.blogs_id ";
  }

  $get['' . $rowtable . ''] = mysqli_query($conn, "SELECT  " . $field_condition . " from " . $rowtable . " " . $jointable . "  " . $where . "");
  $num['' . $rowtable . ''] = mysqli_num_rows($get['' . $rowtable . '']);
  $rows['' . $rowtable . ''] = mysqli_fetch_all($get['' . $rowtable . ''], MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Details - Portofolio Blogs</title>
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
          <li class="nav-item"><a href="index.php#home-section" class="nav-link"><span>Home</span></a></li>
          <li class="nav-item"><a href="index.php#about-section" class="nav-link"><span>About</span></a></li>
          <li class="nav-item"><a href="index.php#skills-section" class="nav-link"><span>Skills</span></a></li>
          <li class="nav-item"><a href="index.php#services-section" class="nav-link"><span>Services</span></a></li>
          <li class="nav-item"><a href="index.php#projects-section" class="nav-link"><span>Projects</span></a></li>
          <li class="nav-item"><a href="index.php#blog-section" class="nav-link"><span>Blog</span></a></li>
          <li class="nav-item"><a href="index.php#contact-section" class="nav-link"><span>Contact</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-wrap hero-wrap-2" style="background: linear-gradient(90deg, rgba(54, 69, 254, 1), rgba(34, 167, 255, 1));" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog Detail <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread"><?= $rows[0]['title']; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <?= $rows[0]['description']; ?>
          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              <?php $res =  explode(',', $rows[0]['tags']);
              foreach ($res as $labels) {
              ?>
                <a href="#" class="tag-cloud-link"><?= $labels; ?></a>
              <?php
              }
              ?>
            </div>
          </div>



          <div class="pt-5 mt-5">
            <h4 class="mb-5 font-weight-bold"><?= $num['comments']; ?> Comments</h4>
            <ul class="comment-list">
              <?php
              if ($num['comments'] > 0) {
                foreach ($rows['comments'] as $rowscomments) {
              ?>
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="uploads/profile/noprofile.png" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3><?= $rowscomments['name']; ?></h3>
                      <div class="meta"><?= date_format(date_create($rowscomments['created_date']), ' F d, Y at H:i'); ?> at 2:21pm</div>
                      <p><?= $rowscomments['message']; ?></p>
                      <!-- <p><a href="#" class="reply">Reply</a></p> -->
                    </div>
                  </li>
              <?php
                }
              }
              ?>
            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <div class="p-5 bg-light">
                <input type="hidden" class="form-control commentsform" value="<?= $_GET['blogs']; ?>" id="blogs_id">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" name="name" class="form-control commentsform" id="name">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control commentsform"></textarea>
                </div>
                <div class="form-group">
                  <input type="button" id="simpan_comments" tipe="comments" mode="Add" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

              </div>
            </div>
          </div>

        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <div class="search-form">
              <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </div>
          </div>
          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Categories</h3>
            <ul class="categories">
              <?php if ($numdatacheck > 0) { ?>
                <?php foreach ($rowscat as $rc) { ?>
                  <li><a href="#"><?= $rc['categoriesname']; ?> <span>(<?= $rc['id']; ?>)</span></a></li>
                <?php } ?>
              <?php } else { ?>
                <li><a href="#">No Categories Choosen</a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Recent Blog</h3>
            <?php
            if ($num['blogs'] > 0) {
              foreach ($rows['blogs'] as $rowsblogs) {
            ?>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(<?= str_replace('../', '', $rowsblogs['foto']); ?>);"></a>
                  <div class="text">
                    <h3 class="heading"><a href="single.php?blogs=<?= base64_encode($rowsblogs['id']); ?>">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    <div class="meta">
                      <div><a href="#"><span class="icon-calendar"></span> <?= date_format(date_create($rowsblogs['created_date']), ' F d, Y'); ?></a></div>
                      <div><a href="#"><span class="icon-person"></span> <?= $rowsblogs['writer']; ?></a></div>
                      <div><a href="#"><span class="icon-chat"></span> <?= $rowsblogs['totalcomment']; ?></a></div>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Tag Cloud</h3>
            <div class="tagcloud">
              <?php $res =  explode(',', $rows[0]['tags']);
              foreach ($res as $labels) {
              ?>
                <a href="#" class="tag-cloud-link"><?= $labels; ?></a>
              <?php
              }
              ?>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Paragraph</h3>
            <p><?= $rows[0]['subtitle']; ?></p>
          </div>
        </div>

      </div>
    </div>
  </section> <!-- .section -->


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
              <li><a href="index.php#home-section"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
              <li><a href="index.php#about-section"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
              <li><a href="index.php#projects-section"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
              <li><a href="index.php#contact-section"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Web Design</a></li>
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Web Development</a></li>
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Business Strategy</a></li>
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Data Analysis</a></li>
              <li><a href="index.php#services-section"><span class="fa fa-chevron-right mr-2"></span>Graphic Design</a></li>
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
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
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
    });
  </script>

</body>

</html>