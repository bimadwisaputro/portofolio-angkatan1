<?php
include('include/header.php');
include('include/sidebar.php');
$getdata = mysqli_query($conn, "SELECT *,case status when '1' then 'Active' else 'Not Active' end as statuslabel 
                                        ,case status when '1' then 'success' else 'danger' end as statuscolor
                                            from resumes order by id desc ");
$numdata = mysqli_num_rows($getdata);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Resumes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Resumes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto effectup">
                    <div class="card-body pb-0">
                        <?php if (!isset($_GET['form'])) { ?>
                            <div align="right" class="mt-2">
                                <a class="btn btn-success mt-3 mb-3 float-right pull-right" href="resumes.php?form=add"><i class="bi bi-plus"></i> Add Data</a>
                            </div>
                            <table class="table table-striped table-bordered datatable mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Description</th>
                                        <th>Year</th>
                                        <th>Status</th>
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
                                                <td><?= $rows['title']; ?></td>
                                                <td><?= $rows['subtitle']; ?></td>
                                                <td><?= $rows['description']; ?></td>
                                                <td><?= $rows['from_year']; ?> - <?= $rows['to_year']; ?></td>
                                                <td class="text-center">
                                                    <span class="badge bg-<?= $rows['statuscolor']; ?>"><?= $rows['statuslabel']; ?></span>
                                                </td>
                                                <td class="text-center" style="width:10%;">
                                                    <a href="#" id="delete_<?= $rows['id']; ?>" tid="<?= $rows['id']; ?>" tipe="resumes"><i class="bi bi-trash"></i></a>
                                                    <a href="resumes.php?form=edit&tid=<?= base64_encode($rows['id']); ?>"><i class="bi bi-pencil"></i></a>
                                                    <a href="print-pdf.php?tid=<?= base64_encode($rows['id']); ?>" target="_blank" title="Download PDF"><i class="bi bi-file-pdf"></i></a>
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
                                $labelbutton = 'Update';
                                $tid = base64_decode($_GET['tid']);
                                $getdata = mysqli_query($conn, "SELECT * from resumes where id = '$tid'");
                                $rows = mysqli_fetch_assoc($getdata);
                                $title = $rows['title'];
                                $subtitle = $rows['subtitle'];
                                $description = $rows['description'];
                                $from_year = $rows['from_year'];
                                $to_year = $rows['to_year'];
                                $status = $rows['status'];
                            } else {
                                $label = 'Add';
                                $labelbutton = 'Save';
                                $tid = 0;
                                $title = '';
                                $subtitle = '';
                                $description = '';
                                $from_year = '';
                                $to_year = '';
                                $status = 1;
                            }
                            ?>
                            <input type="hidden" id="tid" name="tid" class="resumesform" value="<?= $tid; ?>">
                            <h5 class="card-title"><?= $label; ?> Form</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control resumesform" name="title" id="title" value="<?= $title; ?>" placeholder="Title" required>
                                        <label for="floatingName">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control resumesform" name="subtitle" id="subtitle" value="<?= $subtitle; ?>" placeholder="Sub Title" required>
                                        <label for="floatingName">Sub Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control resumesform" rows="10" name="description" id="description" value="<?= $description; ?>" placeholder="Description" required>
                                        <label for="floatingName">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select resumesform" id="from_year" aria-label="from_year">
                                                    <?php for ($i = date('Y'); $i >= 2000; $i--) { ?>
                                                        <option value="<?= $i; ?>" <?php if ($i == $from_year) echo 'selected'; ?>><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="from_year">From Year</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select resumesform" id="to_year" aria-label="to_year">
                                                    <?php for ($i = date('Y'); $i >= 2000; $i--) { ?>
                                                        <option value="<?= $i; ?>" <?php if ($i == $from_year) echo 'selected'; ?>><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="to_year">To Year</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select resumesform" id="status" aria-label="Status">
                                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Non Active</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>

                                <div class="text-center mb-3 mt-4">
                                    <a href="resumes.php" class="btn btn-danger">Cancel</a>
                                    <span name="simpan" id="simpan_resumes" tipe="resumes" class="btn btn-primary" mode="<?= $label; ?>"><?= $labelbutton; ?></span>
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