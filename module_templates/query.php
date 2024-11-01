<?
$args = json_decode($module['arguments'], 1);
$successful_decode = is_array($args);
$query = new \WP_Query($args);
?>
<div class="default query_template">
    <div class="grid-container">

        <div class="grid-x grid-padding-x">

            <div class="cell">
                <h2>Default Query Template</h2>
            </div>

            <? if(!$successful_decode): ?>

                <div class="cell">
                    <div class="callout alert">
                        <h3>Error</h3>
                        <p>There was an error converting your query args. Something is wrong with the following string:</p>

                        <? TSD_Infinisite\Acme::dbg($module['arguments']) ?>
                    </div>
                </div>

            <? else: ?>
            <? foreach ($query->posts as $post): ?>
                <div class="cell auto">
                    <p><?= $post->post_title ?></p>
                </div>
            <? endforeach ?>
            <? endif ?>
        </div>

    </div>
</div>