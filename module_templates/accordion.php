<div class="is-accordion">
    <div class="grid-x">
        <div class="small-12 cell">

            <ul class="accordion" data-accordion>
                <? foreach ($module['blade'] as $c => $blade): ?>
                    <li
                            class="accordion-item <?= $c == 0 ? 'is-active' : '' ?>"
                            data-accordion-item
                    >
                        <a href="#" class="accordion-title"><?= $blade['title'] ?></a>

                        <div class="accordion-content" data-tab-content>
                            <?= $blade['content'] ?>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>

        </div>
    </div>
</div>


