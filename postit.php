<?php  
/* 
Plugin Name: Sticky Style Post Notes
Plugin URI: http://www.sms-affiliate.co.uk/stickypostsplugin/
Description: Add Sticky Style notes to your WordPress site with a simple shortcode and widget.
Version: 1.1 
Author: Gary Solomon 
Author URI: http://www.sms-affiliate.co.uk/stickypostsplugin/
License: GPLv2 or later
*/ 

add_shortcode('stickynotes', 'droppostit');

function droppostit($atts,$content = null){
extract(shortcode_atts(array(
    	'title' => '',
    	'url' => '#',
		), $atts));

$return_string = '<link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 
<style type="text/css">
*#postit{
  margin:0;
  padding:0;
}
	body#postit{
  font-family:arial,sans-serif;
  font-size:100%;
  margin:1em;
  background:#666;
  color:#fff;
}
h2#postit,p{
  font-size:100%;
  font-weight:normal;
}
ul#postit,li{
  list-style:none;
}
ul#postit{
  overflow:hidden;
  padding:1em;
}
ul#postit li a{
  text-decoration:none;
  color:#000;
  background:#ffc;
  display:block;
  height:10em;
  width:10em;
  padding:1em;
  -moz-box-shadow:5px 5px 7px rgba(33,33,33,1);
  -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  -moz-transition:-moz-transform .15s linear;
  -o-transition:-o-transform .15s linear;
  -webkit-transition:-webkit-transform .15s linear;
}
ul#postit li{
  margin:0.2em;
  float:left;
}
ul#postit li h2{
  font-size:140%;
  font-weight:bold;
  padding-bottom:10px;
}
ul#postit li p{
  font-family:"Reenie Beanie",arial,sans-serif;
  font-size:140%;
}
ul#postit li a{
  -webkit-transform: rotate(-6deg);
  -o-transform: rotate(-6deg);
  -moz-transform:rotate(-6deg);
}
ul#postit li a:hover,ul li a:focus{
  box-shadow:10px 10px 7px rgba(0,0,0,.7);
  -moz-box-shadow:10px 10px 7px rgba(0,0,0,.7);
  -webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
  -webkit-transform: scale(1.15);
  -moz-transform: scale(1.15);
  -o-transform: scale(1.15);
  position:relative;
  z-index:5;
}
postit#ol{text-align:center;}
postit#ol li{display:inline;padding-right:1em;}
postit#ol li a{color:#fff;}
</style>
    <ul id="postit">
    <li id="postit">
      <a href="'.$url.'" id="postit">
        <h2 id="postit">'.$title.'</h2>
        '.$content.'                                
      </a>
    </li>
     </ul> ';
return $return_string;
}

// start widget code
error_reporting(E_ALL);
add_action("widgets_init", array('postitnotes', 'register'));
register_activation_hook( __FILE__, array('postitnotes', 'activate'));
register_deactivation_hook( __FILE__, array('postitnotes', 'deactivate'));
class postitnotes {
  function activate(){
    $data = array( 'option1' => 'My Title' ,'option2' => 'http://www.google.com', 'option3' => 'My Content');
    if ( ! get_option('postitnotes')){
      add_option('postitnotes' , $data);
    } else {
      update_option('postitnotes' , $data);
    }
  }
  function deactivate(){
    delete_option('postitnotes');
  }
  function control(){
  $data = get_option('postitnotes');
 echo '<p><label>Note Title<input name="postitnotes_option1"
type="text" value="'.$data['option1'].'" /></label></p>
  <p><label>Link URL<input name="postitnotes_option2"
type="text" value="'.$data['option2'].'" /></label></p>
<p><label>Content<input name="postitnotes_option3"
type="text" value="'.$data['option3'].'" /></label></p>';

   if (isset($_REQUEST['postitnotes_option1'])){
    $data['option1'] = attribute_escape($_REQUEST['postitnotes_option1']);
    $data['option2'] = attribute_escape($_REQUEST['postitnotes_option2']);
    $data['option3'] = attribute_escape($_REQUEST['postitnotes_option3']);
    update_option('postitnotes', $data);
  }
}
  function widget($args){
	$data = get_option('postitnotes');
    echo $args['before_widget'];
   // echo $args['before_title'] . '<h2>'.$data['option1'].'</h2>' . $args['after_title'];
    echo '<link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 
<style type="text/css">
*#postit{
  margin:0;
  padding:0;
}
	body#postit{
  font-family:arial,sans-serif;
  font-size:100%;
  margin:1em;
  background:#666;
  color:#fff;
}
h2#postit,p{
  font-size:100%;
  font-weight:normal;
}
ul#postit,li{
  list-style:none;
}
ul#postit{
  overflow:hidden;
  padding:1em;
}
ul#postit li a{
  text-decoration:none;
  color:#000;
  background:#ffc;
  display:block;
  height:10em;
  width:10em;
  padding:1em;
  -moz-box-shadow:5px 5px 7px rgba(33,33,33,1);
  -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  -moz-transition:-moz-transform .15s linear;
  -o-transition:-o-transform .15s linear;
  -webkit-transition:-webkit-transform .15s linear;
}
ul#postit li{
  margin:0.2em;
  float:left;
}
ul#postit li h2{
  font-size:140%;
  font-weight:bold;
  padding-bottom:10px;
}
ul#postit li p{
  font-family:"Reenie Beanie",arial,sans-serif;
  font-size:140%;
}
ul#postit li a{
  -webkit-transform: rotate(-6deg);
  -o-transform: rotate(-6deg);
  -moz-transform:rotate(-6deg);
}
ul#postit li a:hover,ul li a:focus{
  box-shadow:10px 10px 7px rgba(0,0,0,.7);
  -moz-box-shadow:10px 10px 7px rgba(0,0,0,.7);
  -webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
  -webkit-transform: scale(1.15);
  -moz-transform: scale(1.15);
  -o-transform: scale(1.15);
  position:relative;
  z-index:5;
}
postit#ol{text-align:center;}
postit#ol li{display:inline;padding-right:1em;}
postit#ol li a{color:#fff;}
</style>
    <ul id="postit">
    <li id="postit">
      <a href="'.$data['option2'].'" id="postit">
        <h2 id="postit">'.$data['option1'].'</h2>
        '.$data['option3'].'                                
      </a>
    </li>
     </ul>';
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Sticky Notes', array('postitnotes', 'widget'));
    register_widget_control('Sticky Notes', array('postitnotes', 'control'));
  }
}

//end widget code
?>