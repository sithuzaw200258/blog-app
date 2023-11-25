<?php require_once "core/auth.php"; ?>
<?php require_once "core/isAdmin.php"; ?>
<?php require_once "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item"><a href="post-lists.php">Users</a></li>
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
                        <i class="feather-users text-primary"></i>
                        User Lists
                    </h4>
                    <div class="">
                        <button class="btn btn-outline-secondary fullscreen-btn">
                            <i class="feather-maximize-2"></i>
                        </button>

                        <!-- <a href="<?php //echo $url; ?>/user_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a> -->
                    </div>

                </div>

                <hr>

                <table class="table table-hover mt-3 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Time</th>
                            <th>Controls</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach (showAllUser() as $user) {
                        ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $roles[$user['role']]; ?></td>
                                <td><?php echo showTime($user['created_at']); ?></td>

                                <!-- TODO: User CRUD -->
                                <td><a href="<?php echo $url; ?>/user_delete.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this user?')">
                                        <i class="feather-trash-2"></i>
                                    </a>

                                    <a href="<?php echo $url; ?>/user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-warning btn-sm">
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

<?php require_once "template/footer.php"; ?> <script>
    $(".table").dataTable({
        "order": [
            [0, "desc"]
        ]
    });
</script>