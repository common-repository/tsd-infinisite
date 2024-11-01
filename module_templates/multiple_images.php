<div class="is-multiple_images">
    <div class="grid-x align-center align-middle grid-padding-x">
        <? foreach ($module['images'] as $image): ?>
            <?
            // TODO: unit test function doesn't put the image sizes on the image, so we need to put conditional fixes in place
            $url = isset($image['sizes']) ? $image['sizes']['medium'] : $image['url'];
            ?>
            <div class="cell shrink">
                <img src="<?= $url ?>" alt=""/>
            </div>
        <? endforeach ?>
    </div>
</div>