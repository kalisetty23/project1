<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
?>

<html>
<head>
	<title>Daily Report | Employee Panel | SR Automations</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body bgcolor="#F0FFFF">
	
	<header>
		<nav>
			<h1>SR Automations</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="dailyreport.php?id=<?php echo $id?>"">Daily Report</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id?>"">weekly Report</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>  
	</header>
	 
	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Daily Report</h2>
                    <form action="process/dailyupdatesprocess.php?id=<?php echo $id?>" method="POST">


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Service Type*" name="Service type">
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Application name" name="Application_name">
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="location" name="location">
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="customer name" name="customer_name">
						</div>
						<div class="input-group">
						<label for="input--style-1">work done</label>
						<textarea class="input--style-1" name="w3review" rows="2" cols="70">
  
 							 </textarea> </div>
							  <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="problem" name="problem">
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="service report" name="service_report">
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="paid/unpaid" name="paid/unpaid">
						</div>


						
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start">
                                   
                                </div>
                            </div>
                          
                            
                        </div>
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
















	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>


			<?php


				$sql = "Select employee.id, employee.firstName, employee.lastName, daily_updates.start, daily_updates.end, daily_updates.reason, daily_updates.status From employee, daily_updates Where employee.id = $id daily_updates.id = $id order by daily_updates.token";
				$result = mysqli_query($conn, $sql);
				while ($employee = mysqli_fetch_assoc($result))
				 {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					
				}


					?>


		</table>







</body>
</html>