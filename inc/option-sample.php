<?php

return array(
	'title' => __('Talent Board Option Panel', 'talent-board'),
	'logo' => get_template_directory_uri() . '/images/logo_bg.png',
	'menus' => array(
		array(
			'title' => __('Standard Controls', 'talent-board'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-magic',
			'menus' => array(
				array(
					'title' => __('Regular', 'talent-board'),
					'name' => 'submenu_1',
					'icon' => 'font-awesome:fa-th-large',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('TextBox', 'talent-board'),
							'name' => 'section_1',
							'description' => __('TextBox and TextArea Showcase', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'tb_1',
									'label' => __('Alphabet', 'talent-board'),
									'description' => __('Only alphabets allowed here.', 'talent-board'),
									'validation' => 'alphabet',
								),
								array(
									'type' => 'textbox',
									'name' => 'tb_2',
									'label' => __('Alphanumeric', 'talent-board'),
									'description' => __('Only alphabets and numbers allowed here.', 'talent-board'),
									'default' => 'abcd123',
									'validation' => 'alphanumeric',
								),
								array(
									'type' => 'textbox',
									'name' => 'tb_3',
									'label' => __('Numeric', 'talent-board'),
									'description' => __('Only numbers allowed here.', 'talent-board'),
									'default' => '123',
									'validation' => 'numeric',
								),
								array(
									'type' => 'textbox',
									'name' => 'tb_4',
									'label' => __('Email', 'talent-board'),
									'description' => __('Only valid email allowed here.', 'talent-board'),
									'default' => 'contact@vafour.com',
									'validation' => 'email',
								),
								array(
									'type' => 'textbox',
									'name' => 'tb_5',
									'label' => __('URL', 'talent-board'),
									'description' => __('Only valid URL allowed here.', 'talent-board'),
									'default' => 'http://vafpress.com',
									'validation' => 'url',
								),
							),
						),
						array(
							'type' => 'textarea',
							'name' => 'ta_1',
							'label' => __('Textarea', 'talent-board'),
							'description' => __('Everytime you need long text..', 'talent-board'),
							'default' => 'lorem ipsum',
						),
						array(
							'type' => 'section',
							'name' => 'section_2',
							'title' => __('Multiple Choices', 'talent-board'),
							'description' => __('Controls with multiple specified options.', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'checkbox',
									'name' => 'cb_1',
									'label' => __('CheckBox with Min and Max Selected Validation', 'talent-board'),
									'description' => __('Minimum selected of 2 items and maximum selected of 2 items, in other words need to choose exactly 2 items.', 'talent-board'),
									'validation' => 'minselected[2]|maxselected[2]',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
										),
									),
									'default' => array(
										'value_1',
									),
								),
								array(
									'type' => 'checkbox',
									'name' => 'cb_2',
									'label' => __('CheckBox with Required Validation', 'talent-board'),
									'description' => __('Required to choose anything.', 'talent-board'),
									'validation' => 'required',
									'default' => '',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
										),
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'rb_1',
									'label' => __('RadioButton', 'talent-board'),
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
										),
									),
									'default' => array(
										'value_3',
									),
								),
								array(
									'type' => 'select',
									'name' => 'ss_1',
									'label' => __('Single Select Box', 'talent-board'),
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
										),
									),
									'default' => array(
										'value_3',
									),
								),
								array(
									'type' => 'select',
									'name' => 'ss_2',
									'label' => __('Select Box with Get Categories Data Source', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_categories',
											),
										),
									),
									'default' => array(
										'{{last}}',
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'ms_1',
									'label' => __('Multiple Select Box', 'talent-board'),
									'description' => __('Minimum selected of 2 items and maximum selected of 3 items.', 'talent-board'),
									'validation' => 'minselected[2]|maxselected[3]',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
										),
									),
									'default' => array(
										'{{first}}',
										'{{last}}',
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Image', 'talent-board'),
					'name' => 'submenu_2',
					'icon' => 'font-awesome:fa-picture-o',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Check Images', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'checkimage',
									'name' => 'ci_1',
									'label' => __('Various Sized Images', 'talent-board'),
									'description' => __('CheckImage with unspecified item max height and item max width', 'talent-board'),
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
								),
								array(
									'type' => 'checkimage',
									'name' => 'ci_2',
									'label' => __('Specified Images Maximum Height', 'talent-board'),
									'description' => __('CheckImage with specified item max height', 'talent-board'),
									'item_max_height' => '70',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_1',
										'value_2',
									),
								),
								array(
									'type' => 'checkimage',
									'name' => 'ci_3',
									'label' => __('Specified Images Maximum Width', 'talent-board'),
									'description' => __('CheckImage with specified item max width', 'talent-board'),
									'item_max_width' => '50',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_3',
										'value_4',
									),
								),
								array(
									'type' => 'checkimage',
									'name' => 'ci_4',
									'label' => __('Specified Images Maximum Width and Height', 'talent-board'),
									'description' => __('CheckImage with specified item max width and item max height', 'talent-board'),
									'item_max_height' => '70',
									'item_max_width' => '70',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_1',
										'value_4',
									),
								),
								array(
									'type' => 'checkimage',
									'name' => 'ci_5',
									'label' => __('Validation Rules Applied', 'talent-board'),
									'description' => __('Minimum selected of 2 items and Maximum selected of 3 items.', 'talent-board'),
									'item_max_height' => '70',
									'item_max_width' => '70',
									'validation' => 'required|minselected[2]|maxselected[3]',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
									),
									'default' => array(
										'value_1',
									),
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Radio Images', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'radioimage',
									'name' => 'ri_1',
									'label' => __('Various Sized Images', 'talent-board'),
									'description' => __('RadioImage with unspecified item max height and item max width', 'talent-board'),
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
								),
								array(
									'type' => 'radioimage',
									'name' => 'ri_2',
									'label' => __('Specified Images Maximum Height', 'talent-board'),
									'description' => __('RadioImage with specified item max height', 'talent-board'),
									'item_max_height' => '70',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_1',
									),
								),
								array(
									'type' => 'radioimage',
									'name' => 'ri_3',
									'label' => __('Specified Images Maximum Width', 'talent-board'),
									'description' => __('RadioImage with specified item max width', 'talent-board'),
									'item_max_width' => '50',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_3',
									),
								),
								array(
									'type' => 'radioimage',
									'name' => 'ri_4',
									'label' => __('Specified Images Maximum Width and Height', 'talent-board'),
									'description' => __('RadioImage with specified item max width and item max height', 'talent-board'),
									'item_max_height' => '70',
									'item_max_width' => '70',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/100x100',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/120x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x120',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/50x50',
										),
									),
									'default' => array(
										'value_4',
									),
								),
								array(
									'type' => 'radioimage',
									'name' => 'ri_5',
									'label' => __('Validation Rules Applied', 'talent-board'),
									'description' => __('Required to Choose.', 'talent-board'),
									'item_max_height' => '70',
									'item_max_width' => '70',
									'validation' => 'required',
									'items' => array(
										array(
											'value' => 'value_1',
											'label' => __('Label 1', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_2',
											'label' => __('Label 2', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_3',
											'label' => __('Label 3', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
										array(
											'value' => 'value_4',
											'label' => __('Label 4', 'talent-board'),
											'img' => 'http://placehold.it/80x80',
										),
									),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Special Controls', 'talent-board'),
			'name' => 'menu_2',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Section 1', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'wpeditor',
							'name' => 'we_1',
							'label' => __('WP TinyMCE Editor', 'talent-board'),
							'description' => __('Wordpress tinyMCE editor.', 'talent-board'),
							'use_external_plugins' => '1',
							'disabled_externals_plugins' => '',
							'disabled_internals_plugins' => '',
						),
						array(
							'type' => 'toggle',
							'name' => 'tg_1',
							'label' => __('Toggle', 'talent-board'),
							'description' => __('Suits the need to ask user a yes or no option.', 'talent-board'),
							'default' => '1',
						),
						array(
							'type' => 'slider',
							'name' => 'sl_1',
							'label' => __('Decimal Slider', 'talent-board'),
							'description' => __('This slider has minimum value of -10, maximum value of 17.5, sliding step of 0.1 and default value 15.9, everything can be customized.', 'talent-board'),
							'min' => '-10',
							'max' => '17.5',
							'step' => '0.1',
							'default' => '15.9',
						),
						array(
							'type' => 'slider',
							'name' => 'sl_2',
							'label' => __('Custom Step Slider', 'talent-board'),
							'description' => __('This slider has minimum value of 100, maximum value of 1000, sliding step of 5 and default value 275, everything can be customized.', 'talent-board'),
							'min' => '100',
							'max' => '1000',
							'step' => '5',
							'default' => '275',
						),
						array(
							'type' => 'upload',
							'name' => 'up_1',
							'label' => __('Upload', 'talent-board'),
							'description' => __('Media uploader, using the powerful WP Media Upload', 'talent-board'),
							'default' => 'http://lorempixel.com/500/400/animals/',
						),
						array(
							'type' => 'color',
							'name' => 'cl_1',
							'label' => __('Color 1', 'talent-board'),
							'description' => __('Color Picker, you can set the default color.', 'talent-board'),
							'default' => 'rgba(255,0,0,0.5)',
							'format' => 'rgba',
						),
						array(
							'type' => 'color',
							'name' => 'cl_2',
							'label' => __('Color 2', 'talent-board'),
							'description' => __('Color Picker, you can set the default color.', 'talent-board'),
							'default' => '#98ed28',
						),
						array(
							'type' => 'date',
							'name' => 'dt_1',
							'label' => __('International Date Format', 'talent-board'),
							'description' => __('Date Picker with International date format.', 'talent-board'),
							'format' => 'yy-mm-dd',
							'default' => '2012-12-12',
						),
						array(
							'type' => 'date',
							'name' => 'dt_2',
							'label' => __('Asian Date Format', 'talent-board'),
							'description' => __('Date Picker with Asian date format.', 'talent-board'),
							'format' => 'dd-mm-yy',
							'default' => '',
							'validation' => 'required',
						),
						array(
							'type' => 'date',
							'name' => 'dt_3',
							'label' => __('Ranged Date Picker', 'talent-board'),
							'description' => __('The range can be exact date or formatted string to define the offset from today, for example &quot;+1D&quot; will be parsed as tommorow date, or &quot;+1D +1W&quot;, please refer to [jQueryUI Datepicker Docs](http://jqueryui.com/datepicker/#min-max)', 'talent-board'),
							'min_date' => '1-1-2000',
							'max_date' => 'today',
							'format' => 'yy-mm-dd',
							'default' => '-1W',
						),
						array(
							'type' => 'fontawesome',
							'name' => 'fa_1',
							'label' => __('Fontawesome Icon', 'talent-board'),
							'description' => __('Fontawesome icon chooser with small preview.', 'talent-board'),
							'default' => array(
								'{{first}}',
							),
						),
						array(
							'type' => 'sorter',
							'name' => 'so_1',
							'max_selection' => 3,
							'label' => __('Sorter', 'talent-board'),
							'description' => __('Select and sort your choices', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_social_medias',
									),
								),
							),
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ce_1',
							'label' => __('Custom CSS', 'talent-board'),
							'description' => __('Write your custom css here.', 'talent-board'),
							'theme' => 'github',
							'mode' => 'css',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'ce_2',
							'label' => __('Custom JS', 'talent-board'),
							'description' => __('Write your custom js here.', 'talent-board'),
							'theme' => 'twilight',
							'mode' => 'javascript',
						),
					),
				),
			),
		),
		array(
			'title' => __('Custom Data Source', 'talent-board'),
			'name' => 'menu_3',
			'icon' => 'font-awesome:fa-th-list',
			'menus' => array(
				array(
					'title' => __('Dynamic', 'talent-board'),
					'name' => 'dynamic_data_source',
					'icon' => 'font-awesome:fa-fire',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Data Source and Smart Tags', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'multiselect',
									'name' => 'ms_categories',
									'label' => __('Categories', 'talent-board'),
									'description' => __('MultiSelect field with WP Categories Data Source and **{{first}}** **{{last}}** default items.', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_categories',
											),
										),
									),
									'default' => array(
										'{{first}}',
										'{{last}}',
									),
								),
								array(
									'type' => 'select',
									'name' => 'se_pages',
									'label' => __('Pages', 'talent-board'),
									'description' => __('Select field with WP Pages Data Source', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
											),
										),
									),
								),
								array(
									'type' => 'checkbox',
									'name' => 'cb_users',
									'label' => __('Users Data Source', 'talent-board'),
									'description' => __('Checkbox field with WP Users Data Source and **{{all}}** default items.', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'params' => 'admin',
												'value' => 'vp_get_users',
											),
										),
									),
									'default' => array(
										'{{all}}',
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'rb_roles',
									'label' => __('Roles', 'talent-board'),
									'description' => __('RadioButton field with WP Roles Data Source and **{{last}}** default item.', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_roles',
											),
										),
									),
									'default' => array(
										'{{last}}',
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'ms_tags',
									'label' => __('Tags', 'talent-board'),
									'description' => __('MultiSelect field with WP Tags Data Source and **{{first}}** default items.', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_tags',
											),
										),
									),
									'default' => array(
										'{{first}}',
									),
								),
								array(
									'type' => 'select',
									'name' => 'se_posts',
									'label' => __('Posts', 'talent-board'),
									'description' => __('Select field with WP Post Data Source', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_posts',
											),
										),
									),
								),
							),
						),
					),
				),
				array(
					'title' => __('Binding', 'talent-board'),
					'name' => 'binding_data_source',
					'icon' => 'font-awesome:fa-link',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('What a Wonderful World', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'select',
									'name' => 'big_continent',
									'label' => __('Big Continent', 'talent-board'),
									'description' => __('Big Continent', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'vp_bind_bigcontinents',
											),
										),
									),
									'default' => '{{last}}',
								),
								array(
									'type' => 'radiobutton',
									'name' => 'continent',
									'label' => __('Continent', 'talent-board'),
									'description' => __('Continent', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field'  => 'big_continent',
												'value'  => 'vp_bind_continents',
											),
										),
									),
								),
								array(
									'type' => 'select',
									'name' => 'country',
									'label' => __('Country', 'talent-board'),
									'description' => __('Country', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field'  => 'continent',
												'value'  => 'vp_bind_countries',
											),
										),
									),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Fields Interactions', 'talent-board'),
			'name' => 'fields_interactions',
			'icon' => 'font-awesome:fa-exchange',
			'menus' => array(
				array(
					'name' => 'binding_field',
					'title' => __('Binding Field', 'talent-board'),
					'icon' => 'font-awesome:fa-retweet',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Color Set', 'talent-board'),
							'fields' => array(
								array(
									'type' => 'select',
									'name' => 'color_preset',
									'label' => __('Color Preset', 'talent-board'),
									'default' => 'red',
									'items' => array(
										array(
											'value' => 'red',
											'label' => __('Red', 'talent-board'),
										),
										array(
											'value' => 'green',
											'label' => __('Green', 'talent-board'),
										),
										array(
											'value' => 'blue',
											'label' => __('Blue', 'talent-board'),
										),
									),
								),
								array(
									'type' => 'color',
									'name' => 'color_accent',
									'label' => __('Color Accent', 'talent-board'),
									'binding' => array(
										'field' => 'color_preset',
										'function' => 'vp_bind_color_accent',
									),
								),
								array(
									'type' => 'color',
									'name' => 'color_subtle',
									'label' => __('Color Subtle', 'talent-board'),
									'binding' => array(
										'field' => 'color_preset',
										'function' => 'vp_bind_color_subtle',
									),
								),
								array(
									'type' => 'color',
									'name' => 'color_background',
									'label' => __('Color Background', 'talent-board'),
									'binding' => array(
										'field' => 'color_preset',
										'function' => 'vp_bind_color_background',
									),
								),
							),
						),
					),
				),
				array(
					'name' => 'dependent_field',
					'title' => __('Dependent Field', 'talent-board'),
					'icon' => 'font-awesome:fa-key',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Decider', 'talent-board'),
							'name' => 'section_custom_font_decider',
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'use_custom_font',
									'label' => __('Use Custom Font', 'talent-board'),
									'description' => __('Use custom font or not', 'talent-board'),
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Custom Font', 'talent-board'),
							'name' => 'section_custom_font',
							'dependency' => array(
								'field' => 'use_custom_font',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
								array(
									'type' => 'select',
									'name' => 'dep_font_face',
									'label' => __('Font Face', 'talent-board'),
									'description' => __('Select Font', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'dep_font_style',
									'label' => __('Font Style', 'talent-board'),
									'description' => __('Select Font Style', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'dep_font_face',
												'value' => 'vp_get_gwf_style',
											),
										),
									),
									'default' => array(
										'{{first}}',
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'dep_font_weight',
									'label' => __('Font Weight', 'talent-board'),
									'description' => __('Select Font Weight', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'dep_font_face',
												'value' => 'vp_get_gwf_weight',
											),
										),
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'dep_font_subset',
									'label' => __('Font Subset', 'talent-board'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'dep_font_face',
												'value' => 'vp_get_gwf_subset',
											),
										),
									),
									'default' => 'latin'
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Single Field dependency', 'talent-board'),
							'name' => 'section_single_field_deps',
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'use_custom_logo',
									'label' => __('Use Custom Logo', 'talent-board'),
									'description' => __('Use custom logo or not', 'talent-board'),
								),
								array(
									'type' => 'upload',
									'name' => 'custom_logo',
									'label' => __('Custom Logo', 'talent-board'),
									'dependency' => array(
										'field' => 'use_custom_logo',
										'function' => 'vp_dep_boolean',
									),
									'description' => __('Upload or choose custom logo', 'talent-board'),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => __('Advanced Usage', 'talent-board'),
			'name' => 'menu_adv',
			'icon' => 'font-awesome:fa-cogs',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Typography with Preview', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'html',
							'name' => 'logo_font_preview',
							'binding' => array(
								'field'    => 'logo_font_face,logo_font_style,logo_font_weight,logo_font_size, logo_line_height',
								'function' => 'vp_font_preview',
							),
						),
						array(
							'type' => 'select',
							'name' => 'logo_font_face',
							'label' => __('Logo Font Face', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							'default' => '{{first}}'
						),
						array(
							'type' => 'radiobutton',
							'name' => 'logo_font_style',
							'label' => __('Logo Font Style', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'logo_font_face',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'logo_font_weight',
							'label' => __('Logo Font Weight', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'logo_font_face',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'logo_font_subset',
							'label' => __('Logo Font Subset', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'logo_font_face',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin'
						),
						array(
							'type'    => 'slider',
							'name'    => 'logo_font_size',
							'label'   => __('Logo Font Size (px)', 'talent-board'),
							'min'     => '5',
							'max'     => '32',
							'default' => '16',
						),
						array(
							'type'    => 'slider',
							'name'    => 'logo_line_height',
							'label'   => __('Logo Line Height (em)', 'talent-board'),
							'min'     => '0',
							'max'     => '3',
							'default' => '1.5',
							'step'    => '0.1',
						),
					),
				),
			),
		),
		array(
			'name' => 'notebox',
			'title' => __('Notebox', 'talent-board'),
			'icon' => 'font-awesome:fa-info-circle',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'nb_1',
					'label' => __('Normal Announcement', 'talent-board'),
					'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
					'status' => 'normal',
				),
				array(
					'type' => 'notebox',
					'name' => 'nb_2',
					'label' => __('Info Announcement', 'talent-board'),
					'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
					'status' => 'info',
				),
				array(
					'type' => 'notebox',
					'name' => 'nb_3',
					'label' => __('Success Announcement', 'talent-board'),
					'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
					'status' => 'success',
				),
				array(
					'type' => 'notebox',
					'name' => 'nb_4',
					'label' => __('Warning Announcement', 'talent-board'),
					'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
					'status' => 'warning',
				),
				array(
					'type' => 'notebox',
					'name' => 'nb_5',
					'label' => __('Critical Announcement', 'talent-board'),
					'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
					'status' => 'error',
				),
				array(
					'type' => 'section',
					'title' => __('Notebox in a Section', 'talent-board'),
					'name' => 'section_notebox',
					'fields' => array(
						array(
							'type' => 'notebox',
							'name' => 'nb_6',
							'label' => __('Normal Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'normal',
						),
						array(
							'type' => 'notebox',
							'name' => 'nb_7',
							'label' => __('Info Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'info',
						),
						array(
							'type' => 'notebox',
							'name' => 'nb_8',
							'label' => __('Success Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'success',
						),
						array(
							'type' => 'notebox',
							'name' => 'nb_9',
							'label' => __('Warning Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'warning',
						),
						array(
							'type' => 'notebox',
							'name' => 'nb_10',
							'label' => __('Critical Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'error',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Notebox with Fields', 'talent-board'),
					'name' => 'section_notebox',
					'fields' => array(
						array(
							'type' => 'notebox',
							'name' => 'nb_11',
							'label' => __('Info Announcement', 'talent-board'),
							'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'talent-board'),
							'status' => 'info',
						),
						array(
							'type' => 'textbox',
							'name' => 'tb_6',
							'label' => __('Textbox', 'talent-board'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'tb_7',
							'label' => __('Textbox', 'talent-board'),
							'default' => '',
						),
					),
				),
			),
		),
	)
);

/**
 *EOF
 */