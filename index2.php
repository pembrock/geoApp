<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 14.05.2015
 * Time: 20:30
 */
echo "Your IP-address " . get_ip() . "<br>";
echo "Your browser is " . user_min_browser($_SERVER['HTTP_USER_AGENT']) . "<br>";
echo "Your OS is " . php_uname($mode = "s"). " "  . php_uname($mode = "v") . "<br>";
$screenWidth='<script type="text/javascript">document.write("screen.width="+screen.width);</script>';
$screenHeight='<script type="text/javascript">document.write("screen.height="+screen.height);</script>';
echo$screenWidth;
echo$screenHeight;



function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function user_min_browser($agent) {
    preg_match("/(MSIE|Opera|Firefox|Chrome|Version)(?:\/| )([0-9.]+)/", $agent, $browser_info);
    list(,$browser,$version) = $browser_info;
    if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5);
    if ($browser == 'Version') return 'Safari '.$version;
    if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko';
    return $browser.' '.$version;
}
?>
<script type="text/javascript">
width = screen.width;
height = screen.height;
    //alert(width + ' ' + height);
</script>