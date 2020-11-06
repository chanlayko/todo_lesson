<?php 
    require "confly.php";

    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $id = $_POST['id'];
        
        $pdostatement = $pdo -> prepare("UPDATE todo SET title='$title',description='$desc' WHERE id=$id");
        $result = $pdostatement -> execute();
        if($result){
            echo "<script>alert('New Tobo is Updated');window.location.href='index.php';</script>";
        }
    }else{
        $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdostatement -> execute();
        $result = $pdostatement -> fetchAll();
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
                               <h2>Update New Page</h2>
                           </div>
                           <div>
                               <a href="add.php"><input type="submit" value="Create New Todo" class="btn btn-success"></a>
                           </div><br>
                           <div>
                               <form action="" method="post">
                                  <input type="hidden" name="id" value="<?php echo $result[0]['id']; ?>">
                                   <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $result[0]['title']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $result[0]['description']; ?></textarea>
                                   </div>
                                   <div class="">
                                       <a href="#"> <input type="submit" value="Update" class="btn btn-primary"></a>
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