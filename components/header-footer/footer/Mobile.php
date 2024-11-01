<footer class="grid-y grid-padding-x grid-padding-y row">

    <? if ($img): ?>
        <div class="cell shrink logo text-center">
            <div class="spacer small"></div>
            <a href="<?= site_url() ?>">
                <img src="<?= $img['sizes']['medium'] ?>" alt="Footer Logo"/>
            </a>
            <div class="spacer small"></div>
        </div>
    <? endif ?>

    <h2 class="white-text text-center"><?= get_bloginfo("name") ?></h2>

    <? if ($social_media): ?>
        <div class="cell social-media-area text-center">
            <?= $social_media ?>
        </div>
    <? endif ?>

    <? if ($primary_content): ?>
        <div class="cell">
            <?= $primary_content ?>
        </div>
    <? endif ?>

    <? if ($primary_menu): ?>
        <div class="cell">
            <div class="primary-menu-area">
                <? wp_nav_menu([
                    'menu' => $primary_menu,
                    'menu_class' => 'vertical accordion-menu menu white-text-children',
                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
                    'walker' => new TSD_Infinisite\accordion_menu_walker()
                ]) ?>
            </div>
        </div>
    <? endif ?>

    <? if ($secondary_content): ?>
        <div class="cell">
            <?= $secondary_content ?>
        </div>
    <? endif ?>

</footer>