<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?= TSD_Infinisite\Acme::browser_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>


    <!-- Font embed code goes here -->

</head>
<body <? body_class() ?>>

<div class="off-canvas position-right" id="offCanvas" data-off-canvas>
    <? $device_templates = get_field("offcanvas_device_templates", "options") ?>
    <?= TSD_Infinisite\Acme::display_templates_per_device_size($device_templates, [
        'container_class' => 'full-height'
    ]) ?>
</div>

<div class="off-canvas-content" data-off-canvas-content>
<? // rest of the site lives here ?>