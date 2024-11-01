<? $img = get_field("header_logo", "option") ?>
<div class="grid-x medium-header align-middle grid-padding-x">
    <div class="cell">
        <div class="spacer xsmall"></div>
    </div>
    <? if ($img): ?>
        <div class="cell auto logo">
            <a href="<?= site_url() ?>">
                <img src="<?= $img['sizes']['medium'] ?>" alt="Header Logo"/>
            </a>
        </div>
    <? endif ?>

    <div class="cell shrink mobile-menu-trigger-container text-right white-text-children">
        <i class="fa fa-bars fa-2x" data-toggle="offCanvas"></i>
    </div>

    <div class="cell">
        <div class="spacer xsmall"></div>
    </div>


    <? if ($social_media): ?>
        <div class="grid-x">
            <div class="cell auto social-media-area text-center">
                <?= $social_media ?>
            </div>

            <div class="cell">
                <div class="spacer xsmall"></div>
            </div>
        </div>
    <? endif ?>


</div>
