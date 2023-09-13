<?php

class Admin extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserModel');
        $this->load->library('encryption'); // Replace with your user model
    }

    public function index()
	{
		$this->load->view('login');
	}

public function register(){
    $this->load->view('registration');
}

public function dashboard(){

    $this->load->view('dashboard');
}
public function register_user() {
    // if ($this->input->is_ajax_request()) {
    //     // Load the upload library
    //     // print_r($this->input->post('image'));
    //     // exit;
    //     $this->load->library('upload');

    //     // Configuration for the file upload
    //     $config['upload_path'] = './uploads/'; // Specify your upload directory
    //     $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
    //     $config['max_size'] = 2048; // Maximum file size in KB (2MB)

    //     $this->upload->initialize($config);

    //     if ($this->upload->do_upload('profile_photo')) {
    //         // File upload successful
    //         $file_data = $this->upload->data();

            // Get other registration data
            $fullname = $this->input->post('fullname');
            $password = $this->input->post('password');
            $role = $this->input->post('role');
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            // Perform user registration logic, including saving the file path in the database
            $this->load->model('UserModel'); // Load your UserModel
            $registration_data = array(
                'user_name' => $fullname,
                'user_password' => $hashed_password,
                'role' => $role,
               // 'profile_photo' => $file_data['file_name'] // Save the file name in the database
            );

            $user_id = $this->UserModel->registerUser($registration_data);

            if ($user_id) {
              
                $response = array(
                    'status' => 'success',
                    'message' => 'User registered successfully'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to register user'
                );
            }
            return $response;
        // } else {
        //     // File upload failed
        //     $response = array(
        //         'status' => 'error',
        //         'message' => $this->upload->display_errors()
        //     );
        // }

        // Send JSON response back to the client
   
    // } 
}

public function login_auth() {
  
    // Check if the user is already logged in
    
        // Retrieve POST data from AJAX request
        $username = $this->input->post('username');
        $password = $this->input->post('password');
      
        // Call the model to authenticate the user
        $user = $this->UserModel->authenticate($username, $password);

        if ($user) {
            // User authentication successful
            $user_data = array(
                'user_id' => $user->id,
                'username' => $user->username,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($user_data);

            // Send a success response to AJAX
            $response = array('status' => 'success');
            echo json_encode($response);
        } else {
            // User authentication failed
            // Send an error response to AJAX
            $response = array('status' => 'error', 'message' => 'Invalid username or password');
            echo json_encode($response);
        }
    }

public function login_view() {
    // Destroy the session and log the user out
    $this->load->view('login'); // Redirect to the login page
}



public function logout() {
    // Destroy the session and log the user out
    $this->session->sess_destroy();
   // redirect('login'); // Redirect to the login page
}

}