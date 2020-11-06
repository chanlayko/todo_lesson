<?php 
    require_once "confly.php";

    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute(
            array(
                ":title" => $title,
                ":description" => $desc
            )
        );
        if($result){
            echo "<script>alert('New Tobo is Added');window.location.href='index.php';</script>";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/all.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                           <div class="h2">
                               <h2>Todo Home Page</h2>
                           </div>
                           <div>
                               <a href="add.php"><input type="submit" value="Create New Todo" class="btn btn-success"></a>
                           </div><br>
                           <div>
                               <form action="" method="post">
                                   <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                   </div>
                                   <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                   </div>
                                   <div class="">
                                       <a href="#"> <input type="submit" value="Submit" class="btn btn-primary"></a>
                                       <a href="index.php" type="button" class="btn btn-warning">Black</a>
                                   </div>
                               </form>
                           </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>