<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="database1";
$conn=mysqli_connect($servername,$username,$password,$dbname);
// if(!$conn)
// {
//     die("connection Failed".mysqli_connect_error());
// }
// else
// {
//     echo("Connection sucessful");
//     echo"<br>";
// }
    $Firstname=$_POST["Firstname"];
    $Lastname=$_POST["Lastname"];
    $MobileNo=$_POST["MobileNo"];
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    $RepeatPassword=$_POST["RepeatPassword"];
    $DOB=$_POST["DOB"];
    $location=$_POST["location"];


if($Firstname==NULL || $Lastname==NULL || $MobileNo==NULL || $Password==NULL || $RepeatPassword==NULL || $DOB==NULL || $location==NULL)
    {
        echo "<h1>All Datafields are not properly inserted</h1>";
        echo "<a href='plumberdb.html'><h2>go back<h2></a>"; 
    }
elseif(mb_strlen($MobileNo)!=10)
    {
        echo "<h1>Mobile NO are not properly inserted</h1>";
        echo "<a href='plumberdb.html'><h2>go back</h2></a>"; 
    }
elseif($Password !=$RepeatPassword)
    {
      echo "<h1>Password not matched<h1>";  
      echo "<a href='plumberdb.html'><h2>go back</h2></a>"; 
    }    
else
{
    $sql10="select Email from project1table1";
    $res10= mysqli_query($conn,$sql10);
    $count=mysqli_num_rows($res10);
    if($count>0)
    {
        echo "<h1><center>This Email is already Registered </center></h1>";
        echo "<a href='plumberdb.html.html'><h2><center>Go Back<center></h2></a>"; 
    }
    else
    {    
    $sql_query="INSERT INTO project1table3 (Firstname,Lastname,MobileNo,Email,Password,RepeatPassword,DOB,location)
    VALUES('$Firstname','$Lastname','$MobileNo','$Email','$Password','$RepeatPassword','$DOB','$location')";

    if(mysqli_query($conn,$sql_query))
    {
        echo "New detail inserted sucessfully";
        echo "<a href='index.html'>go to Home</a>";   
    }
    else
    {
        echo "Error:" ; 
        echo "<a href='electriciandb.html'>go back</a>";   
    }
    }
}        
mysqli_close($conn);
?>

</head>
<body>
</body>
</html>






