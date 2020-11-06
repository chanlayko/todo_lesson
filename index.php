<?php 
    require "confly.php";
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
<?php 
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
    ?>
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
                               <a href="add.php"><input type="submit" value="Create New" class="btn btn-success"></a>
                           </div><br>
                            <table class="table table-bordered table-striped table-hover">
                                <thand>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Create</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </thand>
                                <tbody>
                                   <?php 
                                        $i = 1;
                                        if($result){
                                            foreach ($result as $value){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['title']; ?></td>
                                            <td><?php echo $value['description']; ?></td>
                                            <td><?php echo date("Y-m-d",strtotime($value['date'])); ?></td>
                                            <td class="text-center"><a href="edit.php?id=<?php echo $value['id']; ?>"
                                            ><input type="submit" class="btn btn-primary" value="Edit"></a></td>
                                            <td class="text-center"><a href="delete.php?id=<?php echo $value['id']; ?>"><input type="submit" class="btn btn-danger" value="Delete"></a></td>
                                        </tr>
                                        <?php
                                            $i ++;
                                            }
                                        }
                                    
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
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