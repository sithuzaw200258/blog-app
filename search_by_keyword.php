<?php require_once "front_panel/head.php"; ?>
<?php require_once "front_panel/side_header.php"; ?>
<?php
$keyword = $_POST['keyword'];
?>
<div class="container">

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $url; ?>/index.php">
                            <i class="feather-home"></i>
                            <span class="ml-1">Home</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <span>Search by <b>"<?php echo $keyword; ?>"</b></span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="">
                <?php
                $search_post = showPostBySearch($keyword);
                if (count($search_post) == 0) {
                    echo alert("There is no posts", "warning");
                ?>
                    <!-- <div class="card bg-warning">
                        <div class="card-body">
                            <h5 class="text-white">There is no posts search by <b>"<?php echo $keyword; ?>"</b></h5>
                        </div>
                    </div> -->
                <?php
                }
                ?>
                <?php
                foreach ($search_post as $post) {
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