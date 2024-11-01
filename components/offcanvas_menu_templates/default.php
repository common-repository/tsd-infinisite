<div class="full-height grid-x align-middle padding-box">
    <div class="cell">

        <?
        $off_canvas_menu = new TSD_Infinisite\Off_Canvas_Menu();

        // TODO: how do we integrate this with the theme gui?
        $menus = [];

        $menus_to_display = apply_filters("is_off_canvas_menu", $menus);

        do_action("before_is_offcanvas_menu");

        foreach ($menus_to_display as $site_menu)
            $off_canvas_menu->print_menu($site_menu);

        do_action("after_is_offcanvas_menu");

        ?>
    </div>
</div>