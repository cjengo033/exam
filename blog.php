<?php


require 'database.php';
$database = new Database();
$conn = $database->getConnection();
class Blog
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;

    }
    public function create($title, $content, $username)
    {
        $createPostQuery = "INSERT INTO blog (title, content, created_by)
        VALUES ('$title', '$content', '$username')";

        if ($this->conn->query($createPostQuery) === TRUE) {
            echo "New record created successfully";
            header("location: home.php");
        } else {
            echo "Error: " . $createPostQuery . "<br>" . $this->conn->error;
        }
    }

    public function getAllPost($username)
    {

        $sql = "SELECT * FROM blog WHERE created_by = '$username'";
        $getAllPostQuery = $this->conn->query($sql);

        if ($getAllPostQuery->num_rows > 0) {
            // output data of each row
            while ($row = $getAllPostQuery->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }

    }

    public function deletePost($postId)
    {
        // sql to delete a record
        $deletePostQuery = "DELETE FROM blog WHERE id= '$postId'";

        if ($this->conn->query($deletePostQuery) === TRUE) {
            echo "<div class='container-fluid'>
            <div class='p-3 mb-2 bg-danger text-white text-center'>You've Deleted. Please refresh the page!</div>
          </div>";
        } else {
            echo "Error deleting record: " . $this->conn->error;
        }
    }

    public function getSinglePost($postId)
    {
        $sql = "SELECT * FROM blog WHERE id = '$postId'";
        $getAllPostQuery = $this->conn->query($sql);

        if ($getAllPostQuery->num_rows > 0) {
            // output data of each row
            while ($row = $getAllPostQuery->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public function updatePost($title, $content, $postId)
    {
        $updatePostQuery = "UPDATE blog SET title='$title', content='$content' WHERE id='$postId'";

        if ($this->conn->query($updatePostQuery) === TRUE) {
            echo "<div class='container-fluid'>
            <div class='p-3 mb-2 bg-success text-white text-center'>You've updated.</div>
          </div>";

        } else {
            echo "Error updating record: " . $this->conn->error;
        }
    }
}
?>