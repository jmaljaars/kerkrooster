<?php
class zondagController extends Controller{
    public function index(){
        echo 'Actie bestaat niet; index functie van class zondagController';
        
    }
    public function overview(){
        //echo '<br />functie overview<br />';
        $this->loadModel('zondag');
        $this->result = $this->model->overzicht_zondagen();
        $this->setTitle('Overzicht planning');
        $this->render('zondag_overview.tpl');
    }

    public function planning(){
        //echo '<br />functie overview<br />';
        $this->loadModel('zondag');
        $this->result = $this->model->planning_zondagen();
        $this->setTitle('Overzicht planning');
        $this->render('zondag_planning.tpl');
    }

	public function add(){
		$this->loadModel('zondag');
		$this->setTitle('Toevoegen dienst');
				
		if(isset($_POST['Submit'])){  //gedrukt op 'Opslaan'
			//print_r($_POST);
		    if ($this->datumCheck($_POST['datum'])!=NULL){
				$this->model->add_zondag($_POST['zondagnaam'], $this->datumCheck($_POST['datum']), 
				   $_POST['aanvangstijd'], $_POST['kleur']);
			   header('location:index.php?route=zondag/overview');
		    }else{
                $this->error_msg .="De ingevoerde datum is foutief (invoer formaat: d-m-j).";
                $this->addScript('./themes/default/javascript/jquery/jquery-2.1.3.min.js');
    		    $this->addScript('./themes/default/javascript/jquery/jquery-ui.min.js');
    		    $this->addScript('./themes/default/javascript/jquery/ui/i18n/jquery.ui.datepicker-nl.js');
    		    $this->render('add.tpl');
		    }
		}else{
		    $this->addScript('./themes/default/javascript/jquery/jquery-2.1.3.min.js');
    		$this->addScript('./themes/default/javascript/jquery/jquery-ui.min.js');
    		$this->addScript('./themes/default/javascript/jquery/ui/i18n/jquery.ui.datepicker-nl.js');
		    $this->render('add.tpl');
			}
	}
	public function delete(){
		$this->loadModel('zondag');
	    //delete record
	    if(isset($_POST['zondag_id'])){
	        //print_r($_POST);
	        $this->model->del_zondag($_POST['zondag_id']);
	        header('location:index.php?route=zondag/overview');
	    }
	}
	public function edit(){
		$this->loadModel('zondag');
		$this->setTitle('Dienst bewerken');
				
	    //edit record
		if(isset($_POST['Submit'])){  //gedrukt op 'Wijzigen'
        	//print_r($_POST);
            if ($this->datumCheck($_POST['datum'])!=NULL){
        		$this->model->edit_zondag($_POST['zondag_id'], $_POST['zondagnaam'], $this->datumCheck($_POST['datum']), 
        		   $_POST['aanvangstijd'], $_POST['kleur']);
        	    header('location:index.php?route=zondag/overview');
            }else{
                $this->error_msg .="De ingevoerde datum is foutief (invoer formaat: d-m-j).";
                $this->addScript('./themes/default/javascript/jquery/jquery-2.1.3.min.js');
        		$this->addScript('./themes/default/javascript/jquery/jquery-ui.min.js');
        		$this->addScript('./themes/default/javascript/jquery/ui/i18n/jquery.ui.datepicker-nl.js');
                $this->render('edit.tpl');
            }
        }else{
            //gegevens zondag opvragen
            if(isset($_GET['zondag_id'])){
                //echo $_GET['zondag_id'];
                $this->result = $this->model->get_zondag($_GET['zondag_id']);
                $this->addScript('./themes/default/javascript/jquery/jquery-2.1.3.min.js');
                $this->addScript('./themes/default/javascript/jquery/jquery-ui.min.js');
                $this->addScript('./themes/default/javascript/jquery/ui/i18n/jquery.ui.datepicker-nl.js');
                $this->render('edit.tpl');
                }
        	}
		}
				
	public function details(){
	    echo "functie details zondag";
	}

	public function plannen(){
	    if(isset($_GET['zondag_id'])){;
	       $this->loadModel('zondag');
	       $this->setTitle('Details plannen');
	       $this->result = $this->model->get_zondag($_GET['zondag_id']);
	       $this->render('details.tpl');
	    //echo "functie zondag detail planning";
	    }
	}
	
}