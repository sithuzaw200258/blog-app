<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>

<div class="">
    <div class="row">

        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <!-- TODO: Total Viewer -->
            <div class="card mb-4 status-card" onclick="go('http://localhost/blog-app/dashboard.php')">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-eye h1 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-0 font-weight-bolder h4">
                                <span class="counter-up">

                                    <?php 
                                    // if ($_SESSION['user']['role'] == 2) {
                                    //     echo countPosts('viewers');
                                    // }else{
                                        echo countTotal('viewers'); 
                                    // }
                                    ?>
                                </span>
                            </p>
                            <p class="text-black-50 mb-0">Total Viewers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_lists.php')">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-list h1 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-0 font-weight-bolder h4">
                                <span class="counter-up">
                                <?php 
                                    if ($_SESSION['user']['role'] == 2) {
                                        echo countPosts('posts');
                                    }else{
                                        echo countTotal('posts'); 
                                    }
                                    ?>
                                </span>
                            </p>
                            <p class="text-black-50 mb-0">Total Posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-layers h1 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-0 font-weight-bolder h4">
                                <span class="counter-up"><?php echo countTotal('categories') ?></span>
                            </p>
                            <p class="text-black-50 mb-0">Total Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_lists.php')">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="feather-users h1 text-primary"></i>
                        </div>
                        <div class="col-9">
                            <p class="mb-0 font-weight-bolder h4">
                                <span class="counter-up"><?php echo countTotal('users') ?></span>
                            </p>
                            <p class="text-black-50 mb-0">Total User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row align-items-end">

        <div class="col-12">
            <div class="row">
                <!--Chart-->
                <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                    <div class="card shadow-sm overflow-hidden mb-4">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h5 class="font-weight-bolder text-uppercase mb-0 text-muted">Transaction & Viewer</h5>
                                <div class="">
                                    <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="rounded-circle ov-img" alt="">
                                    <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="rounded-circle ov-img" alt="">
                                    <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="rounded-circle ov-img" alt="">
                                    <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="rounded-circle ov-img" alt="">
                                    <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="rounded-circle ov-img" alt="">

                                </div>
                            </div>

                            <canvas id="ov" height="130"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Doughnut-->
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h5 class="font-weight-bolder text-uppercase mb-0 text-muted">Categories & Posts</h5>
                                <div class="">
                                    <i class="feather-pie-chart text-primary"></i>
                                </div>
                            </div>
                            <canvas id="op" height="190"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-12">
            <div class="card overflow-hidden mb-4">

                <div class="">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h5 class="mb-0 text-uppercase text-muted">Recent Post</h5>
                        <div class="w-25">
                            <?php
                            $current_user_id = $_SESSION['user']['id'];
                            $totalPost = countTotal("posts");
                            $userPost = countTotal("posts", "user_id='$current_user_id'");
                            $userPostPercent = floor(($userPost / $totalPost) * 100);
                            ?>
                            <h6 class="text-muted">Your Posts - <?php echo $userPost; ?></h6>
                            <div class="progress" style="height: 15px;">
                                <div class=" progress-bar progress-bar-animated" role="progressbar" style="width: <?php echo $userPostPercent; ?>%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><?php echo $userPostPercent; ?>%</div>
                            </div>
                        </div>
                    </div>

                    <table id="data-list" class="table table-hover mb-0 table-bordered display" style="width:100%">
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
                            foreach (recentPosts() as $post) {
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
</div>

<?php require_once "template/footer.php"; ?>

<script src="<?php echo $url; ?>/assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/chart_js/chart.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<script src="<?php echo $url; ?>/assets/js/dashboard.js"></script>

<script>
    // Chart Js

    <?php
    $dateArr = [];
    $viewers = [];
    $transactions = [];
    for ($i = 0; $i < 10; $i++) {
        $today = date("Y-m-d");

        $date = date_create($today);
        date_sub($date, date_interval_create_from_date_string("$i days"));
        $current_day = date_format($date, "Y-m-d");
        array_push($dateArr, $current_day);

        $count_viewer = countTotal("viewers", "CAST(created_at AS DATE)='$current_day'");
        array_push($viewers, $count_viewer);

        $count_transaction = countTotal("transactions", "CAST(created_at AS DATE)='$current_day'");
        array_push($transactions, $count_transaction);
    }
    ?>

    let dateArr = <?php echo json_encode($dateArr); ?>;

    let transactionArr = <?php echo json_encode($transactions); ?>;

    let viewerCountArr = <?php echo json_encode($viewers); ?>;

    var ctx = document.getElementById('ov').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [{
                    label: 'Transaction Count',
                    data: transactionArr,
                    backgroundColor: [
                        '#6610f220',

                    ],
                    borderColor: [
                        '#6f42c1',
                    ],
                    borderWidth: 1,
                    tension: 0
                },
                {
                    label: 'Viewer Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#28a74520',

                    ],
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension: 0
                },
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false,
                    gridLines: {
                        display: false,
                    }
                }]

            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true,
                }
            }
        }
    });


    // Pie Chart Js
    <?php
    $categories = [];
    $posts = [];
    foreach (showAllCategory() as $category) {
        array_push($categories, $category['title']);
        array_push($posts, countTotal("posts", "category_id={$category['id']}"));
    }
    ?>

    let posts = <?php echo json_encode($posts); ?>;
    let categories = <?php echo json_encode($categories); ?>;

    var op = document.getElementById('op').getContext('2d');
    var opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: categories,
            datasets: [{
                label: '# of Votes',
                data: posts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false,

                }]
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true,
                }
            }
        }
    });
</script>