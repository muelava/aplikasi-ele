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

// data mapel -> error ke modal
if ($("#error-modal-tambah-mapel").length) {
    $("#modal-tambah-mapel").modal("show");
}

// data materi -> error ke modal
if ($("#error-modal-tambah-materi").length) {
    $("#modal-tambah-materi").modal("show");
}

function card_materi(id, materi, jenjang, kelas, mapel, deskripsi, dok_materi) {
    let modal_view_materi = $("#modal-view-materi");

    modal_view_materi.find(".modal-title").text(materi);
    modal_view_materi.find(".jenjang>p").text(jenjang);
    modal_view_materi.find(".kelas>p").text(kelas);
    modal_view_materi.find(".mapel>p").text(mapel);
    modal_view_materi.find(".materi>p").text(materi);
    modal_view_materi.find(".deskripsi>p").text(deskripsi);
    modal_view_materi
        .find(".dok_materi>p")
        .html(
            `<a href='../../files/materies/${dok_materi}' class='btn btn-sm btn-outline-primary' target='_blank'>${dok_materi}</a>`
        );
    modal_view_materi.find("#btn-ubah").attr("href", "materi/ubah/" + id);
    modal_view_materi.find("#btn-diskusi").attr("href", "materi/diskusi/" + id);
    modal_view_materi.find("#btn-hapus").attr("href", "materi/hapus/" + id);

    modal_view_materi.modal("show");
}
