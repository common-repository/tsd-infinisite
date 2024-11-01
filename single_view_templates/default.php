<? $post = get_post(get_the_ID()); ?>
<? $fields = get_fields($post->ID) ?>

<?
$author = $fields['author_post'][0];
$author_link = get_permalink($author->ID);
$posts_by_this_author = new WP_Query([
    'post_type' => 'blog',
    'meta_query' => [
        [
            'key' => 'author_post',
            'value' => $author->ID,
            'compare' => 'LIKE'
        ]
    ]
]);

?>

<?= $outside_header ?>
    <div class="row">
        <div class="spacer small"></div>
    </div>
    <div class="grid-container">
        <div class='is-page-builder-wrapper grid-y'>

            <?= $inside_header ?>
            <?= $top_sidebar_html ?>


            <div class='cell'>
                <div class='grid-x grid-padding-x'>

                    <?= $left_sidebar_html ?>

                    <div class="cell">
                        <div class="grid-container grid-x grid-padding-x">
                            <div class="cell small-12 large-2">
                            </div>
                            <div class="cell small-12 large-7">
                                <h1><?= $post->post_title ?></h1>
                                <? if ($fields['author_post']): ?>
                                    <? foreach ($fields['author_post'] as $author): ?>
                                        <h5>By: <a href="<?= $author_link ?>"><?= $author->post_title ?></a></h5>
                                    <? endforeach ?>
                                <? endif ?>
                            </div>
                            <div class="cell small-12 large-3 align-self-bottom">
                                <div class="callout primary">
                                    <h6 class="primary_xxdark-text">Sharing</h6>
                                </div>
                                <div class="callout secondary">
                                    <h6 class="secondary_xdark-text">Tags</h6>
                                </div>
                            </div>
                            <div class="cell">
                                <div class="spacer small"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="grid-container grid-x grid-padding-x">
                            <div class="cell small-12 large-2">
                                <? if ($fields['image']): ?>
                                    <img src="<?= $fields['image']['sizes']['large'] ?>" alt="">
                                    <div class="row">
                                        <div class="spacer small"></div>
                                    </div>
                                <? endif ?>
                            </div>

                            <div class='cell small-12 large-7'>
                                <? if ($fields['content']): ?>
                                    <?= $fields['content'] ?>
                                <? endif ?>
                            </div>

                            <div class="cell small-12 large-3">
                                <? if ($posts_by_this_author->found_posts): ?>
                                    <h5>Posts by
                                        <a href="<?= $author_link ?>">
                                            <?= $author->post_title ?>
                                        </a>
                                    </h5>
                                    <ul>
                                        <? foreach ($posts_by_this_author->posts as $author_post): ?>
                                            <li>
                                                <a href="<?= get_permalink($author_post->ID) ?>"><?= $author_post->post_title ?></a>
                                            </li>
                                        <? endforeach ?>
                                    </ul>

                                <? endif ?>

                            </div>
                        </div>
                    </div>


                    <?= $right_sidebar_html ?>

                </div>
            </div>

            <?= $bottom_sidebar_html ?>
            <?= $inside_footer ?>

        </div>
    </div>

<? if ($outside_footer): ?>
    <div class="row">
        <div class="spacer large"></div>
    </div>
    <?= $outside_footer ?>
<? endif ?>