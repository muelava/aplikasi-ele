$(window).on("load", function () {
    if (feather) {
        feather.replace({ width: 14, height: 14 });
    }
});

// config flatpickr basic
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

// printThis Data Guru
$("#btn-print-guru").on("click", function () {
    $("#tabel-guru").printThis({
        importCSS: true,
        loadCSS: "",
        header: "<div style='display: flex; align-items:center; gap:1rem; margin-bottom:3rem'><img src='/img/logo_bina_ikhwani.png' style='max-width:100px'><h1 style='font-weight:bold'>SMP SMK Bina Ikhwani</h1></div><h5 style='margin-top:2rem; margin-bottom:1.5rem;'>Data Guru</h5>",
    });
});

// data siswa -> error ke modal
if ($("#error-modal-tambah-siswa").length) {
    $("#modal-tambah-siswa").modal("show");
}

// printThis Data Siswa
$("#btn-print-siswa").on("click", function () {
    $("#tabel-siswa").printThis({
        importCSS: true,
        loadCSS: "",
        header: "<div style='display: flex; align-items:center; gap:1rem; margin-bottom:3rem'><img src='/img/logo_bina_ikhwani.png' style='max-width:100px'><h1 style='font-weight:bold'>SMP SMK Bina Ikhwani</h1></div><h5 style='margin-top:2rem; margin-bottom:1.5rem;'>Data Siswa</h5>",
    });
});

// data kelas -> error ke modal
if ($("#error-modal-tambah-kelas").length) {
    $("#modal-tambah-kelas").modal("show");
}
