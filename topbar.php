<div class="top_side_menu">
    <div class="t_m_left">
        <button class="btn btn-default btn-lg d-md-none" type="button" id="open_menu_bar"><i class="fa fa-bars"></i></button>
        <div class="content-top-menu d-flex justify-content-end align-items-center d-md-none">
            <p class="d-block mx-2 mx-sm-3 mb-0 user-name">Welcome <?php echo $user_name ?>!</p>
            <a href="<?php site_url(FELINA_APP_ROUTE) ?>?p=dashboard" class="d-block mx-2 mx-sm-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#dashboard"></use>
                    </svg>
                </div>
            </a>
            <a href="<?php site_url(FELINA_APP_ROUTE) ?>?p=profile" class="d-block mx-2 mx-sm-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#profile"></use>
                    </svg>
                </div>
            </a>
            <a href="<?php echo wp_logout_url(site_url()) ?>" class="d-block ml-2 ml-sm-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#sign_out"></use>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>