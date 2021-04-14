<?php

/**
 * Adds Tainacan repository and term items list to settings on customizer.
 */
if ( !function_exists('blocksy_tainacan_add_repository_and_terms_items_options_panel') ) {
	function blocksy_tainacan_add_repository_and_terms_items_options_panel($options) {

		$options['tainacan_repository_items_list'] = blc_call_fnc(
			[
				'fnc' => 'blocksy_get_options',
				'default' => 'array'
			],
			BLOCKSY_TAINACAN_PLUGIN_DIR_PATH  . '/inc/options/archives/tainacan-repository-items.php',
			[], false
		);

		return $options;
	}
}
add_filter( 'blocksy_extensions_customizer_options', 'blocksy_tainacan_add_repository_and_terms_items_options_panel' );

/**
 * Adds Tainacan terms and term items list to settings on customizer.
 */
if ( !function_exists('blocksy_tainacan_add_terms_and_terms_items_options_panel') ) {
	function blocksy_tainacan_add_terms_and_terms_items_options_panel($options) {

		$options['tainacan_terms_items_list'] = blc_call_fnc(
			[
				'fnc' => 'blocksy_get_options',
				'default' => 'array'
			],
			BLOCKSY_TAINACAN_PLUGIN_DIR_PATH  . '/inc/options/archives/tainacan-terms-items.php',
			[], false
		);
		
		return $options;
	}
}
add_filter( 'blocksy_extensions_customizer_options', 'blocksy_tainacan_add_terms_and_terms_items_options_panel' );

/**
 * Adds extra customizer options to items single page template
 */
if ( !function_exists('blocksy_tainacan_custom_post_types_single_options') ) {
	function blocksy_tainacan_custom_post_types_single_options( $options, $post_type, $post_type_object ) {

		// This should only happen if we have Tainacan plugin installed
		if ( defined ('TAINACAN_VERSION') ) {
			$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();

			if ( in_array($post_type, $collections_post_types) ) {
				
				// Change the section title in the customizer
				$options['title'] = sprintf(
					__('Item from %s', 'blocksy-tainacan'),
					$post_type_object->labels->name
				);

				// Extra options to the single item template
				$item_extra_options = blocksy_get_options(BLOCKSY_TAINACAN_PLUGIN_DIR_PATH . '/inc/options/posts/tainacan-item-single.php', [
					'post_type' => $post_type_object,
					'is_general_cpt' => true
				], false);

				if ( is_array($item_extra_options) ) {
					array_splice(
						$options['options'][$post_type . '_single_section_options']['inner-options'][0],
						1,
						0,
						$item_extra_options
					);
				}
			}
				
		}

		return $options;
	}
}
add_filter( 'blocksy:custom_post_types:single-options', 'blocksy_tainacan_custom_post_types_single_options', 10, 3 );


/**
 * Adds extra customizer options to items single page template
 */
if ( !function_exists('blocksy_tainacan_custom_post_types_archive_options') ) {
	function blocksy_tainacan_custom_post_types_archive_options( $options, $post_type, $post_type_object ) {

		// This should only happen if we have Tainacan plugin installed
		if ( defined ('TAINACAN_VERSION') ) {
			$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();

			if ( in_array($post_type, $collections_post_types) ) {
				
				// Change the section title in the customizer
				$options['title'] = sprintf(
					__('Items list from %s', 'blocksy-tainacan'),
					$post_type_object->labels->name
				);
				
				// Extra options to the archive items list
				$items_extra_options = blocksy_get_options(BLOCKSY_TAINACAN_PLUGIN_DIR_PATH . '/inc/options/posts/tainacan-item-archive.php', [
					'prefix' => $post_type_object->name,
					'is_general_cpt' => true
				], false);
				
				if ( is_array($items_extra_options) ) {
					$options['options'][$post_type . '_section_options']['inner-options'] = $items_extra_options;
				}
			}
		}

		return $options;
	}
}
add_filter( 'blocksy:custom_post_types:archive-options', 'blocksy_tainacan_custom_post_types_archive_options', 10, 3 );


/**
 * Removes tainacan metadatum and filters from the custom metadata options in the customizer controller.
 */
if ( !function_exists('blocksy_tainacan_custom_post_types_supported_list') ) {
	function blocksy_tainacan_custom_post_types_supported_list( $potential_post_types ) {
		
		// This should only happen if we have Tainacan plugin installed
		if ( defined ('TAINACAN_VERSION') ) {
			return array_filter( $potential_post_types, function($post_type) {
				return !in_array($post_type, [ 'tainacan-metadatum', 'tainacan-filter' ]);
			});
		}
		return $potential_post_types;
	}
}
add_filter( 'blocksy:custom_post_types:supported_list', 'blocksy_tainacan_custom_post_types_supported_list', 10 );

/**
 * Renders the item single page with a custom template that will use most of Blocksy features
 */
if ( !function_exists('blocksy_tainacan_the_content_for_items') ) {
	function blocksy_tainacan_the_content_for_items( $content ) {
	
		// This should only happen if we have Tainacan plugin installed
		if ( defined ('TAINACAN_VERSION') ) {
			$collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
			$post_type = get_post_type();

			// Check if we're inside the main loop in a single Post.
			if (in_array($post_type, $collections_post_types) && is_singular() && in_the_loop() && is_main_query() ) {
				return blocksy_tainacan_get_template_part( 'tainacan/item-single-page' );
			}
		}
	
		return $content;
	}
}
add_filter( 'the_content', 'blocksy_tainacan_the_content_for_items', 11);

?>