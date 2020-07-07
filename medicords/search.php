<!DOCTYPE html>
<html>
<head>
	<title>Search Patient</title>
<link rel="stylesheet" type="text/css" href="conn.css">
</head>
<body>
<center>

		<form action="" method="POST" enctype="multipart/form-data">

				Search Patient:<input type="text" name="search">

				<input type="submit" name="Search Patient">
		
		</form>

<div> 

<form action="" method="POST">

		<table>
					<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Date of Birth</th>
								<th>Residence</th>
								<th>Sex</th>
								<th>Blood group</th>
								<th>Genotype</th>
								<th>Allergies</th>
								<th>Disabilities</th>
								<th>Weight</th>
								<th>Height</th>
							</tr>
					</thead>

<?php  

ini_set('short_open_tag', 'on');


				$servername = "localhost";
				$username = "root";
				$password = "";
					$conn = mysqli_connect($servername, $username, $password);
					$dbname = mysqli_select_db($conn,'hospital1');




				$servername2 = "localhost";
				$username2 = "root";
				$password2 = "";
					
				$conn2 = mysqli_connect($servername2, $username2, $password2);

				$dbname2 = mysqli_select_db($conn2,'hospital2');

				



	if($_SERVER["REQUEST_METHOD"] == "POST"){




				     if(empty(trim($_POST['search']))){

					//if(empty(trim($_POST['search']))) WILL PRODUCE AN ERROR MESSAGE WITHOUT ($_SERVER["REQUEST_METHOD"]== "POST")

					//if(empty(trim($_POST['search']))) is to prevent submitting results without inputting anything into the text-field.

					echo " <h1> NO SEARCH QUERY! </h1> ";

				} 



					elseif(isset($_POST['search'])){


					$searchq = $_POST['search'];

					$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);



					$query = "SELECT * FROM patient WHERE FirstName LIKE '%$searchq%' OR LastName LIKE'%$searchq%'";

					$query_r = mysqli_query($conn,$query);

					$count = mysqli_num_rows($query_r);




					$query2 = "SELECT * FROM patient WHERE FirstName LIKE '%$searchq%' OR LastName LIKE'%$searchq%'";

					$query_result2 = mysqli_query($conn2,$query2);

					$count2 = mysqli_num_rows($query_result2);


					




					if($count == 0 && $count2==0){

						echo "No records found";

					}else{

						while ($row=mysqli_fetch_assoc($query_r)) {
			?>
			<tr>
				<td> <a href="<?=$url?>"> <?php echo $row['ID']; ?>  </a> </td>
				<td> <?php echo $row['FirstName']; ?> </td>
				<td> <?php echo $row['LastName']; ?> </td>
				<td> <?php echo $row['Date_of_birth']; ?> </td>
				<td> <?php echo $row['Residence']; ?> </td>
				<td> <?php echo $row['Sex']; ?> </td>
				<td> <?php echo $row['Blood_group']; ?> </td>
				<td> <?php echo $row['Genotype']; ?> </td>
				<td> <?php echo $row['Allergies']; ?> </td>
				<td> <?php echo $row['Disabilities']; ?> </td>
				<td> <?php echo $row['Weight']; ?> </td>
				<td> <?php echo $row['Height']; ?> </td>
			</tr>

			

			<?php  

			$url="patientrecord.php?ID=".$row['ID'];



		}
	}


				/*$fname=array();*/

			while ($row2=mysqli_fetch_assoc($query_result2)) {

			?>

			<tr>

				<td> <?php echo $row2['ID']; ?> </td>
				<td> <?php echo $fname[] = $row2['FIRSTNAME']; ?> </td>
				<td> <?php echo $row2['LASTNAME']; ?> </td>
				<td> <?php echo $row2['DATE OF BIRTH']; ?> </td>
				<td> <?php echo $row2['RESIDENCE']; ?> </td>
				<td> <?php echo $row2['SEX']; ?> </td>
				<td> <?php echo $row2['BLOOD GROUP']; ?> </td>
				<td> <?php echo $row2['GENOTYPE']; ?> </td>
				<td> <?php echo $row2['ALLEGIES']; ?> </td>
				<td> <?php echo $row2['DISABILITIES']; ?> </td>
				<td> <?php echo $row2['WEIGHT']; ?> </td>
				<td> <?php echo $row2['HEIGHT']; ?> </td>

			</tr>

			<?php

		/*	 	
			 	$final= $fname;

		for ($i=0; $i <1 ; $i++) { 
		echo $final[0];*/
	/*}*/
			 




		}

	}
				
}


?>

</table>

		</form>
				
				</center>
</body>
</html>