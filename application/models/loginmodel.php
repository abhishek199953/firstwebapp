<?php

class loginmodel extends CI_Model
{
    function __construct() {          // this function is used for loading the database in our web
        parent::__construct();                     
        $this->load->database();
    }
    
    public function isvalidate($username,$password)
    {
      
       $q=$this->db->where(['username'=>$username,'password'=>$password])
                                            ->get('	users');
    //    $q= $this->db->query("select * from  users where username = '$username' and password = '$password'");  // this is also used for selecting the database from the database table.

                // echo "<pre>" ;              // this code is for checking the id of a user that return from the database.
                // print_r($q->row()->id);
                // exit;


                if ($q->num_rows())
                {
                    return $q->row()->id;      // this line tell us that returning of user id from the row 
                }
                else
                {
                    return false;
                }
    }

    public function articleList($limit,$offset)
    {
        // $this->load->library('session');
        $id=$this->session->userdata('id');
        
        $q=$this->db->select()
                ->from('articles')
                ->where(['user_id'=>$id])
                //->where('id',$id)  both are same this is not in the array form
               
                // print_r($q);
                // exit;
                // print_r($q->row());
                // die;
                ->limit($limit,$offset)
                ->get();
                return $q->result();
                // exit;

    }


    // adding code----------------------------------------------------


    public function find_article($articleid)
    {
     $q=$this->db->select(['article_title','article_body','id'])
              ->where('id',$articleid)
              ->get('articles');
              return $q->row();
  
  
    }



    public function update_article($articleid,Array $article)
    {
      
     return $this->db->where('id',$articleid)
                     ->update('articles',$article);
  
    }


    public function num_rows()
    {
        $id=$this->session->userdata('id');
        $q=$this->db->select()
              ->from('articles')
              ->where(['user_id'=>$id])
              ->get();
             return $q->num_rows();
  
    }


    public function add_articles($array)
    {
       return $this->db->insert('articles',$array);
    }
    public function add_user($array)
    {
      
      return $this->db->insert('users',$array);
    }

  
    public function del($id)
    {
    return $this->db->delete('articles',['id'=>$id]);
  
  
    //   return  $this->db->delete('articles')
    //           ->where(['id'=>$id]);
     }


     public function all_articleList($limit,$offset)
     {
   
      $query=$this->db->select()
               ->from('articles')
                ->limit($limit,$offset)
               ->get();
              
              
              return  $query->result();
     }
   



     public function all_articles_count()
        {
            $q=$this->db->select()
                ->from('articles')
          
                ->get();
                return $q->num_rows();

        }


    public function data($id) // here we pass id of the table and get all the data
    {
        
        // echo $id."yes";
        // die;
        $q=$this->db->where('id',$id)  // this is indiacting we get only id of the articles table 
                    ->get('articles')
                    ->row();
                
               return $q;
    }

}


?>