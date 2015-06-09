<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 04.04.2015
 * Time: 14:05
 */
define("PATH_TO_ROOT", "../");
define("PAGE_TITLE", "Информация");
require PATH_TO_ROOT . "config.php";
$t = new DB();
$result['path_to_root'] = PATH_TO_ROOT;
$result['page_title'] = PAGE_TITLE;

if(isset($_GET['id'])){
    $template = $twig->loadTemplate('list.html');
    try {
        $query = "SELECT * FROM User_info WHERE ID = " . $_GET['id'];
        $sth = $db->query($query);
        $sth->execute();
        $result['objects'] = $sth->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        //echo "Database error: " . $e->errorInfo[1];
        $db = null;
        exit;
    }
}
else{
    $template = $twig->loadTemplate('lists.html');
    try {
        $query = "SELECT * FROM User_info ORDER BY ID";
        $sth = $db->query($query);
        $sth->execute();
        $result['objects'] = $sth->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        //echo "Database error: " . $e->errorInfo[1];
        $db = null;
        exit;
    }
}


    $template->display(array('data' => $result));
