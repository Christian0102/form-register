<?php include ROOT . '/public/views/layouts/header.php'; ?>
<div class="main">
    <aside>
        <div class="sidebar left ">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>bootstrap develop</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="list-sidebar bg-defoult">
                <li> <a href="/admin/index"><i class="fas fa-user"></i> <span class="nav-label">Profile</span></a> </li>
                <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
                <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li>
            </ul>
        </div>
    </aside>
</div>
<div class="absolute">
    <div class="card mr-3" style="width: 10rem;">
        <img class="card-img-top" src="../public/assets/img/37531538.jpg" alt="Card image cap">
    </div>
    <p class="card-text mt-3 mb-2">Username: <?php echo $user['username'];?></p>
    <p class="card-text mt-3 mb-2">Email: <?php echo $user['email'];?></p>
    <?php if (isset($_SESSION['flash'])) : ?>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success"><?php SessionHelper::getFlashMessage(); ?></li>
    </ul>
    <?php endif; ?>
</div>

<?php include ROOT . '/public/views/layouts/footer.php'; ?>