<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
      <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="newstyle.css">
</head>
<body>
<div class="container-fluid">
<div class="row">
 <div class="col-12">
 <div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-4">
                <a href="index.php" id="logo"><img src="news.jpg"></a>
            </div>
            
            <div class="col-md-4"></div>
            <div id="sidebar" class="col-md-4">
    
    <div class="search-box-container">
        
        <form class="search-post" action="index.php" method ="POST">
            <div class="input-group">
                <input type="text" name="search2" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    
            <!-- /Search -->
                
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar"class="wao">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                <li><a href="index.php">HOME</a></li>          
              <?php
              $serverAddress='localhost';
              $username='root';
              $password='';
              $dbname='fooddashboard';
              $con = new mysqli($serverAddress,$username,$password,$dbname);  
              
              $sql1="SELECT * FROM catagory";
              $result1=$con->query($sql1);
             if($result1->num_rows>0){
             while($row1=$result1->fetch_assoc()){ 
             ?>                       
            <li><a href='catagories.php?cid=<?php echo $row1['catagory_id']; ?>'><?php echo  $row1['catagory_name']; ?></a></li>            
            <?php
             }}
              ?>
      </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->

</div>   
</div>        
<?php
    if(isset($_POST['submit'])){
      $search2=$_POST['search2'];
  
      $sql1="SELECT * FROM product WHERE name LIKE '%$search2%';";
      $result1=$con->query($sql1);
      if($result1->num_rows>0){
          while($row1=$result1->fetch_assoc()){
    ?>   
<div class="card mx-3 my-3" style="max-width: 600px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/<?php echo $row1['img']; ?>" class="img-fluid m-4 w-100"width="100px"height="100px" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body text-end">
        <h5 class="card-title text-start h4"><b><?php echo $row1['name']; ?></b></h5>
        <p class="card-text text-start"><?php echo substr($row1['description'],0,130)."..."; ?></p>
        <a href="single.php?id=<?php echo $row1['id']; ?>" class="btn btn-primary text-end">Read More</a>
      </div>
    </div>
  </div>
  
</div>                       
<?php
  }
}
} 
?>

<?php
$serverAddress='localhost';
$username='root';
$password='';
$dbname='fooddashboard';
$con = new mysqli($serverAddress,$username,$password,$dbname); 
$ctid=$_GET['cid'];
echo $ctid;
$sql="SELECT * FROM product WHERE c_id='$ctid'"; 

$result=$con->query($sql);
      if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
    ?>   
<div class="card mx-3 my-3" style="max-width: 600px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/<?php echo $row['img']; ?>" class="img-fluid m-4 w-100"width="100px"height="100px" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body text-end">
        <h5 class="card-title text-start h4"><b><?php echo $row['name']; ?></b></h5>
        <p class="card-text text-start"><?php echo substr($row['description'],0,130)."..."; ?></p>
        <a href="single.php?id=<?php echo $row1['id']; ?>" class="btn btn-primary text-end">Read More</a>
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



</body>
</html>