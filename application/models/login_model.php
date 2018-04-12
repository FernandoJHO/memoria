<?php

class login_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function get_alumno($usr, $pwd)
     {
          $sql = "select * from alumno where MAIL = '" . $usr . "' and PASSWORD = '" . md5($pwd) . "'";
          $query = $this->db->query($sql);
          //return $query->num_rows();
          return $query->row();
     }

     function get_profesor($usr,$pwd)
     {
          $sql = "select * from profesor where MAIL = '" . $usr . "' and PASSWORD = '" . md5($pwd) . "'";
          $query = $this->db->query($sql);
          return $query->row();
     }

}