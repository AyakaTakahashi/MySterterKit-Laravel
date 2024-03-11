$(function () {
    $("#total_amount, #coupon").on("keyup", function() {
        $("#payment_amount").val($("#total_amount").val() - $("#coupon").val());
    });
});