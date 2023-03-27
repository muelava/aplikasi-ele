@extends('admin.layouts.main')
@section('title', 'Kelas Siswa')
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
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
                            <h2 class="content-header-title float-left mb-0">Kelas Siswa</h2>
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
                                        <th>ID Kelas</th>
                                        <th>Jenjang</th>
                                        <th>Nama Kelas</th>
                                        <th>Jumlah Siswa</th>
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

    <!-- Modal tambah -->
    <div class="modal fade text-left" id="modal-tambah-pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/administrator/pengumuman/tambah" method="POST" enctype='multipart/form-data'>

                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div id="error-modal-tambah-pengumuman" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" placeholder="Judul" class="form-control" name="judul" required value="{{ old('judul') }}" />
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" rows="5" placeholder="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="customFile">Dokumen Tugas</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="file">
                                <label class="custom-file-label" for="customFile">Pilih file Pengumuman</label>
                                <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal tambah -->
@endsection

@section('page-vendor-js')
    <script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('/admin/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>

    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>

    <script>
        // $.ajax("/administrator/class-data")
        //     .done(function(data) {
        //         console.log(data);
        //     })

        $('#kelas-siswa').DataTable({
            ajax: '/administrator/class-data',
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
                    data: 'id'
                },
                {
                    data: 'jenjang',
                    className: 'text-uppercase'

                },
                {
                    data: 'kelas'
                },
                {
                    data: 'jml_siswa'
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
        $('.head-table').html('<h6 class="mb-0">Kelas Siswa</h6>')
    </script>
@endsection
