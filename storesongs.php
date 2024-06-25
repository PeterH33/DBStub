<html>
<head>
<title>Stored Names</title>
</head>
<body>
<?php include 'include.htm';?>
<h1>StoreSongs.php</h1>
<h2>Accepted data from input page and stored into DB.</h2>
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
    //setup the php variable to hold the data from the form
    $artist = sanitizeString($_POST['artist']);
    $cd = sanitizeString($_POST['cd']);
    $song = sanitizeString($_POST['song']);

    //construct our SQL string to insert the data in the database and table
    $SQLString = "insert into $tableName(artist, cd, song) values ('$artist', '$cd', '$song')";

    //this is the code to insert the values and report if it doesn't happen
    if(mysqli_query($DBConnect, $SQLString))
        print"Record created:";
    else
        print"There was an error on insert";

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