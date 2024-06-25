<html>
<head>
<title>Record Removed</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'include.htm';?>
<h1>Gone.php</h1>

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
    //***********New code */
    $deleteThis = sanitizeString($_POST['record']);
    $SQLString = "delete from $tableName where count = '$deleteThis'";
    $queryResult = mysqli_query ($DBConnect, $SQLString);
    if(mysqli_num_rows($queryResult) > 0){
        print"<h2>Record has been deleted</h2>";
    } else {
        print"<h2>That record does not exist</h2>";
    }
    //If statement to check for failed result


    //************New code */

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

function sanitizeString($var)
{
    // if (get_magic_quotes_gpc())
        $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>
</body>
</html>