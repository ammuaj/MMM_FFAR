<?php 
/**
 * Get social menu icons in topbar
 * @since 1.0.0
 * @package Clean Vision
 */ 
$social_menu = visionwp_get( 'header_social_menu' ); ?>
<?php if( $social_menu ) { ?>
    <div class="visionwp-social-menu-wrapper">
        <ul>
        <?php foreach( $social_menu as $type ) { ?>
            <li>
                <a href="<?php echo esc_url( $type[ 'url' ] ) ?>" target="_blank"></a>
                <?php if( '' != $type[ 'label' ] ) { ?>
                    <span><?php echo esc_html( $type[ 'label' ] ); ?>
                <?php } ?>
            </li>
        <?php } ?>
        </ul>                  
    </div>
<?php } ?>