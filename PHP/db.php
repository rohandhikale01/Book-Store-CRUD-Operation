<?php 

function Createdb()
{
    $serverName="localhost";
    $username="root";
    $pass="";
    $dbName="bookstore";


    //create Connection
    $con=mysqli_connect($serverName,$username,$pass);

        //check connection

        if(!$con)
        {
            die("Connection Failed. ".mysql_connect_error());
        }

        //create DB
        $sql="create database if not exists $dbName";
        if(mysqli_query($con,$sql))
        {
             $con=mysqli_connect($serverName,$username,$pass,$dbName);

            //check connection   

            $sql="
                Create table if not exists books(
                id int(11) NOT NULL AUTO_INCREMENT Primary key,
                book_name varchar(25) NOT NULL,
                book_publisher varchar(20),
                book_price float
            );";

            if(mysqli_query($con,$sql))
            {
                return $con;
            }
            else 
            {
                echo "Error  to create table";
            }

        }
        else
        {
            echo "Error while creating the database".mysqli_error($con);
        }
}
?>