<?php
class UserModel extends CI_Model {
    public function registerUser($data) {
        $this->db->insert('user_login', $data);
        return $this->db->insert_id();
    }
 

    public function authenticate($username, $password) {
      
        $this->db->where('user_name', $username);
        $query = $this->db->get('user_login');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            
       
            // Verify the password using a suitable password hashing method (e.g., password_verify for bcrypt)
            if (password_verify($password, $user->user_password)) {
                return $user; // Return the user object if authentication is successful
            }
        }

        return false; // Return false if authentication fails
    }

}

?>