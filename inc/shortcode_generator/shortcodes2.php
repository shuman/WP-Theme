<?php

return array(
	'Content Sections' => array(
		'elements' => array(
			'content_section' => array(
				'title' => 'Content Section',
				'code'  => '[content_section][/content_section]',
				'attributes' => array(
					array(
						'name'  => 'pre_style',
						'type'  => 'select',
						'label' => __('Pre Style', 'talent-board'),
						'items' => array(
							array(
								'value' => 'about',
								'label' => 'About',
							),
							array(
								'value' => 'cande_survey',
								'label' => 'Cande Survey',
							),
							array(
								'value' => 'join_directory',
								'label' => 'Join Directory',
							),
							array(
								'value' => 'past_presention',
								'label' => 'Past Presentions',
							),
							array(
								'value' => 'twitter_feed',
								'label' => 'Twitter Feed',
							),
							array(
								'value' => 'rdr_bg about',
								'label' => 'Research Data Request',
							),
						),
					),
					array(
						'name'  => 'bg_color',
						'type'  => 'color',
						'label' => __('Background Color', 'talent-board'),
						'default' => '#ffffff',
					),
					array(
						'name'  => 'bg_image',
						'type'  => 'upload',
						'label' => __('Background Image', 'talent-board'),
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => __('Title', 'talent-board'),
					),
					array(
						'name'  => 'subtitle',
						'type'  => 'textbox',
						'label' => __('Subtitle', 'talent-board'),
					),
					array(
						'name'  => 'link_button_show',
						'type'  => 'radiobutton',
						'label' => __('Show Link Button?', 'talent-board'),
						'items' => array(
							array(
								'value' => 'show',
								'label' => 'Show'
							),
							array(
								'value' => 'hide',
								'label' => 'Hide'
							),
						),
						'default' => array('{{first}}'),
					),
					array(
						'name'  => 'link_button_text',
						'type'  => 'textbox',
						'label' => __('Link Button Text', 'talent-board'),
						'default' => 'Learn More',
					),
					array(
						'name'  => 'link_button_url',
						'type'  => 'textbox',
						'label' => __('Link Button URL', 'talent-board'),
					),
				)
			),
			'tabcontent' => array(
				'title' => 'Tab Content Section',
				'code'  => '[tabcontent][/tabcontent]',
				'attributes' => array(
					array(
						'name'  => 'title1',
						'type'  => 'textbox',
						'label' => __('Tab1 Title', 'talent-board'),
					),
					array(
						'name'  => 'tab1',
						'type'  => 'wpeditor',
						'label' => __('Tab1 Content', 'talent-board'),
						'use_external_plugins' => '0',
			            'disabled_externals_plugins' => '',
			            'disabled_internals_plugins' => '',
					),
					array(
						'name'  => 'title2',
						'type'  => 'textbox',
						'label' => __('Tab2 Title', 'talent-board'),
					),
					array(
						'name'  => 'tab2',
						'type'  => 'wpeditor',
						'label' => __('Tab2 Content', 'talent-board'),
						'use_external_plugins' => '0',
			            'disabled_externals_plugins' => '',
			            'disabled_internals_plugins' => '',
					),
					array(
						'name'  => 'title3',
						'type'  => 'textbox',
						'label' => __('Tab3 Title', 'talent-board'),
					),
					array(
						'name'  => 'tab3',
						'type'  => 'wpeditor',
						'label' => __('Tab3 Content', 'talent-board'),
						'use_external_plugins' => '0',
			            'disabled_externals_plugins' => '',
			            'disabled_internals_plugins' => '',
					),
					array(
						'name'  => 'title4',
						'type'  => 'textbox',
						'label' => __('Tab4 Title', 'talent-board'),
					),
					array(
						'name'  => 'tab4',
						'type'  => 'wpeditor',
						'label' => __('Tab4 Content', 'talent-board'),
						'use_external_plugins' => '0',
			            'disabled_externals_plugins' => '',
			            'disabled_internals_plugins' => '',
					),
				)
			),
			'tab' => array(
				'title' => 'Tab Section',
				'code'  => '[tab][/tab]',
				'attributes' => array(
					array(
						'name'  => 'tab',
						'type'  => 'textbox',
						'label' => __('Tab Title', 'talent-board'),
					),
				)
			),
			'home_banner' => array(
				'title'   => __('Home Banner', 'talent-board'),
				'code'    => '[home_banner][/home_banner]',
				'attributes' => array(
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#415d9f',
					),
					array(
						'name'    => 'banner_image',
						'type'    => 'upload',
						'label'   => __('Banner Image', 'talent-board'),
						'default' => '#415d9f',
					),
					array(
						'name'  => 'stack_up_image',
						'type'  => 'upload',
						'label' => __('Stack Up Image', 'talent-board'),
					),
					array(
						'name'  => 'stack_up_download_link',
						'type'  => 'textbox',
						'label' => __('Stack Up Download Link', 'talent-board'),
					),
					array(
						'name'  => 'show_event_registration',
						'type'  => 'radiobutton',
						'label' => __('Show Event Registration', 'talent-board'),
						'items' => array(
							array(
								'value' => 'show',
								'label' => 'Show'
							),
							array(
								'value' => 'hide',
								'label' => 'Hide'
							),
						),
						'default' => array('{{first}}')
					),
					array(
						'name'  => 'show_latest_article',
						'type'  => 'radiobutton',
						'label' => __('Show Latest Article', 'talent-board'),
						'items' => array(
							array(
								'value' => 'show',
								'label' => 'Show'
							),
							array(
								'value' => 'hide',
								'label' => 'Hide'
							),
						),
						'default' => array('{{first}}')
					),
				)
			),
			'featured_items' => array(
				'title' => 'Featured Items',
				'code'  => '[featured_items][/featured_items]',
				'attributes' => array(
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#ffffff',
					),
					array(
						'name' => 'feature_item1',
						'type' => 'select',
						'label' => __('Left', 'talent-board'),
						'items' => array(
							array(
								'value' => 'featured_report',
								'label' => 'Featured Reports',
							),
							array(
								'value' => 'latest_article',
								'label' => 'Latest Article',
							),
							array(
								'value' => 'next_event',
								'label' => 'Next Event',
							),
						),
						'default' => array('{{first}}'),
					),
					array(
						'name' => 'feature_item2',
						'type' => 'select',
						'label' => __('Middle', 'talent-board'),
						'items' => array(
							array(
								'value' => 'featured_report',
								'label' => 'Featured Reports',
							),
							array(
								'value' => 'latest_article',
								'label' => 'Latest Article',
							),
							array(
								'value' => 'next_event',
								'label' => 'Next Event',
							),
						),
						'default' => array('latest_article'),
					),
					array(
						'name'  => 'feature_item3',
						'type'  => 'select',
						'label' => __('Right', 'talent-board'),
						'items' => array(
							array(
								'value' => 'featured_report',
								'label' => 'Featured Reports',
							),
							array(
								'value' => 'latest_article',
								'label' => 'Latest Article',
							),
							array(
								'value' => 'next_event',
								'label' => 'Next Event',
							),
						),
						'default' => array('{{last}}'),
					),
				)
			),
			'global_sponsors' => array(
				'title'      => 'Global Sponsors (Underwriters)',
				'code'       => '[global_sponsors][/global_sponsors]',
				'attributes' => array(
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#fef7dd',
					),
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'talent-board'),
						'default' => 'Global Sponsors',
					),
					array(
						'name'    => 'limit',
						'type'    => 'slider',
						'label'   => __('Limit', 'talent-board'),
						'default' => '5',
						'min'     => 1,
						'max'     => 10,
					),
					array(
						'name'  => 'signup_url',
						'type'  => 'textbox',
						'label' => __('Sponsor Signup URL', 'talent-board'),
					),
				)
			),
			'sponsors' => array(
				'title'      => 'Sponsors (Pick a Level)',
				'code'       => '[sponsors][/sponsors]',
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => __('Section Title', 'talent-board'),
					),
					array(
						'name'  => 'category',
						'type'  => 'textbox',
						'label' => __('Global Platinum, Gold or Silver', 'talent-board'),
					),
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#fdf3cb',
					),
					array(
						'name'    => 'limit',
						'type'    => 'slider',
						'label'   => __('Limit', 'talent-board'),
						'default' => '3',
						'min'     => 1,
						'max'     => 100,
					),
					array(
						'name'  => 'signup_url',
						'type'  => 'textbox',
						'label' => __('Sponsor Signup URL', 'talent-board'),
					),
				)
			),
			'volunteers' => array(
				'title'      => 'Volunteers List',
				'code'       => '[volunteers][/volunteers]',
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => __('Section Title', 'talent-board'),
					),
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#fdf3cb',
					),
					array(
						'name'    => 'limit',
						'type'    => 'slider',
						'label'   => __('Limit', 'talent-board'),
						'default' => '3',
						'min'     => 1,
						'max'     => 100,
					),
					array(
						'name'  => 'signup_url',
						'type'  => 'textbox',
						'label' => __('Volunteers Signup URL', 'talent-board'),
					),
				)
			),
			'winners' => array(
				'title'      => 'Winners List',
				'code'       => '[winners][/winners]',
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => __('Section Title', 'talent-board'),
					),
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#fdf3cb',
					),
					array(
						'name'    => 'limit',
						'type'    => 'slider',
						'label'   => __('Limit', 'talent-board'),
						'default' => '3',
						'min'     => 1,
						'max'     => 100,
					),
				)
			),
			'promo_numbers' => array(
				'title'      => 'Numbers You Can\'t Ignore',
				'code'       => '[promo_numbers][/promo_numbers]',
				'attributes' => array(
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#112a64',
					),
					array(
						'name'    => 'number1',
						'type'    => 'textbox',
						'label'   => __('First', 'talent-board'),
						'default' => '45K',
					),
					array(
						'name'    => 'text1',
						'type'    => 'textarea',
						'label'   => __('First Description', 'talent-board'),
						'default' => '',
					),
					array(
						'name'    => 'number2',
						'type'    => 'textbox',
						'label'   => __('Second', 'talent-board'),
						'default' => '1500',
					),
					array(
						'name'    => 'text2',
						'type'    => 'textarea',
						'label'   => __('Second Description', 'talent-board'),
						'default' => '',
					),
					array(
						'name'    => 'number3',
						'type'    => 'textbox',
						'label'   => __('Third', 'talent-board'),
						'default' => '5K',
					),
					array(
						'name'    => 'text3',
						'type'    => 'textarea',
						'label'   => __('Third Description', 'talent-board'),
						'default' => '',
					),
					array(
						'name'    => 'number4',
						'type'    => 'textbox',
						'label'   => __('Fourth', 'talent-board'),
						'default' => '2400',
					),
					array(
						'name'    => 'text4',
						'type'    => 'textarea',
						'label'   => __('Fourth Description', 'talent-board'),
						'default' => '',
					),
					array(
						'name'    => 'number5',
						'type'    => 'textbox',
						'label'   => __('Fifth', 'talent-board'),
						'default' => '35K',
					),
					array(
						'name'    => 'text5',
						'type'    => 'textarea',
						'label'   => __('Fifth Description', 'talent-board'),
						'default' => '',
					),
					array(
						'name'  => 'link_button_show',
						'type'  => 'radiobutton',
						'label' => __('Show Link Button?', 'talent-board'),
						'items' => array(
							array(
								'value' => 'show',
								'label' => 'Show'
							),
							array(
								'value' => 'hide',
								'label' => 'Hide'
							),
						),
						'default' => array('{{first}}'),
					),
					array(
						'name'    => 'link_button_text',
						'type'    => 'textbox',
						'label'   => __('Link Button Text', 'talent-board'),
						'default' => 'Learn More',
					),
					array(
						'name'  => 'link_button_url',
						'type'  => 'textbox',
						'label' => __('Link Button URL', 'talent-board'),
					),
				)
			),
			'newsletter_optin' => array(
				'title' => 'Newsletter Opt-In',
				'code'  => '[newsletter_optin][/newsletter_optin]',
				'attributes' => array(
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'talent-board'),
						'default' => 'Join the Talent Board newsletter',
					),
					array(
						'name'    => 'code',
						'type'    => 'textbox',
						'label'   => __('Mailchimp Shortcode (Input shortcode without bracket "[]"!)', 'talent-board'),
						'default' => 'mc4wp_form',
					),
				)
			),
			'twitter_feed' => array(
				'title'      => 'Latest Tweet',
				'code'       => '[tweet][/tweet]',
				'attributes' => array(
					array(
						'name'    => 'username',
						'type'    => 'textbox',
						'label'   => __('Twitter Username', 'talent-board'),
						'default' => 'CandidateGuru',
					),
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#dde8fe',
					),
					array(
						'name'    => 'limit',
						'type'    => 'slider',
						'label'   => __('Limit', 'talent-board'),
						'default' => '5',
						'min'     => 1,
						'max'     => 10,
					),
				)
			),
		)
	),
	'Pages' => array(
		'elements' => array(
			'contact' => array(
				'title'   => __('Contact Form', 'talent-board'),
				'code'    => '[contact][/contact]',
				'attributes' => array(
					array(
						'name'  => 'bg_color',
						'type'  => 'color',
						'label' => __('Background Color', 'talent-board'),
						'default' => '#415d9f',
					),
				)
			),
			'directory' => array(
				'title'   => __('Directory Listing', 'talent-board'),
				'code'    => '[dir_list][/dir_list]',
				'attributes' => array(
					array(
						'name'  => 'bg_color',
						'type'  => 'color',
						'label' => __('Background Color', 'talent-board'),
						'default' => '#415d9f',
					),
				)
			),
			'directory' => array(
				'title'      => __('Directory Listing', 'talent-board'),
				'code'       => '[dir_list][/dir_list]',
				'attributes' => array(
					array(
						'name'    => 'bg_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'talent-board'),
						'default' => '#415d9f',
					),
				)
			),
		)
	),
	'Layout' => array(
		'elements' => array(

			'row' => array(
				'title'      => __('Row', 'talent-board'),
				'code'       => '[row][/row]',
				'attributes' => array(
					array(
						'name' => 'section_type',
						'type' => 'select',
						'label' => __('Section Type', 'talent-board'),
						'items' => array(
							array(
								'value' => 'home_banner',
								'label' => 'Home Banner',
							),
							array(
								'value' => 'sec_block feature_panel',
								'label' => 'Featured Panel',
							),
							array(
								'value' => 'sec_block global_sponsors',
								'label' => 'Global Sponsors',
							),
						),
					),
					array(
						'name' => 'class',
						'type' => 'textbox',
						'label' => __('Custom Class', 'talent-board'),
					),
				),
			),

			'column' => array(
				'title'      => __('Column', 'talent-board'),
				'code'       => '[column][/column]',
				'attributes' => array(
					array(
						'name'    => 'col_lg',
						'type'    => 'slider',
						'label'   => __('col-lg-', 'talent-board'),
						'min'     => 1,
						'max'     => 12,
						'default' => 12,
					),
					array(
						'name'    => 'col_md',
						'type'    => 'slider',
						'label'   => __('col-md-', 'talent-board'),
						'min'     => 0,
						'max'     => 12,
						'default' => 0,
					),
					array(
						'name'    => 'col_sm',
						'type'    => 'slider',
						'label'   => __('col-sm-', 'talent-board'),
						'min'     => 0,
						'max'     => 12,
						'default' => 0,
					),
					array(
						'name'    => 'col_xs',
						'type'    => 'slider',
						'label'   => __('col-xs-', 'talent-board'),
						'min'     => 0,
						'max'     => 12,
						'default' => 0,
					),
					array(
						'name'    => 'col_lg_offset',
						'type'    => 'slider',
						'label'   => __('col-lg-offset-', 'talent-board'),
						'default' => 0,
						'min'     => 0,
						'max'     => 12,
					),
					array(
						'name'    => 'col_md_offset',
						'type'    => 'slider',
						'label'   => __('col-md-offset-', 'talent-board'),
						'default' => 0,
						'min'     => 0,
						'max'     => 12,
					),
					array(
						'name'    => 'col_sm_offset',
						'type'    => 'slider',
						'label'   => __('col-sm-offset-', 'talent-board'),
						'default' => 0,
						'min'     => 0,
						'max'     => 12,
					),
					array(
						'name'    => 'col_xs_offset',
						'type'    => 'slider',
						'label'   => __('col-xs-offset-', 'talent-board'),
						'default' => 0,
						'min'     => 0,
						'max'     => 12,
					),
				),
			),

			'spacer' => array(
				'title'      => __('Inner Spacer', 'talent-board'),
				'code'       => '[spacer]',
				'attributes' => array(
					array(
						'name'    => 'size',
						'type'    => 'slider',
						'label'   => __('Size', 'talent-board'),
						'default' => 0,
						'min'     => 0,
						'max'     => 500,
					),
				),
			),
		),
	),
	'General' => array(
		'elements' => array(
			'primary_button' => array(
				'title'      => 'Primary Button',
				'code'       => '[button][/button]',
				'attributes' => array(
					array(
						'name'  => 'btn_type',
						'type'  => 'select',
						'label' => __('Button Type', 'talent-board'),
						'items' => array(
							array(
								'value' => 'button',
								'label' => 'Button',
							),
							array(
								'value' => 'input',
								'label' => 'Input',
							),
							array(
								'value' => 'link',
								'label' => 'Link',
							),
						),
						'default' => 'button',
					),
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => __('Text', 'talent-board'),
					),
					array(
						'name'  => 'id',
						'type'  => 'textbox',
						'label' => __('Custom ID', 'talent-board'),
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => __('Custom Class', 'talent-board'),
					),
					array(
						'name'       => 'link',
						'type'       => 'textbox',
						'label'      => __('Link', 'talent-board'),
						'validation' => 'url',
					),
					array(
						'name'  => 'style',
						'type'  => 'textbox',
						'label' => __('Inline CSS', 'talent-board'),
					),
					array(
						'name'  => 'onclick',
						'type'  => 'textbox',
						'label' => __('Javascript onclick', 'talent-board'),
					),
				),
			),
			'region_content' => array(
				'title'      => 'Region Based Content',
				'code'       => '[region][/region]',
				'attributes' => array(
					array(
						'name'  => 'location',
						'type'  => 'select',
						'label' => __('Region Location', 'talent-board'),
						'description' => __('Content should display only selected region only.', 'talent-board'),
						'items' => array(
							array(
								'value' => 'global',
								'label' => 'Global',
							),
							array(
								'value' => 'NAM',
								'label' => 'NAM',
							),
							array(
								'value' => 'EMEA',
								'label' => 'EMEA',
							),
							array(
								'value' => 'APAC',
								'label' => 'APAC',
							),
						),
						'default' => 'button',
					),
				),
			),
		),
	),

);

/**
 * EOF
 */