<div class="right-sidebar">
    <div class="mb-2">
        <div class="card">
            <div class="card-body p-2">
                <?php if (isset($_SESSION['user']['id'])) { ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            Hi <span class="text-uppercase text-success"> <?php echo $_SESSION['user']['name'] ?></span>
                        </p>

                        <a href="dashboard.php" class="btn btn-sm btn-success">Go to dashboard</a>
                    </div>
                <?php } else { ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            Hi <span class="text-uppercase text-warning"> Guest </span>
                        </p>

                        <a href="register.php" class="btn btn-sm btn-warning text-capitalize text-white">Register here</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="">
        <h5 class="mb-2 text-uppercase text-muted">Catagory List</h5>
        <div class="mb-2">
            <div class="list-group">
                <a href="<?php echo $url; ?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '' : 'active' ?>" aria-current="true">
                    All Categories
                </a>
                <?php
                foreach (showAllCategoryFrontPanel() as $category) {
                ?>
                    <a href="post_by_category.php?category_id=<?php echo $category['id']; ?>" class="list-group-item list-group-item-action
                <?php echo isset($_GET['category_id']) ? ($_GET['category_id'] == $category['id'] ? 'active' : '') : '' ?>">
                        <?php if ($category['ordering'] == 1) { ?>
                            <i class="feather-paperclip text-success"></i>
                        <?php } ?>
                        <?php echo $category['title']; ?>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="mb-2">
        <h5 class="text-muted text-uppercase">Search By Date</h5>

        <div class="card">
            <div class="card-body">
                <form method="post" action="search_by_date.php">
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="sdate" id="startDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" name="edate" id="endDate" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">
                        <i class="feather-calendar"></i>
                        Search
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- <h5 class="mb-2 text-uppercase text-muted">Advertisements</h5> -->
</div>