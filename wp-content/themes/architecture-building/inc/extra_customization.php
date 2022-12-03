<?php 

	/*---------------------------Width -------------------*/

	$architecture_building_custom_style= "";
	
	$architecture_building_theme_width = get_theme_mod( 'architecture_building_width_options','full_width');

    if($architecture_building_theme_width == 'full_width'){

		$architecture_building_custom_style .='body{';

			$architecture_building_custom_style .='max-width: 100%;';

		$architecture_building_custom_style .='}';

	}else if($architecture_building_theme_width == 'Container'){

		$architecture_building_custom_style .='body{';

			$architecture_building_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$architecture_building_custom_style .='}';

	}else if($architecture_building_theme_width == 'container_fluid'){

		$architecture_building_custom_style .='body{';

			$architecture_building_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$architecture_building_custom_style .='}';
	}