<? $title = $module['title'] ? $module['title'] : get_the_title() ?>

<div
        class="flex align-middle"
        style="
                background-image: url(<?= $module['image']['url'] ?>);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                background-color: rgba(17,60,109,.5);
                background-blend-mode: overlay;
                height: 350px;
                ">
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell medium-8 large-6 xlarge-4 padding-box white-background">
                <h1 class="no-margin"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>