<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <title><?= $params['page_title'] ?></title>
    <?php foreach ($params['fonts'] as $font) : ?>
        <link rel="stylesheet" href="<?= $font ?>" />
    <?php endforeach ?>
    <?php foreach ($params['css'] as $css) : ?>
        <link rel="stylesheet" href="<?= $css ?>" type="text/css" />
    <?php endforeach ?>
</head>

<body class="<?php echo $params['body_class'] ?> minimized_left_menu-">
    <div id="booknetic_progress" class="booknetic_progress_waiting booknetic_progress_done">
        <dt></dt>
        <dd></dd>
    </div>
    <?php require __DIR__ . '/sidebar.php' ?>
    <?php require __DIR__ . '/topbar.php' ?>
    <div class="main_wrapper">
        <div class="content-top-menu d-none justify-content-end align-items-center d-md-flex">
            <p class="d-block mx-3 mb-0 user-name" data-user-key="<?= base64_encode(wp_get_current_user()->data->ID) ?>">Welcome <?= wp_get_current_user()->data->user_login ?>!</p>
            <a href="<?php site_url(FELINA_APP_ROUTE) ?>?p=dashboard" class="d-block mx-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#dashboard-t"></use>
                    </svg>
                </div>
            </a>
            <!-- <a href="<?php site_url(FELINA_APP_ROUTE) ?>?p=profile" class="d-block mx-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#profile-t"></use>
                    </svg>
                </div>
            </a> -->
            <a href="<?php echo wp_logout_url(site_url()) ?>" class="d-block ml-3">
                <div class="menu-icon">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="white" xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
                        <use xlink:href="<?php echo plugin_dir_url(__FILE__) ?>/booknetic/icons/icons.svg#sign_out-t"></use>
                    </svg>
                </div>
            </a>
        </div>
        <?php require __DIR__ . '/template/' . $params['page_name'] . '.php' ?>
    </div>

    <script type="text/javascript">
        <?php foreach ($params['js_var'] as $var => $value) : ?>
            const <?= $var ?> = '<?= $value ?>'
        <?php endforeach ?>
    </script>
    <?php foreach ($params['js'] as $js) : ?>
        <script src="<?= $js ?>"></script>
    <?php endforeach ?>
</body>

</html>