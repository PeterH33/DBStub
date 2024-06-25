<html>
<head>
<title>Delete Names from the Database</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'include.htm';?>
<h1>DeleteRecord.php</h1>
<h2>Select Record to delete by ID</h2>
<?php
//Make a db connection
$DBConnect = mysqli_connect("127.0.0.1", "testTwo", "pword", "test2");

//if there is no db connection, let the admin know
if ($DBConnect == false)
{
    print"Unable to conect to database: ". mysqli_errno();
} else {
    //setup table name
    $tableName = "favsongs";
    //this is a wild card selection for everything in the db
    $SQLString = "select * from $tableName";

    $queryResult = mysqli_query($DBConnect, $SQLString);
    //query returns a number and information
    //check to see if query has records
    if(mysqli_num_rows($queryResult) > 0){
        //output the results in a dynamic table
        print"Here is a list of your songs";
        print"<table width = '100%' border = '1'>";
        print"<tr><th>Count</th><th>Artist</th><th>CD Name</th><th>Favorite Song</th><tr>";
        while($row = mysqli_fetch_assoc($queryResult)){
            //this part is dynamic
            print"<tr><td>{$row['count']}</td><td>{$row['artist']}</td><td>{$row['cd']}</td><td>{$row['song']}</td></tr>";
        }
    } else {
        print"There are no results";
    }
    mysqli_free_result($queryResult);


}
mysqli_close($DBConnect);
	
	
	
	
	

?>
<form method="POST" action = "gone.php">
<p>Record to Delete(count): <input type = "text" name = "record" /></p>
<p><input type="submit" value="Submit" /></p>
</form>
</body>
</html>
