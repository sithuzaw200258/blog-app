<?php require_once "core/auth.php";?>
<?php require_once "template/header.php";?>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="post-lists.php">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>

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
                            Post Edit
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
                    $current=showPost($id);

                    if (isset($_POST['update_post_btn'])){
                        if (postUpdate()){
                            linkTo("post_lists.php");
                        }
                    }

                    ?>


                    <form method="post">

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id ;?>">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" id="title" value="<?php echo $current['title'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Select Category</label>
                            <select name="category_id" id="" class="custom-select">
                                <?php foreach (showAllCategory() as $categories){ ?>
                                    <option value="<?php echo $categories['id'] ;?>" <?php echo $categories['id']== $current['category_id']? 'selected': '' ;?> ><?php echo $categories['title'] ;?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Post Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control"><?php echo strip_tags(html_entity_decode($current['description']));?></textarea>
                        </div>

                        <div class="form-group">
                            <button name="update_post_btn" class="btn btn-primary">Update Post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


<?php require_once "template/footer.php";?>

<?php
