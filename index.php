<?php
//gebruik: index.php?route=module/actie

if(isset($_GET['route']) && $_GET['route']!=''){
	require_once('./config.php');
    //class instantieren
    $route = explode('/',$_GET['route']);
    //echo '<pre>'.var_dump($route).'</pre>';
    //die;
    if(isset($route[0])){
        $module=$route[0];
        $controllerName = $route[0].'Controller';
        }
    if(isset($route[1]) && ($route[1]!="")){
        $action = $route[1];
    }else{
        $action='index';
        }
        
	require_once('./system/startup.php');
        
    //controleren of bestand bestaat en zo ja, includen
    //anders kunnen we de class niet gebruiken.
    
    if(file_exists('./module/'.$module.'/'.$module.'Controller.php')){
        require_once('./module/'.$module.'/'.$module.'Controller.php');
        $class= new $controllerName();
        $class->$action();
    }else{
        echo 'module does not exist';
    }
}else{
    //redirect naar 404
    header('location: index.php?route=zondag/planning');
}

?>