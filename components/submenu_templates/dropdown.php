<div class="is-submenu dropdown">
    <div class="grid-x">
        <div class="small-12 cell">
            <?
            wp_nav_menu([
                'menu' => $module['menu'],
                'menu_class' => 'dropdown menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                'walker' => new TSD_Infinisite\top_menu_bar_walker()
            ]);

            ?>
        </div>
    </div>
</div>