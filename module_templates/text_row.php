<? // TODO: depreciate me - i'm a bunch of page builder cells ?>
<? $cell_count = $module['cells_per_row'] ? $module['cells_per_row'] : 3 ?>

<div class="is-text_row">
    <div class="grid-x grid-padding-x grid-padding-y medium-up-<?= $cell_count ?>">
        <? foreach ($module['columns'] as $text_row): ?>
            <div class="cell">
                <?= $text_row['content'] ?>
            </div>
        <? endforeach ?>
    </div>
</div>