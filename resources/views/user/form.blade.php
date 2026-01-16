<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" id="name" class="form-control" required
                                data-required-error="Nama wajib diisi">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-lg-offset-1 control-label">Email</label>
                        <div class="col-lg-6">
                            <input type="email" name="email" id="email" class="form-control" required
                                data-required-error="Email wajib diisi">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-md-3 col-md-offset-1 control-label">Username</label>
                        <div class="col-md-6">
                            <input type="text" name="username" id="username" class="form-control" required
                                data-required-error="Username wajib diisi">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-lg-offset-1 control-label">Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password" id="password" class="form-control" 
                                required data-required-error="Password wajib diisi"
                                data-minlength="6" data-minlength-error="Password minimal 6 karakter">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-lg-3 col-lg-offset-1 control-label">
                            Konfirmasi Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required 
                                data-required-error="Konfirmasi password wajib diisi"
                                data-match="#password"
                                data-match-error="Konfirmasi password tidak sama dengan password">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
