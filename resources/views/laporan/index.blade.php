@extends('layouts.master')

@section('title')
    Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal, false) }} 
        s/d {{ tanggal_indonesia($tanggalAkhir, false) }}
@endsection

@push('css')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" 
        href="{{ asset('Dashboard/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@section('breadcrumb')
    @parent
    <li class="active">Laporan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <button onclick="updatePeriode()" class="btn btn-success btn-xs btn-flat">
                        <i class="fa fa-edit"></i> Ubah Periode
                    </button>
                    <a href="{{ route('laporan.exportPDF', [$tanggalAwal, $tanggalAkhir]) }}"
                        target="_blank" class="btn btn-info btn-xs btn-flat">
                        <i class="fa fa-file-pdf-o"></i> Export PDF</a>
                    </a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Penjualan</th>
                            <th>Pembelian</th>
                            <th>Pengeluaran</th>
                            <th>Pendapatan</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @includeIf('laporan.form')
@endsection

@push('scripts')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('Dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
                },
                columns: [
                    { data: 'DT_RowIndex', searchable: false, sortable: false },
                    { data: 'tanggal' },
                    { data: 'penjualan' },
                    { data: 'pembelian' },
                    { data: 'pengeluaran' },
                    { data: 'pendapatan' }
                ],
                dom: 'Brt',
                bSort: false,
                bPaginate: false,
            });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });

        function updatePeriode() {
            $('#modal-form').modal('show');
        }
    </script>
@endpush
