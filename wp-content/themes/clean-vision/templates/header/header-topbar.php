<?php
/**
 * Template for header social menu and top bar 
 * @since 1.0.0
 * @package Clean Vision 
 */ 
$top_tag_data = get_query_var( 'top_tag_data', false );
$social_menu = visionwp_get( 'header_social_menu' );
if( $top_tag_data ) { ?>
    <div class="visionwp-top-bar">
        <div class="visionwp-container">
            <div class="visionwp-top-bar-inner visionwp-top-bar-sortable">
                <?php $sortable = visionwp_get( 'header_topbar_sortable' ); 
                    if( !empty( $sortable ) ) { ?>                       
                        <?php foreach( $sortable as $sort ) { 
                            get_template_part( 'templates/top-header/header', $sort );
                        } ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>