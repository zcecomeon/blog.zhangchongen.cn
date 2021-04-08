<?
	add_action('after_setup_theme', 'my_theme_setup');
	function my_theme_setup(){
	    load_theme_textdomain('zhangchongen', get_template_directory() . '/languages');
	}
?>

<?
function getPostViews($postID)
{
    $count = get_post_meta($postID,'views', true);
    if($count=='')
    {
        delete_post_meta($postID,'views');
        add_post_meta($postID,'views', '0');
        return "0";
    }
    return $count.'';
}

function setPostViews($postID) 
{
    $count = get_post_meta($postID,'views', true);
    if($count=='')
    {
        $count = 0;
        delete_post_meta($postID,'views');
        add_post_meta($postID,'views', '0');
    }
    else
    {
        $count++;
        update_post_meta($postID,'views', $count);
    }
}
?>