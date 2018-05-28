<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img
            class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
            alt="User Image"
        >
        <div>
            <p class="app-sidebar__user-name">Иванов Иван</p>
            <p class="app-sidebar__user-designation">Менеджер</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">
                <i class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">Панель управления</span>
            </a>
        </li>

        <li class="treeview @if (Route::is('admin.blog.*')) is-expanded @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-newspaper"></i>
                <span class="app-menu__label">Новости</span>
                <i class="treeview-indicator fa fa-angle-right"></i>

            </a>

            <ul class="treeview-menu">
                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.blog.categories.index')) active @endif"
                        href="{{ route('admin.blog.categories.index') }}"
                    ><i class="icon far fa-circle"></i> Категории</a>
                </li>

                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.blog.articles.index')) active @endif"
                        href="{{ route('admin.blog.articles.index') }}"
                    ><i class="icon far fa-circle"></i> Статьи</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>