<div class="grid-x grid-padding-x grid-padding-y row">
    <div class="cell"><h1>Twig</h1></div>


    <div class="cell">
        <?
//        $loader = new Twig_Loader_Array(array(
//            'index' => 'Hello {{ post.post_title }} - {{ fields.source }}',
//            'test2' => 'Goodbye {{ post.post_title }} -- {{ dump(fields) }}!'
//        ));
        $loader = new Twig_Loader_Filesystem(INFINISITE_URI . 'twig/post_excerpts');
        $twig = new Twig_Environment($loader, [
                'debug' => true
        ]);
        $twig->addExtension(new Twig_Extension_Debug());

        $post = get_post(139);
        $fields = get_fields(139);

        echo $twig->render('card.twig', ['post' => $post, 'fields' => $fields]);
        ?>
    </div>

</div>