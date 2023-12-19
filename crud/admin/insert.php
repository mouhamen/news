<?php
include 'connectionphp.php';

if(isset($_POST['name'])){
    
    $pname=$_POST['name'];
    $pprice=$_POST['price'];
    $pdes=$_POST['des'];
    $cat_option=$_POST['cat_option'];

    $fileName=$_FILES['image']['name'];
    $fileType=$_FILES['image']['type'];
    $fileSize=$_FILES['image']['size'];
    $fileData=$_FILES['image']['tmp_name'];

    $t=time();
    move_uploaded_file($fileData,'images/'.$t.$fileName);
    $pic='images/'.$t.$fileName;

    $sql="INSERT INTO product(`name`,`c_id`,`price`,`description`,`img`)VALUES('$pname','$cat_option','$pprice','$pdes','$pic');";
    if($con->query($sql)){
        echo "inserted data";
        echo "<br>";
        echo $sql;
        header('Location: index.php');
    }
    else{
        echo "not insert";
    }

    
    
}

?>



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
          body{background: linear-gradient(to left,skyblue,white);}
       .main1{display:flex; flex-direction:row;}
        .main{margin:auto;width:50%;
        display:flex;height:99vh;box-sizing:border-box;border:2px solid #005b96;
        flex-direction:column;justify-content:center;align-items:center;
        }
        .div2{display:flex;height:7vh;margin-right:30px;}
        .a3{text-decoration: none;padding:8px 10px;border-radius:5px;
        background-color:grey;color:white;}
        .decor{text-decoration: none;padding:8px 30px;border-radius:5px;
        background-color:#005b96;color:white;}
    </style>
</head>
<body>
    
<div class="main1">

    <div class="card main">
    <form action="insert.php" method="POST" enctype="multipart/form-data">
    <label for="">Name:</label>
    <input type="text" name="name" id=""><br><br>  
     <label for="">Catagory:</label>      
    <select name="cat_option" id="">
    <?php
    $sql1="SELECT * FROM catagory";
              $result1=$con->query($sql1);
             if($result1->num_rows>0){
             while($row1=$result1->fetch_assoc()){ 
             ?>      
<option value="<?php echo $row1['catagory_id']; ?>">
<?php echo $row1['catagory_name']; ?></option>
<?php
             }}
              ?>     
    </select>
       <br><br>       
    <label for="">Price:</label>
    <input type="text" name="price" id=""><br><br>
    <label for="">Description:</label>
    <textarea name="des" id="" cols="30" rows="10"></textarea><br><br>
    <label for="">Img:</label>
    <input type="file" name="image" id=""><br><br>
    <input class="decor" type="submit" name="" value="submit">


    </form>
    </div>
    <div class="div2"><a class="a3" href="index.php">Back</a></div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>