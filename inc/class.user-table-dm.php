<?php

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Directory_Member_Table extends WP_List_Table {
    private $found_data;
    function __construct(){
	    global $status, $page;
	        parent::__construct( array(
	            'singular'  => __( 'member', 'talent-board' ),     	//singular name of the listed records
	            'plural'    => __( 'members', 'talent-board' ),   	//plural name of the listed records
	            'ajax'      => false        						//does this table support ajax?

	    ) );

	    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

	function admin_header() {
		$page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
		if( 'user-membership' != $page ){
			return;
		}
		// echo '<style type="text/css">';
		// echo '.wp-list-table .column-id { width: 5%; }';
		// echo '.wp-list-table .column-booktitle { width: 40%; }';
		// echo '.wp-list-table .column-author { width: 35%; }';
		// echo '.wp-list-table .column-isbn { width: 20%;}';
		// echo '</style>';
	}

	function no_items() {
		_e( 'No members found.' );
	}

	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
		    case 'company_name':
		    case 'directory_category':
		    case 'sponsor_level':
		    case 'contact_name':
		    case 'contact_email':
		    case 'company_url':
		    case 'company_address':
		    case 'region':
		        return $item[ $column_name ];
		    default:
		        return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
		}
	}

	function get_sortable_columns() {
		$sortable_columns = array(
			'company_name' => array('company_name',false),
			'directory_category' => array('directory_category',false),
		);
		return $sortable_columns;
	}

	function get_columns(){
        $columns = array(
			'cb'                 => '<input type="checkbox" />',
			'company_name'       => __( 'Company Name', 'talent-board' ),
			'directory_category' => __( 'Type', 'talent-board' ),
			'sponsor_level'      => __( 'Sponsor Level', 'talent-board' ),
			'contact_name'       => __( 'Contact Name', 'talent-board' ),
			'contact_email'      => __( 'Contact Email', 'talent-board' ),
			'company_url'        => __( 'URL', 'talent-board' ),
			'company_address'    => __( 'Address', 'talent-board' ),
			'region'             => __( 'Region', 'talent-board' ),
        );
         return $columns;
    }

	function usort_reorder( $a, $b ) {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'company_name';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}

	function column_company_name($item){
		$nonce = wp_create_nonce('del_user');
		$actions = array(
				'edit'      => sprintf('<a href="?page=%s&action=%s&user=%s">Edit</a>', 'add-directory-member','edit',$item['ID']),
				'delete'    => sprintf('<a onclick="return confirm(\'Are you sure?\');" href="?page=%s&action=%s&user=%s&delnonce=%s">Delete</a>', 'add-directory-member','delete', $item['ID'], $nonce),
			);

		return sprintf('%1$s %2$s', $item['company_name'], $this->row_actions($actions) );
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
		global $wpdb;

		$user_data = array();
		if(isset($_POST['s']) && !empty($_POST['s'])){
			$s = $_POST['s'];
			
			$args = array( 
					'meta_query'   => 
						array(
			                'relation' => 'OR',
				            array(
								'key'     => 'company_name',
								'value'   => $s,
								'compare' => "LIKE",
				            ),
				            array(
								'key'     => 'directory_category',
								'value'   => $s,
								'compare' => "LIKE",
				            ),
				            array(
								'key'     => 'region',
								'value'   => $s,
								'compare' => "LIKE",
				            ),
     					)
			    	);

		    $users = get_users( $args );
		}
		else{
			$users = get_users('role=directory_members');
		}
		$i = 0;
		foreach ($users as $user){
			$user_meta = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user->ID ) );

			$user_data[$i]['ID']                 = $user->ID;
			$user_data[$i]['company_name']       = isset($user_meta['company_name']) ? $user_meta['company_name'] : '';
			$user_data[$i]['directory_category'] = isset($user_meta['directory_category']) ? $user_meta['directory_category'] : '';
			$user_data[$i]['sponsor_level']      = isset($user_meta['sponsor_level']) ? $user_meta['sponsor_level'] : '';
			$user_data[$i]['contact_name']       = isset($user_meta['contact_name']) ? $user_meta['contact_name'] : '';
			$user_data[$i]['contact_email']      = $user->user_email;
			$user_data[$i]['company_url']        = isset($user_meta['company_url']) ? $user_meta['company_url'] : '';
			$user_data[$i]['company_address']    = isset($user_meta['street_address']) ? $user_meta['street_address'] : '';
			$user_data[$i]['region']             = isset($user_meta['region']) ? $user_meta['region'] : '';

			$i++;
		}


		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );

		usort( $user_data, array( &$this, 'usort_reorder' ) );

		$per_page = $this->get_items_per_page('members_per_page', 15);
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
