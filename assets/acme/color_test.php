<?
// where there's testing, there's acme!
use TSD_Infinisite\Acme;

$palette = new \TSD_Infinisite\Palette();
$colors = $palette->shades;

$primary_light = $palette->shades['primary_light'];


?>


<div class="grid-container" data-editor-style="">
    <div class="grid-x grid-padding-x">
        <div class="cell">
            <h1>IS Typography</h1>
        </div>
        <div class="cell auto">

            <h1>Heading One
                <small>Small</small>
            </h1>
            <h2>Heading Two
                <small>Small</small>
            </h2>
            <h3>Heading Three
                <small>Small</small>
            </h3>
            <h4>Heading Four
                <small>Small</small>
            </h4>
            <h5>Heading Five
                <small>Small</small>
            </h5>
            <h6>Heading Six
                <small>Small</small>
            </h6>
        </div>
        <div class="cell auto">


            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et tristique nibh, at consectetur
                urna.
                Cras tristique varius vulputate. Donec risus lacus, posuere vestibulum ex sit amet, laoreet tempus
                odio.
                Sed blandit ex vel fringilla lobortis. Pellentesque vitae velit neque. Orci varius natoque penatibus
                et
                magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ac euismod lacus, nec tincidunt
                lacus.
                Nulla feugiat est nibh, non aliquet orci lobortis nec. Vivamus rhoncus fermentum blandit. Donec
                aliquet
                aliquet odio non eleifend. <a href="">Aliquam ac venenatis odio</a>. Nunc ac libero sagittis, ornare
                augue ut, suscipit
                ex. Curabitur orci tortor, gravida consequat condimentum vel, venenatis in velit. Quisque sagittis
                magna
                ac convallis dignissim. Aenean finibus urna ut lorem feugiat, et interdum risus ornare. Vestibulum
                at
                imperdiet elit.</p>

            <ul>
                <li>Unordered List</li>
                <li>Unordered List</li>
                <li>Unordered List</li>
            </ul>
            <ul>
                <li>Ordered List</li>
                <li>Ordered List</li>
                <li>Ordered List</li>
            </ul>
        </div>

        <div class="cell" id="button_settings">
            <h2>Button
                <small>So many buttons</small>
            </h2>
            <div class="spacer small"></div>
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <a class="success button" href="#">Save</a>
                    <a class="alert button" href="#">Delete</a>
                    <a class="warning button" href="#">Delete</a>
                    <br>
                    <a class="tiny button" href="#">So Tiny</a>
                    <a class="small button" href="#">So Small</a>
                    <a class="large button" href="#">So Large</a>
                    <a class="expanded button" href="#">Such Expand</a>
                </div>


                <div class="cell">


                    <? $styles = [
                        'Default' => '',
                        'Hollow' => 'hollow',
                        'Arrow Link' => 'arrow_link'
                    ];
                    ?>

                    <? foreach ($palette->roles as $role): ?>
                        <? $bg = $role == 'white' ? 'gray-background' : '' ?>
                        <div class="cell <?= $bg ?>">

                            <h3 class="<?= $role ?>-text" style="text-transform: capitalize;"><?= $role ?></h3>

                            <? foreach ($styles as $label => $style) : ?>
                                <div class="grid-x align-middle">
                                    <div class="cell">
                                        <p class="no-margin"><?= $label ?></p>
                                    </div>
                                    <div class="cell">

                                        <? if ($role == 'white' || $role == 'black'): ?>

                                        <p class="white-background">The role "<?= $role ?>" doesn't have shades</p>

                                        <? endif ?>

                                        <? if ($role != 'white' && $role != 'black'): ?>
                                            <? foreach ($palette->mods as $mod): ?>
                                                <a href="#" class="button <?= "{$role}_{$mod}" ?> <?= $style ?>">
                                                    <?= $mod ?>
                                                </a>
                                            <? endforeach ?>
                                        <? endif ?>

                                        <a href="#" class="button <?= $role ?> tiny <?= $style ?>">Tiny</a>
                                        <a href="#" class="button <?= $role ?> small <?= $style ?>">Small</a>
                                        <a href="#" class="button <?= $role ?> <?= $style ?>">Default</a>
                                        <a href="#" class="button <?= $role ?> large <?= $style ?>">Large</a>
                                    </div>
                                    <div class="cell">
                                        <a href="#" class="button <?= $role ?> expanded">Expanded</a>
                                    </div>
                                </div>
                            <? endforeach ?>


                        </div>
                        <div class="cell">
                            <div class="spacer"></div>
                        </div>
                    <? endforeach ?>

                </div>

                <div class="cell">

                    <h2>Button Group</h2>
                    <div class="button-group">
                        <a class="button">One</a>
                        <a class="button">Two</a>
                        <a class="button">Three</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell">
                <h1 style="color: <?= $primary_light ?>">IS Color Tester</h1>
            </div>

            <? foreach ($colors as $role => $value): ?>

                <div class="cell <?= $role ?>-background <?= $c % 7 != 0 ? 'auto' : ''; ?>">
                    <h4 class="white-text"><?= $role ?></h4>
                    <p class="white-text no-margin"><?= $value ?></p>
                </div>

                <? $c++ ?>
            <? endforeach ?>
        </div>
    </div>
    <div class="spacer large"></div>
</div>
