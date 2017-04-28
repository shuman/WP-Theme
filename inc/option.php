<?php

return array(
	'title' => __('Talent Board Option Panel', 'talent-board'),
	'logo' => get_template_directory_uri() . '/images/logo_bg.png',
	'menus' => array(
		array( //General Options
			'title' => __('General Options', 'talent-board'),
			'name' => 'general_options',
			'icon' => 'font-awesome:fa-cog',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('TalentBoard Logo', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'header_logo',
							'label' => __('Header Logo', 'talent-board'),
							'default' => get_template_directory_uri() . '/images/logo_bg.png',
						),
						array(
							'type' => 'upload',
							'name' => 'footer_logo',
							'label' => __('Footer Logo', 'talent-board'),
							'default' => get_template_directory_uri() . '/images/logo_footer.png',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Popup Settings', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'multiselect',
							'name' => 'region_popup_pages',
							'label' => __('Region Popup', 'talent-board'),
							'description' => __('Select pages where display popup for Region selection.', 'talent-board'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Social Links', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'newsletter',
							'label' => __('Newsletter Link', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'facebook',
							'label' => __('Facebook', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter',
							'label' => __('Twitter', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'linkedin',
							'label' => __('LinkedIn', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'youtube',
							'label' => __('Youtube', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'google_plus',
							'label' => __('Google+', 'talent-board'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rss',
							'label' => __('RSS', 'talent-board'),
							'validation' => 'url',
						),
					)
				),
				array(
					'type' => 'section',
					'title' => __('Copyright Info', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'copyright_text',
							'label' => __('Copyright Text', 'talent-board'),
							'default' => '2015 Copyright, Talent Board, California',
						),
					)
				)
			)
		),
		array( // Page Settings
			'title' => __('Page Settings', 'talent-board'),
			'name' => 'page_settings',
			'icon' => 'font-awesome:fa-file',
			'controls' => array(
				array(
					'type' => 'select',
					'name' => 'signup_page',
					'label' => __('Signup Page', 'talent-board'),
					'description' => __('Directory signup form will display here', 'talent-board'),
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
					'type' => 'select',
					'name' => 'posts_per_page',
					'label' => __('Posts Per Page', 'talent-board'),
					'description' => __('Number of posts display per page.', 'talent-board'),
					'items' => array(
						array(
							'value' => '5',
							'label' => __('05', 'talent-board'),
						),
						array(
							'value' => '10',
							'label' => __('10', 'talent-board'),
						),
						array(
							'value' => '25',
							'label' => __('25', 'talent-board'),
						),
						array(
							'value' => '50',
							'label' => __('50', 'talent-board'),
						),
						array(
							'value' => '100',
							'label' => __('100', 'talent-board'),
						),
					),
					'default' => array(
						'10',
					),
				),
			)
		),
		array( //Custom Scripts
			'title' => __('Custom Scripts', 'talent-board'),
			'name' => 'custom_scripts',
			'icon' => 'font-awesome:fa-code',
			'controls' => array(
				array(
					'type' => 'codeeditor',
					'name' => 'custom_css',
					'label' => __('Custom CSS', 'talent-board'),
					'description' => __('Write your custom css here.', 'talent-board'),
					'theme' => 'github',
					'mode' => 'css',
				),
				array(
					'type' => 'codeeditor',
					'name' => 'custom_js',
					'label' => __('Custom JS', 'talent-board'),
					'description' => __('Write your custom js here.', 'talent-board'),
					'theme' => 'twilight',
					'mode' => 'javascript',
				),
			)
		),
		array( //Email Settings
			'title' => __('Email Settings', 'talent-board'),
			'name' => 'email_settings',
			'icon' => 'font-awesome:fa-envelope',
			'controls' => array(
				array(
					'type' => 'textbox',
					'name' => 'from_email_address',
					'label' => __('From Email Address', 'talent-board'),
					'default'=> get_option( 'admin_email' ),
					'validation'=>'email'
				),
				array(
					'type' => 'section',
					'title' => __('Signup Email', 'talent-board'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'signup_email_subject',
							'label' => __('Signup Email Subject', 'talent-board'),
						),
						array(
							'type' => 'textarea',
							'name' => 'signup_email_body',
							'label' => __('Signup Email Body', 'talent-board'),
							'description' => __('Placeholders: {name}, {email}, {username}, {password}, {login_link}', 'talent-board'),
						),
					)
				)
			)
		),
	)
);

/**
 *EOF
 */