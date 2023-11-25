<?php require_once "front_panel/head.php"; ?>
<?php require_once "front_panel/side_header.php"; ?>
<?php
$category_id = $_GET['category_id'];
$category = showCategory($category_id);
?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item active">
                        <a href="<?php echo $url; ?>/index.php">
                            <i class="feather-home"></i>
                            <span class="ml-1">Home</span>
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <?php echo $category['title'] ?> Category
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="">
                <?php
                foreach (showAllPostByCat($category_id,) as $post) {
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