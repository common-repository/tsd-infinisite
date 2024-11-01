<div class="is-document_viewer">
    <div class="grid-x">
        <div class="cell small-12">
            <div class="card">
                <div class="card-section">
                    <ul class="fa-ul">
                        <? foreach ($module['file_container'] as $file): ?>
                            <? $file = $file['file']; ?>
                            <li>
                                <i class="fa-li fa fa-file-pdf-o"></i>
                                <a href="<?= $file['url'] ?>">
                                    <?= $file['filename'] ?>
                                </a>
                            </li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>