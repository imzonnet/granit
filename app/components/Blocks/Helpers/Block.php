<?php
/**
 * Block Helper
 * @since 1.0
 * @author John Nguyen
 * @package Blocks
 */

if( !function_exists('region_render') ) {
    /**
     * Render Block From Region
     * @param $region
     */
    function region_render($region)
    {
        $blocks = Components\Blocks\Models\Block::where('region', '=', $region)->get();
        $user = current_user();
        foreach ($blocks as $block) :
            $translate = $block->translates->first();
            if (empty($translate)) {
                $translate = $block->translates(\Config::get('app.locale'))->first();
            }
            if (!check_visibility($block)) {
                continue;
            }
            $title = $translate->title;
            $description = $translate->description;
            ?>
            <div class="block">
                <?php
                if (can_access_menu($user, ['blocks'])) :
                    ?>
                    <div class="block-links-wrapper">
                        <div class="block-link-trigger"><i class="fa fa-cog"></i>
                            <ul class="block-links">
                                <li><a class="link-translate"
                                       href="<?php echo URL::route('backend.block.translate.index', [$translate->block_id]); ?>"><?php echo trans('Translate'); ?></a>
                                </li>
                                <li><a class="link-edit"
                                       href="<?php echo URL::route('backend.block.edit', [$translate->block_id]); ?>"><?php echo trans('Edit'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
                endif;
                ?>
                <?php if ($title) : ?>
                    <h2 class="block-title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="block-content">
                    <?php echo $description; ?>
                </div>
            </div>
        <?php
        endforeach;
    }
}

if( !function_exists('current_language') ) {
    /**
     * Get current language
     * @return mixed
     */
    function current_language()
    {
        if (!\Session::has('lang')) {
            \Session::put('lang', \Config::get('app.locale'));
        }
        return \Session::get('lang');
    }
}

if( !function_exists('check_visibility') ) {
    /**
     * Check block visibility
     * @param $block
     * @return bool
     */
    function check_visibility($block) {
        $pages = array_map('trim', explode("\n", $block->pages));
        if( trim($block->pages) == '' ) return true;
        if( $block->visibility == 0 && !in_array(\Request::path(), $pages) ) {
            return true;
        }
        if( $block->visibility == 1 && in_array(\Request::path(), $pages) ) {
            return true;
        }
        return false;
    }
}
