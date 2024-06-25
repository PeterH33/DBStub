<html>
<head>
<title>Show songs in the database</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
</head>
<body>
<?php include 'include.htm';?>
<h1>Show songs.php</h1>
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
        
    } else {
        print"There are no results";
    }

}
	
	
	
	
	
?>
</body>
</html>
