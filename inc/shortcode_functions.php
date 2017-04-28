<?php

function register_shortcodes(){
    add_shortcode( 'row', 'fn_row' );
    add_shortcode( 'column', 'fn_column' );
    add_shortcode( 'content_section', 'fn_content_section' );
    add_shortcode( 'newsletter_optin', 'fn_newsletter_optin' );
    add_shortcode( 'promo_numbers', 'fn_promo_numbers' );
    add_shortcode( 'featured_items', 'fn_featured_items' );
    add_shortcode( 'home_banner', 'fn_home_banner' );
    add_shortcode( 'global_sponsors', 'fn_global_sponsors' );
    add_shortcode( 'sponsors', 'fn_sponsors' );
    add_shortcode( 'volunteers', 'fn_volunteers' );
    add_shortcode( 'winners', 'fn_winners' );
    add_shortcode( 'tweet', 'fn_tweet' );
    add_shortcode( 'button', 'fn_button' );
    add_shortcode( 'region', 'fn_region' );
    add_shortcode( 'tabcontent', 'fn_tabcontent' );
    add_shortcode( 'tab', 'fn_tab' );
}
add_action( 'init', 'register_shortcodes');


function fn_row( $atts, $content = null, $tag ) {
    $html = '<section class="news_blog sec_block">
                <div class="container">
                    <div class="row">
                        '. do_shortcode($content) .'
                    </div>
                </div>
            </section>';

    return $html;
}

function fn_column( $atts, $content = null, $tag ) {
    extract( shortcode_atts( array(
            'col_lg'        => '12',
            'col_md'        => 0,
            'col_sm'        => 0,
            'col_xs'        => 0,
            'col_lg_offset'  => 0,
            'col_md_offset' => 0,
            'col_sm_offset' => 0,
            'col_xs_offset' => 0,
        ), $atts ) );

    $cols = '';
    $cols .= 'col-lg-' . $col_lg;
    $cols .= ($col_md != 0) ? ' col-md-'.$col_md : '';
    $cols .= ($col_sm != 0) ? ' col-sm-'.$col_sm : '';
    $cols .= ($col_xs != 0) ? ' col-xs-'.$col_xs : '';

    $offset = '';
    $offset .= 'co-lg-offset-' . $col_lg_offset;
    $offset .= ($col_md_offset != 0) ? ' col-md-offset-'.$col_md_offset : '';
    $offset .= ($col_sm_offset != 0) ? ' col-sm-offset-'.$col_sm_offset : '';
    $offset .= ($col_xs_offset != 0) ? ' col-xs-offset-'.$col_xs_offset : '';

    $html = '<div class="'.$cols.' '.$offset.'">
                        '. wpautop(do_shortcode($content)) .'
            </div>';

            /*
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </div>
            </article>
            */

    return $html;
}

function fn_tab( $atts, $content = null, $tag ) {
    extract( shortcode_atts( array(
            'tab' => '',
        ), $atts ) );

    $html .= '<div role="tabpanel" class="tab-pane" id="tab'.$tab.'">
                        '. wpautop(do_shortcode($content)) .'
            </div>';

    return $html;
}

function fn_tabcontent( $atts, $content = null, $tag ){

    extract( shortcode_atts( array(
            'title1'    =>'',
            'tab1'      =>'',
            'title2'    =>'',
            'tab2'      =>'',
            'title3'    =>'',
            'tab3'      =>'',
            'title4'    =>'',
            'tab4'      =>'',
        ), $atts ) );

    $html .= '';
    $html .= '<div role="tabpanel">';
    $html .= '<ul class="nav nav-tabs" role="tablist" id="tb_tabs">';
    if(!empty($title1)){
        $html .= '<li role="presentation" class="tab active"><a href="#tab1" onclick="return false;" aria-controls="home" role="tab" data-toggle="tab">'.$title1.'</a></li>';
    }
    if(!empty($title2)){
        $html .= '<li role="presentation" class="tab"><a href="#tab2" onclick="return false;" aria-controls="home" role="tab" data-toggle="tab">'.$title2.'</a></li>';
    }
    if(!empty($title3)){
        $html .= '<li role="presentation" class="tab"><a href="#tab3" onclick="return false;" aria-controls="home" role="tab" data-toggle="tab">'.$title3.'</a></li>';
    }
    if(!empty($title4)){
        $html .= '<li role="presentation" class="tab"><a href="#tab4" onclick="return false;" aria-controls="home" role="tab" data-toggle="tab">'.$title4.'</a></li>';
    }
    $html .= '</ul>';
    $html .= '<div class="tab-content">
                    '. wpautop(do_shortcode($content)) .'
                </div>';
    $html .= '</div>';
    $html .= '<script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#tab1").addClass("active");
            $("#tb_tabs a").click(function (e) {
                  e.preventDefault();
                  $(this).tab("show");
                  return false;
                })
        });
        </script>';
    return $html;

}

function fn_content_section( $atts, $content = null, $tag ) {
    extract( shortcode_atts( array(
            'pre_style'        =>'',
            'bg_color'         =>'',
            'bg_image'         =>'',
            'title'            =>'',
            'subtitle'         =>'',
            'link_button_show' =>'',
            'link_button_text' =>'',
            'link_button_url'  =>'',
        ), $atts ) );

    $html = '';
    if(isset($pre_style) && !empty($pre_style)){
        $html .= '<section class="sec_block '.$pre_style.'">';
    }
    else{
        $html .= '<section class="sec_block" style="background-color:'.$bg_color.'; background-image:url('.$bg_image.');background-size:cover;">';
    }
    $html .= '<div class="container">';
    $html .= '<div class="about_content">';
    $html .= '<div class="sec_title"><h1>'.$title.'</h1></div>';
    $html .= '<div class="content_desc">';
    $html .= wpautop($content);
    $html .= '</div>';
    if($link_button_show == 'show'){
        $html .= '<div class="more_about"><a class="button" href="'.$link_button_url.'">'.$link_button_text.'</a></div>';
    }
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</section>';
    return $html;
}

function fn_newsletter_optin( $atts, $content = null, $tag ) {
    extract( shortcode_atts( array(
            'title' => '',
            'code' => '',
        ), $atts ) );
    
    $code = ($code != '') ? $code : 'mc4wp_form';

    $html = '<section class="tb_newsletter sec_block">
                <div class="container">
                    <div class="newsletter_block">
                        <div class="newsletter_title">
                            <h2>'.$title.'</h2>   
                        </div>
                        <div class="nl_form">
                            '.do_shortcode("[$code]").'
                        </div>
                    </div>
                </div>
            </section>';

    return $html;
}

function fn_promo_numbers( $atts, $content = null, $tag ){
    extract( shortcode_atts( array(
            'bg_color'         => '#112a64',
            'title'            => '',
            'number1'          => '',
            'text1'            => '',
            'number2'          => '',
            'text2'            => '',
            'number3'          => '',
            'text3'            => '',
            'number4'          => '',
            'text4'            => '',
            'number5'          => '',
            'text5'            => '',
            'link_button_show' => 'hide',
            'link_button_text' => '',
            'link_button_url'  => '',
        ), $atts ) );

    $html = '';
    $html .= '<section class="ignore_count sec_block" style="background-color:'.$bg_color.'">
                <div class="container">
                    <div class="ign_count_content row">
                        <div class="col-sm-12">
                            <div class="sec_title"><h1>'.$title.'</h1></div>
                        </div>

                        <div class="col-sm-12">
                            <ul class="ign_count_block">
                                <li><div class="count_box c_box1" id="promo1"><span class="ign_number">'.$number1.'</span></div></li>
                                <li><div class="count_box c_box2" id="promo2"><span class="ign_number">'.$number2.'</span></div></li>
                                <li><div class="count_box c_box3" id="promo3"><span class="ign_number">'.$number3.'</span></div></li>
                                <li><div class="count_box c_box4" id="promo4"><span class="ign_number">'.$number4.'</span></div></li>
                                <li><div class="count_box c_box5" id="promo5"><span class="ign_number">'.$number5.'</span></div></li>
                            </ul>
                        </div>

                        <div class="col-sm-12">
                            <div class="content_desc">
                                <div class="promo_desc active" id="promo1content">'.$text1.'</div>
                                <div class="promo_desc" id="promo2content">'.$text2.'</div>
                                <div class="promo_desc" id="promo3content">'.$text3.'</div>
                                <div class="promo_desc" id="promo4content">'.$text4.'</div>
                                <div class="promo_desc" id="promo5content">'.$text5.'</div>
                                ';

    if($link_button_show == 'show'){                            
        $html .= '              <a class="button" href="'.$link_button_url.'">'.$link_button_text.'</a>';
    }

    $html .= '              </div>
                        </div>
                    </div>
                </div>
            </section>';

    return $html;
}

function fn_featured_items( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'bg_color' => '#ffffff',
            'feature_item1' => '',
            'feature_item2' => '',
            'feature_item3' => '',
        ), $atts));

    $item1_fn = "get_$feature_item1";
    $item2_fn = "get_$feature_item2";
    $item3_fn = "get_$feature_item3";

    $html = '<section class="sec_block feature_panel">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            '.(function_exists($item1_fn) ? $item1_fn() : "&nbsp;").'
                        </div>

                        <div class="col-sm-4">
                            '.(function_exists($item2_fn) ? $item2_fn() : "&nbsp;").'
                        </div>

                        <div class="col-sm-4">
                            '.(function_exists($item3_fn) ? $item3_fn() : "&nbsp;").'
                        </div>
                    </div>
                </div>
            </section>';

    return $html;
}

function fn_home_banner( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'bg_color'                => '#ffffff',
            'stack_up_image'          => '',
            'stack_up_download_link'  => '',
            'show_event_registration' => 'show',
            'show_latest_article'     => 'show',
        ), $atts));

    $html = '<section class="home_banner">
                <div class="container">
                    <div class="hb_content">
                        <div class="stack_up">
                            <div class="stack_up_pic">
                                <img src="'.$stack_up_image.'" alt="stack_up_img">
                                '. ( !empty($stack_up_download_link )? '<a class="button btn_download" href="'.$stack_up_download_link.'">Apply Today</a>' : '<a class="button btn_download" href="/cande-awards/how-to-apply/">Apply Today</a>' ).'
                            </div>
                        </div>
                        <div class="hb_event_half">';
                            if($show_event_registration == 'show'): $html .= get_banner_next_event(); endif;
                            if($show_latest_article == 'show'): $html .= get_banner_latest_articles(); endif;
    $html .= '           </div>
                    </div>
                </div>
            </section>

            ';

    return $html;
}

function fn_global_sponsors( $atts, $content = null, $tag ){
    $html = '';
    extract(shortcode_atts(array(
            'bg_color'   => '#ffffff',
            'title'      => '',
            'limit'      => '',
            'signup_url' => '',
            'category'   => '',
        ), $atts));

    $sponsors_list = get_underwriters_logo_list();
    if(empty($sponsors_list)){
        return $html;
    }
    $style = (!empty($bg_color)) ? 'background-color:'.$bg_color : '';
    $html .= '<section class="global_sponsors sec_block" style="'.$style.'">
                <div class="container">
                    <div class="gbs_content row">
                        <div class="col-sm-12">
                            <div class="sec_title"><h1>'.$title.'</h1></div>
                        </div>
                        
                        <div class="col-sm-12">
                            '.$sponsors_list.'
                         </div>';

    if($signup_url != ''){
        $html .=        '<div class="col-sm-12">
                            <a class="button" href="'.$signup_url.'">Become a Sponsor</a>
                        </div>';
    }                    
    $html .=       '</div>
                </div>
            </section>';
    return $html;
}

function fn_sponsors( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'bg_color'   => '#ffffff',
            'title'      => '',
            'limit'      => '',
            'signup_url' => '',
            'category'   => '',
        ), $atts));

    $region = '';

    if(get_region()){
        $region = get_region();
    }

    $sponsors_list = get_sponsors_logo_list($category, $region);
    if(empty($sponsors_list)){
        return '';
    }
    $style = (!empty($bg_color)) ? 'background-color:'.$bg_color : '';
    $html .= '<section class="global_sponsors sec_block" style="'.$style.'">
                <div class="container">
                    <div class="gbs_content row">
                        <div class="col-sm-12">
                            <div class="sec_title"><h1>'.$title.'</h1></div>
                        </div>
                        
                        <div class="col-sm-12">
                            '.$sponsors_list.'
                        </div>';

    if($signup_url != ''){
        $html .= '<div class="col-sm-12">
                            <a class="button" href="'.$signup_url.'">Become a Sponsor</a>
                    </div>';
            }                    
    $html .=       '</div>
                </div>
            </section>';
    return $html;
}

function fn_volunteers( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'bg_color'   => '#ffffff',
            'title'      => '',
            'limit'      => '',
            'signup_url' => '',
        ), $atts));

    $sponsors_list = get_volunteers_logo_list();
    if(empty($sponsors_list)){
        return '';
    }
    $style = (!empty($bg_color)) ? 'background-color:'.$bg_color : '';
    $html .= '<section class="global_sponsors sec_block" style="'.$style.'">
                <div class="container">
                    <div class="gbs_content row">
                        <div class="col-sm-12">
                            <div class="sec_title"><h1>'.$title.'</h1></div>
                        </div>
                        
                        <div class="col-sm-12">
                            '.$sponsors_list.'
                         </div>';

    if($signup_url != ''){
        $html .= '<div class="col-sm-12">
                            <a class="button" href="'.$signup_url.'">Become a Volunteer</a>
                  </div>';
            }                    
    $html .=       '</div>
                </div>
            </section>';
    return $html;
}

function fn_winners( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'bg_color'   => '#ffffff',
            'title'      => '',
            'limit'      => '',
        ), $atts));

    $sponsors_list = get_winners_logo_list();
    if(empty($sponsors_list)){
        return '';
    }
    $style = (!empty($bg_color)) ? 'background-color:'.$bg_color : '';
    $html .= '<section class="global_sponsors sec_block" style="'.$style.'">
                <div class="container">
                    <div class="gbs_content row">
                        <div class="col-sm-12">
                            <div class="sec_title"><h1>'.$title.'</h1></div>
                        </div>
                        
                        <div class="col-sm-12">
                            '.$sponsors_list.'
                         </div>                   
                    </div>
                </div>
            </section>';
    return $html;
}

function fn_tweet( $atts, $content = null, $tag ){

    extract(shortcode_atts(array(
            'bg_color' => 'button',
            'limit'     => '',
            'id'       => '',
            'class'    => '',
            'link'      => '',
            'style'    => '',
            'onclick'  => '',
        ), $atts));

    $html = '<section class="sec_block twitter_feed">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-2" id="twit_no_pad">
                            <div class="tw_feed_content">
                                <div class="tw_feed_icon"><img src="/wp-content/themes/talent-board/images/twitter_icon.png" alt="twitter_icon"></div>
                            </div>
                        </div>
                        '.do_shortcode("[display_tweets]").'
                    </div>
                </div>
            </section>';
    return $html;
}

function fn_button( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'btn_type' => 'button',
            'text'     => '',
            'id'       => '',
            'class'    => '',
            'link'     => '',
            'style'    => '',
            'onclick'  => '',
        ), $atts));

    $html = '';
    if($btn_type == 'link'){
        $html = '<a href="'.$link.'" id="'.$id.'" class="s_button button '.$class.'" style="'.$style.'" onclick="'.$onclick.'">'.$text.'</a>';
    }
    elseif($btn_type == 'input'){
        $html = '<input type="button" id="'.$id.'" class="s_button button '.$class.'" style="'.$style.'" onclick="'.$onclick.'" value="'.$text.'">';
    }
    else{
        $html = '<button type="button" id="'.$id.'" class="s_button button '.$class.'" style="'.$style.'" onclick="'.$onclick.'">'.$text.'</button>';
    }
    return $html;
}

function fn_region( $atts, $content = null, $tag ){
    extract(shortcode_atts(array(
            'location' => '',
        ), $atts));
    if( $location == get_region() ){
        return do_shortcode($content);
    }
    elseif($location=='global' && get_region() == false){
        return do_shortcode($content);
    }
    else{
        return null;
    }
}  


