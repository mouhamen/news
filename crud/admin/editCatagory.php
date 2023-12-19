
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
    <style>
          body{background: linear-gradient(to left,skyblue,white, skyblue);}
       .main1{display:flex; flex-direction:column;}
        .main{margin:auto;width:50%;
        display:flex;height:60vh;box-sizing:border-box;border:2px solid #005b96;
        flex-direction:column;justify-content:center;align-items:center;
        }
        input{color:blue;font-}
        .div2{display:flex;align-self:end;margin-bottom:0px;margin-right:30px;}
        .a3{text-decoration: none;padding:8px 7px;border-radius:5px;
        background-color:grey;color:white;}
        .decor{text-decoration: none;padding:8px 30px;border-radius:5px;
        background-color:#005b96;color:white;}
    </style>





</head>
<body>
    <div class="main1">
    <div class="div2"><a class="a3" href="catagory.php">Back</a></div>
<div class="card main">
<?php
include 'connectionphp.php';
$catid=$_GET['cid'];
$sql="SELECT * FROM catagory WHERE catagory_id='$catid';";
$result=$con->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
?>
<form action="editCatagory.php" method="POST">
    <input type="hidden" name="catagoryid" value="<?php echo $catid; ?>">
        <label for="">Catagory: </label>
        <select name="catagory_option" >
        <?php 
        $sql1="SELECT * FROM catagory";
        $result1=$con->query($sql1);
       if($result1->num_rows>0){
       while($row1=$result1->fetch_assoc()){      
         ?>   
        <option><?php echo $row1['catagory_name']; ?>
       </option>
   <?php
       }}
   ?>
    </select>
       <br><br>       
 <input class="decor" type="submit" name="submit" >
    </form>
    <?php
    }
}
    ?>

</div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>


 <?php
 if(isset($_POST['catagory_option'])){
    $catagoryid=$_POST['catagoryid'];
    $catoption=$_POST['catagory_option'];
    

    $sql2="UPDATE catagory SET catagory_name='$catoption' WHERE catagory_id='$catagoryid';";
    echo $sql2;
if($con->query($sql2)==TRUE){
    header('Location: catagory.php');
    echo 'updated';
}
else {
    echo 'not update';
}
}
 ?>   
