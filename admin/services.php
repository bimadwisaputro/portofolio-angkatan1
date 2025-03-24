<?php

$getdata = mysqli_query($conn, "SELECT *,case status when '1' then 'Active' else 'Not Active' end as statuslabel 
                                        ,case status when '1' then 'success' else 'danger' end as statuscolor
                                            from services order by id desc");
$numdata = mysqli_num_rows($getdata);

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
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
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Description</th>
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
                                                <td><?= $rows['name']; ?></td>
                                                <td><?= $rows['description']; ?></td>
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
                                                    <a href="#" id="delete_<?= $rows['id']; ?>" tid="<?= $rows['id']; ?>" tipe="services"><i class="bi bi-trash"></i></a>
                                                    <a href="<?= $links_path; ?>&form=edit&tid=<?= base64_encode($rows['id']); ?>"><i class="bi bi-pencil"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="5">No Data Entry</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                        <?php } else { ?>
                            <?php

                            $apiKey = "YOUR_API_KEY"; // Gantilah dengan API key Flaticon Anda
                            $endpoint = "https://api.flaticon.com/v3/app/search/icons?q=technology";

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $endpoint);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                "Authorization: Bearer $apiKey",
                            ]);

                            $response = curl_exec($ch);
                            curl_close($ch);

                            $data = json_decode($response, true);

                            // Cek apakah ada hasil
                            if (!empty($data['data'])) {
                                $iconClassList = [];
                                foreach ($data['data'] as $icon) {
                                    $iconClassList[] = $icon['id']; // Simpan ID ikon sebagai class
                                }

                                // Menampilkan dalam format array PHP
                                // echo "<pre>";
                                // print_r($iconClassList);
                                // echo "</pre>";
                            } else {
                                // echo "Tidak ada ikon ditemukan.";
                            }

                            if (isset($_GET['tid'])) {
                                $label = 'Edit';
                                $labelbutton = 'Update';
                                $tid = base64_decode($_GET['tid']);
                                $getdata = mysqli_query($conn, "SELECT * from services where id = '$tid'");
                                $rows = mysqli_fetch_assoc($getdata);
                                $name = $rows['name'];
                                $description = $rows['description'];
                                $status = $rows['status'];
                                if ($rows['foto'] == '' || $rows['foto'] == null) {
                                    $foto = '';
                                } else {
                                    $foto =  '<div class="col-md-12 mt-4"> 
                                                    <div class="alert alert-light border-primary alert-dismissible fade show" role="alert"> 
                                                        <img src="' . $rows['foto'] . '" alt="foto"   class="img-thumbnail">
                                                        <div class="col-12 mt-4"> 
                                                            <span class="btn btn-danger" id="deletefoto" tid="' . $tid . '" tipe="services"  ><i class="bi bi-trash"></i> Hapus Foto </span>
                                                        </div>
                                                    </div>
                                                  </div>    
                                                ';
                                }
                            } else {
                                $label = 'Add';
                                $labelbutton = 'Save';
                                $tid = 0;
                                $name = '';
                                $description = '';
                                $foto = '';
                                $status = 1;
                            }
                            ?>
                            <input type="hidden" id="tid" name="tid" class="servicesform" value="<?= $tid; ?>">
                            <h5 class="card-title"><?= $label; ?> Form</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control servicesform" name="name" id="name" value="<?= $name; ?>" placeholder="Services Name" required>
                                        <label for="floatingName">Services Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control servicesform" placeholder="Description" name="description" id="description" style="height: 100px;"><?= $description; ?></textarea>
                                        <label for="address">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="logo">Foto Services</label>
                                        <input type="file" class="form-control mt-1" name="foto" id="foto" placeholder="Foto">
                                    </div>
                                    <?= $foto; ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select servicesform" id="status" aria-label="Status">
                                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Non Active</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>

                                <div class="text-center mb-3 mt-4">
                                    <a href="services.php" class="btn btn-danger">Cancel</a>
                                    <span name="simpan" id="simpan_services" tipe="services" class="btn btn-primary" mode="<?= $label; ?>"><?= $labelbutton; ?></span>
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