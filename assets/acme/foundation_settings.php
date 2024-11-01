<? TSD_Infinisite\Foundation::update_scss(1) ?>
<div class="grid-x">
    <div class="cell auto">
        <? $settings = TSD_Infinisite\Foundation::get_options() ?>
        <? TSD_Infinisite\Acme::dbg($settings) ?>
    </div>
    <div class="cell auto">
        <? $sheet = TSD_Infinisite\Foundation::get_generated_css() ?>
        <? TSD_Infinisite\Acme::dbg($sheet) ?>
    </div>
</div>