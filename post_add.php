<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item"><a href="post_lists.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>

<?php
if (isset($_POST['add_post_btn'])) {
    echo postAdd();
}
?>
<form method="post">
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="feather-plus-circle text-primary"></i>
                            Post Manager
                        </h4>
                        <a href="<?php echo $url; ?>/post_lists.php" class="btn btn-outline-primary">
                            <i class="feather-menu"></i>
                        </a>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" id="description" required></textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="feather-layers text-primary"></i>
                            Select Category
                        </h4>
                        <a href="<?php echo $url; ?>/category_add.php" class="btn btn-outline-primary">
                            <i class="feather-menu"></i>
                        </a>
                    </div>

                    <hr>

                    <!-- <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" id="" class="custom-select">
                            <?php //foreach (showAllCategory() as $categories) { ?>
                                <option value="<?php //echo $categories['id']; ?>"><?php //echo $categories['title']; ?></option>
                            <?php //} ?>

                        </select>
                    </div> -->

                    <div class="form-group">
                        <?php foreach (showAllCategory() as $categories) { ?>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio<?php echo $categories['id']; ?>" name="category_id" value="<?php echo $categories['id']; ?>" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio<?php echo $categories['id']; ?>"> <?php echo $categories['title']; ?></label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <button name="add_post_btn" class="btn btn-primary">Add Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require_once "template/footer.php"; ?>
<script>
    $('#description').summernote({
        height: 200,
    });
</script>