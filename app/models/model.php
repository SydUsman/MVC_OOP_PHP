<?php
include '../connection.php';

class Model {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'ignisit';
    private $conn;

    // Constructor
    function __construct(){
        $this->conn = getConnection();
    }

    // function insertRecord($post){
    //     $name = $post['name'];
    //     $email = $post['email'];
    //     $sql = "INSERT INTO users(name,email) VALUES('$name','$email')";
    //     $result = $this->conn->query($sql);
    //     if($result){
    //         header('location:index.php?msg=ins');
    //     } else{
    //         echo "Error";
    //     }
    // }
    
    // Creating a method for inserting a record
    function insertRecord($post){
        $name = $post['name'];
        $email = $post['email'];
        $country = $post['country'];
        $city = $post['city'];
    
        $sql = "INSERT INTO users(name, email, country, city) VALUES('$name', '$email', '$country', '$city')";
        $result = $this->conn->query($sql);
    
        if($result){
            header('location:index_view.php?msg=ins');
        } else {
            echo "Error";
        }
    }

    // Display the Record
    public function displayRecord(){
        $sql = 'SELECT users.id, users.name, users.email, countries.name AS country, cities.name AS city 
                FROM users 
                JOIN countries ON users.country = countries.id 
                JOIN cities ON users.city = cities.id ORDER BY users.id ASC';
        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }


      // Display records filtered by country
      public function displayRecordByCountry($country){
        $sql = "SELECT users.id, users.name, users.email, countries.name AS country, cities.name AS city 
                FROM users 
                JOIN countries ON users.country = countries.id 
                JOIN cities ON users.city = cities.id 
                WHERE countries.name = '$country' 
                ORDER BY users.id ASC";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array(); 
        }
    }

    // public function displayRecord(){
    //     $sql = 'SELECT * FROM users';
    //     $result = $this->conn->query($sql);
    //     if($result->num_rows > 0){
    //         while($row = $result->fetch_assoc()){
    //             $data[] = $row;
    //         }
    //         return $data;
    //     }
    // }

    // Get record by ID
    public function getById($updateid){
        // $sql = "SELECT * FROM users WHERE id='$updateid'";
        $sql = "SELECT users.id, users.name, users.email, countries.name AS country, cities.name AS city 
        FROM users 
        JOIN countries ON users.country = countries.id 
        JOIN cities ON users.city = cities.id
        WHERE users.id = '$updateid'";

        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    // // Update Record
    // function updateRecord($post){
    //     $name = $post['name'];
    //     $email = $post['email'];
    //     $id = $post['hid'];
    //     $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
    //     $result = $this->conn->query($sql);
    //     if($result){
    //         header('location:display_record.php?msg=ups');
    //     } else{
    //         echo "Error";
    //     }
    // }

    function updateRecord($post) {
        $id = $post['hid'];
        $name = $post['name'];
        $email = $post['email'];
        $countryName = $post['country']; 
        $cityName = $post['city']; 

        $countryId = $this->getCountryIdByName($countryName);
        $cityId = $this->getCityIdByName($cityName);
    
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, country=?, city=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $countryName, $cityName, $id);
        $result = $stmt->execute();
    
        if ($result) {
            header('location:display_record.php?msg=ups');
        } else {
            echo "Error";
        }
    }
    
   //country_id based on country name
    function getCountryIdByName($countryName) {
        $sql = "SELECT id FROM country WHERE name='$countryName'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return null;
        }
    }
    
    // city_id based on city name
    function getCityIdByName($cityName) {
        $sql = "SELECT id FROM city WHERE name='$cityName'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return null;
        }
    }
    
    // Delete Record
    public function deleteRecord($delid){
        $sql = "DELETE FROM users WHERE id='$delid'";
        $result = $this->conn->query($sql);
        if($result){
            header("location:display_record.php?msg=del");
        } else{
            echo "Error";
        }
    }

    // Get countries from the database
    public function getCountries(){
        $sql = "SELECT * FROM countries";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }
}
?>
