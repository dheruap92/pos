<div class="section">
    <div class="section-header">
        <h1>Main</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">Add User</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <?php $this->view("message") ?>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form <?= strtoupper($page) ?> Item</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("item"); ?>" class="btn btn-success"><i class='fa fa-arrow-left'></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-4">
                            <?= form_open_multipart("item/proces") ?>
                            <div class="form-group">
                                <label>Barcode *</label>
                                <input type="hidden" name="id" value="<?= $row->item_id ?>">
                                <input type="text" name="barcode" id="barcode" value="<?= $row->barcode ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" name="name" id="name" value="<?= $row->name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Category *</label>
                                <select name="category" id="category" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <?php foreach ($category->result() as $key => $value) { ?>
                                        <option value="<?= $value->category_id ?>" <?= $value->category_id == $row->category_id ? "selected" : "" ?>> <?= $value->name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category *</label>
                                <?= form_dropdown("unit", $unit, $selected_unit, "id='unit' class='form-control'") ?>
                            </div>
                            <div class="form-group">
                                <label>Price *</label>
                                <input type="text" name="price" id="price" value="<?= $row->price ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if ($row->image == NUll || $row->image == "default.png") {
                                    echo "No Image";
                                } else { ?>
                                    <img src="<?= base_url("upload/item/" . $row->image) ?>" alt="Stok Barang" width="100px"></td>
                                <?php } ?>
                                <input type="file" name="image" class="form-control">
                                <small>Biarkan Kosong Jika Data Barang Tidak Ada</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>Save</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">

                </div>
            </div>
        </div>
    </div>
</div>