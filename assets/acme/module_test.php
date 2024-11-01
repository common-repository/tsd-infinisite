<?
// where there's testing, there's acme!
use TSD_Infinisite\Acme;

$colors = Acme::get_colors();

$layouts[] = [
    'acf_fc_layout' => 'simple_content',
    'simple_content' => '<p>Simple Content Module Here</p>',
    'template' => 'default'
];

$layouts[] = [
    'acf_fc_layout' => 'button',
    'buttons' => [
        [
            'link' => [
                'title' => 'Button A',
                'url' => 'http://google.com',
                'target' => '_blank',
            ]
        ]
    ],
    'config' => [
        'alignment' => 'left',
        'size' => 'large',
        'orientation' => 'horizontal',
        'color_select' => 'primary',
        'hollow' => 1
    ],
];

$layouts[] = [
    'acf_fc_layout' => 'post_archive',
    'custom_posts' => '',
    'post_type' => 'news',
    'template' => 'Blog Excerpt In Card.twig',
    'posts_per_page' => 3,
    'pagination' => 1,
    'posts_per_row' => [

        'small' => 1,
        'medium' => 2,
        'large' => 3,
    ],
    'custom_query' => '',
];

$layouts[] = [
    'acf_fc_layout' => 'icon',
    'icon' => 'bomb',
    'svg' => '',
    'size' => 'fa-10x',
    'animation_effects' => 'fa-pulse',
    'rotate_flip' => 'fa-rotate-90',
    'link' => [
        'title' => 'unused',
        'url' => 'http://google.com',
        'target' => '_blank',
    ],
    'color_select' => 'primary',
    'caption' => 'caption here',
];


?>
<div class="grid-container" data-editor-style>
    <div class="grid-x grid-padding-x grid-padding-y">
        <div class="cell">
            <h1>IS Style Tester</h1>
        </div>

        <div class="cell">
            <h2>module test</h2>
        </div>

        <? foreach ($layouts as $layout): ?>
            <div class="cell medium-4">
                <h2><?= $layout['acf_fc_layout'] ?></h2>
                <?= TSD_Infinisite\Layout::acf_flex_to_html($layout); ?>
            </div>
        <? endforeach; ?>


        <div class="cell medium-6">
            <h1>heading 1</h1>
            <h2>heading 2</h2>
            <h3>heading 3</h3>
            <h4>heading 4</h4>
            <h5>heading 5</h5>
            <h6>heading 6</h6>
        </div>
        <div class="cell medium-6">
            <p>paragraph</p>
            <ul>
                <li>ul list item</li>
                <li>ul list item</li>
                <li>ul list item</li>
            </ul>
            <ol>
                <li>ol list item</li>
                <li>ol list item</li>
                <li>ol list item</li>
            </ol>
        </div>


        <div class="cell medium-6">
            <h2>Colors</h2>
            <ul class="menu horizontal">
                <? foreach ($colors as $color): ?>
                    <li class="<?= $color['role'] ?>-background white-text"><?= $color['role'] ?></li>
                <? endforeach ?>
            </ul>
        </div>


        <div class="cell medium-6">
            <? Acme::dbg($colors) ?>
        </div>


    </div>
    <div class="cell">
        <div class="spacer large"></div>
    </div>
</div>