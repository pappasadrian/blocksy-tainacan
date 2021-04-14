<?php

if (! isset($prefix)) {
	$prefix = '';
} else {
	$prefix = $prefix . '_';
}

if (! isset($enabled)) {
	$enabled = 'yes';
}

$options = [
	$prefix . 'display_section_labels' => [
		'label' => __( 'Display section labels', 'blocksy-tainacan' ),
		'type' => 'ct-panel',
		'switch' => true,
		'value' => $enabled,
		'sync' => blocksy_sync_whole_page([
			'prefix' => $prefix,
		]),
		'inner-options' => [
			$prefix . 'tainacan_single_item_section_font' => [
				'type' => 'ct-typography',
				'label' => __( 'Section labels font', 'blocksy' ),
				'value' => blocksy_typography_default_values([
					'size' => '26px',
					'variation' => 'n6',
					'line-height' => '1.3'
				]),
				'sync' => blocksy_sync_single_post_container([
					'prefix' => $prefix
				])
			],
			$prefix . 'tainacan_single_item_section_alignment' => [
				'type' => 'ct-radio',
				'label' => __( 'Section labels text alignment', 'blocksy' ),
				'value' => 'left',
				'view' => 'text',
				'attr' => [ 'data-type' => 'alignment' ],
				'responsive' => true,
				'design' => 'block',
				'choices' => [
					'left' => '',
					'center' => '',
					'right' => '',
				],
				'sync' => blocksy_sync_single_post_container([
					'prefix' => $prefix
				]),
				'divider' => 'bottom',
			],
			blocksy_rand_md5() => [
                'type' => 'ct-condition',
                'condition' => [
                    $prefix . 'document_attachments_structure' => 'gallery-type-1'
				],
				'options' => [
					$prefix . 'section_document_label' => [
						'label' => __( 'Label for the "Document" section', 'blocksy-tainacan' ),
						'desc' => __( 'Leave it blank for not displaying any label.', 'blocksy-tainacan' ),
						'type' => 'text',
						'design' => 'block',
						'value' => __( 'Document', 'blocksy-tainacan' ),
						'sync' => blocksy_sync_single_post_container([
							'prefix' => $prefix
						])
					],
					$prefix . 'section_attachments_label' => [
						'label' => __( 'Label for the "Attachments" section', 'blocksy-tainacan' ),
						'desc' => __( 'Leave it blank for not displaying any label.', 'blocksy-tainacan' ),
						'type' => 'text',
						'design' => 'block',
						'value' => __( 'Attachments', 'blocksy-tainacan' ),
						'sync' => blocksy_sync_single_post_container([
							'prefix' => $prefix
						])
					],
				]
			],
			blocksy_rand_md5() => [
                'type' => 'ct-condition',
                'condition' => [
                    $prefix . 'document_attachments_structure' => 'gallery-type-1'
				],
				'options' => [
					$prefix . 'section_documents_label' => [
						'label' => __( 'Label for the "Documents" section', 'blocksy-tainacan' ),
						'desc' => __( 'Leave it blank for not displaying any label. This section is displayed only if Documents and Attachments are displayed merged.', 'blocksy-tainacan' ),
						'type' => 'text',
						'design' => 'block',
						'value' => __( 'Documents', 'blocksy-tainacan' ),
						'sync' => blocksy_sync_single_post_container([
							'prefix' => $prefix
						])
					],
				]
			],
			$prefix . 'section_metadata_label' => [
				'label' => __( 'Label for the "Metadata" section', 'blocksy-tainacan' ),
				'desc' => __( 'Leave it blank for not displaying any label.', 'blocksy-tainacan' ),
				'type' => 'text',
				'design' => 'block',
				'value' => __( 'Metadata', 'blocksy-tainacan' ),
				'sync' => blocksy_sync_single_post_container([
                    'prefix' => $prefix
                ])
			]
		],
	],
];
