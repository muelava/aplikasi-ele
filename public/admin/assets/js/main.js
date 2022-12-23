$(window).on("load", function () {
    if (feather) {
        feather.replace({ width: 14, height: 14 });
    }
});

// config flatpickr
if ($(".flatpickr-basic").length) {
    $(".flatpickr-basic").flatpickr({
        dateFormat: "Y-m-d",
    });
    $(document).on("focusin", function (e) {
        if ($(e.target).closest(".flatpickr-calendar").length) {
            e.stopImmediatePropagation();
        }
    });
}

// data guru -> error ke modal
if ($("#error-modal-tambah-guru").length) {
    $("#modal-tambah-guru").modal("show");
}
