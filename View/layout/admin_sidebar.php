<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="/<?= $_SESSION['user_info']['avatar'] ?>" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4"><?= $_SESSION['user_info']['login'] ?></h1>
            <p><?= $_SESSION['user_info']['role'] ?></p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="active"><a href="/admin"> <i class="icon-home"></i>Главная</a></li>
        <li><a href="/admin/post"> <i class="icon-website"></i>Посты</a></li>
        <li><a href="/admin/page/"> <i class="icon-page"></i>Страницы</a></li>
        <li><a href="/admin/comment"> <i class="fa fa-comments"></i>Комментарии</a></li>
        <li><a href="/admin/subscride"> <i class="icon-mail"></i>Подписки</a></li>
        <li><a href="/admin/user"> <i class="icon-user"></i>Пользователи</a></li>
        <li><a href="/admin/setting"> <i class="fa fa-cogs"></i>Настройки</a></li>
    </ul>
</nav>
