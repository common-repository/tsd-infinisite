<? $query = new \WP_Query([$module['arguments']]) ?>
<div class="grid-container">
    <div class="grid-x">
        <div class="cell">
            <h2>query module here</h2>
            <? \TSD_Infinisite\Acme::dbg($query->posts) ?>
        </div>
    </div>
</div>