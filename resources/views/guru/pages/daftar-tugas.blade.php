@extends('guru.layouts.main')
@section('title', 'Daftar Tugas Siswa')
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
                            <h2 class="content-header-title float-left mb-0">Tugas</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Daftar Tugas Siswa
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
                                        <th>Mata Pelajaran</th>
                                        <th>Materi</th>
                                        <th>Waktu</th>
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

    <!-- Modal edit -->
    <div class="modal modal-slide-in fade" id="modal-edit">
        <div class="modal-dialog sidebar-xxl">
            <form method="POST" id="form-lihat-tugas" class="modal-content pt-0">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group">
                        <label class="form-label" for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mapel">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapel" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="materi">Materi</label>
                        <input type="text" class="form-control" id="materi" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="waktu">Waktu</label>
                        <input type="text" class="form-control" id="waktu" readonly />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">File Tugas</label>
                        <p><a href="javascript" id="file" target="_blank" rel="noopener noreferrer"></a></p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nilai">Nilai</label>
                        <input type="number" min="0" max="100" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" placeholder="0-100" />
                        @error('nilai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary mr-1"></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Modal edit -->

    @include('components.loader')

@endsection

@section('page-vendor-js')
    <script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>

    <script>
        // $.ajax("/guru/task-list")
        //     .done(function(data) {
        //         console.log(data);
        //     });

        $('#kelas-siswa').DataTable({
            ajax: '/guru/task-list',
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
                    data: 'nama',

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
                    data: 'created_sub_tugas'
                },
                {
                    data: 'id'
                },
            ],
            columnDefs: [{
                    targets: -1,
                    render: function(data, type, row, meta) {
                        let datas = [row.nis, row.nama, row.kelas, row.mapel, row.materi, row.created_sub_tugas, row.dok_sub_tugas, data];
                        return `
                        <a class="btn btn-sm btn-outline-primary text-nowrap" href="javascript:void(0);" data-toggle="modal" data-target="#modal-edit" onclick="value('${datas}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            <span>Nilai</span>
                        </a>
                        `;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row, meta) {
                        let date_submited = (data !== null) ? data : '';
                        return new Date(date_submited).toLocaleString('id', 'ID').replaceAll('/', '-').replaceAll('.', ':') + ' WIB';
                    }
                }
            ],
            initComplete: function() {
                this.api()
                    .columns([2]) // This is the hidden jurisdiction column index
                    .every(function() {
                        var column = this;
                        var select = $(`
                            <select class="form-control"><option value="">Semua Kelas</option></select>
                        `)
                            .appendTo($('.head-table').empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
        });
        // $('.head-table').html('<h6 class="mb-0">Daftar Tugas</h6>')
    </script>

    {{-- set value --}}
    <script>
        function value(datas = null) {
            let data = datas.split(',');
            // console.log(data)
            document.querySelector('#exampleModalLabel').textContent = 'Detil Tugas ' + data[1]

            let form = document.querySelector('#form-lihat-tugas');

            form.querySelector('#nis').value = data[0];
            form.querySelector('#nama').value = data[1];
            form.querySelector('#kelas').value = data[2];
            form.querySelector('#mapel').value = data[3];
            form.querySelector('#materi').value = data[4];
            form.querySelector('#waktu').value = data[5] ? data[5] : 'data tidak valid';
            form.querySelector('#file').setAttribute('href', '/files/tugas/' + data[6]);
            form.querySelector('#file').textContent = data[6] ? data[6] : 'tidak ada file terlmapir';

            $.ajax({
                    url: "/guru/value-data/" + data[7],
                    beforeSend: function() {
                        $('#loader').removeClass('d-none')
                    }
                })
                .done(function(d) {
                    $('#loader').addClass('d-none')
                    // console.log(d)

                    let nilai = '',
                        textButton = 'Beri Nilai',
                        form_action = '/guru/nilai/tambah/' + data[7];

                    if (d.data.length) {
                        nilai = d.data[0]['nilai'];
                        textButton = 'Update Nilai'
                        form_action = '/guru/nilai/ubah/' + data[7];
                    }

                    document.querySelector('#nilai').value = nilai;
                    form.querySelector('button[type="submit"]').textContent = textButton;
                    form.setAttribute('action', form_action);
                });

        }
    </script>
@endsection
