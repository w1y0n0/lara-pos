@extends('layouts.master')

@section('title')
    Edit Profil
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Profil</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <form action="{{ route('user.updateProfil') }}" method="post" class="form-profil" data-toggle="validator"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="name" id="name" required autofocus
                                    data-required-error="Nama wajib diisi" value="{{ $profil->name }}">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-2 col-lg-offset-1 control-label">Email</label>
                            <div class="col-lg-4">
                                <input type="email" name="email" id="email" class="form-control" required
                                    data-required-error="Email wajib diisi" value="{{ $profil->email }}">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-lg-2 col-lg-offset-1 control-label">Foto Profil</label>
                            <div class="col-lg-4">
                                <input type="file" name="foto" class="form-control" id="foto"
                                    onchange="preview('.tampil-foto', this.files[0])">
                                <span class="help-block with-errors"></span>
                                <br>
                                <div class="tampil-foto">
                                    <img src="{{ $profil->foto ? url($profil->foto) : url('img/user.png') }}"
                                        width="200">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-lg-2 col-lg-offset-1 control-label">Username</label>
                            <div class="col-lg-4">
                                <input type="text" name="username" id="username" class="form-control" required
                                    data-required-error="Username wajib diisi" value="{{ $profil->username }}">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old_password" class="col-lg-2 col-lg-offset-1 control-label">Password Lama</label>
                            <div class="col-lg-4">
                                <input type="password" name="old_password" id="old_password" class="form-control"
                                    data-minlength="6" data-minlength-error="Password minimal 6 karakter">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-lg-2 col-lg-offset-1 control-label">Password Baru</label>
                            <div class="col-lg-4">
                                <input type="password" name="password" id="password" class="form-control"
                                    data-minlength="6" data-minlength-error="Password minimal 6 karakter"
                                    data-required-error="Password baru wajib diisi">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-lg-2 col-lg-offset-1 control-label">
                                Konfirmasi Password Baru</label>
                            <div class="col-lg-4">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" data-match="#password"
                                    data-required-error="Konfirmasi password baru wajib diisi"
                                    data-match-error="Konfirmasi password baru tidak sama dengan password baru">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group row">
                                <label class="col-lg-2 col-lg-offset-1 control-label"> </label>
                                <div class="col-lg-2">
                                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan
                                        Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#old_password').on('keyup', function() {
                if ($(this).val() != "") $('#password, #password_confirmation').attr('required', true);
                else $('#password, #password_confirmation').attr('required', false);
            });

            $('.form-profil').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('.form-profil').attr('action'),
                            type: $('.form-profil').attr('method'),
                            data: new FormData($('.form-profil')[0]),
                            async: false,
                            processData: false,
                            contentType: false
                        })
                        .done(response => {
                            $('[name=name]').val(response.name);
                            $('[name=email]').val(response.email);
                            $('[name=username]').val(response.username);
                            $('.tampil-foto').html(
                                `<img src="{{ url('/') }}${response.foto}" width="200">`);

                            $('.img-profil').attr('src', `{{ url('/') }}${response.foto}`);
                            $('.name-profil').text(response.name);
                            $('.email-profil').text(response.email);

                            $('.alert').fadeIn();
                            setTimeout(() => {
                                $('.alert').fadeOut();
                            }, 3000);
                        })
                        .fail(errors => {
                            if (errors.status == 422) {
                                alert(errors.responseJSON);
                            } else {
                                alert('Tidak dapat menyimpan data');
                            }
                            return;
                        });
                }
            });
        });
    </script>
@endpush
