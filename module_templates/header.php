<?
$elem = $module['element'];
$has_link = is_array($module['link']);
$link = $module['link'];

$link_opener = $has_link ? "<a href='{$link['url']}' title='{$link['title']}' target='{$link['target']}'>" : '';
$link_closer = $has_link ? "</a>" : "";

$alignment = '';

if ($module['alignment'])
    $alignment = "align-{$module['alignment']}";

$color = $module['color_select'];

$class = $module['class'];

?>

<div class="is-header">
    <div class="grid-x">
            <div class="cell">
                <?= $link_opener ?>
                    <<?= $elem ?> class='module-element <?= $alignment ?> <?= $class ?> <?= $color ?>-text'>
                        <?= $module['text'] ?>
                    </<?= $elem ?>>
                <?= $link_closer ?>
            </div>
    </div>
</div>
