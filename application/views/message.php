<?php if ($this->session->has_userdata("success")) { ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <?= $this->session->flashdata("success") ?>
        </div>
    </div>
<?php } else if ($this->session->has_userdata("error")) { ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <?= strip_tags(str_replace("</p>", "", $this->session->flashdata("error"))) ?>
        </div>
    </div>
<?php } ?>