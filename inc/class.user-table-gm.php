<?php

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class General_Member_Table extends WP_List_Table {
	private $found_data;
    function __construct(){
	    global $status, $page;
	    parent::__construct( 
	    	array(
	            'singular'  => __( 'member', 'talent-board' ),     	//singular name of the listed records
	            'plural'    => __( 'members', 'talent-board' ),   	//plural name of the listed records
	            'ajax'      => false        						//does this table support ajax?
	    		) 
	    );

	    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

	function admin_header() {
		$page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
		if( 'user-membership' != $page ){
			return;
		}
		// echo '<style type="text/css">';
		// echo '.wp-list-table .column-id { width: 5%; }';
		// echo '.wp-list-table .column-user_nicename { width: 40%; }';
		// echo '.wp-list-table .column-user_email { width: 35%; }';
		// echo '.wp-list-table .column-role { width: 20%;}';
		// echo '</style>';
	}

	function no_items() {
		_e( 'No result found.' );
	}

	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
		    case 'display_name':
		    case 'user_nicename':
		    case 'user_email':
		    case 'role':
		        return $item[ $column_name ];
		    case 'registered':
		        return date("F d, Y", strtotime($item[ $column_name ]));
		    default:
		        return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
		}
	}

	function get_sortable_columns() {
		$sortable_columns = array(
			'display_name' => array('display_name',false),
			'user_nicename' => array('user_nicename',false),
			'user_email'    => array('user_email',false),
			'role'      => array('role',false),
			'registered'      => array('registered',false),
		);
		return $sortable_columns;
	}

	function get_columns(){
        $columns = array(
			'cb'            => '<input type="checkbox" />',
			'display_name' => __( 'Name', 'talent-board' ),
			'user_nicename' => __( 'Nicename', 'talent-board' ),
			'user_email'    => __( 'Email', 'talent-board' ),
			'role'          => __( 'Role', 'talent-board' ),
			'registered'    => __( 'Registered', 'talent-board' ),
        );
         return $columns;
    }

	function usort_reorder( $a, $b ) {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'user_nicename';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}

	function column_display_name($item){
		$actions = array(
				// 'edit'      => '<a href="/wp-admin/user-edit.php?user_id='.$item['ID'].'&wp_http_referer='. urlencode('/wp-admin/admin.php?page=user-membership') .'">Edit</a>',
				'edit'      => sprintf('<a href="/wp-admin/user-edit.php?user_id=%s&wp_http_referer=%s">Edit</a>', $item['ID'], urlencode('/wp-admin/admin.php?page=user-membership')),
				'delete'    => sprintf('<a href="/wp-admin/user-edit.php?page=%s&action=%s&user=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ID']),
			);

		return sprintf('%1$s %2$s', $item['user_nicename'], $this->row_actions($actions) );
	}

	function get_bulk_actions() {
		$actions = array(
			'delete'    => 'Delete'
		);
		return $actions;
	}

	function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="user[]" value="%s" />', $item['ID']
        );    
    }

	function prepare_items() {
		$user_data = array();

		$users = get_users('role=general_member');
		$i = 0;
		foreach ($users as $user){
			$user_data[$i]['ID'] = $user->ID;
			$user_data[$i]['display_name'] = $user->display_name;
			$user_data[$i]['user_nicename'] = $user->user_nicename;
			$user_data[$i]['user_email'] = esc_html( $user->user_email );
			$user_data[$i]['role'] = 'General Member';
			$user_data[$i]['registered'] = $user->user_registered;

			$i++;
		}


		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );
		usort( $user_data, array( &$this, 'usort_reorder' ) );

		$per_page = 5;
		$current_page = $this->get_pagenum();
		$total_items = count( $user_data );

		// only ncessary because we have sample data
		$this->found_data = array_slice( $user_data,( ( $current_page-1 )* $per_page ), $per_page );

		$this->set_pagination_args( array(
			'total_items' => $total_items,                  //WE have to calculate the total number of items
			'per_page'    => $per_page                     //WE have to determine how many items to show on a page
		) );
		$this->items = $this->found_data;
	}
} //class


