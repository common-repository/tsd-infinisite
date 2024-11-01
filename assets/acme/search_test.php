<?
// where there's testing, there's acme!
use TSD_Infinisite\Acme;

$palette = new \TSD_Infinisite\Palette();
$colors = $palette->shades;

$primary_light = $palette->shades['primary_light'];
$query = $_GET['search_test'];
$engines = Acme::get_searchwp_engines_for_page_builder_filter_object();

$query_args = [
    's' => $query,
];

?>

<div class="grid-container">
    <div class="grid-x grid-padding-x align-middle">
        <div class="cell shrink">
            <h1 class="secondary_dark">Search Debug
                <small>Query: <?= $query ?></small>
            </h1>
        </div>
        <div class="cell auto">
            <form action="<?= site_url() ?>" class="flex">
                <input type="text" name="search_test" value="<?= $query ?>" placeholder="Enquire Here"/>
                <input type="submit" class="button secondary_dark">
            </form>
        </div>
    </div>

    <div class="grid-x grid-padding-x">
        <div class="cell small-12">
            <h1><?= count($engines) ?> Search WP Engines</h1>
            <p>Currently, there is a bug (I haven't reported it) that causes the search wp query not to return results
                for a searched keyword when there are less posts in the restuls than there would be on the resulting
                first page. Super weird. There's a workaround in place on the post archive page, but not here. Not
                yet.</p>
        </div>

        <? foreach ($engines as $c => $engine): ?>
            <?
            $query_args['engine'] = $engine;
            $swp_query = new SWP_Query($query_args);
            ?>
            <div class="cell auto">
                <h2><?= $engine ?></h2>

                <div class="callout gray">
                    <? Acme::dbg($query_args) ?>
                    <div class="spacer"></div>
                    <a href="#" class="button" data-open="reveal_<?= $c ?>">More Info</a>
                </div>

                <div class="reveal large" data-reveal id="reveal_<?= $c ?>">
                    <? Acme::dbg($swp_query) ?>
                </div>

                <? foreach ($swp_query->posts as $post): ?>
                    <p class="small"><?= $post->post_title ?><br><?= $post->post_type ?> <?= $post->ID ?></p>
                <? endforeach ?>

            </div>
        <? endforeach ?>
        <div class="cell small-12">
            <h2>Default WP Engine</h2>
        </div>
        <div class="cell auto">

            <?php $wp_query = new WP_Query($query_args) ?>

            <div class="callout gray">
                <? Acme::dbg($query_args) ?>
            </div>

            <? foreach ($wp_query->posts as $post): ?>
                <p class="small"><?= $post->post_title ?><br><?= $post->post_type ?> <?= $post->ID ?></p>
            <? endforeach ?>


        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="spacer large"></div>
            </div>
        </div>
    </div>

</div>