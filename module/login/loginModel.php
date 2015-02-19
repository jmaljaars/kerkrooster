<?php
class loginModel extends Model{
    //GEEN __construct functie neerzetten omdat die dan de functie van de parent overschrijft!!
    //hier alleen queries neerzetten!!!!!!!!!!!11
    
    public function checkUser($username, $password){
        $sql  = "SELECT * FROM users ";
        $sql .= "WHERE email = '".$this->db->escape($username)."' ";
        $sql .= "AND password = MD5('".$this->db->escape($password)."')";
        //echo $sql;
        return $this->db->query($sql);
                
    }
    public function addUser($username, $password){
        $sql  = "INSERT INTO users (email, password) ";
        $sql .= "VALUES ('".$username."', MD5('".$this->db->escape($password)."'))"; 
        echo $sql;
        //return $this->db->query($sql);
    }
}