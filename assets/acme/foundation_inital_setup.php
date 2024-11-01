<?


$foundation_global_options_fields = '';
include(INFINISITE_URI . 'assets/acme/foundation6-4-3_global_options_fields.php');


$primary_init_array = TSD_Infinisite\Foundation::build_foundation_inital_array(1);
?>

<div style="width: 50%; float: left">
    <? TSD_Infinisite\Acme::dbg($primary_init_array[0]); ?>
</div>
<div style="width: 50%; float: left">
    <? TSD_Infinisite\Acme::dbg($primary_init_array[1]); ?>
    <? TSD_Infinisite\Acme::dbg($foundation_global_options_fields); ?>
</div>