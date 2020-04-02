<div class="section">
    <div class="section-header">
        <h1>Main</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('user') ?>">Barcode Generator</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <?php $this->view("message") ?>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><?= strtoupper($page) ?> Barcode</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url("item"); ?>" class="btn btn-success"><i class='fa fa-arrow-left'></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            <?php
                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
                            ?>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <?= $row->barcode ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">

                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><?= strtoupper($page) ?> Qrcode</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">

                </div>
            </div>
        </div>
    </div>
</div>