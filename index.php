<?php

define("PATH_TO_ROOT", "");
define("PAGE_TITLE", "Главная");
require PATH_TO_ROOT . "config.php";


//$t = new DB();

$result['path_to_root'] = PATH_TO_ROOT;
$result['page_title'] = PAGE_TITLE;

if (isset($_POST[addInfo], $_POST['ip'], $_POST['browser'], $_POST['os'], $_POST['screen'], $_POST['lat'], $_POST['lon'])){
    try {
        $stmt = $db->prepare("INSERT INTO User_info (IP, OS, Browser, Screen, Lat_coords, Lon_coords) VALUES (:ip, :os, :browser, :screen, :lat_coords, :lon_coords)");
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':os', $os);
        $stmt->bindParam(':browser', $browser);
        $stmt->bindParam(':screen', $screen);
        $stmt->bindParam(':lat_coords', $lat_coords);
        $stmt->bindParam(':lon_coords', $lon_coords);

// Вставим одну строку с такими значениями
        $ip = $_POST['ip'];
        $os = $_POST['os'];
        $browser = $_POST['browser'];
        $screen = $_POST['screen'];
        $lat_coords = $_POST['lat'];
        $lon_coords = $_POST['lon'];
        $stmt->execute();
        echo "ok";
        exit;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        echo "err";
        $db = null;
        exit;
    }
}


$result['ip'] = get_ip();
$result['browser'] = get_user_browser($_SERVER['HTTP_USER_AGENT']);
$result['os'] = get_os($_SERVER['HTTP_USER_AGENT']);
$template = $twig->loadTemplate('index.html');
$template->display(array('data' => $result));


?>