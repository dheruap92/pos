<div class="section">
    <div class="section-header">
        <h1>Main</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">Edit User</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit User</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("user"); ?>" class="btn btn-success"><i class='fa fa-arrow-left'></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-4">
                            <form class="form" action="" method="POST">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="hidden" name="inputId" id="inputId" class="form-control" value="<?= $row->user_id ?>">
                                    <input type="text" name="inputName" id="inputName" value="<?= $this->input->post('inputName') ? $this->input->post('inputName') : $row->name; ?>" class="form-control <?= form_error('inputName') ? "is-invalid" : null ?>">
                                    <div class="invalid-feedback"><?= form_error('inputName') ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Username*</label>
                                    <input type="text" name="inputUsername" id="inputUsername" value="<?= $this->input->post('inputUsername') ? $this->input->post('inputUsername') : $row->username;  ?>" class="form-control <?= form_error('inputUsername') ? 'is-invalid' : null ?>">
                                    <div class="invalid-feedback"><?= form_error('inputUsername') ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Password <small>(Biarkan kosong jika tidak diganti)</small></label>
                                    <input type="password" name="inputPassword" id="inputPassword" value="<?= $this->input->post("inputPassword"); ?>" class="form-control <?= form_error('inputPassword') ? 'is-invalid' : null ?>">
                                    <div class="invalid-feedback"><?= form_error('inputPassword') ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation <small>(Biarkan kosong jika tidak diganti)</small></label>
                                    <input type="password" name="inputPasswordConf" id="inputPasswordConf" value="<?= $this->input->post("inputPassword"); ?>" class="form-control <?= form_error('inputPasswordConf') ? 'is-invalid' : null ?>">
                                    <div class="invalid-feedback"><?= form_error('inputPasswordConf') ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Address *</label>
                                    <textarea name="inputAddress" id="inputAddress" cols="30" rows="10" class="form-control <?= form_error('inputAddress') ? 'is-invalid' : null ?>"><?= $this->input->post('inputAddress') ? $this->input->post('inputAddress') : $row->address;  ?></textarea>
                                    <div class="invalid-feedback"><?= form_error('inputAddress') ?></div>

                                </div>
                                <div class="form-group">
                                    <label>Level *</label>
                                    <select name="inputLevel" id="inputLevel" class="form-control <?= form_error('inputLevel') ? 'is-invalid' : null ?>">
                                        <?php $level = $this->input->post("inputLevel") ? $this->input->post('inputLevel') : $row->level ?>
                                        <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                        <option value="2" <?= $level == '2' ? 'selected' : null ?>>Kasir</option>
                                    </select>
                                    <div class="invalid-feedback"><?= form_error('inputLevel') ?></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">

                </div>
            </div>
        </div>
    </div>
</div>