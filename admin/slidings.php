<?php

$getdata = mysqli_query($conn, "SELECT *,case status when '1' then 'Active' else 'Not Active' end as statuslabel 
                                        ,case status when '1' then 'success' else 'danger' end as statuscolor
                                            from slidings order by id desc");
$numdata = mysqli_num_rows($getdata);

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>slidings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">slidings</li>
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
                                <a class="btn btn-success mt-3 mb-3 float-right pull-right" href="<?= $links_path; ?>&form=add"><i class="bi bi-plus"></i> Add Data</a>
                            </div>
                            <table class="table table-striped table-bordered datatable mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Heading</th>
                                        <th>Heading 1</th>
                                        <th>Heading 2</th>
                                        <th>Foto</th>
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
                                                <td><?= $rows['subheading']; ?></td>
                                                <td><?= $rows['heading1']; ?></td>
                                                <td><?= $rows['heading2']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($rows['foto'] != '' || $rows['foto'] != null) { ?>
                                                        <div class="circular">
                                                            <img src="<?= $rows['foto']; ?>" alt="logo">
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-<?= $rows['statuscolor']; ?>"><?= $rows['statuslabel']; ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" id="delete_<?= $rows['id']; ?>" tid="<?= $rows['id']; ?>" tipe="slidings"><i class="bi bi-trash"></i></a>
                                                    <a href="<?= $links_path; ?>&form=edit&tid=<?= base64_encode($rows['id']); ?>"><i class="bi bi-pencil"></i></a>
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
                                $getdata = mysqli_query($conn, "SELECT * from slidings where id = '$tid'");
                                $rows = mysqli_fetch_assoc($getdata);
                                $subheading = $rows['subheading'];
                                $heading1 = $rows['heading1'];
                                $heading2 = $rows['heading2'];
                                $status = $rows['status'];
                                if ($rows['foto'] == '' || $rows['foto'] == null) {
                                    $foto = '';
                                } else {
                                    $foto =  '<div class="col-md-12 mt-4"> 
                                                    <div class="alert alert-light border-primary alert-dismissible fade show" role="alert"> 
                                                        <img src="' . $rows['foto'] . '" alt="foto"   class="img-thumbnail">
                                                        <div class="col-12 mt-4"> 
                                                            <span class="btn btn-danger" id="deletefoto" tid="' . $tid . '" tipe="slidings"  ><i class="bi bi-trash"></i> Hapus Foto </span>
                                                        </div>
                                                    </div>
                                                  </div>    
                                                ';
                                }
                            } else {
                                $label = 'Add';
                                $labelbutton = 'Save';
                                $tid = 0;
                                $subheading = '';
                                $heading1 = '';
                                $heading2 = '';
                                $foto = '';
                                $status = 1;
                            }
                            ?>
                            <input type="hidden" id="tid" name="tid" class="slidingsform" value="<?= $tid; ?>">
                            <h5 class="card-title"><?= $label; ?> Form</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control slidingsform" name="subheading" id="subheading" value="<?= $subheading; ?>" placeholder="Sub Heading" required>
                                        <label for="floatingName">Sub Heading</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control slidingsform" name="heading1" id="heading1" value="<?= $heading1; ?>" placeholder="Heading 1" required>
                                        <label for="floatingName">Heading 1</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control slidingsform" name="heading2" id="heading2" value="<?= $heading2; ?>" placeholder="Heading 2" required>
                                        <label for="floatingName">Heading 2</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="logo">Foto slidings</label>
                                        <input type="file" class="form-control mt-1" name="foto" id="foto" placeholder="Foto">
                                    </div>
                                    <?= $foto; ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select slidingsform" id="status" aria-label="Status">
                                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Non Active</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>

                                <div class="text-center mb-3 mt-4">
                                    <a href="slidings.php" class="btn btn-danger">Cancel</a>
                                    <span name="simpan" id="simpan_slidings" tipe="slidings" class="btn btn-primary" mode="<?= $label; ?>"><?= $labelbutton; ?></span>
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