<?

$content = '';
$id = uniqid('modal_');

if ($module['note']):
    if ($module['note_in_modal']):

        $reveal_size = $module['form'] ? 'large' : '';

        $form = '';

        if ($module['form'] && function_exists('gravity_form')):
            $form = "<div class='cell auto'>";
            // all the 0's are settings, we need to manually specify that last 0 to not print the form right here
            $form .= gravity_form($module['form'], 0, 0, 0, 0, 0, 0, 0);
            $form .= "</div>";
        endif;

        $content = "

            <button class='button no-margin secondary small white-text' data-open='$id'>Read The Note</button>
            
            <div class='reveal $reveal_size' id='$id' data-reveal>
                <div class='grid-container grid-x align-middle'>
                    <div class='cell medium-auto'>
                        {$module['note']}
                    </div>
                    <div class='cell medium-auto'>
                        $form
                    </div>
                </div>
                <button class='close-button' data-close aria-label='Close modal' type='button'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
                   
        ";
    else:
        $content = $module['note'];
    endif;
endif;

$links = false;

if ($module['links']):

    $links = "<ul class='menu space-bottom align-center'>";

    foreach ($module['links'] as $link):
        $link = $link['link'];
        $links .= "<li>
            <a href='{$link['url']}' target='{$link['target']}'>
                {$link['title']}
            </a>
        </li>";
    endforeach;

    $links .= "</ul>";

endif;


?>

<div class="padding-box">
    <div
            class="callout gray grid-container grid-y align-center is-wireframe-block full-width"
            style="min-height: <?= $module['height'] ?>; padding: 0 !important;">
        <div class="hack-for-callout-box"></div>
        <div class="cell auto-top <?= !$module['links'] ? 'auto-bottom' : '' ?> text-center">
            <h2><?= $module['title'] ?></h2>
            <div class="grid-container grid-x align-middle">
                <div class="cell auto">
                    <?= $content ?>
                </div>
                <? if ($module['form'] && !$module['note_in_modal']): ?>
                    <div class="cell auto">
                        <? gravity_form($module['form'], false) ?>
                    </div>
                <? endif ?>
            </div>

        </div>
        <? if ($links): ?>
            <div class="cell links auto-top no-margin-children">
                <hr>
                <?= $links ?>
            </div>
        <? endif ?>
        <div class="hack-for-callout-box"></div>
    </div>
</div>