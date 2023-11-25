</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary my-3 rounded-sm">
                    <a class="navbar-brand" href="<?php echo $url; ?>/index.php">My Blog</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $url; ?>/index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0" method="POST" action="search_by_keyword.php">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>

            <div class="col-12">
                <?php foreach (showAllAds() as $ad) { ?>
                    <div class="mb-4">
                        <a href="<?php echo $ad['link']; ?>" class="" target="_blank">
                            <img src="<?php echo $ad['photo']; ?>" alt="" class="w-100">
                        </a>
                    </div>
                <?php }  ?>
            </div>
        </div>
    </div>