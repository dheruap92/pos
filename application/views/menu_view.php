<?php $uri1 = $this->uri->segment(1) ?>
<ul class="sidebar-menu">
    <li class="menu-header">Main Navigation</li>
    <li <?php echo $uri1 == 'dashboard' || $uri1 == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
    <li <?php echo $uri1 == 'suplier' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('suplier') ?>"><i class="fas fa-shipping-fast"></i> <span>Suplier</span></a></li>
    <li <?php echo $uri1 == 'pelanggan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('pelanggan') ?>"><i class="fas fa-users"></i> <span>Customers</span></a></li>
    <li class="dropdown <?php echo $uri1 == 'unit' ||  $uri1 == 'category' || $uri1 == 'item' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Product</span></a>
        <ul class="dropdown-menu">
            <li <?php echo $uri1 == 'category' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('category') ?>">Categories</a></li>
            <li <?php echo $uri1 == 'unit' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('unit') ?>">Unit</a></li>
            <li <?php echo $uri1 == 'item' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('item') ?>">Item</a></li>
        </ul>
    </li>
    <?php if ($this->fungsi->user_login()->level == 1) { ?>
        <li class="menu-header">Setting</li>
        <li <?php echo $uri1 == 'user' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('user') ?>"><i class="far fa-user"></i> <span>Users</span></a></li>
    <?php } ?>
</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Panduan Aplikasi <?= $this->fungsi->apps()->title_apps ?>
    </a>
</div>