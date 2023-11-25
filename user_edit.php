<?php require_once "core/auth.php";?>
<?php require_once "template/header.php";?>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="user_lists.php">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>

                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="feather-layers text-primary"></i>
                            User Edit
                        </h4>
                        <!--
                        <a href="item-lists.html" class="btn btn-outline-primary">
                            <i class="feather-menu"></i>
                        </a>
                        -->
                    </div>

                    <hr>

                    <?php

                    $id=$_GET['id'];
                    $user=showUser($id);

                    if (isset($_POST['update_user_btn'])){
                        if (userUpdate()){
                            linkTo("user_lists.php");
                        }
                    }

                    ?>


                    <form method="post">

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id ;?>">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="<?php echo $user['name'];?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $user['email'];?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="custom-select" required>
                                <option value="0" <?php echo $user['role'] == 0 ? 'selected': '' ;?> >0</option>
                                <option value="1" <?php echo $user['role'] == 1 ? 'selected': '' ;?> >1</option>
                                <option value="2" <?php echo $user['role'] == 2 ? 'selected': '' ;?> >2</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <button name="update_user_btn" class="btn btn-primary">Update User</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


<?php require_once "template/footer.php";?>

<?php
