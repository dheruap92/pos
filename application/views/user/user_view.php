<div class="section">
    <div class="section-header">
        <h1>Main</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">User</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table User</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("user/add"); ?>" class="btn btn-success"><i class='fa fa-plus'></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user->result() as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->username ?></td>
                                        <td><?= $row->name ?></td>
                                        <td><?= $row->address ?></td>
                                        <td><?= ($row->level == 1) ? "Admin" : "Kasir" ?></td>
                                        <td>
                                            <form action="<?= site_url("user/del/") ?>" method="POST">
                                                <a href="<?= site_url("user/edit/" . $row->user_id) ?>" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit"></i></a>
                                                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                                                <button class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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