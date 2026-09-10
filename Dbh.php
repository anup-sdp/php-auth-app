<?php
// file: auth_system/Dbh.php
class Dbh {
    private string $filePath;

    public function __construct() {
        // Points to users.json in the same directory as Dbh.php
        $this->filePath = __DIR__ . "/users.json"; // see notes below
    }

    // Reads and decodes JSON file into a PHP array
    protected function getUsers(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $jsonContent = file_get_contents($this->filePath);
        $data = json_decode($jsonContent, true);
        return is_array($data) ? $data : [];
    }

    // Encodes array into JSON format and writes to file
    protected function saveUsers(array $users): bool {
        $jsonContent = json_encode($users, JSON_PRETTY_PRINT);
        return file_put_contents($this->filePath, $jsonContent, LOCK_EX) !== false;
    }
}

/*
keeping the database file in project files,
hackers can access it, eg at.
http://localhost:8000/users.json
*/