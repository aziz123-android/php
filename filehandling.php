<?php
$conn = mysqli_connect("localhost", "root", "", "filehandling");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"])) {
        $name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $size = $_FILES["image"]["size"];
        $full_path = $_FILES["image"]["full_path"];

        $upload = move_uploaded_file($tmp_name, "uploaded-images/" . $full_path);
        $sql = "INSERT INTO files (Tmp_Name, Full_Path, File) VALUES ('$tmp_name', '$full_path', '$upload')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "<script>alert('Upload successfully')</script>";
        }else {
            echo "failed";
        }
    }
}

// handle cv
if (isset($_FILES["cv"])) {
    $cv_name = $_FILES["cv"]["name"];
    $cv_tmp_name = $_FILES["cv"]["tmp_name"];
    $cv_size = $_FILES["cv"]["size"];
   

    $upload = move_uploaded_file($tmp_name, "uploaded-cv/" . $full_path);
    $sql = "INSERT INTO files (Tmp_Name, Full_Path, File) VALUES ('$tmp_name', '$full_path', '$upload')";
    $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "<script>alert('CV uploaded successfully.');</script>";
        } else {
            echo "<script>alert('Failed to upload CV.');</script>";
        }
    } else {
        echo "<script>alert('Failed to move the CV file.');</script>";
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Assigment</title>
    <style>
        body {
            background-color: #B7B7B7;    
        }
        .container{
            background-color: #fff;
    padding: 40px;
    border-radius: 5px;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0px 0px 10px 0px #aaa;
    margin-top: 10%;
        }
        .file-input{
            margin-bottom: 10px;
            

        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
<form action="filehandling.php" method="post" enctype="multipart/form-data">
       image upload <input type="file" name="image" class="file-input"><br><br>
        cv  upload <input type="file" name="cv" class="file-input"><br><br>
        <input type="submit" value="Submit" class="submit-btn">
    </form>
    </div>
</body>
</html>