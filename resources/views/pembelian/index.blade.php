@extends('layouts.master')

@section('title')
    Daftar Pembelian
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Pembelian</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <button onclick="addForm()" 
                        class="btn btn-success btn-xs btn-flat">
                        <i class="fa fa-plus-circle"></i> Transaksi Baru
                    </button>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @includeIf('pembelian.supplier')
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable();
        });

        // Fungsi untuk membuka modal pilih supplier
        function addForm() {
            $('#modal-supplier').modal('show');
        }
    </script>
@endpush
