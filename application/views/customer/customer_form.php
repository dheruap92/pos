<div class="section">
    <div class="section-header">
        <h1>Main</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">Add User</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form <?= strtoupper($page) ?> customer</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("customer"); ?>" class="btn btn-success"><i class='fa fa-arrow-left'></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-4">
                            <form class="form" action="<?= site_url("customer/proces") ?>" method="POST">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                                    <input type="text" name="name" id="name" value="<?= $row->name ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Gender *</label>

                                    <select name="gender" id="gender" class="form-control" required="required">
                                        <option value="">Pilih</option>
                                        <option value="L" <?= ($row->gender == "L") ? "selected" : null ?>>Laki-Laki</option>
                                        <option value="P" <?= ($row->gender == "P") ? "selected" : null ?>>Perempuan</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" id="phone" value="<?= $row->phone ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="addr" id="addr" class="form-control" rows="3"><?= $row->address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>Save</button>
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