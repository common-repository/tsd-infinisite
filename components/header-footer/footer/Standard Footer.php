<div class="grid-container fluid no-padding">
    <div class="row">
        <div class="spacer small"></div>
    </div>
    <div class="grid-container">
        <footer class="grid-x grid-padding-x align-middle">
            <? if ($img): ?>
                <div class="cell shrink logo">
                    <a href="<?= site_url() ?>">
                        <img src="<?= $img['sizes']['medium'] ?>" alt="Header Logo"/>
                    </a>
                </div>
            <? endif ?>

            <? if ($primary_content || $secondary_content): ?>
                <div class="cell auto">
                    <div class="grid-x">
                        <? if ($primary_content): ?>
                            <div class="cell auto">
                                <div class="secondary-content">
                                    <?= $primary_content ?>
                                </div>
                            </div>
                        <? endif ?>

                        <? if ($secondary_content): ?>
                            <div class="cell auto">
                                <div class="secondary-content">
                                    <?= $secondary_content ?>
                                </div>
                            </div>
                        <? endif ?>
                    </div>
                </div>
            <? endif ?>

            <? if ($primary_menu): ?>
                <div class="cell auto">
                    <? if ($primary_menu): ?>
                        <div class="primary-menu-area">
                            <? wp_nav_menu([
                                'menu' => $primary_menu,
                                'menu_class' => 'dropdown menu white-text-children',
                                'items_wrap' => '<ul id="%1$s" class="%2$s align-right" data-dropdown-menu>%3$s</ul>',
                                'walker' => new TSD_Infinisite\top_menu_bar_walker()
                            ]) ?>
                        </div>
                    <? endif ?>
                </div>

            <? endif ?>


        </footer>
    </div>
    <div class="row">
        <div class="spacer small"></div>
    </div>
</div>