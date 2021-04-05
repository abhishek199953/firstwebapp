<?php

// class Users extends MY_controller
// {

//     public function index()
//     {
//         // echo "hello";
//         // die;
//        // $this->load->helper('url');   // this line is not needed because we already declare in the autoload.php in helpre
//         $this->load->view('Users/articleList');
//     }
// }


?>




<?php

class Users extends MY_controller
{

  
 public function index() {
       
         $this->load->model('loginmodel','ar');
         $this->load->library('pagination');
         $config=[
        'base_url' => base_url('users/index'),
        'per_page' =>2,
        'total_rows' => $this->ar->all_articles_count(),
        'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'next_tag_open' =>"<li>",
        'next_tag_close' =>"</li>",
        'prev_tag_open' =>"<li>",
        'prev_tag_close' =>"</li>",
        'num_tag_open' =>"<li>",
        'num_tag_close' =>"<li>",
        'cur_tag_open' =>"<li class='active'><a>",
        'cur_tag_close' =>"</a></li>"

 ];


$this->pagination->initialize($config);
$articles=$this->ar->all_articleList($config['per_page'],$this->uri->segment(3));

  $this->load->view('Users/articleList',compact('articles')); //compact function is takes all the data of variable articles into an array/
    }



  public function data($idd){
  // $this->load->model('loginmodel');
  // $this->load->view('Users/data');
  // $this->load->view('admin/add_article');
 
     $id = base64_decode($idd);  // this is use for decoding by that we can decode it easily 
  $this->load->model('loginmodel');      // and the encoding code is in the html page that is data.php
 $articles= $this->loginmodel->data($id);
//   $this->load->library('pagination');
//   $config=[
//  'base_url' => base_url('users/data'),
//  'per_page' =>2,
//  'total_rows' => $this->ar->data($id),
//  'full_tag_open'=>"<ul class='pagination'>",
//  'full_tag_close'=>"</ul>",
//  'next_tag_open' =>"<li>",
//  'next_tag_close' =>"</li>",
//  'prev_tag_open' =>"<li>",
//  'prev_tag_close' =>"</li>",
//  'num_tag_open' =>"<li>",
//  'num_tag_close' =>"<li>",
//  'cur_tag_open' =>"<li class='active'><a>",
//  'cur_tag_close' =>"</a></li>"

// ];


// $this->pagination->initialize($config);
// $articles=$this->ar->all_articleList($config['per_page'],$this->uri->segment(3));

$this->load->view('Users/data',compact('articles'));
 }
    



}




?>