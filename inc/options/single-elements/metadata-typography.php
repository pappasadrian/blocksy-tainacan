<?php

if (! isset($prefix)) {
	$prefix = '';
}
if (! isset($enabled)) {
	$enabled = 'no';
}

$options = [
	$prefix . 'tainacan_metadata_label_font' => [
		'type' => 'ct-typography',
		'label' => __( 'Metadata label', 'blocksy-tainacan' ),
		'value' => blocksy_typography_default_values([
			'size' => '20px',
			'variation' => 'n6',
			'line-height' => '1.2'
		]),
		'sync' => blocksy_sync_single_post_container([
			'prefix' => $prefix
		])
	],
	$prefix . 'tainacan_metadata_value_font' => [
		'type' => 'ct-typography',
		'label' => __( 'Metadata value', 'blocksy-tainacan' ),
		'value' => blocksy_typography_default_values([
			'size' => '17px'
		]),
		'sync' => blocksy_sync_single_post_container([
			'prefix' => $prefix
		]),
		'divider' => 'bottom',
	],
];