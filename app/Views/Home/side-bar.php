<html>
<div class="flex">
    <nav class="side-nav">
        <a href="<?= base_url() ?>" class="intro-x flex items-center pl-5 pt-4">
            <img alt="PT PAL Indonesia (Persero)" class="w-25" src="<?= base_url() ?>/images/logopal.png">
        </a>
        <!-- BEGIN: side-mobile -->
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="<?= base_url() ?>" class="side-menu <?php if ($page == "Dashboard") echo "side-menu--active" ?>">
                    <div class="side-menu__icon"> <i data-feather="monitor"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/file-manager" class="side-menu <?php if ($page == "File Manager") echo "side-menu--active" ?>">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> File Manager </div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-point-of-sale.html" class="menu">
                    <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                    <div class="menu__title"> Point of Sale </div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-chat.html" class="menu">
                    <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                    <div class="menu__title"> Chat </div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-post.html" class="menu">
                    <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="menu__title"> Post </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="edit"></i> </div>
                    <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-crud-data-list.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Data List </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-crud-form.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Form </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END: side-mobile -->
        <!-- BEGIN: side-Desktop -->
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="<?= base_url() ?>" class="side-menu <?php if ($page == "Dashboard") echo "side-menu--active" ?>">
                    <div class="side-menu__icon"> <i data-feather="monitor"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/file-manager" class="side-menu <?php if ($page == "File Manager") echo "side-menu--active" ?>">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> File Manager </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                    <div class="side-menu__title"> Crud <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-crud-data-list.html" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Data List </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-crud-form.html" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Form </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- BEGIN: side-Desktop -->
    </nav>
    <!-- BEGIN: data-feather script-->
    <!-- BEGIN: data-feather script-->

</html>