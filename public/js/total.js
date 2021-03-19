$(document).ready( function () {
    $(".quantity").on('keyup', function() {
        total = parseInt($(".quantity").val()) * parseInt($(".priceUnit").val());
        total = total.toString();
        $(".total").val(total);
    });

    $(".priceUnit").on('keyup', function() {
        total = parseInt($(".quantity").val()) * parseInt($(".priceUnit").val());
        total = total.toString();
        $(".total").val(total);
    });
});

