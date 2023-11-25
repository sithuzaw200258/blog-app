</div>

</div>
</section>

<script src="<?php echo $url; ?>/assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/popper.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/summer_note/summernote-bs4.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<script>
    let currentPage = location.href;
    $(".menu-item-link").each(function() {
        let links = $(this).attr("href");
        if (currentPage == links) {
            $(this).addClass("active");
        }
    })

    $(".fullscreen-btn").click(function() {
        let current = $(this).closest(".card");
        current.toggleClass("fullscreen-card");

        if (current.hasClass("fullscreen-card")) {
            $(this).html(`<i class="feather-minimize-2"></i>`);
        } else {
            $(this).html(`<i class="feather-maximize-2"></i>`);
        }
    })
</script>

</body>

</html>