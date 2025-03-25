<?php

$getdata = mysqli_query($conn, "SELECT  a.* ,case a.status when '1' then 'Active' else 'Not Active' end as statuslabel 
                                        ,case a.status when '1' then 'success' else 'danger' end as statuscolor
                                         from blogs a  order by a.id desc ");
$numdata = mysqli_num_rows($getdata);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <?php if (!isset($_GET['form'])) { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card top-selling overflow-auto effectup">
                        <div class="card-body pb-0">

                            <div align="right" class="mt-2">
                                <a class="btn btn-success mt-3 mb-3" href="<?= $links_path; ?>&form=add"><i class="bi bi-plus"></i> Add Data</a>
                            </div>
                            <table class="table table-striped table-bordered datatable mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Writer</th>
                                        <th>Tags</th>
                                        <th>Category</th>
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
                                                <td><?= $rows['title']; ?></td>
                                                <td><?= $rows['subtitle']; ?></td>
                                                <td><?= $rows['writer']; ?></td>
                                                <td>
                                                    <?php $res =  explode(',', $rows['tags']);

                                                    foreach ($res as $labels) {
                                                    ?>
                                                        <span class="badge text-bg-primary"><?= $labels; ?></span>

                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $getcatblog = mysqli_query($conn, "SELECT b.* from blogs_categories a left join categories b on a.categories_id=b.id where a.blogs_id='" . $rows['id'] . "'");
                                                    $numcatblog = mysqli_num_rows($getcatblog);
                                                    $rowcatblog = mysqli_fetch_all($getcatblog, MYSQLI_ASSOC);
                                                    foreach ($rowcatblog as $rowscb) {
                                                    ?>
                                                        <span class="badge text-bg-warning"><?= $rowscb['name']; ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($rows['foto'] != '' || $rows['foto'] != null) { ?>
                                                        <img src="<?= $rows['foto']; ?>" alt="logo" class="img-thumbnail">
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-<?= $rows['statuscolor']; ?>"><?= $rows['statuslabel']; ?></span>
                                                </td>
                                                <td class="text-center" style="width:5%;">
                                                    <a href="#" id="delete_<?= $rows['id']; ?>" tid="<?= $rows['id']; ?>" tipe="blogs"><i class="bi bi-trash"></i></a>
                                                    <a href="<?= $links_path; ?>&form=edit&tid=<?= base64_encode($rows['id']); ?>"><i class="bi bi-pencil"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="10">No Data Entry</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div><!-- End Top Selling -->
            </div>

        <?php } else {

            if (isset($_GET['tid'])) {
                $tid = base64_decode($_GET['tid']);
                $getcategories = mysqli_query($conn, "SELECT a.*,if(b.categories_id is null ,'', 'selected') statusselected from categories a left join (select categories_id from blogs_categories where blogs_id='" . $tid . "') b on a.id=b.categories_id    ");
                $label = 'Edit';
                $labelbutton = 'Update';
                $getdata = mysqli_query($conn, "SELECT * from blogs where id = '$tid'");
                $rows = mysqli_fetch_assoc($getdata);
                $title = $rows['title'];
                $subtitle = $rows['subtitle'];
                $description = $rows['description'];
                $writer = $rows['writer'];
                $tags = $rows['tags'];
                $status = $rows['status'];
                if ($rows['foto'] == '' || $rows['foto'] == null) {
                    $foto = '';
                } else {
                    $foto =  '<div class="col-md-12 mt-4"> 
                                                    <div class="alert alert-light border-primary alert-dismissible fade show" role="alert"> 
                                                        <img src="' . $rows['foto'] . '" alt="foto"   class="img-thumbnail">
                                                        <div class="col-12 mt-4"> 
                                                            <span class="btn btn-danger" id="deletefoto" tid="' . $tid . '" tipe="blogs"  ><i class="bi bi-trash"></i> Hapus Foto </span>
                                                        </div>
                                                    </div>
                                                  </div>    
                                                ';
                }
            } else {
                $tid = 0;
                $getcategories = mysqli_query($conn, "SELECT *,'' as statusselected from categories");
                $label = 'Add';
                $labelbutton = 'Save';
                $title = '';
                $subtitle = '';
                $description = '';
                $writer = '';
                $tags = '';
                $foto = '';
                $status = 1;
            }
            $numcategories = mysqli_num_rows($getcategories);
            $rowcategories = mysqli_fetch_all($getcategories, MYSQLI_ASSOC);
        ?>

            <div class="row">
                <div class="col-9">
                    <div class="card top-selling overflow-auto effectup">
                        <div class="card-body pb-0">
                            <input type="hidden" id="tid" name="tid" class="blogsform" value="<?= $tid; ?>">
                            <h5 class="card-title"><?= $label; ?> Form</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="tinymce-editor" id="description"><?= $description; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card top-selling overflow-auto effectup">
                        <div class="card-body pb-0">
                            <div class="row g-3 p-1">
                                <div class="col-md-12 mt-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control blogsform" name="title" id="title" value="<?= $title; ?>" placeholder="Title" required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control blogsform" name="subtitle" id="subtitle" placeholder="Subtitle"><?= $subtitle; ?></textarea>
                                        <label for="writer">Subtitle</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control blogsform" name="writer" id="writer" value="<?= $writer; ?>" placeholder="Writer" required>
                                        <label for="writer">Writer</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="categories">Categories</label>
                                    <select class="form-control blogsform select2tags" name="categories[]" multiple="multiple" id="categories">
                                        <?php foreach ($rowcategories as $rowcat) { ?>
                                            <option value="<?= $rowcat['id']; ?>" <?= $rowcat['statusselected']; ?>><?= $rowcat['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <!-- <input type="text" class="form-control blogsform" name="tags" id="tags" value="<?= $tags; ?>" placeholder="Tags" required> -->
                                        <input type="text" class="form-control blogsform" data-role="tagsinput" name="tags" id="tags" value="<?= $tags; ?>" placeholder="Tags" required>
                                        <!-- <label for="tags">Tags</label> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="foto">Foto Blogs</label>
                                        <input type="file" class="form-control mt-1" name="foto" id="foto" placeholder="Foto">
                                    </div>
                                    <?= $foto; ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select blogsform" id="status" aria-label="Status">
                                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Active</option>
                                            <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Non Active</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>

                                <div class="text-center mb-3 mt-4">
                                    <a href="blogs.php" class="btn btn-danger">Cancel</a>
                                    <span name="simpan" id="simpan_blogs" tipe="blogs" class="btn btn-primary" mode="<?= $label; ?>"><?= $labelbutton; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End floating Labels Form -->

    </section>

</main><!-- End #main -->