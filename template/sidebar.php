<div class="col-12 col-md-4 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 navbar_brand">
        <div class="d-flex align-items-center">
            <span class="bg-primary rounded p-2 d-flex justify-content-center align-items-center mr-2">
                <i class="feather-shopping-bag text-white"></i>
            </span>
            <span class="text-primary text-uppercase font-weight-bolder h4 mb-0">My Blog</span>
        </div>

        <button class="hide-sidebar-btn btn btn-light btn-sm d-block d-lg-none">
            <i class="feather-x" style="font-size: 2em"></i>
        </button>
    </div>

    <div class="nav-menu">
        <ul>

            <!------------  Dashboard  ------------>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>

                </a>
            </li>
            <li class="menu-spacer"></li>

            <!------------  Go to News  ------------>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/index.php" class="menu-item-link">
                    <span>
                        <i class="feather-home"></i>
                        GO TO NEWS
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <!-- Payment -->
            <li class="menu-title">
                Payment
            </li>

            <!------------  Wallet  ------------>
            <?php if ($_SESSION['user']['role'] < 2) { ?>
                <li class="menu-item">
                    <a href="<?php echo $url; ?>/wallet.php" class="menu-item-link">
                        <span>
                            <i class="feather-dollar-sign"></i>
                            Wallet
                        </span>
                    </a>
                </li>
            <?php } ?>

            <!------------ Transactions ------------>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/transactions.php" class="menu-item-link">
                    <span>
                        <i class="feather-list"></i>
                        Transactions
                    </span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <!-- Real Manage Item -->
            <li class="menu-title">
                Manage Posts
            </li>

            <!------------  Add Post  ------------>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_add.php" class="menu-item-link">
                    <span>
                        <i class="feather-plus-circle"></i>
                        Add Post
                    </span>
                </a>
            </li>


            <!------------  Post Lists  ------------>
            <li class="menu-item">
                <span>
                    <a href="<?php echo $url; ?>/post_lists.php" class="menu-item-link">
                        <span>
                            <i class="feather-list"></i>
                            Post Lists
                        </span>

                        <span class="badge badge-pill bg-white shadow-sm text-primary d-flex justify-content-center align-items-center">
                            <?php echo countPosts('posts'); ?>
                        </span>
                    </a>
                </span>
            </li>

            <li class="menu-spacer"></li>

            <!------------  Start Settings  ------------>

            <?php if ($_SESSION['user']['role'] <= 1) { ?>


                <li class="menu-title">
                    Settings
                </li>


                <!------------  Users   ------------>
                <?php if ($_SESSION['user']['role'] == 0) { ?>
                    <li class="menu-item">
                        <a href="<?php echo $url; ?>/user_lists.php" class="menu-item-link">
                            <span>
                                <i class="feather-users"></i>
                                Users Manager
                            </span>

                            <span class="badge badge-pill bg-white shadow-sm text-primary d-flex justify-content-center align-items-center">
                                <?php echo countTotal('users'); ?>
                            </span>
                        </a>
                    </li>

                    <li class="menu-spacer"></li>

                <?php } ?>

                <!------------  Category  ------------>
                <li class="menu-item">
                    <a href="<?php echo $url; ?>/category_add.php" class="menu-item-link">
                        <span>
                            <i class="feather-layers"></i>
                            Category Manager
                        </span>

                        <span class="badge badge-pill bg-white shadow-sm text-primary d-flex justify-content-center align-items-center">
                            <?php echo countTotal('categories'); ?>
                        </span>
                    </a>
                </li>

                <li class="menu-spacer"></li>



            <?php } ?>

            <!------------  End Settings  ------------>


            <!------------  Logout  ------------>
            <li class="menu-item">
                <span>
                    <a href="logout.php" class="menu-item-link btn btn-danger text-white">
                        <span>
                            <i class="feather-log-out"></i>
                            Logout
                        </span>
                    </a>
                </span>
            </li>


        </ul>
    </div>

</div>