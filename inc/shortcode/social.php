<?php
/**
 * Social media shortcode
 * 
 * Usage: [social_icons]
 */

if (!function_exists('skyqueen_social_shortcode')) {
    function skyqueen_social_shortcode($atts) {
        // Extract shortcode attributes with defaults
        $atts = shortcode_atts(
            array(
                'class' => 'social-icons',
            ),
            $atts,
            'social_icons'
        );
        
        ob_start();
        
        // Get social media links from ACF options
        $facebook = get_field('facebook', 'option');
        $twitter = get_field('twitter', 'option');
        $instagram = get_field('instagram', 'option');
        $telegram = get_field('telegram', 'option');
        $youtube = get_field('youtube', 'option');
        $tiktok = get_field('tiktok', 'option');
        
        // Only display if we have at least one social link
        if ($facebook || $twitter || $instagram || $telegram || $youtube || $tiktok) {
            ?>
            <div class="<?php echo esc_attr($atts['class']); ?>">
                <?php if ($facebook) : ?>
                    <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" class="facebook">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                <?php if ($instagram) : ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" class="instagram">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                <?php if ($tiktok) : ?>
                    <a href="<?php echo esc_url($tiktok); ?>" target="_blank" rel="noopener" class="tiktok">
                    <i class="icon-tiktok"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ($twitter) : ?>
                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" class="twitter">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                <?php if ($youtube) : ?>
                    <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener" class="youtube">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                
                <?php if ($telegram) : ?>
                    <a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="noopener" class="telegram">
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
             
            </div>
            <?php
        }
        
        return ob_get_clean();
    }
}

// Register the shortcode
add_shortcode('social_icons', 'skyqueen_social_shortcode');