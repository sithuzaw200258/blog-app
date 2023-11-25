<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
                        Transaction Lists
                    </h4>

                    <div class="">
                        <button class="btn btn-outline-secondary fullscreen-btn">
                            <i class="feather-maximize-2"></i>
                        </button>

                        <a href="<?php echo $url; ?>/wallet.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a>
                    </div>

                </div>

                <hr>

                <table id="data-list" class="table table-hover mt-3 mb-0 table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Time</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach (showAllTransaction() as $transaction) {
                        ?>
                            <tr>
                                <td><?php echo $transaction['id']; ?></td>
                                <td><?php echo user($transaction['sender'])['name']; ?></td>
                                <td><?php echo user($transaction['receiver'])['name']; ?></td>
                                <td><?php echo $transaction['amount']; ?></td>
                                <td><?php echo $transaction['description']; ?></td>
                                <td class="text-nowrap"><?php echo showTime($transaction['created_at']); ?></td>
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