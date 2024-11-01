<? $buttons = $module['buttons'] ?>
<? $config = $module['config'] ?>
<? $group_buttons = count($module['buttons']) != 1 ?>
<? $alignment = $group_buttons ? "align-{$config['alignment']}" : "text-{$config['alignment']}" ?>
<div class="grid-x ispb-button-module">
    <div class="cell <?= $alignment ?>">
        <div class="<?= $group_buttons ? 'button-group' : '' ?> <?= $group_buttons ? $alignment : '' ?>">
            <? foreach ($buttons as $button): ?>
                <? $link = $button['link'] ?>
                <a href="<?= $link['url'] ?>" class="button <?= $config['color_select'] ?>" target="<?= $link['target'] ?>">
                    <?= $link['title'] ?>
                </a>
            <? endforeach ?>
        </div>
    </div>
</div>