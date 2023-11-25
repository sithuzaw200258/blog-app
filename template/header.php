<?php require_once "core/base.php"; ?>
<?php require_once "core/functions.php"; ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/summer_note/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>

<body>
    <section class="main container-fluid">
        <div class="row">
            <!-----------------  Sidebar Navigation  ----------------->
            <?php require_once "template/sidebar.php"; ?>

            <!-----------------  Content  ----------------->
            <div class="col-12 col-md-8 col-lg-9 col-xl-10 vh-100 pt-0 pb-3 content">

                <!-----------------  Header  ----------------->
                <div class="row header mb-4">
                    <div class="col-12">
                        <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                            <!-- <button class="show-sidebar-btn btn btn-primary btn-sm d-block d-lg-none">
                                <i class="feather-menu text-light" style="font-size: 2em"></i>
                            </button> -->

                            <!-- <form action="" method="post" class="d-none d-lg-block">
                                <div class="form-inline">
                                    <input type="search" class="form-control mr-2" placeholder="Search Everything">
                                    <button class="btn btn-light">
                                        <i class="feather-search text-primary"></i>
                                    </button>
                                </div>
                            </form> -->
                            <div></div>

                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo $url; ?>/assets/img/user/<?php echo $_SESSION['user']['photo']; ?>" class="user-img shadow-sm" alt="">
                                    <?php echo $_SESSION['user']['name']; ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>