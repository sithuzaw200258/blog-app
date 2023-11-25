<?php session_start(); ?>
<?php require_once "front_panel/head.php"; ?>
<?php require_once "front_panel/side_header.php"; ?>
<?php

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $detail_post = showPost($post_id);
}else{
    linkTo("index.php");
}

if(!$detail_post){
    linkTo("index.php");
}

$current_cat = $detail_post['category_id'];
if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
} else {
    $user_id = 0;
}
recordViewer($user_id, $post_id, $_SERVER['HTTP_USER_AGENT']);
?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="feather-home"></i>
                            <span class="ml-1">Home</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Post Details
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="">
                <div class="card shadow-sm mb-4 post">
                    <div class="card-body">
                        <div class="">
                            <h4 class="text-primary"><?php echo $detail_post['title']; ?></h4>
                            <div class="my-3">
                                <span class="mr-2 text-muted">
                                    <i class="feather-user text-primary"></i>
                                    <?php echo user($detail_post['user_id'])['name']; ?>
                                </span>

                                <span class="mr-2 text-muted">
                                    <i class="feather-layers text-success"></i>
                                    <?php echo showCategory($detail_post['category_id'])['title']; ?>
                                </span>

                                <span class="text-muted">
                                    <i class="feather-calendar text-danger"></i>
                                    <?php echo date("j M Y", strtotime($detail_post['created_at'])); ?>
                                </span>
                            </div>
                            <div class=""><?php echo html_entity_decode($detail_post['description']); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <h4 class="">Related Posts</h4>
                <div class="row">
                    <?php
                    foreach (showAllPostByCat($current_cat, 2, $post_id) as $post) {
                    ?>
                        <div class="col-12 col-md-6">
                            <div class="card shadow-sm my-3 post">
                                <div class="card-body">
                                    <a href="front_panel_post_detail.php?post_id=<?php echo $post['id']; ?>" class="text-primary">
                                        <h4 class=""><?php echo shortText($post['title']); ?></h4>
                                    </a>

                                    <div class="my-3">
                                        <span class="mr-2 text-muted">
                                            <i class="feather-user text-primary"></i>
                                            <?php echo user($post['user_id'])['name']; ?>
                                        </span>

                                        <span class="mr-2 text-muted">
                                            <i class="feather-layers text-success"></i>
                                            <?php echo showCategory($post['category_id'])['title']; ?>
                                        </span>

                                        <span class="text-muted">
                                            <i class="feather-calendar text-danger"></i>
                                            <?php echo date("j M Y", strtotime($post['created_at'])); ?>
                                        </span>
                                    </div>
                                    <p class="text-muted">
                                        <?php echo shortText(strip_tags(html_entity_decode($post['description'])), 200); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <?php require_once "right-sidebar.php"; ?>
        </div>
    </div>

</div>
</div>
<?php require_once "front_panel/footer.php"; ?>