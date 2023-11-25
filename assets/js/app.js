$(".show-sidebar-btn").click(function () {
    $(".sidebar").animate({ marginLeft: 0 });
})

$(".hide-sidebar-btn").click(function () {
    $(".sidebar").animate({ marginLeft: "-100%" });
})

function go(url) {
    setTimeout(function () {
        location.href = `${url}`;
    }, 500)
}

$(function () {
    $('[data-toggle="popover"]').popover()
})

let screenHeight = $(window).height();
let currentMenuHeight = $(".nav-menu .active").offset().top;

if (currentMenuHeight > screenHeight * 0.8) {
    $(".sidebar").animate(
        {
            scrollTop: currentMenuHeight - 100
        }, 1000
    );
}