<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ToDo List - StudentGiri</title>
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
*{
	font-style: italic;
}
body{
	background: #E9897E;
	width: 100%;
}
.table_heading:hover{
	background: white;
	color: black;
}
.table_body:hover{
	background: white;
	color: black;
}
</style>
<body>
	<!-- container-fluid start -->
	<div class="container-fluid">
		<!-- container start -->
		<div class="container"><br>
			<div class="row rounded shadow-lg" style="margin-top: 150px; background: url('https://s1.favim.com/orig/151023/background-beautiful-bg-midnight-Favim.com-3470211.jpg');">
			<div class="col-md-12">
			<div class="row p-3 rounded">
				<div class="col-md-12">
					<form method="post" action="task_insert.php" onsubmit="return validation()">
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-white text-center pt-3">StudentGiri</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<input type="text" name="task" placeholder="Type here..." class="form-control" id="task">
								<span id="v_task" class="text-white"></span>
							</div>
							<div class="col-md-2">
								<button class="btn btn-info" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-md-5">
				</div>
				<div class="col-md-2">
					<?php
					include "dbcon.php";
					$q = "select * from studentgiri_table";
					$p = mysqli_query($con,$q);
					$f = mysqli_fetch_array($p);
					$numrows = mysqli_num_rows($p);
					?>
					<h2 class="text-center text-white">Total Tasks</h2>
					<textarea class="form-control text-center" style="font-size: 30px;" readonly><?php echo $numrows ?></textarea>
				</div>
				<div class="col-md-5">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered text-white">
						<thead class="text-center">
							<th class="table_heading">ID</th>
							<th class="table_heading">Task</th>
							<th class="table_heading">Action</th>
						</thead>
						<?php
						include "dbcon.php";
						$q2 = "select * from studentgiri_table order by id desc";
						$p2 = mysqli_query($con,$q2);
						while ($f2 = mysqli_fetch_array($p2)){
						?>
						<tbody class="text-center">
							<td class="table_body"><?php echo $f2['id'] ?>.</td>
							<td class="table_body"><?php echo $f2['task'] ?></td>
							<td class="table_body">
								<a href="delete.php?v=<?php echo $f2['id'] ?>" class="btn" style="font-size: 30px; color: red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tbody>
						<?php
					    }
						?>
						<tfoot class="text-center">
							<th class="table_heading">ID</th>
							<th class="table_heading">Task</th>
							<th class="table_heading">Action</th>
						</tfoot>
					</table>
				</div>
			</div>
		    </div>
		    </div>
		</div>
		<!-- container end -->
	</div>
	<!-- container-fluid end -->


	<script>
		function validation() {
			var task = document.getElementById('task').value;

			if (task=="") {
				document.getElementById('v_task').innerHTML="** This Field can't be empty !! **";
				return false;
			}
		}
	</script>

</body>
</html>