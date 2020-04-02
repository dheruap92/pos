<div class="section">
    <div class="section-header">
        <h1>Dasboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">category</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <?php $this->view("message"); ?>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table Category</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("category/add"); ?>" class="btn btn-success"><i class='fa fa-plus'></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-md" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row->result() as $key  => $value) { ?>
                                    <tr>
                                        <td style="width:5%"><?= $no++ ?></td>
                                        <td><?= $value->name ?></td>
                                        <td>
                                            <a href="<?= site_url("category/edit/" . $value->category_id) ?>" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="<?= site_url("category/del/" . $value->category_id) ?>" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Yakin Akan Menghapus Data')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">

                </div>
            </div>
        </div>
    </div>
</div>