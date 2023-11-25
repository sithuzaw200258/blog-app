<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item"><a href="post-lists.php">Posts</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-list text-primary"></i>
                        Post Lists
                    </h4>

                    <div class="">
                        <button class="btn btn-outline-secondary fullscreen-btn">
                            <i class="feather-maximize-2"></i>
                        </button>

                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a>
                    </div>

                </div>

                <hr>

                <table id="data-list" class="table table-hover mt-3 mb-0 table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th class="text-nowrap">Viewer Count</th>

                            <!----- If you are admin,you can see user column ----->
                            <?php if ($_SESSION['user']['role'] == 0) { ?>
                                <th>User</th>
                            <?php } ?>

                            <th>Time</th>
                            <th>Controls</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach (showAllPost() as $post) {
                        ?>
                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo shortText($post['title']); ?></td>
                                <td><?php echo shortText(strip_tags(html_entity_decode($post['description']))); ?></td>
                                <td class="text-nowrap"><?php echo showCategory($post['category_id'])['title']; ?></td>
                                <td><?php echo count(countViewerByPost($post['id'])); ?></td>
                                <!----- If you are admin,you can see user column ----->
                                <?php if ($_SESSION['user']['role'] == 0) { ?>
                                    <td class="text-nowrap"><?php echo user($post['user_id'])['name']; ?></td>
                                <?php } ?>

                                <td class="text-nowrap"><?php echo showTime($post['created_at']); ?></td>
                                <td class="text-nowrap">

                                    <a href="<?php echo $url; ?>/post_detail.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-info btn-sm">
                                        <i class="feather-info"></i>
                                    </a>

                                    <a href="<?php echo $url; ?>/post_delete.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this post?')">
                                        <i class="feather-trash-2"></i>
                                    </a>

                                    <a href="<?php echo $url; ?>/post_edit.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

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