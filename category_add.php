<?php require_once "core/auth.php";?>
<?php require_once "core/isEditor&Admin.php";?>
<?php require_once "template/header.php";?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item"><a href="category_add.php">Category Manager</a></li>
            </ol>
        </nav>
    </div>
</div>


<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i>
                        Category Manager
                    </h4>
                    <!-- <a href="item-lists.html" class="btn btn-outline-primary">
                        <i class="feather-menu"></i>
                    </a> -->
                </div>

                <hr>

                <?php

                    if (isset($_POST['category-btn'])){
                        categoryAdd();
                    }

                ?>

                <form method="post">

                    <div class="form-inline">
                        <input type="text" name="title" class="form-control w-75 mr-2" required>
                        <button class="btn btn-primary" name="category-btn">Add Category</button>
                    </div>

                </form>

                <?php require_once "category_list.php";?>
            </div>
        </div>
    </div>
</div>


<?php require_once "template/footer.php";?>

