<?php


class Admin extends CI_Controller
{

    //Points
    //Make diferenrt controller login for register and send mail
    //Check for remove index.php
    //Check for base_url usage

    // public function __construct(){
    //     //echo "<pre>";print_r($this->session->userdata('id'));exit;
    //     parent::__construct();
    //     if(!$this->session->userdata('id')){
    //         return redirect('admin/login');            
    //     }
    // }

    /**
     * Is is for user login if succeds then redirect to dashboard page.
     * @author Omkar Choudhary
     * @since 02-Jun-2021
     * @access public
     *   */ 

    public function login()
    {
        //For autoload to all pages it is define in config.php
        //$this->load->helper('url');
        // $this->load->helper('html');
        // $this->load->helper('form');
        // $this->load->library('form_validation');

        //If user direct hit url and cookiee set then not go to login page
        if ($this->session->userdata('id')) {
            return redirect('admin/index');
        }

        //Set validations for form fields
        $this->form_validation->set_rules('uname', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        //If validation run success
        if ($this->form_validation->run()) {
            //Get post data
            $uname = $this->input->post('uname');
            $pass = $this->input->post('password');
            $this->load->model('loginmodel');
            //Call function the for validate user for login
            $loginId = $this->loginmodel->isvalidate($uname, $pass);
            if ($loginId) {
                $this->session->set_userdata('id', $loginId);
                return redirect('admin/index');
            } else {
                $this->session->set_flashdata('login_failed', 'Invalid username/password');
                return redirect('admin/login');
            }
        }
        //If validation fails
        else {
            $this->load->view('admin/login');
        }
    }

    /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 03-Jun-2021
     * @access public
     *   */

    public function index()
    {
        //If user direct hits url then redirect to login page if id in session not exist
        if (!$this->session->userdata('id')) {
            return redirect('admin/login');
        }

        //Add pagination
        $this->load->model('loginmodel','lm');   //how to use this
        $this->load->library('pagination');
        $config = [
                'base_url' => base_url('index.php/admin/index'),
                'per_page' => 2,
                'total_rows' => $this->lm->numrows(),
                'full_tag_open'=>"<ul class='pagination'>",
                'full_tag_close'=>"</ul>",
                'next_tag_open' =>"<li class='page-item'>",
                'next_tag_close' =>"</li>",
                'prev_tag_open' =>"<li class='page-item'>",
                'prev_tag_close' =>"</li>",
                'num_tag_open' =>"<li class='page-item'>",
                'num_tag_close' =>"<li>",
                'cur_tag_open' =>"<li class='active page-item'><a class='page-link'>",
                'cur_tag_close' =>"</a></li>"
            ];
        $this->pagination->initialize($config);
        $arrArticles = $this->lm->articleList($config['per_page'], $this->uri->segment(3));
        //  $this->load->model('loginmodel','lm');
        //  $users = new \App\Models\login_model();
        //  $articles = $this->lm->articleList();

        // $arrArticles = [
        //     'users' => $articles->paginate(10),
        //     'pager' => $articles->pager,
        // ];

        $this->load->view('admin/index', ['arrArticles' => $arrArticles]);
    }

    /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 03-Jun-2021
     * @access public
     *   */

    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('admin/login');
    }

    /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 03-Jun-2021
     * @access public
     *   */

    public function addArticle()
    {
        // $config = [
        //     'upload_path' => 'http://localhost/codeIgniter/upload/',
        //    // 'allowed_types' => 'gif|jpg|png',
        // ];
        // $this->load->library('upload', $config);
        // if ($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {
            if ($this->form_validation->run('add_article_rules')){
            $post = $this->input->post();
            //$imageData = $this->upload->data();
            //$imagePath = base_url('upload/'.$imageData['raw_name'].$imageData['file_ext']);
            //$post['image_path'] = $imagePath;
            $this->load->model('loginmodel', 'userAdd');
            if ($this->userAdd->addArticle($post)) {
                $this->session->set_flashdata('Add_Article_Success', 'Artcile has been added successfully.');
                // $this->load->model('loginmodel', 'lm');   //how to use this
                // $arrArticles = $this->lm->articleList();
               // $this->load->view('admin/dashboard', ['arrArticles' => $arrArticles]);
               return redirect('admin/index');
            } else {
                echo "not add";
            }
        } else {
           //$upload_error=$this->upload->display_errors();
           // $this->session->set_flashdata('Add_Article_Success', 'Please enter valid data.');
            //$this->load->view('admin/add_article', compact('upload_error'));
            $this->load->view('admin/add_article');
        }
    }

    /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 03-Jun-2021
     * @access public
     *   */

    // public function uservalidation()
    // {
    //     if ($this->form_validation->run('add_article_rules')) {
    //         $post = $this->input->post();
    //         $this->load->model('loginmodel', 'userAdd');
    //         if ($this->userAdd->addArticle($post)) {
    //             $this->session->set_flashdata('Add_Article_Success', 'Artcile has been added successfully.');
    //             // $this->load->model('loginmodel', 'lm');   //how to use this
    //             // $arrArticles = $this->lm->articleList();
    //            // $this->load->view('admin/dashboard', ['arrArticles' => $arrArticles]);
    //            return redirect('admin/index');
    //         } else {
    //             echo "not add";
    //         }
    //     } else {
    //         $this->session->set_flashdata('Add_Article_Success', 'Please enter valid data.');
    //         $this->load->view('Admin/add_article');
    //     }
    // }

     /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 04-Jun-2021
     * @access public
     *   */

    public function editArticle($id)
    {
        $this->load->model('loginmodel');
        $arrArticle = $this->loginmodel->editArticle($id);
        $this->load->view('Admin/edit_articles', ['arrArticle' => $arrArticle, 'id' => $id]);
    }

     /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 04-Jun-2021
     * @access public
     *   */

    public function updateArticle($id)
    {
        $this->load->model('loginmodel');
        if ($this->form_validation->run('add_article_rules')) {

            $post = $this->input->post();
            // echo "<pre>";print_r($post);exit;

            if ($this->loginmodel->updateArticle($id, $post)) {
                $this->session->set_flashdata('updateArticle', 'Article updated successfully');
                $arrArticle = $this->loginmodel->editArticle($id);
                $this->load->view('Admin/edit_articles', ['arrArticle' => $arrArticle, 'id' => $id]);
            } else {
                $this->session->set_flashdata('updateArticle', 'Article not updated');
                $arrArticle = $this->loginmodel->editArticle($id);
                $this->load->view('Admin/edit_articles', ['arrArticle' => $arrArticle, 'id' => $id]);
            }
        } else {
            $this->session->set_flashdata('updateArticle', 'Please enter valid data.');
            $arrArticle = $this->loginmodel->editArticle($id);
            $this->load->view('Admin/edit_articles', ['arrArticle' => $arrArticle, 'id' => $id]);
        }
    }


     /**
     * Is is for showing all articles in list.
     * @author Omkar Choudhary
     * @since 04-Jun-2021
     * @access public
     *   */

    public function deleteArticle()
    {
        $id = $this->input->post('id');
        $this->load->model('loginmodel', 'deleteArticle');
        if ($this->deleteArticle->deleteArticle($id)) {
            $this->session->set_flashdata('deleteArticle', 'Article deleted successfully.');
            return redirect('admin/index');
        } else {
            $this->session->set_flashdata('deleteArticle', 'Please try again article not deleted.');
            return redirect('admin/index');
        }
    }
}
