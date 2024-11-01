<?php
header("Content-type: text/css; charset: UTF-8");
require($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');


$wrappers = [
    '.is_page_builder',
    '#tinymce',
    '[data-editor-style]'
];


$colors = TSD_Infinisite\Acme::get_colors();

print "
a.button {
color: white;
}";


foreach ($colors as $role => $value):
    $label = str_replace(' ', '_', strtolower($role));
    print "
.{$label}-background {
    background-color: {$value}
}
";
endforeach;


foreach ($colors as $role => $value):
    $label = str_replace(' ', '_', strtolower($role));
    print "
.button.{$label} {
    background: {$value}
}
";
endforeach;

print "\n";


$background_config = get_field("background_options", "options");
$container_config = get_field("container_options", "options");

//\TSD_Infinisite\Acme::dbg($container_config);

print "

body:not(.wp-admin) {
    min-height: 100vh;
    
    background-image: url({$background_config['image']['url']});
    background-color: {$background_config['color']};
    background-blend-mode: multiply;
    background-size: cover;
    background-position: center;
}

.is-page-builder-wrapper {
    padding-top: {$container_config['wrapper_padding']['top']};
    padding-right: {$container_config['wrapper_padding']['right']};
    padding-bottom: {$container_config['wrapper_padding']['bottom']};
    padding-left: {$container_config['wrapper_padding']['left']};
}

.is-page-builder-container {

    max-width: {$container_config['width']['large']};
    margin: auto;

    background-image: url({$container_config['container_background']['image']['url']});
    background-color: {$container_config['container_background']['color']};
    background-blend-mode: multiply;
    background-size: cover;
    background-position: center;
    
    padding-top: {$container_config['container_padding']['top']};
    padding-right: {$container_config['container_padding']['right']};
    padding-bottom: {$container_config['container_padding']['bottom']};
    padding-left: {$container_config['container_padding']['left']};
    
    border-top: {$container_config['container_border']['top']};
    border-right: {$container_config['container_border']['right']};
    border-bottom: {$container_config['container_border']['bottom']};
    border-left: {$container_config['container_border']['left']};
}


.is_ace_editor textarea {
  background-color: #f7f7f7;
    border-bottom: 2px solid green;
    
}


";

