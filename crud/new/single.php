<?php 
$id=$_GET['id'];

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
    <link rel="stylesheet" href="newstyle.css">
</head>
<body>
    <div class="container-fluid">
<div class="row">
 <div class="col-12">
 <?php include 'header.php'; ?></div>   
</div>        
        
    
                        <!-- <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul> -->
       
  
                        <?php
$serverAddress='localhost';
$username='root';
$password='';
$dbname='fooddashboard';
$con = new mysqli($serverAddress,$username,$password,$dbname);
$sql="SELECT * FROM product WHERE id='$id';";
$result=$con->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){

  
?>                       

<div class="card mx-3 my-3" style="max-width: 98%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/<?php echo $row['img']; ?>" class="img-fluid m-1 w-100"width="100px"height="100px" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body text-end">
        <h5 class="card-title text-start h4"><b><?php echo $row['name']; ?></b></h5>
        <p class="card-text text-start"><?php echo $row['description']; ?>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
         Aspernatur blanditiis commodi quasi aliquid et officiis doloribus 
        obcaecati assumenda recusandae nobis illo iste in aut, explicabo quod ut.
         Tempore, voluptate Ipsam. Lorem ipsum dolor sit amet consectetur adipisicing 
         elit. Sequi doloremque vitae fugiat aliquam veritatis doloribus veniam
          dolores laboriosam iste. Recusandae perferendis velit nemo asperiores 
          excepturi in id ex. Dolorem, similique?
         Error quidem dolore consequuntur nobis voluptate tempore voluptatem veniam.
          Cum quos culpa deleniti quia amet velit eius dolorem autem, laboriosam 
          consectetur fugit voluptate vitae rerum fugiat, suscipit sed odit nobis.
        </p>
        <a href="single.php?id=<?php echo $row['id']; ?>" class="btn btn-primary text-end">Read More</a>
      </div>
    </div>
  </div>
  
</div>                       
<?php
  }
}
  ?>          

        

       

<div class="row">
    <div class="col-md-12">
        <br><br> <?php include 'footer.php'; ?>
    </div>
</div>

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>
    




