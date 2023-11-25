<?php session_start(); ?>
<?php require_once "front_panel/head.php"; ?>
<?php require_once "front_panel/side_header.php"; ?>


<div class="container">

    <div class="row">
        <div class="col-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item active">
                        <a href="<?php echo $url; ?>/index.php">
                            <i class="feather-home"></i>
                            <span class="ml-1">Home</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="mb-3 text-right ">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-calendar"></i>
                        Sort News
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php?order_by=created_at&order_type=asc">
                            <i class="feather-arrow-down-circle"></i>
                            Oldest to newest
                        </a>
                        <a class="dropdown-item" href="index.php?order_by=created_at&order_type=desc">
                            <i class="feather-arrow-up-circle"></i>
                            Newest to oldest
                        </a>

                        <a class="dropdown-item" href="index.php?">
                            <i class="feather-lists"></i>
                            Default
                        </a>
                    </div>
                </div>
            </div>

            <div class="">
                <?php
                if (isset($_GET['order_by']) && isset($_GET['order_type'])) {
                    $order_col = $_GET['order_by'];
                    $order_type = strtoupper($_GET['order_type']);
                    $posts = showAllPostFrontPanel($order_col, $order_type);
                } else {
                    $posts = showAllPostFrontPanel();
                }

                foreach ($posts as $post) {
                ?>
                    <?php include "post.php"; ?>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <?php require_once "right-sidebar.php"; ?>
        </div>
    </div>
</div>

<?php require_once "front_panel/footer.php"; ?>