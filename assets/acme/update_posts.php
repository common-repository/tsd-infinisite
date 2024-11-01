<?

$post_query = new WP_Query([
    'post_type' => 'press_releases',
    'posts_per_page' => -1
]);
?>

<div class="grid-x large-up-2">

    <? foreach ($post_query->posts as $post): ?>

        <div class="cell">

            <h2><?= $post->post_title ?></h2>
            <? // \TSD_Infinisite\Acme::dbg($data); ?>
            <? $test = wp_insert_post($post, 1); ?>
            <? $data = get_metadata('post', $post->ID) ?>
            <? // \TSD_Infinisite\Acme::dbg($test); ?>
            <? print_r(get_fields($post->ID)) ?>
        </div>


    <? endforeach; ?>
</div>
