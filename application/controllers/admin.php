<?php

class admin extends MY_controller
{
  // public function __construct()
  // {
  //   parent::__construct();
  //   if(! $this->session->userdata('id') )
  //   return redirect('admin/login');
    
  // }

  

    // public function index()
    // {
    //   // echo "hello";
    //   //         die;
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('uname','Username','required|alpha');
    //     $this->form_validation->set_rules('pass','Password','required|max_length[12]|min_length[3]');

    //     $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    //     if ($this->form_validation->run())
    //     {
    //         // echo "validation successful";

    //         // $uname=$this->input->post('uname');
    //         // $pass=$this->input->post('pass');
    //         // echo "Username is ". $uname."<br>"."Password is".$pass ;

    //         $uname=$this->input->post('uname');
    //         $pass=$this->input->post('pass');
    //         $this->load->model('loginmodel');
    //         $login_id=$this->loginmodel->isvalidate($uname,$pass);
    //         if ($login_id)
    //         {
              
    //                 // for logic correct
    //               // echo "details matched";
    //                 $this->load->library('session');          // by this line we load the session
    //                 $this->session->set_userdata('id',$login_id);      // by the set_userdata function we got the id from the row and setting the session value . 
    //                 //$this->load->view('admin/dashboard');
    //                 return redirect('admin/welcome');    // this code is for redirecting welcome function and run its code
    //         }
    //         else
    //         {
    //                 // for logic failed
    //                // echo "deatils not matched";
    //                $this->session->set_flashdata('Login_failed','Invalid Username/Password');
    //                 return redirect('login');
                  

    //         }
    //     }
    //     else
    //     {
    //         // echo validation_errors();
    //         $this->load->view('Admin/login');
    //     }
    // }
    // public function welcome()
    // {
    //   if (! $this->session->userdata('id'))
    //    return redirect ('admin/login');
    //     $this->load->model('loginmodel');
    //     $articles=$this->loginmodel->articleList();
    //     $this->load->view('admin/dashboard',['articles'=>$articles]);        // articles = this is a key for variable $articles and it may have different name.
    // }

      
 public function welcome()
 {
     $this->load->model('loginmodel','ar');
  $this->load->library('pagination');

  $config=[
        'base_url' => base_url('admin/welcome'),
        'per_page' =>2,
        'total_rows' => $this->ar->num_rows(),
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

   $this->load->model('loginmodel');
  $articles=$this->ar->articleList($config['per_page'],$this->uri->segment(3));
  $this->load->view('admin/dashboard',['articles'=>$articles]);
  // return json_encode($articles);
 }



    public function register()
    {
      $this->load->view('admin/register');
    }


// ggggggggggggggggggggggggggggggggggggggggggggggggggggg

// adduser function is used for adding the article . it loads the add_article  page in our project
public function adduser()
{
   
  $this->load->view('admin/add_article');
 
}

// this is for uservalidation in the add_article page

// public function userValidation()
// {

//  if($this->form_validation->run('add_article_rules'))
//  {
//      $post=$this->input->post(); 
//      $this->load->model('loginmodel','useradd');
//      if($this->useradd->add_articles($post))
//      {
//       //  echo "article iserted succesfully" ;
//         $this->session->set_flashdata('msg','Articles added successfully');
//          $this->session->set_flashdata('msg_class','alert-success');
//      }
//      else
//      {
//         $this->session->set_flashdata('msg','Articles not added Please try again!!');
//         $this->session->set_flashdata('msg_class','alert-danger');
//      }
//      return redirect('admin/welcome');
// }
//  else
//  {
//   $this->load->view('admin/add_article');
//  }

// }

public function userValidation()
{
  // print_r($_FILES);
  // die;
$config=[
'upload_path'=>'./upload/',
'allowed_types'=>'gif|jpg|png|jpeg',
];
     
$this->load->library('upload',$config);
 if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
 {
     $post=$this->input->post(); 
    
    $data=$this->upload->data();

  // print_r($data);

     $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
    
       $post['image_path']=$image_path;
     $this->load->model('loginmodel','useradd');
     if($this->useradd->add_articles($post))
     {
        $this->session->set_flashdata('msg','Articles added successfully');
         $this->session->set_flashdata('msg_class','alert-success');
     }
     else
     {
        $this->session->set_flashdata('msg','Articles not added Please try again!!');
        $this->session->set_flashdata('msg_class','alert-danger');
     }
     return redirect('admin/welcome');
}
 else
 {
 $upload_error=$this->upload->display_errors();

 $this->load->view('admin/add_article',compact('upload_error'));
 }

}
public function find_article($articleid)
{
 $q=$this->db->select(['article_title','article_body','id'])
          ->where('id',$articleid)
          ->get('articles');
          return $q->row();


}



 public function edituser($id)
    {
    $this->load->model('loginmodel');
    $article=$this->loginmodel->find_article($id);
    $this->load->view('admin/edit_article',['article'=>$article]);
   
    }


  //   public function updatearticle($article_id)
  //   {
  //  if($this->form_validation->run('add_article_rules'))
  //    {
  //        $post=$this->input->post(); 
  //        //$articleid=$post['article_id'];
  //        //unset($articleid);
  //        $this->load->model('loginmodel','editupdate');
  //        if($this->editupdate->update_article($article_id,$post))
  //        {
  //           $this->session->set_flashdata('msg','Article Update successfully');
  //            $this->session->set_flashdata('msg_class','alert-success');
  //        }
  //        else
  //        {
  //           $this->session->set_flashdata('msg','Articles not update Please try again!!');
  //           $this->session->set_flashdata('msg_class','alert-danger');
  //        }
  //        return redirect('admin/welcome');
  //       }
  //    else
  //    {
  //      $this->edituser($article_id);
  //    }
  //   }




  public function updatearticle($article_id)
{
  // print_r($_FILES);
  // die;
$config=[
'upload_path'=>'./upload/',
'allowed_types'=>'gif|jpg|png|jpeg',
];
     
$this->load->library('upload',$config);
 if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
 {
     $post=$this->input->post(); 
    
    $data=$this->upload->data();

  // print_r($data);
  // die;

     $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
    
       $post['image_path']=$image_path;
       $this->load->model('loginmodel','editupdate');
       if($this->editupdate->update_article($article_id,$post))
       {
          $this->session->set_flashdata('msg','Article Update successfully');
           $this->session->set_flashdata('msg_class','alert-success');
       }
       else
       {
          $this->session->set_flashdata('msg','Articles not update Please try again!!');
          $this->session->set_flashdata('msg_class','alert-danger');
       }
     return redirect('admin/welcome');
}
 else
 {
 $upload_error=$this->upload->display_errors();

 $this->edituser($article_id);
 }

}


    public function delarticles()
    {
      $id=$this->input->post('id');
      // print_r($id);
      // die;

     
       $this->load->model('loginmodel','delarticle');
         if($this->delarticle->del($id))
         {
             $this->session->set_flashdata('msg','Delete Successfully');
             $this->session->set_flashdata('msg_class','alert-danger');
         }
         else
         {
            $this->session->set_flashdata('msg','Please try again..not delete');
            $this->session->set_flashdata('msg_class','alert-danger');
         }
         return redirect('admin/welcome');
   
    }

    public function __construct()
    {
      parent::__construct();
      if( ! $this->session->userdata('id') )
      return redirect('login');
      
    }
    
     public function logout()
     {
      // echo "log out";
       $this->session->unset_userdata('id');
       return redirect('login');
     }

   

   
}



?>