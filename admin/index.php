<?php 
session_start();
include('../inc/pdo.php');

include('../inc/functions.php');

$title = 'Admin';

if($_SESSION['user']['role'] == 'admin') {
    include('inc/admin_header.php');

?>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 center">Myvaccine Administration</h1>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include('inc/admin_footer.php'); ?>
<?php
} else {
    redirect('404.php');
}

