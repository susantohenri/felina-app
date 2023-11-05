<div class="left_side_menu">
    <div class="l_m_head">
        <img class="main-logo" src="<?= $params['logo_src'] ?>" alt="">
    </div>
    <div class="menu_separator"></div>
    <ul class="l_m_nav">
        <?php foreach ($params['sidebar_menu'] as $menu) : ?>
            <li class="l_m_nav_item <?= $menu['page_name'] == $params['page_name'] ? 'active_menu' : '' ?>">
                <a href="<?php site_url(FELINA_APP_ROUTE) ?>?p=<?= $menu['page_name'] ?>" class="l_m_nav_item_link">
                    <div class="menu-icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                            <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#<?= $menu['icon'] ?>"></use>
                        </svg>
                    </div>
                    <span class="l_m_nav_item_text <?= $menu['page_name'] ?>-text"><?= $menu['display_name'] ?></span>
                </a>
            </li>
        <?php endforeach ?>
        <li class="l_m_nav_item">
            <a href="<?php echo wp_logout_url(site_url()) ?>" class="l_m_nav_item_link">
                <div class="menu-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#sign_out"></use>
                    </svg>
                </div>
                <span class="l_m_nav_item_text">Sign Out</span>
            </a>
        </li>
    </ul>
</div>