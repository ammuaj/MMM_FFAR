<?php
/**
 * Displays footer site info
 *
 * @subpackage Architecture Building
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">

    <?php
        echo esc_html( get_theme_mod( 'architecture_building_footer_text' ) );
        printf(
            /* translators: %s: Architecture Building WordPress Theme. */
            esc_html__( 'Architecture Building WordPress Theme', 'architecture-building' )
        );
    ?>

</div>