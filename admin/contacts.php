<?php
include('include/header.php');
include('include/sidebar.php');
$getdata = mysqli_query($conn, "SELECT * from contacts ");
$numdata = mysqli_num_rows($getdata);

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Contacts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Contacts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto effectup">
                    <div class="card-body pb-0">
                        <?php if (!isset($_GET['form'])) { ?>
                            <table class="table table-striped table-bordered datatable mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Messages</th>
                                        <th>Created Date</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($numdata > 0) {
                                        $i = 1;
                                    ?>
                                        <?php while ($rows = mysqli_fetch_assoc($getdata)) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $rows['name']; ?></td>
                                                <td><?= $rows['email']; ?></td>
                                                <td><?= $rows['subject']; ?></td>
                                                <td><?= $rows['message']; ?></td>
                                                <td><?= $rows['created_date']; ?></td>
                                                <td class="text-center" style="width:20%;">
                                                    <a href="contacts.php?form=edit&tid=<?= base64_encode($rows['id']); ?>" class="btn btn-success">Balas Pesan</a>
                                                    <a href="#" id="delete_<?= $rows['id']; ?>" tid="<?= $rows['id']; ?>" tipe="contacts" class="btn btn-danger">Hapus Pesan</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="7">No Data Entry</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                        <?php } else { ?>
                            <?php
                            if (isset($_GET['tid'])) {
                                $label = 'Edit';
                                $labelbutton = 'Repply Message';
                                $tid = base64_decode($_GET['tid']);
                                $getdata = mysqli_query($conn, "SELECT * from contacts where id = '$tid'");
                                $rows = mysqli_fetch_assoc($getdata);
                                $name = $rows['name'];
                                $email = $rows['email'];
                                $subject = $rows['subject'];
                                $message = $rows['message'];
                                $created_date = $rows['created_date'];
                            } else {
                                $label = 'Add';
                                $labelbutton = 'Save';
                                $tid = 0;
                                $name = '';
                                $email = '';
                                $subject = '';
                                $message = '';
                                $created_date = '';
                            }
                            ?>
                            <input type="hidden" id="tid" name="tid" class="contactsform" value="<?= $tid; ?>">
                            <h5 class="card-title"><?= $label; ?> Form</h5>
                            <div class="row g-3">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body pb-0">
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>" disabled readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $email; ?>" disabled readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Subjects</label>
                                                    <input type="text" class="form-control" value="<?= $subject; ?>" disabled readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Created Date</label>
                                                    <input type="text" class="form-control" value="<?= $created_date; ?>" disabled readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Messages</label>
                                                    <textarea class="form-control" rows="5" disabled readonly><?= $message; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control contactsform" name="subjectbalasan" id="subjectbalasan" placeholder="Masukan Subject Balasan" required>
                                        <label for="subjectbalasan">Subject</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control contactsform" rows="5" name="pesanbalasan" id="pesanbalasan" placeholder="Masukan Pesan Balasan" required></textarea>
                                        <label for="pesanbalasan">Pesan</label>
                                    </div>
                                </div>

                                <div class="text-center mb-3 mt-4">
                                    <a href="contacts.php" class="btn btn-danger">Cancel</a>
                                    <span name="simpan" id="balaspesan" class="btn btn-primary" mode="<?= $label; ?>"><?= $labelbutton; ?></span>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End floating Labels Form -->
                    </div>
                </div>
            </div><!-- End Top Selling -->


        </div>
    </section>

</main><!-- End #main -->

<?php include('include/footer.php'); ?>