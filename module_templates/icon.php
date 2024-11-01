<?
use SVG\SVGImage;

include INFINISITE_URI . 'assets/acme/foundation-5-brand-lookup.php';
$has_link = is_array($module['link']);
$link = $module['link'];

$link_opener = $has_link ? "<a href='{$link['url']}' title='{$link['title']}' target='{$link['target']}'>" : '';
$link_closer = $has_link ? "</a>" : "";
?>
<div class="is-icon">
    <div class="grid-x">
        <div class="small-12 cell text-center">
            <? $library = in_array($module['icon'], $foundation_5_brands) ? 'fab' : 'fas'; ?>
            <?= $link_opener ?>
            <? if ($module['icon']): ?>
                <i
                        class="
                        <?= $library ?>
                        fa-<?= $module['icon'] ?>
                        <?= $module['size'] ?>
                        <?= $module['animation_effects'] ?>
                        <?= $module['rotate_flip'] ?>
                        <?= $module['color_select'] ?>-text
                    "
                    ></i>
            <? else: ?>
                <?
                $icon = SVGImage::fromFile($module['svg']['url']);
                $doc = $icon->getDocument();
                $icon_path = $doc->getChild(0);
                $icon_path->setStyle('fill', '#0000FF');
                print $icon;
                ?>
            <? endif ?>
            <? if ($module['caption']): ?>
                <div class="spacer xsmall"></div>
                <p class="small <?= $module['color_select'] ?>-text"><?= $module['caption'] ?></p>
            <? endif ?>
            <?= $link_closer ?>
        </div>
    </div>
</div>