<?
$args = json_decode($module['arguments'],1 );
$query = new \WP_Query($args);
?>
<div class="is_post_slider query_template">
    <div class="grid-container owl-carousel is-website-slider-query-module">

        <? foreach ($query->posts as $post): ?>
            <?
            $fields = get_fields($post->ID);
            $image = $fields['image'];
            $excerpt = $fields['excerpt'];

            ?>
            <div class="grid-x grid-padding-x align-middle">

                <div class="cell auto">
                    <img src="<?= $image['sizes']['large'] ?>" alt="">
                </div>

                <div class="cell auto">
                    <h3><?= $post->post_title ?></h3>
                    <?= $excerpt ?>
                </div>
            </div>

        <? endforeach ?>

    </div>
</div>