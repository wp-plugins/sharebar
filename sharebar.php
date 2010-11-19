<?php
/*
Plugin Name: Sharebar
Plugin URI: http://devgrow.com/sharebar-wordpress-plugin/
Description: Adds a dynamic bar with sharing icons (Facebook, Twitter, etc.) that changes based on browser size and page location.  More info and demo at: <a href="http://devgrow.com/sharebar-wordpress-plugin/">Sharebar Plugin Home</a>
Version: 1.1.3
Author: Monjurul Dolon
Author URI: http://mdolon.com/
License: GPL2
*/
/*  Copyright 2010  Monjurul Dolon  (email : md@devgrow.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function sharebar_install(){
    global $wpdb;
    $table = $wpdb->prefix."sharebar";
	if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
		$structure = "CREATE TABLE $table (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		position mediumint(9) NOT NULL,
		enabled int(1) NOT NULL,
		name VARCHAR(80) NOT NULL,
		big text NOT NULL,
		small text NULL,
		UNIQUE KEY id (id)
		);";
		$wpdb->query($structure);
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','1','digg', '<script type=\"text/javascript\">(function() { var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0]; s.type = \'text/javascript\'; s.async = true; s.src = \'http://widgets.digg.com/buttons.js\'; s1.parentNode.insertBefore(s, s1); })(); </script><a class=\"DiggThisButton DiggMedium\"></a>', '<script type=\"text/javascript\">(function() { var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0]; s.type = \'text/javascript\'; s.async = true; s.src = \'http://widgets.digg.com/buttons.js\'; s1.parentNode.insertBefore(s, s1); })(); </script><a class=\"DiggThisButton DiggCompact\"></a>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','2','twitter', '<a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-count=\"vertical\" data-via=\"[twitter]\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script>', '<a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-count=\"horizontal\" data-via=\"[twitter]\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','3','facebook', '<a name=\"fb_share\" type=\"box_count\" href=\"http://www.facebook.com/sharer.php\">Share</a><script src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\" type=\"text/javascript\"></script>', '<a name=\"fb_share\" type=\"button_count\" href=\"http://www.facebook.com/sharer.php\">Share</a><script src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\" type=\"text/javascript\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','4','buzz', '<a title=\"Post to Google Buzz\" class=\"google-buzz-button\" href=\"http://www.google.com/buzz/post\" data-button-style=\"normal-count\"></a><script type=\"text/javascript\" src=\"http://www.google.com/buzz/api/button.js\"></script>', '<a title=\"Post to Google Buzz\" class=\"google-buzz-button\" href=\"http://www.google.com/buzz/post\" data-button-style=\"small-count\"></a><script type=\"text/javascript\" src=\"http://www.google.com/buzz/api/button.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','5','reddit', '<script type=\"text/javascript\" src=\"http://reddit.com/static/button/button2.js\"></script>', '<script type=\"text/javascript\" src=\"http://reddit.com/static/button/button1.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','6','dzone', '<script language=\"javascript\" src=\"http://widgets.dzone.com/links/widgets/zoneit.js\"></script>', '<script language=\"javascript\" src=\"http://widgets.dzone.com/links/widgets/zoneit.js\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','7','stumbleupon', '<script src=\"http://www.stumbleupon.com/hostedbadge.php?s=5\"></script>', '<script src=\"http://www.stumbleupon.com/hostedbadge.php?s=2\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','8','yahoo', '<script type=\"text/javascript\" src=\"http://d.yimg.com/ds/badge2.js\" badgetype=\"square\">[url]</script>', '<script type=\"text/javascript\" src=\"http://d.yimg.com/ds/badge2.js\" badgetype=\"small-votes\">[url]</script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('0','9','designfloat', '<script type=\"text/javascript\">submit_url = \'[url]\';</script><script type=\"text/javascript\" src=\"http://www.designfloat.com/evb2/button.php\"></script>', '<script type=\"text/javascript\">submit_url = \'[url]\';</script><script type=\"text/javascript\" src=\"http://www.designfloat.com/evb/button.php\"></script>')");
		$wpdb->query("INSERT INTO $table(enabled, position,name, big, small)
			VALUES('1','10','email', '<a href=\"mailto:?subject=[url]\" class=\"sharebar-button email\">Email</a>', '<a href=\"mailto:?subject=[url]\" class=\"sharebar-button email\">Email</a>')");
		add_option('sharebar_auto_posts', 1);
		add_option('sharebar_auto_pages', 1);
		add_option('sharebar_horizontal', 1);
		add_option('sharebar_credit', 1);
		add_option('sharebar_minwidth','1000');
		add_option('sharebar_position','left');
		add_option('sharebar_leftoffset','20');
		add_option('sharebar_rightoffset','10');
		add_option('sharebar_swidth','65');
		add_option('sharebar_twitter_username','ThinkDevGrow');
	}
}

function sharebar_reset(){
	global $wpdb;
	$table = $wpdb->prefix."sharebar";
	$wpdb->query("DROP TABLE IF EXISTS $table");
	sharebar_install();
}

function sharebar_menu(){
    global $wpdb;

	$auto_posts = get_option('sharebar_auto_posts'); $auto_pages = get_option('sharebar_auto_pages'); $credit = get_option('sharebar_credit');
	$horizontal = get_option('sharebar_horizontal'); $width = get_option('sharebar_minwidth'); $position = get_option('sharebar_position');
	$leftoffset = get_option('sharebar_leftoffset'); $rightoffset = get_option('sharebar_rightoffset');
	$swidth = get_option('sharebar_swidth'); $twitter_username = get_option('sharebar_twitter_username');

    include 'sharebar-admin.php';
}

function sharebar_settings($auto_posts, $auto_pages, $horizontal, $width, $position, $leftoffset, $rightoffset, $credit, $swidth, $twitter_username){
	update_option('sharebar_auto_posts',$auto_posts); update_option('sharebar_auto_pages',$auto_pages); update_option('sharebar_horizontal',$horizontal);
	update_option('sharebar_minwidth',$width); update_option('sharebar_position',$position); update_option('sharebar_credit',$credit);
	update_option('sharebar_leftoffset',$leftoffset); update_option('sharebar_rightoffset',$rightoffset);
	update_option('sharebar_swidth',$swidth); update_option('sharebar_twitter_username',$twitter_username);
}


function sharebar_auto($content){
	if((get_option('sharebar_auto_posts') && is_single()) || (get_option('sharebar_auto_pages') && is_page())){ $str = sharebar(false); $str .= sharebar_horizontal(false); }
	$newcontent = $str.$content;
	return $newcontent;
}

function sharebar($print = true){
	global $wpdb, $post;
	$sharebar_hide = get_post_meta($post->ID, 'sharebar_hide', true);
	if(empty($sharebar_hide)) {
		$credit = get_option('sharebar_credit');
		$str = '<ul id="sharebar">';
		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."sharebar WHERE enabled=1 ORDER BY position, id ASC"); $str .= "\n";
		foreach($results as $result){ $str .= '<li>'.sharebar_filter($result->big).'</li>'; }
		if($credit) $str .= '<li class="credit"><a href="http://devgrow.com/sharebar" target="_blank">Sharebar</a></li>';
		$str .= '</ul>';
		if($print) echo $str; else return $str;
	}
}

function sharebar_horizontal($print = true){
	if(get_option('sharebar_horizontal')){
		global $wpdb;
		$str = '<ul id="sharebarx">';
		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."sharebar WHERE enabled=1 ORDER BY position, id ASC"); $str .= "\n";
		foreach($results as $result) { $str .= '<li>'.sharebar_filter($result->small).'</li>'; }
		$str .= '</ul>';
		if($print) echo $str; else return $str;
	}
}

function sharebar_button($name, $size = 'big'){
	global $wpdb;
	$item = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."sharebar WHERE name='$name'");
	if($size == 'big') echo $item->big; else echo $item->small;
}

function sharebar_update_button($id, $uptask){
	global $wpdb;
	if($uptask == 'enable')
		$wpdb->query("UPDATE ".$wpdb->prefix."sharebar SET enabled='1' WHERE id='$id'");
	elseif($uptask == 'disable')
		$wpdb->query("UPDATE ".$wpdb->prefix."sharebar SET enabled='0' WHERE id='$id'");
	elseif($uptask == 'delete')
		$wpdb->query("DELETE FROM ".$wpdb->prefix."sharebar WHERE id=$id LIMIT 1");
}

function sharebar_init(){
	if(!is_admin()) wp_enqueue_script('sharebar', get_bloginfo('wpurl').'/wp-content/plugins/sharebar/js/sharebar.js',array('jquery'));
}

function sharebar_header(){
	$auto_posts = get_option('sharebar_auto_posts'); $auto_pages = get_option('sharebar_auto_pages'); $horizontal = get_option('sharebar_horizontal');
	$width = get_option('sharebar_minwidth'); $position = get_option('sharebar_position'); $credit = get_option('sharebar_credit');
	$leftoffset = get_option('sharebar_leftoffset'); $rightoffset = get_option('sharebar_rightoffset');
	$swidth = get_option('sharebar_swidth'); $twitter_username = get_option('sharebar_twitter_username');
	if(function_exists('wp_enqueue_script') && (is_single() || is_page())) {
		echo '<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/sharebar/css/sharebar.css" type="text/css" media="screen" />';
		if($horizontal)	$hori = 'true'; else $hori = 'false';
		echo "\n"; ?><script type="text/javascript">jQuery(document).ready(function($) { $('.sharebar').sharebar({horizontal:'<?php echo $hori; ?>',swidth:'<?php echo $swidth; ?>',minwidth:<?php echo $width; ?>,position:'<?php echo $position; ?>',leftOffset:<?php echo $leftoffset; ?>,rightOffset:<?php echo $rightoffset; ?>}); });</script><?php echo "\n"; ?><!-- Sharebar Plugin by Monjurul Dolon (http://mdolon.com/) - more info at: http://devgrow.com/sharebar-wordpress-plugin --><?php echo "\n"; ?><?php
	}
}

function sharebar_filter($input){
	global $post;
	$code = array('[title]','[url]','[author]','[twitter]');
	$values = array($post->post_title,get_permalink(),get_the_author(),get_option('sharebar_twitter_username'));
	return str_replace($code,$values,$input);
}
 
function sharebar_admin_actions(){
	if(current_user_can('manage_options')) add_options_page("Sharebar", "Sharebar", 1, "Sharebar", "sharebar_menu");
}

function sharebar_custom_boxes() {
    add_meta_box( 'Sharebar', 'Sharebar Settings', 'sharebar_post_options', 'post', 'side', 'low');
    add_meta_box( 'Sharebar', 'Sharebar Settings', 'sharebar_post_options', 'page', 'side', 'low');
}

function sharebar_post_options(){
	global $post;
	$sharebar_hide = get_post_meta($post->ID, 'sharebar_hide', true); ?>
	<p>
		<input name="sharebar_hide" id="sharebar_hide" type="checkbox" <?php checked(true, $sharebar_hide, true) ?> />
		<label for="sharebar_hide">Disable Sharebar on this post?</label>
	</p>
	<?php
}

function sharebar_save_post_options($post_id) {
	if (!isset($_POST['sharebar_hide']) || empty($_POST['sharebar_hide'])) {
		delete_post_meta($post_id, 'sharebar_hide');
		return;
	}
	$post = get_post($post_id);
	if (!$post || $post->post_type == 'revision') return;
	update_post_meta($post_id, 'sharebar_hide', true);
}


add_filter('the_content', 'sharebar_auto');
add_action('init', sharebar_init);
add_action('wp_head', sharebar_header);
add_action('activate_sharebar/sharebar.php', 'sharebar_install');
add_action('admin_menu', 'sharebar_admin_actions');
add_action('add_meta_boxes', 'sharebar_custom_boxes');
add_action('draft_post', 'sharebar_save_post_options');
add_action('publish_post', 'sharebar_save_post_options');
add_action('save_post', 'sharebar_save_post_options');

?>