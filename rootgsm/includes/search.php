 <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query'];

        // Perform search logic and display search results
        // You'll need to implement the search functionality here
        // and display the results accordingly
        // Example: querying the database for matching records

        // Database connection configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gwsc_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query the database for matching records
        $sql = "SELECT * FROM your_table_name WHERE column_name LIKE '%$query%'";
        $result = $conn->query($sql);

        // Display search results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display the relevant information from each matching record
                echo "<p>" . $row['column_name'] . "</p>";
            }
        } else {
            echo "No results found.";
        }

        $conn->close();
    }
    ?>