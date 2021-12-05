$(function() {
    $(".edus-content-item-2").css("display", "none");
    $(".edus-content-item-3").css("display", "none");
    $(".edus-content-item-4").css("display", "none");

    $(".edus-nav-item-1").on("click", function() {
        $(".edus-content-item-1").css("display", "block");
        $(".edus-content-item-2").css("display", "none");
        $(".edus-content-item-3").css("display", "none");
        $(".edus-content-item-4").css("display", "none");

    });
    $(".edus-nav-item-2").on("click", function() {

        $(".edus-content-item-1").css("display", "none");
        $(".edus-content-item-2").css("display", "block");
        $(".edus-content-item-3").css("display", "none");
        $(".edus-content-item-4").css("display", "none");

    });
    $(".edus-nav-item-3").on("click", function() {

        $(".edus-content-item-1").css("display", "none");
        $(".edus-content-item-2").css("display", "none");
        $(".edus-content-item-3").css("display", "block");
        $(".edus-content-item-4").css("display", "none");

    });
    $(".edus-nav-item-4").on("click", function() {

        $(".edus-content-item-1").css("display", "none");
        $(".edus-content-item-2").css("display", "none");
        $(".edus-content-item-3").css("display", "none");
        $(".edus-content-item-4").css("display", "block");

    });
});