<?php
$servernn="localhost";
$usern="root";
$pass="";
$databaseName="mazad";
$fileName="mazad99.sql";
#create conection
$conn=new mysqli($servernn,$usern,$pass);
if ($conn->connect_error) {
    die("connection error :".$conn->connect_error);
}
#create the db
$sll="CREaTE DaTaBaSE $databaseName";
if ($conn->query($sll) === TRUE) {
    echo "empty database created succesfully <br>
    ";
}else {
    echo "error while creating : ".$conn->error;
}
mysqli_select_db($conn,$databaseName)or die("error selecting db");
#import the db file 
$templine="";
$lines=file($fileName);
foreach ($lines as $line) {
    if (substr($line,0,2)=='--'||$line=='')
    continue;
    $templine=$templine."".$line;
    if (substr(trim($line),-1,1)==';') {
        $conn->query($templine) or print("Error : $templine");
        $templine="";
    }
}
echo "\n <br>
done creating tables ✔✔";
?>