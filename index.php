<?php 
require_once("../CRUD/PHP/component.php");
require_once("../CRUD/PHP/operation.php");
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width,user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d19fd4286f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
    <title>Books</title>
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa-solid fa-books"></i> Book Store</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50"> 
                <div class="pt-2">
                    <?php   InputElement("<i class='fas fa-id-badge'></i>","ID","book_id","")?>

                </div>
                <div class="pt-2">
                <?php   InputElement("<i class='fas fa-book'></i>","Book Name",'book_name',"")?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                    <?php   InputElement("<i class='fas fa-people-carry'></i>","Publisher","book_pub","")?>

                    </div>
                    <div class="col">
                    <?php   InputElement("<i class='fas fa-dollar-sign'></i>","Book Price","book_price","")?>
                       
                    </div>
                </div>
                <div class="d-flex justify-content-center" >
                    <?php ButtonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","Create","data-placement='bottom' title='create'")  ?>
                    <?php ButtonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","Read","data-placement='bottom' title='Read'")  ?>
                    <?php ButtonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","Update","data-placement='bottom' title='Update'")  ?>
                    <?php ButtonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","Delete","data-placement='bottom' title='Delete'")  ?>
                </div> 
            </form>
        </div>
        <div class="d-flex table-data">
            <table class="table table-striped table-dart">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                <?php   
                    if(isset($_POST['Read']))
                    {
                   $result=getData();
                   if($result)
                   {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr> 
                            <td data-id="<?php echo $row['id']?>"><?php echo $row['id']; ?> </td>
                            <td data-id="<?php echo $row['id']?>"><?php echo $row['book_name']; ?> </td>
                            <td data-id="<?php echo $row['id']?>"><?php echo $row['book_publisher']; ?> </td>
                            <td data-id="<?php echo $row['id']?>"><?php echo '$'.$row['book_price']; ?> </td>
                            <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']?>"></i></td>

                        </tr>
                        <?php
                    }
                   }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- <script>
$(document).ready(function(){
    $(".btnedit").click(e=>{
      let textval= dispdata(e);

     let id=$("input[name*='book_id']");
     let bookname=$("input[name*='book_name']");
     let bookpub=$("input[name*='book_pub']");
     let price=$("input[name*='book_price']");
     
     id.val(textval[0]);
     bookname.val(textval[1]);
     bookpub.val(textval[2]);
     price.val(textval[3]);


    })     
});

function dispdata(e)
{
    let id=0;
    const td=$("#tbody tr td");
    let textval=[];

    for(const value of td)
    {
       if(value.dataset.id==e.target.dataset.id)
       {
        textval[id++]=value.textContent;
       }
    }
    return textval;
     
}
    </script> -->
 <script src="../CRUD/PHP/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>