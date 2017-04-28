<?php

function my_users_menu() {
	$hook = add_menu_page( 'User Membership Page', 'Membership', 'manage_options', 'user-membership', 'general_members_list', '', 72 );
	add_submenu_page( 'user-membership', 'General Members', 'General Members', 'manage_options', 'user-membership', 'general_members_list' );
	add_submenu_page( 'user-membership', 'Add General Member', 'Add New (GM)', 'manage_options', 'add-general-member', 'membership_add_general_user' );

	$hook2 = add_submenu_page( 'user-membership', 'Directory Members', 'Directory Members', 'manage_options', 'dm-user', 'directory_members_list' );
	add_submenu_page( 'user-membership', 'Add Directory Member', 'Add New (DM)', 'manage_options', 'add-directory-member', 'membership_add_directory_user' );

	// Add options
	add_action( "load-$hook", 'gm_options' );
	add_action( "load-$hook2", 'dm_options' );
}
add_action('admin_menu', 'my_users_menu');

/**
 * Include css for admin
 */
function load_custom_wp_admin_style() {
    wp_enqueue_style( 'custom-admin-css', get_template_directory_uri() . '/css/admin-style.css', array(), time() );
    wp_enqueue_script( 'custom-admin-script', get_template_directory_uri() . '/js/admin-script.js', array(), time(), true );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


//Add new user
function membership_add_general_user(){
	include get_template_directory() . '/inc/views/add_general_user_form.php';
}

//Add new user
function membership_add_directory_user(){
	include get_template_directory() . '/inc/views/add_directory_user_form.php';
}

// General Members View
function gm_options() {
	include get_template_directory() . '/inc/class.user-table-gm.php';
	global $general_members;
	$option = 'per_page';
	$args = array(
		'label'   => 'Members',
		'default' => 50,
		'option'  => 'members_per_page'
    );
	add_screen_option( $option, $args );
	$general_members = new General_Member_Table();
}

function general_members_list(){
	global $general_members;
	$general_members->prepare_items(); 
	?>
	<div class="wrap">
		<?php 
			//$gm_users = get_users('role=general_member');
			// var_dump($gm_users);
		?>	
		<h2>General Members</h2>
		<form method="post">
			<input type="hidden" name="page" value="dm-user">
			<?php
			$general_members->search_box( 'search', 'search_id' );
			$general_members->display(); 
			?>
		</form>
	</div>
	<?php
}


// Directory Members View
function dm_options() {
	include get_template_directory() . '/inc/class.user-table-dm.php';

	global $directory_members;
	$option = 'per_page';
	$args = array(
		'label'   => 'Members',
		'default' => 50,
		'option'  => 'members_per_page'
    );
	add_screen_option( $option, $args );
	$directory_members = new Directory_Member_Table();
}

function directory_members_list(){
	global $directory_members;
	$directory_members->prepare_items(); 
	?>
	<div class="wrap">
		<h2>Directory Members <a class="add-new-h2" href="<?php site_url();?>/wp-admin/admin.php?page=add-directory-member">Add New</a></h2>
		<form method="post">
			<input type="hidden" name="page" value="dm-user" />
			<?php
			$directory_members->search_box( 'search', 'search_id' );
			$directory_members->display(); 
			?>
		</form>
	</div>
	<?php
}




