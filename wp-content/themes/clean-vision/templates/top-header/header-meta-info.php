<?php 
/**
 * Get meta information in topbar
 * @since 1.0.0
 * @package Clean Vision 
 */ ?>
<div class="visionwp-top-bar-wrapper">
    <div class="visionwp-top-bar-info">
        <ul>
            <?php foreach( $top_tag_data as $key => $type ) { 
                $val = visionwp_get( $type[ 'value' ] );
                if( $val ) {  
                    $href = $key . ': ' . $val; ?>
                    <li>
                        <a href="<?php echo esc_url( $href ); ?>">
                            <i class="fa <?php echo esc_attr( $type[ 'icon' ] ) ?>"></i>
                            <span id="<?php echo esc_attr( $type[ 'class' ] ) ?>">
                                <?php echo esc_html( $val ); ?>
                            </span>
                        </a>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</div>