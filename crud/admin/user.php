
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
        table,th,td{border:1px solid black;border-collapse:collapse;padding: 10px 40px;text-align:center;}
        a{text-decoration: none;padding:7px 20px;border-radius:5px;background-color:green;color:white;}
        .a2{text-decoration: none;padding:7px 20px;border-radius:5px;background-color:red;color:white;}
        .a3{text-decoration: none;padding:7px 140px;border-radius:5px;background-color:skyblue;color:black;}
        .searchInp{padding:10px;border-radius:10px;width:70%;}
        .searchBtn{padding:7px;border-radius:5px;}    
        .mainn{display:flex;flex-direction:row;}
        .a1{width:25%;margin-right:60px;}
        .aa{height:100vh;}
        .nav-link{color:white; border-bottom:1px solid aqua;display:block;
            font-size:20px;padding-top:20px;padding-left:30px;}
    
    </style>
</head>
<body>
<div class="mainn">
    <div class="a1">
    <nav class="navbar" style="background-color: #e3f2fd;" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler bg-dark"type="button" data-bs-toggle="collapse"
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
<form action="user.php" method="POST" enctype="multipart/form-data">
<input type="text" class="searchInp" name="search" placeholder="Search...">
<input type="submit" class="searchBtn" name="submit" value="submit"></form><br>
    <table>
    <tr>
    <td colspan="5"><a class="a3" href="add.php">Add</a></td>
</tr>

    <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr> 

    <?php
include 'connectionphp.php';

if(isset($_POST['submit'])){
    $search=$_POST['search'];

    $sql6="SELECT * FROM admin WHERE email LIKE '$search%';";
    $result6=$con->query($sql6);
    if($result6->num_rows>0){
        while($row6=$result6->fetch_assoc()){
    ?>        
          
         <!-- echo $row6['id'].$row6['email'].$row6['password'].'<br>'; -->


         <tr>
            <td><?php echo $row6['id']; ?></td>
            <td><?php echo $row6['email']; ?></td>
            <td><?php echo $row6['password']; ?></td>
            <td><a href="edit.php?id=<?php echo $row6['id']; ?>">Edit</a></td>
            <td><a class="a2" href="delete.php?id=<?php echo $row6['id']; ?>">Delete</a></td>
        </tr>
<?php
        }
    }
}
else{
$sql="SELECT * FROM admin";
$result=$con->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
 
?>

        
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a class="a2" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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


