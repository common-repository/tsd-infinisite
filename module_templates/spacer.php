<?
$divider_colors = '';

$display_divider = is_array($module['divider_color']);

if ($display_divider)
    foreach ($module['divider_color'] as $color)
        $divider_colors .= "$color ";
?>

<div class="is-spacer grid-x">
    <div class="cell">
        <div class="spacer <?= $module['size'] ?> flex align-<?= $module['divider_position'] ?>">
            <? if ($display_divider): ?>
                <div class="is_divider <?= $divider_colors ?>"></div>
            <? endif ?>
        </div>
    </div>
</div>