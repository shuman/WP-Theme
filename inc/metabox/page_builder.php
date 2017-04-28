<?php

return array(
	'id'          => 'page_builder',
	'types'       => array('page'),
	'title'       => __('Talent Board Page Builder', 'talent-board'),
	'priority'    => 'high',
	'template'    => array(
		array(
			'name'  => 'use_pb',
			'label' => 'Use Page Builder?',
			'type'  => 'toggle',
		),
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'row',
			'title'     => __('Row', 'talent-board'),
			'fields'    => array(
				array(
					'type'      => 'group',
					'repeating' => true,
					'sortable'  => true,
					'name'      => 'column',
					'title'     => __('Column', 'talent-board'),
					'fields'    => array(
						array(
							'type'  => 'slider',
							'name'  => 'grid',
							'label' => __('Grid Length', 'talent-board'),
							'min'   => 1,
							'max'   => 12,
						),
						array(
							'type'                       => 'wpeditor',
							'label'                      => __('Content', 'talent-board'),
							'name'                       => 'content',
							'use_external_plugins'       => 1,
							'disabled_externals_plugins' => 'vp_sc_button',
							'disabled_internals_plugins' => '',
							'validation'                 => 'required',
						),
					),
				),
			),
			'dependency' => array(
				'field'    => 'use_pb',
				'function' => 'vp_dep_boolean'
			)
		),
	),
);

/**
 * EOF
 */