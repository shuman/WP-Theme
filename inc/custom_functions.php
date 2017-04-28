<?php

/**
 * Get latest news posts
 * @param int 	$limit		number of display items
 * @return string 	html content
 */
function get_latest_news($limit){
	$html = '';
	return $html;
}

function get_banner_next_event(){

	$args = array(
		"orderby"        => 'post_date',
		"order"          => 'DESC',
		"post_type"      => 'events',
		"post_status"    => 'publish',
		"event_type"    => 'workshop',
		"posts_per_page" => '4',

	);

	if(get_region()){
		$args['region'] = get_region();
	}

	$myposts = get_posts( $args );

	//var_dump($myposts);

	if(!$myposts){
		return '';
	}
	$yesterday = date("Y/m/d", strtotime("- 1 DAY"));

	$slides = '';
	foreach ( $myposts as $post ) : setup_postdata( $post ); 

		$meta = get_post_meta( $post->ID );

		$unserialize = unserialize($meta['event_info'][0]);

		$event = $unserialize['date'][0];

		$month = date("F j, Y", strtotime($event['start_date']));

		$event_date = date("Y/m/d", strtotime($event['start_date']));
			if($event_date > $yesterday){

			$slides .= '
				<li>
	                <div class="event_content">
	                	<div class="feature_title">
		                    <h2>'.get_the_title($post->ID).'</h2>
		                </div>
		                <div class="meta">
		                    <span class="date">'.$month.'</span>
	         		        <span class="time">'.$event['start_time'].' - '.$event['end_time'].'</span>
		                </div>
	                    <a class="button btn_register" href="'.get_permalink($post->ID).'">View Workshop</a>
	                </div>
	            </li>
	        ';
    	}
	endforeach;

	$slides .= '
			<li id="symposium">
                <div class="event_content">
                	<div class="feature_title">
	                    <h2>2015 CANDE SYMPOSIUM</h2>
	                </div>
	                <div class="meta">
	                    <span class="date">September 30, 2015</span>
	                </div>
                    <a class="button btn_register" href="http://www.cande-events.org/">Register</a>
                </div>
            </li>
        ';

	$html = '<div class="hb_event_half_in">
                <div id="workshop_box" class="event_box bg_yellow">
                    <div class="event_top">
                        <span class="title_icon"><img src="'.get_stylesheet_directory_uri().'/images/event_icon_01.png" alt="event_icon_01"></span>
                        <h3>Attend Our NEXT Workshop</h3>
                    </div>

                    <div class="event_content">
                        <div id="event_slider" class="flexslider">
                            <ul class="slides">
                                '.$slides.'
                            </ul>
                        </div>

                    </div>
                </div>
            </div>';
    return $html;

}
function get_banner_latest_articles(){

	$args = array(
		"orderby"        => 'post_date',
		"order"          => 'DESC',
		"post_type"      => 'article',
		"post_status"    => 'publish',
		"posts_per_page" => '5'
	);

	if(get_region()){
		$args['region'] = get_region();
	}

	$myposts = get_posts( $args );

	if(!$myposts){
		return '';
	}

	$slides = '';
	foreach ( $myposts as $post ) : setup_postdata( $post ); 
		$slides .= '
			<li>
                <div class="feature_title">
                    <h2>'.get_the_title($post->ID).'</h2>
                </div>
                <div class="meta">
                    <!--span class="by_who">BY '.get_the_author().'</span-->
                    <span class="date">'.get_the_time('F j, Y', $post->ID).'</span>
                </div>
                <a class="more_event" href="'.get_permalink($post->ID).'">More</a>
            </li>
        ';
	endforeach;

	$html = '<div class="hb_event_half_in">
                <div class="article_box bg_orange_red">
                    <div class="event_top">
                        <span class="title_icon"><img src="'.get_stylesheet_directory_uri().'/images/event_icon_02.png" alt="event_icon_02"></span>
                        <h3>Talent Board\'s Latest articles</h3>
                    </div>

                    <div class="article_content">
                        <div id="article_slider" class="flexslider">
                            <ul class="slides">
                                '.$slides.'
                            </ul>
                        </div>

                    </div>
                </div>
            </div>';
    return $html;
}

function get_featured_report(){
	$args = array(
		"orderby"        => 'post_date',
		"order"          => 'DESC',
		"post_type"      => 'report',
		"post_status"    => 'publish',
		"posts_per_page" => '1'
	);
	$myposts = get_posts( $args );

	foreach ( $myposts as $post ) : setup_postdata( $post ); 
	
		$html = '<div class="feature_item">
                    <div class="feature_title">
                        <h2>Featured Report</h2>
                        <a class="show_all" href="'.site_url('/report').'">All &raquo;</a>
                    </div>

                    <div class="ft_item_content">
                        <div class="item_title">'.get_the_title($post->ID).'</div>
                        <div class="ft_item_desc">
                            <div class="item_logo"><img src="'.get_stylesheet_directory_uri().'/images/feature_icon_01.png" alt="feature_icon"></div>
                            <p>'. get_the_excerpt() .'</p>
                            <a class="feature_btn button" href="cande-awards/cande-results">Request a Report</a>
                        </div>
                    </div>
                </div>';
    endforeach; 
	wp_reset_postdata();

	return $html;
}

function get_latest_article(){
	$args = array(
		"orderby"        => 'post_date',
		"order"          => 'ASC',
		"post_type"      => 'article',
		"post_status"    => 'publish',
		"posts_per_page" => '1'
	);

	if(get_region()){
		$args['region'] = get_region();
	}
	// query_posts($args); 

	$myposts = get_posts( $args );

	foreach ( $myposts as $post ) : setup_postdata( $post ); 
		$html = '<div class="feature_item">
                    <div class="feature_title">
                        <h2>Latest Article</h2>
                        <a class="show_all" href="'.site_url('/article').'">All &raquo;</a>
                    </div>

                    <div class="ft_item_content">
                        <div class="item_title">'. get_the_title($post->ID) .'</div>
                        <div class="ft_item_desc">
                            <div class="item_logo"><img src="'.get_stylesheet_directory_uri().'/images/feature_icon_02.png" alt="feature_icon"></div>
                            <p>'. get_the_excerpt() .'</p>
                            <a class="feature_btn button" href="'.get_permalink($post->ID).'">Read Article</a>
                        </div>
                    </div>
                </div>';
    endforeach; 
	wp_reset_postdata();

	return $html;
}

function get_next_event(){
	$args = array(
		"orderby"        => 'post_date',
		"order"          => 'DESC',
		"post_type"      => 'events',
		"post_status"    => 'publish',
		"posts_per_page" => 15
	);

	if(get_region()){
		$args['region'] = get_region().',global';
	}

	$myposts = get_posts( $args );

	// echo '<pre>';
	// var_dump($myposts);
	// echo '</pre>';

	$ordered_events = array();
	$i=0;
	foreach ( $myposts as $post ) : setup_postdata( $post ); 
		$ordered_events[$i]['ID'] = $post->ID;
		$ordered_events[$i]['title'] = get_the_title($post->ID);
		$ordered_events[$i]['permalink'] = get_the_permalink($post->ID);
		$ordered_events[$i]['excerpt'] = get_the_excerpt();
		$meta = get_post_meta( $post->ID );

		$unserialize = unserialize($meta['event_info'][0]);

		$event = $unserialize['date'][0];

		$ordered_events[$i]['start_date'] = date("Y/m/d", strtotime($event['start_date']));
		$i++;
	endforeach;

	/* Sorting by event date */
	usort($ordered_events, function($b, $a) {
		if($a['start_date']==$b['start_date']) return 0;
    	return $a['start_date'] < $b['start_date']?1:-1;
	});
	// echo '<pre>';
	// var_dump($ordered_events);
	// echo '</pre>';

	$today = date("Y/m/d");

	foreach ( $ordered_events as $event ) : //setup_postdata( $event ); 

		if($event['start_date'] == $today || $event['start_date'] > $today){

		$html = '<div class="feature_item">
                    <div class="feature_title">
                        <h2>Next Event</h2>
                        <a class="show_all" href="'.site_url('/events').'">All &raquo;</a>
                    </div>

                    <div class="ft_item_content">
                        <div class="item_title">'. $event['title'] .'</div>
                        <div class="ft_item_desc">
                            <div class="item_logo"><img src="'.get_stylesheet_directory_uri().'/images/feature_icon_03.png" alt="feature_icon"></div>
                            <p>'. $event['excerpt'] .'</p>
                            <a class="feature_btn button" href="'.$event['permalink'].'">Register Today</a>
                        </div>
                    </div>
                </div>';
            break;
        } 
    endforeach; 

    	if(!$html) {
        	$html = '<div class="feature_item">
                    <div class="feature_title">
                        <h2>Next Event</h2>
                        <a class="show_all" href="'.site_url('/events').'">All &raquo;</a>
                    </div>

                    <div class="ft_item_content">
                        <div class="item_title">No Upcoming Events</div>
                        <div class="ft_item_desc">
                            <div class="item_logo"><img src="'.get_stylesheet_directory_uri().'/images/feature_icon_03.png" alt="feature_icon"></div>
                            <p>Check Back Soon</p>
                        </div>
                    </div>
                </div>';
        }
	wp_reset_postdata();

	return $html;
}

function get_underwriters_logo_list(){
	$args = array(
		'role'         => 'directory_members',
		'meta_key'     => '',
		'meta_value'   => '',
		'meta_compare' => '',
		'meta_query'   => array(
			'relation' => 'AND',
				array(
					'key'     => 'directory_category',
					'value'   => 'Underwriters',
					'compare' => 'LIKE'
				),
		),
		'orderby'      => 'login',
		'order'        => 'ASC',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	 );
	$users = get_users( $args );
	$slides = '';
	if($users):
		$slides .= '<ul class="sponsors">';
		foreach ($users as $user) {
			$company_logo = get_user_meta($user->ID, 'company_logo', true);
			if(!empty($company_logo)){
				$params = array( 'height' => 100 );
				$slides .= '<li><a href="'.get_permalink(59).'?c='.$user->user_nicename.'"><img src="'.bfi_thumb( $company_logo, $params ).'" alt="'.get_user_meta($user->ID, 'company_name', true).'"></a></li>';
			}
		}
		$slides .= '</ul>';
	endif;
	return $slides;
}
function get_sponsors_logo_list( $category, $region ){
	$args = array(
		'role'         => 'directory_members',
		'meta_key'     => '',
		'meta_value'   => '',
		'meta_compare' => '',
		'meta_query'   => array(
			'relation' => 'AND',
				array(
					'key'     => 'sponsor_level',
					'value'   => $category,
					'compare' => 'LIKE'
				),
				array(
					'key'     => 'region',
					'value'   => $region,
					'compare' => 'LIKE'
				),
		),
		'orderby'      => 'login',
		'order'        => 'ASC',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	 );

	$users = get_users( $args );
	$slides = '';
	if($users):
		$slides .= '<ul class="sponsors">';
		foreach ($users as $user) {
			$company_logo = get_user_meta($user->ID, 'company_logo', true);
			if(!empty($company_logo)){
				$params = array( 'height' => 100 );
				$slides .= '<li><a href="'.get_permalink(59).'?c='.$user->user_nicename.'"><img src="'.bfi_thumb( $company_logo, $params ).'" alt="'.get_user_meta($user->ID, 'company_name', true).'"></a></li>';
			}
		}
		$slides .= '</ul>';
	endif;
	return $slides;
}
function get_volunteers_logo_list(){
	$args = array(
		'role'         => 'directory_members',
		'meta_key'     => '',
		'meta_value'   => '',
		'meta_compare' => '',
		'meta_query'   => array(
			'relation' => 'AND',
				array(
					'key'     => 'directory_category',
					'value'   => 'Volunteers',
					'compare' => 'LIKE'
				),
		),
		'orderby'      => 'login',
		'order'        => 'ASC',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	 );
	$users = get_users( $args );
	$slides = '';
	if($users):
		$slides .= '<ul class="sponsors">';
		foreach ($users as $user) {
			$company_logo = get_user_meta($user->ID, 'company_logo', true);
			if(!empty($company_logo)){
				$params = array( 'height' => 100 );
				$slides .= '<li><a href="'.get_permalink(59).'?c='.$user->user_nicename.'"><img src="'.bfi_thumb( $company_logo, $params ).'" alt="'.get_user_meta($user->ID, 'company_name', true).'"></a></li>';
			}
		}
		$slides .= '</ul>';
	endif;
	return $slides;
}
function get_winners_logo_list(){
	$args = array(
		'role'         => 'directory_members',
		'meta_key'     => '',
		'meta_value'   => '',
		'meta_compare' => '',
		'meta_query'   => array(
			'relation' => 'AND',
				array(
					'key'     => 'directory_category',
					'value'   => 'Winners',
					'compare' => 'LIKE'
				),
		),
		'orderby'      => 'login',
		'order'        => 'ASC',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	 );
	$users = get_users( $args );
	$slides = '';
	if($users):
		$slides .= '<ul class="sponsors">';
		foreach ($users as $user) {
			$company_logo = get_user_meta($user->ID, 'company_logo', true);
			if(!empty($company_logo)){
				$params = array( 'height' => 100 );
				$slides .= '<li><a href="'.get_permalink(59).'?c='.$user->user_nicename.'"><img src="'.bfi_thumb( $company_logo, $params ).'" alt="'.get_user_meta($user->ID, 'company_name', true).'"></a></li>';
			}
		}
		$slides .= '</ul>';
	endif;
	return $slides;
}
/**
 * Get Community Webinars
 * @param int 	$limit		number of display items
 * @return string 	html content
 */
function get_community_webinars($limit=3){
	$args = array(
		'post_type'      => 'webinar',
		'posts_per_page' => $limit,
	);

	if(get_region()){
		$args['region'] = get_region().', global';
	}
	query_posts($args); 

	$html = '';
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
	
			$html .= '<div class="resc_list_item">
						<a href="'.get_the_permalink().'"><h3>'.get_the_title().'</h3></a>
						<p>'.truncate(get_the_content(), 20).'</p>
					</div>';
		endwhile;
	endif;
	wp_reset_postdata();

	return $html;
}

/**
 * Get upcoming events
 * @param int 	$limit		number of display items
 * @return string 	html content
 */
function get_upcoming_events($limit=3){
	$args = array(
		'post_type'      => 'events',
		'posts_per_page' => $limit,
	);

	if(get_region()){
		$args['region'] = get_region().', global';
	}
	query_posts($args); 

	$html = '';
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
	
			$html .= '<div class="resc_list_item">
						<a href="'.get_the_permalink().'"><h3>'.get_the_title().'</h3></a>
						<p>'.truncate(get_the_content(), 20).'</p>
					</div>';
		endwhile;
	endif;
	return $html;
}

function get_region(){
	if (isset($_COOKIE['my_region']) && !empty($_COOKIE['my_region'])) {
		return $_COOKIE['my_region'];
	}
	else{
		return false;
	}
}

function is_region_selected(){
	if (isset($_COOKIE['region']) && !empty($_COOKIE['region'])) {
		return true;
	}
	else{
		return false;
	}
}

function pagination($pages = '', $range = 4){
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
     	
         echo "<div class=\"tb_pagination\"><!--span>Page ".$paged." of ".$pages."</span-->\n";
         echo "<ul>\n";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages){
         	//echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
         }
         if($paged > 1){
         	echo "<li class=\"prev_page\"><a href='".get_pagenum_link($paged - 1)."'>&laquo; Previous</a></li>";
         }
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"current\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }
 
         if ($paged < $pages){
         	echo "<li class=\"next_page\"><a href=\"".get_pagenum_link($paged + 1)."\">Next &raquo;</a></li>";  
         }
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
         	//echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         }
         echo "</ul>\n";
         echo "</div>\n";
     }
}

function get_directory_items($region, $posts_per_page=10, $offset=0, $all = false, $directory_type=""){
	global $wpdb;
	
	if(isset($_REQUEST['sort']) && !empty($_REQUEST['sort'])){
		$order_by = " wp_usermeta.meta_value ASC";
	}
	else{
		$order_by = " FIElD (mt1.meta_value, 'Underwriters', 'Platinum', 'Gold', 'Silver', 'Winners', 'Volunteers' ), wp_usermeta.meta_value ASC";
	}

	if($all == false){
		$limit = " $offset, $posts_per_page";
	}
	else{
		$limit = " 99999";
	}
	if(!empty($directory_type)){
		if($directory_type == "Sponsors"){
			$type = " mt1.meta_value = 'Underwriters' OR 
					mt1.meta_value = 'Platinum' OR 
					mt1.meta_value = 'Gold' OR 
					mt1.meta_value = 'Silver' ";
		} 
		else{
			$type = " mt1.meta_value = '$directory_type' ";
		}
	}
	else{
		$type = " mt1.meta_value = 'Underwriters' OR 
					mt1.meta_value = 'Platinum' OR 
					mt1.meta_value = 'Gold' OR 
					mt1.meta_value = 'Silver' ";
	}
	$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
	$querystr = "SELECT DISTINCT wp_users.*
					FROM wp_users
					RIGHT JOIN wp_usermeta
					ON ( wp_users.ID = wp_usermeta.user_id )
					INNER JOIN wp_usermeta AS mt1
					ON ( wp_users.ID = mt1.user_id )
					INNER JOIN wp_usermeta AS mt2
					ON ( wp_users.ID = mt2.user_id )
					INNER JOIN wp_usermeta AS mt3
					ON ( wp_users.ID = mt3.user_id )
					INNER JOIN wp_usermeta AS mt4
					ON ( wp_users.ID = mt4.user_id )
					WHERE 1=1 AND 
					(
						wp_usermeta.meta_key = 'company_name'
						AND
						(
							$type
						)
						AND 
						( 
							mt2.meta_key = 'region' AND 
							CAST(mt2.meta_value AS CHAR) LIKE '%{$region}%' 
						) 
						AND 
						( 
							mt3.meta_key = 'wp_capabilities' AND 
							CAST(mt3.meta_value AS CHAR) LIKE '%directory_members%' 
						) 
						AND 
						( 
							mt4.meta_key = 'company_name' AND 
							CAST(mt4.meta_value AS CHAR) LIKE '%{$search}%'
						)
					)
					ORDER BY $order_by
					
					LIMIT $limit
				";

	$users = $wpdb->get_results($querystr, OBJECT);

	return $users;
}

function directory_pagination($total, $range = 4){
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($total > 0){
     	
		echo "<div class=\"dc_pagination\">\n";
		echo "<ul>\n";
		
		if($paged > 1){
			echo "<li class=\"prev_page\"><a href='".get_pagenum_link($paged - 1)."'>&lt; Prev</a></li>";
		}

		$post_from = (($paged - 1) * $range) + 1;
		$post_to   = $paged * $range;
		$post_to   = ($post_to > $total) ? $total : $post_to;

		if ( ($paged * $range) < $total){
			echo "<li class=\"next_page\"><a href=\"".get_pagenum_link($paged + 1)."\">Next &gt;</a></li>";  
		}

		echo "</ul>\n";
		echo "<span class=\"display_text\">Displaying $post_from through $post_to of $total listings</span>\n";
		echo "</div>\n";
    }
}

function truncate($input, $maxWords, $maxChars=500)
{
    $words = preg_split('/\s+/', $input);
    $words = array_slice($words, 0, $maxWords);
    $words = array_reverse($words);

    $chars = 0;
    $truncated = array();

    while(count($words) > 0)
    {
        $fragment = trim(array_pop($words));
        $chars += strlen($fragment);

        if($chars > $maxChars) break;

        $truncated[] = $fragment;
    }

    $result = implode($truncated, ' ');

    return $result . ($input == $result ? '' : '...');
}

function vpt_option( $name ){
    return vp_option( "vpt_option." . $name );
}


/* ============================== Get Authenticated Ajax Requests ========================= */

class Ajax_Handler{
	
	private $action;

	function __construct(){
		$this->action = isset($_REQUEST['action']) && !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';

		if ( is_user_logged_in() ){
			if(!empty($this->action) && method_exists(get_class(), $this->action)){
				add_action( "wp_ajax_{$this->action}", array($this, $this->action) );
			}
		}
		else{
			// All public requests
			add_action( "wp_ajax_nopriv_set_region", array($this, 'set_region') ); //Public
			add_action( "wp_ajax_nopriv_hybridauth", array($this, 'hybridauth') ); //Public
		}
	}

	function create_new_tbuser($username, $email, $password='', $role='general_member'){
		if(empty($password)){
			$password = wp_generate_password( 12, true );
		}
		// Create User
		$user_id = wp_create_user ( $username, $password, $email );
		if($user_id){
			// Set user role
			$user = new WP_User( $user_id );
			$user->set_role( $role );

			//Send email to user
			//wp_mail( $email, 'Welcome!', 'Your password is: ' . $password );

		}
		
		return $user_id; //boolean
	}

	/**
	 * Create new user with custom user meta
	 * @param array 	post data
	 */
	function add_general_member(){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');

		global $wpdb;

		$nonce = $_POST['_wpnonce'];

		if(!wp_verify_nonce( $nonce, 'gm_nonce')){
			echo json_encode(array('status'=>'KO'));
			die(); 
		}

		$first_name    = $_POST['first_name'];
		$last_name     = $_POST['last_name'];
		$username      = $_POST['username'];
		$email_address = $_POST['email'];
		$password      = wp_generate_password( 12, true );

		if (email_exists($email_address)){
    		echo json_encode(array('status'=>'KO', 'msg'=>"That E-mail is already registered! Please try another."));
			die(); 
		}

		if( username_exists( $email_address ) ) {
    		echo json_encode(array('status'=>'KO', 'msg'=>"That E-mail is registered!"));
			die();
		}


		// Create User & send email
		$user_id = $this->create_new_tbuser($username, $email_address, $password, 'general_member');

		// Update Profile Info
		wp_update_user(
			array(
				'ID'            => $user_id,
				'display_name'  => $first_name . ' ' . $last_name,
				'nickname'      => sanitize_title($first_name . ' ' . $last_name),
				'user_nicename' => sanitize_title($first_name . ' ' . $last_name),
				'first_name'    => $first_name,
				'last_name'     => $last_name,
			)
		);

		$output['status'] = 'OK';
		$output['msg'] = 'Successfully saved new item.';
		echo json_encode($output);
		die();
	}

	/**
	 * Create new user with custom user meta
	 * @param array 	post data
	 */
	function add_directory_member(){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');

		global $wpdb;

		// echo json_encode($_POST); die();

		$nonce = $_POST['_wpnonce'];

		if(!wp_verify_nonce( $nonce, 'dm_nonce')){
			$output['status'] = 'KO';
			$output['msg'] = 'Security check failed!';
			echo json_encode($output);
			die(); 
		}

		if(isset($_POST['userid']) && !empty($_POST['userid'])){
			$user_id = $_POST['userid'];
		}
		else{
			$user_id = false;
		}

		$directory_category = (isset($_POST['directory_category']) && !empty($_POST['directory_category'])) ? $_POST['directory_category'] : '';
		$sponsor_level   	= (isset($_POST['sponsor_level']) && !empty($_POST['sponsor_level'])) ? $_POST['sponsor_level'] : '';
		$area_focus         = (isset($_POST['area_focus']) && !empty($_POST['area_focus'])) ? implode('|', $_POST['area_focus']) : '';
		$city               = (isset($_POST['city']) && !empty($_POST['city'])) ? $_POST['city'] : '';
		$company_category   = (isset($_POST['company_category']) && !empty($_POST['company_category'])) ? implode('|', $_POST['company_category']) : '';
		$company_long_desc  = (isset($_POST['company_long_desc']) && !empty($_POST['company_long_desc'])) ? $_POST['company_long_desc'] : '';
		$company_name       = (isset($_POST['company_name']) && !empty($_POST['company_name'])) ? $_POST['company_name'] : '';
		$company_short_desc = (isset($_POST['company_short_desc']) && !empty($_POST['company_short_desc'])) ? $_POST['company_short_desc'] : '';
		$company_url        = (isset($_POST['company_url']) && !empty($_POST['company_url'])) ? $_POST['company_url'] : '';
		$contact_name       = (isset($_POST['contact_name']) && !empty($_POST['contact_name'])) ? $_POST['contact_name'] : '';
		$country      	 	= (isset($_POST['country']) && !empty($_POST['country'])) ? $_POST['country'] : '';
		$email_address 		= (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : '';
		$facebook           = (isset($_POST['facebook']) && !empty($_POST['facebook'])) ? $_POST['facebook'] : '';
		$google_plus        = (isset($_POST['google-plus']) && !empty($_POST['google-plus'])) ? $_POST['google-plus'] : '';
		$linkedin           = (isset($_POST['linkedin']) && !empty($_POST['linkedin'])) ? $_POST['linkedin'] : '';
		$news_box           = (isset($_POST['news_box']) && !empty($_POST['news_box'])) ? $_POST['news_box'] : '';
		$region         	= (isset($_POST['region']) && !empty($_POST['region'])) ? implode('|', $_POST['region']) : '';
		$show_info_form     = (isset($_POST['show_info_form']) && !empty($_POST['show_info_form'])) ? $_POST['show_info_form'] : '';
		$state              = (isset($_POST['state']) && !empty($_POST['state'])) ? $_POST['state'] : '';
		$street_address     = (isset($_POST['street_address']) && !empty($_POST['street_address'])) ? $_POST['street_address'] : '';
		$twitter            = (isset($_POST['twitter']) && !empty($_POST['twitter'])) ? $_POST['twitter'] : '';
		$youtube            = (isset($_POST['youtube']) && !empty($_POST['youtube'])) ? $_POST['youtube'] : '';
		$username           = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : '';


		if(!$user_id){


			if (email_exists($email_address)){
	    		$output['status'] = 'KO';
				$output['msg'] = 'That E-mail is already registered! Please try another.';
				echo json_encode($output);
				die(); 
			}
			if( username_exists( $username ) ) {
	    		$output['status'] = 'KO';
				$output['msg'] = 'That E-mail is registered!';
				echo json_encode($output);
				die();
			}

			// Create User
			$password = wp_generate_password( 12, true );
			$user_id = $this->create_new_tbuser($username, $email_address, $password, 'directory_members');

			if(!$user_id){
				$output['status'] = 'KO';
				$output['msg'] = 'New user setup failed!';
				echo json_encode($output);
				die();
			}
			$output['msg'] = 'Success added new entry!';
		}
		else{
			$output['msg'] = 'Successfully updated!';
		}



		// Update Profile Info
		wp_update_user(
			array(
				'ID'            => $user_id,
				'display_name'  => $company_name,
				'nickname'      => sanitize_title($company_name),
				'user_nicename' => sanitize_title($company_name),
				'user_email'	=> $email_address
			)
		);
		
		//Upload company logo
		if(isset($_FILES['company_logo']) && $_FILES['company_logo']['size'] > 0){
			$uploadedfile         = $_FILES['company_logo'];
			$upload_overrides     = array( 'test_form' => false );
			$movefile             = wp_handle_upload( $uploadedfile, $upload_overrides );
			$output['image_data'] = $movefile;
			$company_logo = ($movefile && !isset( $movefile['error'])) ? $movefile['url'] : '';
		}
		else{
			$company_logo = get_user_meta($user_id, 'company_logo', true);
		}

		// Add user meta
		update_user_meta( $user_id, 'directory_category', $directory_category );
		update_user_meta( $user_id, 'sponsor_level', $sponsor_level );
		update_user_meta( $user_id, 'area_focus', $area_focus );
		update_user_meta( $user_id, 'company_category', $company_category );
		update_user_meta( $user_id, 'company_long_desc', $company_long_desc );
		update_user_meta( $user_id, 'company_short_desc', $company_short_desc );
		update_user_meta( $user_id, 'company_name', $company_name );
		update_user_meta( $user_id, 'company_logo', $company_logo );
		update_user_meta( $user_id, 'contact_name', $contact_name );
		update_user_meta( $user_id, 'company_url', $company_url );
		update_user_meta( $user_id, 'news_box', $news_box );
		update_user_meta( $user_id, 'region', $region );
		update_user_meta( $user_id, 'show_info_form', $show_info_form );
		update_user_meta( $user_id, 'city', $city );
		update_user_meta( $user_id, 'state', $state );
		update_user_meta( $user_id, 'street_address', $street_address );
		update_user_meta( $user_id, 'country', $country );
		update_user_meta( $user_id, 'facebook', $facebook );
		update_user_meta( $user_id, 'twitter', $twitter );
		update_user_meta( $user_id, 'youtube', $youtube );
		update_user_meta( $user_id, 'linkedin', $linkedin );
		update_user_meta( $user_id, 'google_plus', $google_plus );		

	
		$output['status'] = 'OK';
		
		echo json_encode($output);
		die();
	}

	function edit_directory_member(){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');

		global $wpdb;

		$nonce = $_POST['_wpnonce'];

		if(!wp_verify_nonce( $nonce, 'dm_nonce')){
			$output['status'] = 'KO';
			$output['msg'] = 'Security check failed!';
			echo json_encode($output);
			die();
		}

		// print(current_user_can('upload_files'));
		// echo PHP_EOL;

		// check current user
		$user = wp_get_current_user();
		if ( !$user->ID )
		{
			$output['status'] = 'KO';
			$output['msg'] = 'Access denied!';
			echo json_encode($output);
			die();
		}

		// Check user's roles
		if ( !in_array('directory_members', $user->roles) ) {
			$output['status'] = 'KO';
			$output['msg'] = 'You are not directory member!';
			echo json_encode($output);
			die();
		}


		// get user meta
		$umeta  = array_map(function($a)
		{
			return $a[0];
		}, get_user_meta($user->ID));

		// get user input
		$umeta_mapping = array(
			'region'             => 'region',
			//------
			'company_name'       => 'company_name',
			'company_url'        => 'company_url',
			'street_address'     => 'street_address',
			'city'               => 'city',
			'state'              => 'state',
			'country'            => 'country',
			//------
			'contact_name'       => 'contact_name',
			'email_address'      => 'email',
			'nam_contact_name'   => 'nam_contact_name',
			'nam_contact_email'  => 'nam_email',
			'emea_contact_name'  => 'emea_contact_name',
			'emea_contact_email' => 'emea_email',
			'apac_contact_name'  => 'apac_contact_name',
			'apac_contact_email' => 'apac_email',
			//------
			'company_long_desc'  => 'company_long_desc',
			'company_short_desc' => 'company_short_desc',
			//------
			'news_box'           => 'news_box',
			//------
			'area_focus'         => 'area_focus',
			'company_category'   => 'company_category',
			'show_info_form'     => 'show_info_form',
			'linkedin'           => 'linkedin',
			'twitter'            => 'twitter',
			'facebook'           => 'facebook',
			'google_plus'        => 'google-plus',
			'youtube'            => 'youtube'
		);

		$new_umeta = array();
		foreach ( $umeta_mapping as $field => $input )
		{
			if ( !isset($_POST[$input]) )
			{
				$new_umeta[$field] = '';
			}
			elseif ( is_array($_POST[$input]) )
			{
				$new_umeta[$field] = implode('|', $_POST[$input]);
			}
			else
			{
				$new_umeta[$field] = trim($_POST[$input]);
			}
		}

		//Upload company logo
		if ( isset($_FILES['company_logo'])
			&& $_FILES['company_logo']['size'] > 0 )
		{
			$uploadedfile         = $_FILES['company_logo'];
			$upload_overrides     = array( 'test_form' => false );
			$movefile             = wp_handle_upload( $uploadedfile, $upload_overrides );
			$output['image_data'] = $movefile;

			$new_umeta['company_logo'] = ($movefile && !isset( $movefile['error'])) ? $movefile['url'] : '';
		}

		wp_update_user(
			array(
				'ID'            => $user->ID,
				'display_name'  => $new_umeta['company_name'],
				'nickname'      => sanitize_title($new_umeta['company_name']),
				'user_nicename' => sanitize_title($new_umeta['company_name']),
				'user_email'	=> $new_umeta['email_address']
			)
		);

		foreach ( $new_umeta as $name => $value )
		{
			update_user_meta( $user->ID, $name, $value );
		}

		$output['status'] = 'OK';
		$output['msg'] = 'Successfully updated!';

		echo json_encode($output);

		die();
	}

	/**
	 * Create new user with custom user meta
	 * @param array 	post data
	 */
	function get_member(){
		echo 'get_member';
		die();
	}

	// Set Region
	function set_region(){
		$region = (isset($_REQUEST['region']) && !empty($_REQUEST['region'])) ? $_REQUEST['region'] : '';

		setcookie( 'region', 'active', strtotime("+1 year"), "/" );
		setcookie( 'my_region', $region, strtotime("+1 month"), "/" );

		wp_redirect( wp_get_referer() );
		die();
	}

	function hybridauth(){
		// inlcude HybridAuth library
		require_once get_template_directory() . "/inc/hybridauth/Auth.php";
		// change the following paths if necessary
		$config   = get_template_directory() . '/inc/hybridauth/config.php';
		
		if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
		{
			//API callback Endpoint
			require_once get_template_directory() . "/inc/hybridauth/Endpoint.php";
		    Hybrid_Endpoint::process();
		}

		if( isset( $_REQUEST["provider"] ) ){
			$provider_name = $_REQUEST["provider"];
		 
			try
			{
				// initialize Hybrid_Auth class with the config file
				$hybridauth = new Hybrid_Auth( $config );
		 
				// try to authenticate with the selected provider
				$adapter = $hybridauth->authenticate( $provider_name );
		 
				// then grab the user profile
				$user_profile = $adapter->getUserProfile();
				if($user_profile){
					// var_dump($user_profile); die();

					$fullname      = $user_profile->displayName;
					$first_name    = $user_profile->firstName;
					$last_name     = $user_profile->lastName;
					$email_address = $user_profile->email;
					$avatar        = $user_profile->photoURL;
					if(empty($email_address)){
						die("Email address is empty! Email address is mandatory for proceed.");
					}
					
					if (email_exists($email_address)){
						$user = get_user_by( 'email', $email_address );
						$user_id = $user->ID;
						// Set loggedin						
						wp_set_auth_cookie( $user_id, true );
					}
					else{
						// Create user
						$user_id = $this->create_new_tbuser($username, $email_address);
						if($user_id){
							// Update Profile Info
							wp_update_user(
								array(
									'ID'            => $user_id,
									'display_name'  => $fullname,
									'nickname'      => $fullname,
									'user_nicename' => $fullname,
									'first_name'    => $first_name,
									'last_name'     => $last_name,
								)
							);
							wp_set_auth_cookie( $user_id, true );
						}
						else{
							die('Setting new user failed! Please try again');
						}
					}
					wp_redirect( home_url() );
				}
				else{
					echo 'Unknown Error! Please try again';
				}
			}
			// something went wrong?
			catch( Exception $e )
			{
				echo $e->getMessage();
			}
		}
		else{
			echo 'Access Denied!';
		}
		die();
	}


} //Class
$lib = new Ajax_Handler();
