<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 15.05.2015
 * Time: 0:10
 */
function get_ip() { //информация об IP
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

function get_user_browser($agent) { //информация о браузере
    preg_match("/(MSIE|Opera|Firefox|Chrome|Version)(?:\/| )([0-9.]+)/", $agent, $browser_info);
    list(,$browser,$version) = $browser_info;
    if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5);
    if ($browser == 'Version') return 'Safari '.$version;
    if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko';
    return $browser.' '.$version;
}

function get_os($user_agent)
{
    $os = array (
        'Windows' => 'Win',
        'Open BSD'=>'OpenBSD',
        'Sun OS'=>'SunOS',
        'Linux'=>'(Linux)|(X11)',
        'Mac OS'=>'(Mac_PowerPC)|(Macintosh)',
        'QNX'=>'QNX',
        'BeOS'=>'BeOS',
        'OS/2'=>'OS/2'
    );

    foreach($os as $key=>$value)
    {
        if (preg_match('#'.$value.'#i', $user_agent))
            return $key;
    }

    return 'Unknown';
}