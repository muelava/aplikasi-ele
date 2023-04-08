@extends('guru.layouts.main')
@section('title', 'Daftar Nilai Siswa')
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
@endsection

@section('container')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Nilai</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Daftar Nilai Siswa
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- content start --}}
            <div class="card" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover" id="kelas-siswa">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Mapel</th>
                                        <th>Materi</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- content start --}}
        </div>
    </div>
@endsection

@section('page-vendor-js')
    <script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>

    <script>
        // $.ajax("/guru/value-data")
        //     .done(function(data) {
        //         console.log(data);
        //     });

        $('#kelas-siswa').DataTable({
            ajax: '/guru/value-data/all',
            "scrollX": true,
            dom: "<'row justify-content-between border-bottom py-1'<'col-sm-6 d-flex align-items-center head-table'><'col-sm-6 text-right'B>>" +
                "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "language": {
                "lengthMenu": "_MENU_",
                "search": "",
                searchPlaceholder: "Cari ..."
            },
            buttons: [{
                extend: 'pdfHtml5',
                className: 'btn btn-primary',
                text: '<i data-feather="download"></i> Ekspor PDF',
                exportOptions: {
                    columns: ':not(:last-child)',
                },
                orientation: 'portrait',
                customize: function(doc) {
                    var colCount = new Array();
                    $('#kelas-siswa').find('tbody tr:first-child td').each(function() {
                        if ($(this).attr('colspan')) {
                            for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                colCount.push('*');
                            }
                        } else {
                            colCount.push('*');
                        }
                    });
                    doc.content[1].table.widths = colCount;
                }
            }],
            columns: [{
                    data: 'nis'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'kelas',
                    className: 'text-uppercase'

                },
                {
                    data: 'mapel'
                },
                {
                    data: 'materi'
                },
                {
                    data: 'nilai'
                },
                {
                    data: 'id'
                },
            ],
            columnDefs: [{
                targets: -1,
                "render": function(data, type, row, meta) {
                    return `<a href="javascript:" class="btn btn-sm btn-outline-muted">Detail</a>`;
                }
            }]
        });
        $('.head-table').html('<h6 class="mb-0">Nilai Siswa</h6>')
    </script>
@endsection
