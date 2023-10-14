<?php


class ContactForm
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertData($name, $email, $subject, $message)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO Patient (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);

            $stmt->execute();

            echo "Data inserted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Replace with your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Doctor Checkup";

    // Create an instance of ContactForm
    $contactForm = new ContactForm($servername, $username, $password, $dbname);

    // Insert data into the database
    $contactForm->insertData($name, $email, $subject, $message);

    // Close the database connection
    $contactForm->closeConnection();

    // Redirect to the homepage
    header("Location: index.html");
    exit();
}
?>
