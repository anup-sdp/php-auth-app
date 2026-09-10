<?php
// file: auth_system/Login.php
class Login extends Dbh {
    private string $username;
    private string $pwd;

    public function __construct(string $username, string $pwd) {
        parent::__construct();
        $this->username = $username;
        $this->pwd = $pwd;
    }

    private function getUser(): ?array {
        $users = parent::getUsers();
        foreach ($users as $user) {
            if (isset($user['username']) && strtolower($user['username']) === strtolower($this->username)) {
                return $user;
            }
        }
        return null;
    }

    public function loginUser(): void {
        if (empty($this->username) || empty($this->pwd)) {
            header("Location: ../login-page.php?error=emptyinput");
            exit();
        }

        $user = $this->getUser();

        if (!$user) {
            header("Location: ../login-page.php?error=usernamenotfound");
            exit();
        }

        if ($user['pwd'] !== $this->pwd) {
            header("Location: ../login-page.php?error=wrongpassword");
            exit();
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_regenerate_id(true); // creates a new session ID and deletes the old one
        $_SESSION["username"] = $user['username'];

        header("Location: ../dashboard-page.php");
        exit();
    }
}