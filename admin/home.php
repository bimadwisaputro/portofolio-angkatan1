<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?> 
<?php
if (isset($_GET['page'])) {
    if (file_exists('' . $_GET['page'] . '.php')) {
        include('' . $_GET['page'] . '.php');
    } else {
        include('dashboard.php');
    }
} else {
    include('dashboard.php');
}
?>
<?php include('include/footer.php'); ?>