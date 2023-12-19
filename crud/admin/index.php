 
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
        .mainn{display:flex;flex-direction:row;}
        table,th,td{border-collapse:collapse;padding:8px;text-align:center;border:1px solid black;
            width:fit-content;}
          
        a{text-decoration: none;padding:7px 20px;border-radius:5px;background-color:green;color:white;}
        .a2{text-decoration: none;padding:7px 20px;border-radius:5px;background-color:red;color:white;}
        .a3{text-decoration: none;padding:7px 140px;border-radius:5px;background-color:skyblue;color:black;}
        .searchInp{padding:10px;border-radius:10px; width:80%;}
        .searchBtn{padding:7px;border-radius:5px;}
        .a1{width:25%;margin-right:20px;}
        .aa{height:100vh;}
        .nav-link{color:white; border-bottom:1px solid aqua;
            display:block;font-size:20px;padding-top:20px;padding-left:30px;}
            
    </style>
 </head>
 <body>
    <div class="mainn">
    <div class="a1">
    <nav class="navbar" style="background-color: #e3f2fd;"  data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler  bg-dark"type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button></div>
    </nav>
            
        <div class="navbar-collapse bg-primary aa" id="navbarNavAltMarkup">
            
            <ul class="nav flex-column w-25">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">News</a>
                  
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="catagory.php">Catagory</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user.php">Users</a>
                </li>
                
              </ul>
        </div>    
    

</div>
    
    <div>  
 <form action="index.php" method="POST" enctype="multipart/form-data">
<input type="text" class="searchInp" name="searchh" placeholder="Search...">
<input type="submit" class="searchBtn" name="submit" value="submit"></form><br>
    <table>
        <tr>
            <td colspan="6">
            <a class="a3" href="insert.php">Add New</a></td>
        </tr>
        <tr>
        <th>Id</th>
        <th>News Title</th>
        <th>Catagory</th>
        <th>News Img</th>
        <th>News Description</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        
        <?php
        // session_start();
        // if(isset($_SESSION['log'])){

        // }
        // else{
        //     header('Location: adminLogin.php');
        // }
 include 'connectionphp.php';
 if(isset($_POST['submit'])){
    $searchh=$_POST['searchh'];

    $sql1="SELECT * FROM product WHERE name LIKE '%$searchh%';";
    $result1=$con->query($sql1);
    if($result1->num_rows>0){
        while($row1=$result1->fetch_assoc()){
    ?>        
          
         <!-- echo $row6['id'].$row6['email'].$row6['password'].'<br>'; -->


         <tr>
            <td><?php echo $row1['id']; ?></td>
            <td><?php echo $row1['name']; ?></td>
            <td><?php echo $row1['c_id']; ?></td>
            <td><img src="<?php echo $row1['img'] ?>" width="100px" height="100px" alt="no img"></td>
            <td><?php echo substr($row1['description'],0,130)."..."; ?></td>
            <td><a href="up.php?id=<?php echo $row1['id']; ?>">Edit</a></td>
            <td><a class="a2" href="del.php?id=<?php echo $row1['id']; ?>">Delete</a></td>
        </tr>
 <?php 
        }}}
 
 else{
$sql="SELECT * FROM product";
$result=$con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        
        ?>
<tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['c_id']; ?></td>
            <td><img src="<?php echo $row['img'] ?>" width="100px" height="100px" alt="no img"></td>
            <td><?php echo substr($row['description'],0,100)."..."; ?></td>
            <td><a href="up.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a class="a2" href="del.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
<?php        
    }
} 
}
 ?>
    </table>
    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
  crossorigin="anonymous"></script>
 </body>
 </html>