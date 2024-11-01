<? $width = $module['full_width'] ? '100%' : 'auto' ?>
<div class="is-single_image">
    <div class="grid-x">
        <div class="small-12 cell">
            <?
            // TODO: unit test function doesn't put the image sizes on the image, so we need to put conditional fixes in place
            $url = isset($module['image']['sizes']) ? $module['image']['sizes']['large'] : $module['image']['url'];
            if (!$module['template'] || $module['template'] == 'default'):
                ?>
                <img
                        src="<?= $url ?>"
                        style="width: <?= $width ?>"
                >
            <? endif ?>

            <?

            if ($module['template'] && $module['template'] != 'default'):

                $loader = new Twig_Loader_Filesystem(['/']);


                $twig = new Twig_Environment($loader, [
                    'debug' => true
                ]);
                $twig->addExtension(new Twig_Extension_Debug());

                $template_html = '';

                // build out the templates

                try{

                $template_html .= $twig->render(
                    $module['template'],
                    [
//                        'post' => $post,
//                        'fields' => $fields
                    ]
                );
                } catch(exception $e){
                    $template_html .= "twig error in module_templates/single_image.php";
                }

            endif;

            ?>


        </div>
    </div>
</div>