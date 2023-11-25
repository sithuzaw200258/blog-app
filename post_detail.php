<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>
<?php
$id = $_GET['id'];
$detail_post = showPost($id);
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item"><a href="post_lists.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $detail_post['title']; ?>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-info text-primary"></i>
                        Post Details
                    </h4>

                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a>
                        <a href="<?php echo $url; ?>/post_lists.php" class="btn btn-outline-primary">
                            <i class="feather-list"></i>
                        </a>
                    </div>

                </div>

                <hr>

                <div class="">
                    <h4 class=""><?php echo $detail_post['title']; ?></h4>
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

    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-users text-primary"></i>
                        Viewers Lists
                    </h4>

                    <div class="">
                        <button class="btn btn-outline-secondary fullscreen-btn">
                            <i class="feather-maximize-2"></i>
                        </button>
                    </div>

                </div>

                <hr>

                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Device</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (countViewerByPost($id) as $viewer) { ?>
                                <tr>
                                    <td class="text-nowrap text-capitalize">
                                        <?php if ($viewer['user_id'] == 0) {
                                            echo 'Guest';
                                        } else {
                                            echo user($viewer['user_id'])['name'];
                                        } ?>
                                    </td>
                                    <td><?php echo $viewer['device'] ?></td>
                                    <td><?php echo showTime($viewer['created_at']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"; ?>
<script>
    $(".table").dataTable({
        "order": [
            [0, "desc"]
        ]
    });
</script>