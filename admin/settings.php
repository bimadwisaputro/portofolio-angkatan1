<?php
include('include/header.php');
include('include/sidebar.php');

$getdata = mysqli_query($conn, "SELECT * from settings ");
$numdata = mysqli_num_rows($getdata);
$rows = mysqli_fetch_assoc($getdata);

if ($numdata > 0) {
    $website_name_isi = $rows['website_name'];
    $website_address_isi = $rows['website_address'];
    $email_isi = $rows['email'];
    $phone_number_isi = $rows['phone_number'];
    $address_isi = $rows['address'];
    $birthday_isi = $rows['birthday'];
    $zipcode = $rows['zipcode'];
    if ($rows['logo'] == '' || $rows['logo'] == null) {
        $logo_isi = '';
    } else {
        $logo_isi =  '<div class="col-md-12 mt-4"> 
                        <div class="alert alert-light border-primary alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Your Logo</h4> 
                            <hr>
                            <div class="circular" style="  width: 100px; height: 100px;margin:0;">
                                <img src="' . $rows['logo'] . '" alt="logo"   class="img-thumbnail">
                            </div>
                            <div class="col-12 mt-4"> 
                                <span class="btn btn-danger" id="deletefoto" tid="1" tipe="settings" ><i class="bi bi-trash"></i> Hapus Logo </span>
                            </div>
                        </div>
                      </div>    
                    ';
    }
} else {
    $website_name_isi = '';
    $website_address_isi = '';
    $email_isi = '';
    $phone_number_isi = '';
    $address_isi = '';
    $birthday_isi = '';
    $zipcode = '';
    $logo_isi = '';
}



?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto effectup">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Setting Form</h5>

                        <!-- Floating Labels Form -->
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control settingsform" name="website_name" id="website_name" value="<?= $website_name_isi; ?>" placeholder="Website Name" required>
                                    <label for="floatingName">Website Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control settingsform" name="website_address" id="website_address" value="<?= $website_address_isi; ?>" placeholder="Website Address" required>
                                    <label for="website_address">Website Address</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control settingsform" name="zipcode" id="zipcode" value="<?= $zipcode; ?>" placeholder="Zip Code" required>
                                    <label for="zipcode">Zip Code</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="email" class="form-control settingsform" name="email" id="email" value="<?= $email_isi; ?>" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control settingsform" name="phone_number" id="phone_number" value="<?= $phone_number_isi; ?>" placeholder="Phone Number" required>
                                    <label for="phone_number">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control settingsform" name="birthday" id="birthday" value="<?= $birthday_isi; ?>" placeholder="Birthday" required>
                                    <label for="birthday">Birthday</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control settingsform" placeholder="Address" name="address" id="address" style="height: 100px;"><?= $address_isi; ?></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control mt-1" name="foto" id="foto" placeholder="Logo">
                                </div>
                                <?= $logo_isi; ?>
                            </div>

                            <div class="text-center mb-3 mt-4">
                                <button type="reset" name="reset" id="reset_setting" tipe="settings" class="btn btn-secondary">Reset</button>
                                <span name="simpan" id="simpan_setting" tipe="settings" mode="" class="btn btn-primary">Save</span>
                            </div>
                        </div>
                        <!-- End floating Labels Form -->
                    </div>
                </div>
            </div><!-- End Top Selling -->


        </div>
    </section>

</main><!-- End #main -->

<?php include('include/footer.php'); ?>