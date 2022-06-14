
    <div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Menu</li>

            <li>
                <a href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/dashboard">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i data-feather="grid"></i>
                    <span data-key="t-apps">Apps</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li>

                        <a href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/usersView">
                            <span data-key="t-calendar">Usuarios</span>
                        </a>

                        <a href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/productos">
                            <span data-key="t-calendar">Productos</span>
                        </a>
                    </li>
                </ul>

            </li>
        </ul>
    </div>
</div>
</div>