<?php require_once "core/auth.php"; ?>
<?php require_once "core/isEditor&Admin.php"; ?>
<?php require_once "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="category_add.php">Wallet</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8">
        <?php
        if (isset($_POST['transfer-btn'])) {
            echo transferMoney();
        }
        ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-dollar-sign text-primary"></i>
                        My Wallet
                    </h4>

                    <h5 class="">
                        <i class="feather-dollar-sign"></i>
                        Balance- <span class="text-success"><?php echo user($_SESSION['user']['id'])['money'] ?></span>
                    </h5>

                </div>

                <hr>

                <form method="post">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user">User</label>
                            <select class="custom-select" name="receiver" id="user" required>
                                <option value="" selected disabled>Select user...</option>
                                <?php foreach (showAllUser() as $user) { ?>
                                    <?php if ($user['id'] != $_SESSION['user']['id']) { ?>
                                        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" required id="amount" name="amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary pl-5 pr-5" name="transfer-btn">Transfer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"; ?>