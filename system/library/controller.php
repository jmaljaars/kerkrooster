<?php
class Controller{
    private $title="";
    protected $model;
    public $error_msg = "";
    public $scripts = array();
    
    
    public function setTitle($title){
        $this->title= APPNAME.' - '.$title;
    }
    
    public function addScript($scr){
        $this->scripts[] = '<script src="'.$scr.'"></script>';
    }
    
    public function loadModel($module){
        if(file_exists('./module/'.strtolower($module).'/'.strtolower($module).'Model.php')){
            require_once('./module/'.strtolower($module).'/'.strtolower($module).'Model.php') ;
            //na het includen van de module maak je ook een nieuwe instantie aan van de class '<modulenaam>Model.php'
            $modelName=strtolower($module).'Model';
            $this->model = new $modelName();
        }else{
            echo 'Kan module '.$module.'Model.php niet vinden';
        }
    }
    
    public function index(){
        echo 'dit is de indexfunctie uit de parent Controller class';
    }
    
    //include gebruik je als je wilt dat er geen harde foutmelding komt (wel een warning)
    //bij require stopt de uitvoering van je code
    public function render($viewfile){
        $this->loadView('head.tpl');
        $this->loadView('header.tpl');
        $this->loadView($viewfile);
        $this->loadView('footer.tpl');
    }

    public function loadView($file){
        if(file_exists('./themes/'.THEME.'/'.$file)){
            include('./themes/'.THEME.'/'.$file);
        }elseif(file_exists('./themes/default/'.$file)){
            include('./themes/default/'.$file);
        }else{
            echo 'Kan view '.$file.' niet vinden';
        }
        
    }
    
    public function datumCheck($datum){
        list($d, $m, $y) = explode('-', $datum);
        if (checkdate($m, $d, $y)){
            return $db_datum = $y.'-'.$m.'-'.$d;
        }else{
            $this->error_msg="Datum: ".$d."-".$m."-".$y." is geen geldige datum.<br />"; //foutmelding
            return NULL;
        }      
    }
    

    
}