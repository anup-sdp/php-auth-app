<?php
// file: auth_system/Signup.php
class Signup extends Dbh {
    private string $username;
    private string $pwd;

    public function __construct(string $username, string $pwd) {
        parent::__construct();
        $this->username = $username;
        $this->pwd = $pwd;
    }

    // Checks if username exists in users.json (case-insensitive)
    private function isUsernameTaken(): bool {
        $users = parent::getUsers();
        foreach ($users as $user) {
            if (isset($user['username']) && strtolower($user['username']) === strtolower($this->username)) {
                return true;
            }
        }
        return false;
    }

    // Appends new user credentials and saves
    private function insertUser(): bool {
        $users = parent::getUsers();
        $users[] = ['username' => $this->username, 'pwd' => $this->pwd];
        /*
          ^ each appended element is an associative array, 
          in parent json_encode() converts it to a JSON object. {"username": "newuser", "pwd": "newpassword"}
        */        
        return parent::saveUsers($users);
    }

    public function signupUser(): bool {
        if (empty($this->username) || empty($this->pwd)) {
            header("Location: ../signup-page.php?error=emptyinput");
            exit();
        }  
        if ($this->isUsernameTaken()) {
            header("Location: ../signup-page.php?error=usernametaken");
            exit();
        }
        return $this->insertUser();
    }
}