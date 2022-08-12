<?php
require_once("db.php");
require_once("component.php");
error_reporting(0);

$con=Createdb();

if(isset($_POST["Create"]))
{
 createData();
}

function createData()
{
    
    $bookname=textboxValue($_POST['book_name']);
    $bookpub=textboxValue($_POST['book_pub']);
    $price=textboxValue($_POST['book_price']);

   if($bookname && $bookpub && $price)
   {
    $sql="Insert into books (book_name,book_publisher,book_price)
    values('$bookname','$bookpub','$price')";

    if(mysqli_query($GLOBALS['con'],$sql))
    {
       
        TextNode("style","Record Inserted Successfully...🎉🎉🎉");
    }
    else
    {
    TextNode("error","Something Went Wrong");
        
    }
   }
   else
   {
    TextNode("error","Provide Data In The Text Box");
   }
   
}

function textboxValue($value)
{
    $tetxbox=mysqli_real_escape_string($GLOBALS['con'],trim($value));
    if(empty($tetxbox))
    return false;
    else
    return $tetxbox;
}

function TextNode($style,$msg)
{
     $ele="<h6 class=\"$style\">$msg</h6>";

  echo $ele;
}


//to get data from mysql

function getData()
{
    $sql="select * from books";
    $result=mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)>0)
    {
        return $result;
    }
}

if(isset($_POST['Update']))
{
    
   updateData();
}

function updateData()
{
    $bookid=textboxValue($_POST['book_id']);
    $bookname=textboxValue($_POST['book_name']);
    $bookpub=textboxValue($_POST['book_pub']);
    $price=textboxValue($_POST['book_price']);

  
    if($bookname && $bookpub && $price)
    {
        $sql="update books set book_name='$bookname',book_publisher='$bookpub',book_price='$price'where id='$bookid'";
        if(mysqli_query($GLOBALS['con'],$sql))
        {
            TextNode("style","Data Updated Successfully...🎉🎉🎉");
            
        }
        else
        {
            TextNode("error","Enable To Update Data");
          
        }

    }
    else
    {
        TextNode("error","Select Data Using Edit Icon");

    }
}
if(isset($_POST['Delete']))
{
    
   deleteData();
}

function deleteData()
{
    $bookid=(int)textboxValue($_POST['book_id']);
    $sql="delete from books where id='$bookid'";
    
        if(mysqli_query($GLOBALS['con'],$sql))
        {
            TextNode("style","Data Deleted Successfully...🎉🎉🎉");
            
        }
        else
        {
            TextNode("error","Enable To Delete Data");
          
        }

    }
  
 
    

?>