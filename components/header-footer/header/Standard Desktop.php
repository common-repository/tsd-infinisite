<div class="grid-container fluid no-padding">
    <div class="grid-y">
        <div class="cell">
            <div class="spacer xsmall"></div>
        </div>
        <? if ($top_links): ?>
            <div class="cell">
                <div class="top-bar">
                    <div class="grid-container">
                        <div class="top-bar">
                            <div class="top-bar-left">
                                <ul class="dropdown menu" data-dropdown-menu>
                                    <li class="menu-text"><?= get_bloginfo("name") ?></li>
                                </ul>
                            </div>
                            <div class="top-bar-right">
                                <? wp_nav_menu([
                                    'menu' => $top_links,
                                    'menu_class' => 'dropdown menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                                    'walker' => new TSD_Infinisite\top_menu_bar_walker()
                                ]) ?>

                                <? if (false): ?>
                                    <? // TODO: enable search ?>
                                    <form class="is-standard-header-form-search" action="<?= get_site_url() ?>">
                                        <ul class="menu align-middle">
                                            <li><input type="search" name="s" placeholder="Search"></li>
                                            <li><input type="submit" class="button"/></li>
                                        </ul>
                                    </form>
                                <? endif ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <? endif ?>
        <div class="cell">
            <div class="grid-container align-middle">
                <div class="grid-x grid-padding-x medium-header align-middle">

                    <? if ($img): ?>
                        <div class="cell shrink logo">
                            <a href="<?= site_url() ?>">
                                <img src="<?= $img['sizes']['medium'] ?>" alt="Header Logo"/>
                            </a>
                        </div>
                    <? endif ?>


                    <div class="cell auto">
                        <div class="grid-y">
                            <? if ($primary_menu): ?>
                                <div class="cell primary-menu-area">
                                    <? wp_nav_menu([
                                        'menu' => $primary_menu,
                                        'menu_class' => 'dropdown menu',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s align-right" data-dropdown-menu>%3$s</ul>',
                                        'walker' => new TSD_Infinisite\top_menu_bar_walker()
                                    ]) ?>
                                </div>
                            <? endif ?>



                            <? if ($secondary_menu): ?>

                                <div class="cell shrink">
                                    <? wp_nav_menu([
                                        'menu' => $secondary_menu,
                                        'menu_class' => 'dropdown menu',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s align-right" data-dropdown-menu>%3$s</ul>',
                                        'walker' => new TSD_Infinisite\top_menu_bar_walker()
                                    ]) ?>
                                </div>

                            <? endif ?>

                            <? if ($social_media): ?>
                                <div class="cell social-media">
                                    <?= $social_media ?>
                                </div>
                            <? endif ?>
                        </div>
                    </div>


                    <? if ($overlay_menu): ?>

                        <div class="cell padding-x shrink">
                            <span class="fa-stack fa-2x primary-text-children cursor_pointer no_outline" data-open="overlay-menu-modal"
                                  aria-controls="overlay-menu-modal" aria-haspopup="true" tabindex="0">
                                <i class="fa fa-bars fa-stack-1x"></i>
                                <i class="far fa-circle fa-stack-2x"></i>
                            </span>
                        </div>



                        <div class="reveal large is-desktop-header-reveal-menu"
                             id="overlay-menu-modal"
                             data-reveal
                             data-animation-in="fade-in"
                             data-animation-out="fade-out"
                        >
                            <div class="grid-x">
                                <div class="cell auto">
                                    <div class="grid-y">
                                        <div class="cell">
                                            <? wp_nav_menu([
                                                'menu' => $overlay_menu,
                                                'menu_class' => 'align-center dropdown menu is-overlay-menu',
                                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            ]) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="cell shrink">
                                    <p class="no-margin" data-close>
                                        <i class="far fa-times-circle fa-2x white-text"></i>
                                    </p>
                                </div>
                            </div>

                        </div>

                    <? endif ?>

                </div>

            </div>
        </div>

        <? if ($large_menu_template)
            include(INFINISITE_URI . 'components/header-footer/large_menu/' . $large_menu_template) ?>

        <div class="cell">
            <div class="spacer xsmall"></div>
        </div>
    </div>
</div>