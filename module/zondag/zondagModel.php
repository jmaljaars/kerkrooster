<?php
class zondagModel extends Model{
		private $zondag_naam;
		private $datum;
		private $aanvangstijd;
		private $kleur;
		private $zondag_id;
		
    public function index(){
        echo 'dit is de indexmodule van de class zondagModel';
    }
    
    public function overzicht_zondagen(){
        $sql  = "SELECT zondag_id, naam, DATE_FORMAT(datum, '%e-%c-%Y') fdatum, ";
        $sql .= "DATE_FORMAT(aanvangstijd, '%H:%i') aanvangstijd, kleur FROM zondag ORDER BY datum";
        //echo $sql;
        return $this->db->query($sql);
    }
    
    public function planning_zondagen(){
        $sql  = "SELECT zondag_id, naam, DATE_FORMAT(datum, '%e-%c-%Y') fdatum, ";
        $sql .= "DATE_FORMAT(aanvangstijd, '%H:%i') aanvangstijd, kleur FROM zondag ";
        $sql .= "WHERE datum>Now() ORDER BY datum";
                //echo $sql;
        return $this->db->query($sql);
    }
		
    public function add_zondag($zondag_naam, $datum, $aanvangstijd, $kleur){
	    //insert een nieuwe zondag / event
		$this->zondag_naam=$zondag_naam;
		$this->datum=$datum;
		$this->aanvangstijd=$aanvangstijd;
		$this->kleur=$kleur;
        //querystring bouwen
		$sql  = "INSERT INTO zondag (zondag_id, naam, datum, aanvangstijd, kleur)";
		$sql .= " VALUES (NULL, '".$this->db->escape($this->zondag_naam)."', '";
		$sql .= $this->datum."', '";
		$sql .= $this->db->escape($this->aanvangstijd)."', '";
		$sql .= $this->db->escape($this->kleur)."')";
		//echo $sql;
		return $this->db->query($sql);
    }
    
    public function del_zondag($zondag_id){
        //zondag / dienst verwijderen
        $this->zondag_id=$zondag_id;
        $sql  ="DELETE FROM zondag WHERE ";
        $sql .="zondag_id=".$this->zondag_id;
        //echo $sql;
        return $this->db->query($sql);
    }
    public function get_zondag($zondag_id){
        $this->zondag_id=$zondag_id;
        $sql  = "SELECT zondag_id, naam, DATE_FORMAT(datum, '%e-%c-%Y') datum, ";
        $sql .= "DATE_FORMAT(aanvangstijd, '%H:%i') aanvangstijd, kleur FROM zondag WHERE ";
        $sql .="zondag_id=".$this->zondag_id;
        //echo $sql;
        return $this->db->query($sql);
    }
    
    public function edit_zondag($zondag_id, $zondag_naam, $datum, $aanvangstijd, $kleur){
        $this->zondag_id=$zondag_id;
        $this->zondag_naam=$zondag_naam;
        $this->datum=$datum;
        $this->aanvangstijd=$aanvangstijd;
        $this->kleur=$kleur;
        
        $sql  = "UPDATE zondag ";
        $sql .= "SET naam='".$this->zondag_naam."', ";
        $sql .= "datum='".$this->datum."', ";
        $sql .= "aanvangstijd='".$this->aanvangstijd."', ";
        $sql .= "kleur='".$this->kleur."' ";
        $sql .="WHERE zondag_id=".$this->zondag_id;
        //echo $sql;
        return $this->db->query($sql);
    }
    
}