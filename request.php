	<?php
		//set this to have a database and a user that can create and truncate tables 
		//if you send body=deleteRequestLog it will truncate this log
		//x-www-form-urlencoded
	$servername = "localhost";
	$username = "username"; 
	$password = "password"; 
	$dbname = "database"; 

		
		if(file_get_contents("php://input") == "body=deleteRequestLog"){
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$truncate = "TRUNCATE TABLE requestLog";
		if ($conn->query($truncate) === TRUE) {
				echo("truncated"); 
			} else {
				echo("Error: " . $sql . $conn->error);
			}
		$conn->close();
		}else{
		
	//				$sql22 = "INSERT INTO config_team_" . $channelName . " (debugKey, value) VALUES ('currentUser',' ')";

		$sql = "CREATE TABLE requestLog(logBody varchar(255), logHeader varchar(255))";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			logging("Database connection issue in index.createteam"); 
		} 
		if ($conn->query($sql) === TRUE) {

			$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			} 
			if ($conn->query("INSERT INTO requestLog(logBody, logHeader) VALUES ('" . file_get_contents("php://input") . "','" . basename(__FILE__, '.php') . "')") === TRUE) {
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					} 
					$sql = "SELECT * FROM requestLog";
					$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo("<BR>");
				// output data of each row
				while($row = $result->fetch_assoc()) {
				print_r($row);
				echo("<BR>");
				}
					}else{
					echo("no it wont log anything");
				}
			} else {
				echo("moreshitbroke");
				echo("Error creating table " . $conn->error);
			}

		} else {
			echo("Error creating table " . $conn->error);
			$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			} 
			if ($conn->query("INSERT INTO requestLog(logBody, logHeader) VALUES ('" . file_get_contents("php://input") . "','" . basename(__FILE__, '.php') . "')") === TRUE) {
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					} 
					$sql = "SELECT * FROM requestLog";
					$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo("<BR>");
				// output data of each row
				while($row = $result->fetch_assoc()) {
				print_r($row);
				echo("<BR>");
				}
					}else{
					echo("no it wont log anything");
				}
			} else {
				echo("moreshitbroke");
				echo("Error creating table " . $conn->error);
			}
		}
		$conn->close();
		
		}
		
		
		?>