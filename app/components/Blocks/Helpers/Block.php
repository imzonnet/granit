<?php

/**
 * Render Block From Region
 * @param $region
 */
function region_render($region) {
    $blocks = Components\Blocks\Models\Block::where('region', '=', $region)->get();
    foreach( $blocks as $block ) {
        $title = $block->translates->first()->title;
        $description = $block->translates->first()->description;
        ?>
    <div class="block">
        <?php if($title) : ?>
            <h2 class="block-title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="block-content">
            <?php echo $description; ?>
        </div>
    </div>
<?php
    }
}


function current_language() {
    if(! \Session::has('language')) {
        \Session::put('language', \Config::get('app.locale'));
    }
    return \Session::get('language');
}