<?php
// UserModel.php - this is a model class that contains some data and logic for the user registration

class UserModel
{

    // this is a method that validates the user input and returns an array of errors if any
    public function validate($data)
    {
        // initialize an empty array of errors
        $errors = [];

        // check if the name field is empty
        if (empty($data['name'])) {
            // add an error message to the array
            $errors['name'] = "Name is required";
        }

        // check if the email field is empty or invalid
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            // add an error message to the array
            $errors['email'] = "Email is required and must be valid";
        }

        // check if the password field is empty or too short
        if (empty($data['password']) || strlen($data['password']) < 8) {
            // add an error message to the array
            $errors['password'] = "Password is required and must be at least 8 characters long";
        }

        // return the array of errors
        return $errors;
    }

    // this is a method that inserts the user data into the database after validation 
    public function register($data)
    {
        // connect to the database using PDO (you can use your own connection details)
        $db = new PDO("mysql:host=localhost;dbname=login_system", "root", "");

        // prepare a SQL statement to insert the user data into the users table 
        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

        // bind the parameters with their values from the data array 
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", password_hash($data['password'], PASSWORD_DEFAULT)); // hash the password before storing

        // execute the statement 
        return $stmt->execute();
    }
}
?>