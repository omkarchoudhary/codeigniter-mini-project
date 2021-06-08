<?php
class Login extends My_Controller
{

    public function registration()
    {
        $this->load->view('admin/registration');
    }

    public function sendmail()
    {
        $this->form_validation->set_rules('username', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        if ($this->form_validation->run()) {
            $arrPost = $this->input->post();
            $this->load->model('loginmodel', 'addregistration');
            if ($this->addregistration->addRegistration($arrPost)) {
                $this->load->view('admin/index');
            } else {
                $this->load->view('login/registration');
            }
            // $this->load->library('email');
            // $this->email->from(set_value('email'),set_value('first_name'));
            // $this->email->to('omkarchoudhary2012@gmail.com');
            // $this->email->subject('Registration Greeting!!');
            // $this->email->subject('Thank you for registration');
            // $this->email->set_newline("\r\n");
            // $this->email->send();

            // if(!$this->email->send()){
            //     show_error($this->email->print_debugger());
            // }
            // else{
            //     echo "You e-mail has been sent.";
            // }

            //echo "Validation Success";
            // $uname = $this->input->post('uname');
            // $pass = $this->input->post('password');
            // $this->load->model('loginmodel');
            // $loginId = $this->loginmodel->isvalidate($uname, $pass);
            // if($loginId){
            //    $this->session->set_userdata('id', $loginId);
            //    return redirect('admin/welcome');
            //    //$this->load->view('Admin/dashboard');
            // }else{
            //     echo "Not matched";
            // }

        } else {
            $this->load->view('admin/registration');
        }
    }
}
