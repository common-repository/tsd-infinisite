<div class="is-submenu accordion">
    <div class="grid-x">
        <div class="small-12 cell">
            <?
            wp_nav_menu([
                'menu' => $module['menu'],
                'menu_class' => 'vertical accordion-menu menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
                'walker' => new TSD_Infinisite\accordion_menu_walker()
            ]);

            ?>
        </div>
    </div>
</div>