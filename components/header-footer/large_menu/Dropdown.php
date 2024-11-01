<div class="grid-x row">
    <div class="cell">
        <hr>
        <? wp_nav_menu([
            'menu' => $large_menu,
            'menu_class' => 'dropdown menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s align-center" data-dropdown-menu>%3$s</ul>',
            'walker' => new TSD_Infinisite\top_menu_bar_walker()
        ]) ?>
        <hr>
    </div>
</div>