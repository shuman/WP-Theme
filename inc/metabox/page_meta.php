<?php

return array(
	'id'          => 'tb_common_fields',
	'types'       => array('page'),
	'title'       => __('Custom Page Options', 'talent-board'),
	'priority'    => 'high',
	'include_template' => array('template-custompage.php'),
	'template'    => array(
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'banner_options',
			'title'     => __('Banner Options', 'talent-board'),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'show_hide_option',
					'label' => __('Display Page Banner', 'talent-board'),
					'items' => array(
						array(
							'value' => 'show',
							'label' => __('Show Banner', 'talent-board'),
						),
						array(
							'value' => 'tags',
							'label' => __('Hide Banner', 'talent-board'),
						),
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'banner_title',
					'label' => __('Banner Title', 'talent-board'),
					'dependency' => array(
						'field'    => 'show_hide_option',
						'function' => 'tb_dep_is_show',
					),
				),
			),
		),
	),
);

/**
 * EOF
 */