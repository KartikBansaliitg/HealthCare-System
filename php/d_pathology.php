<!DOCTYPE html>

<html lang="en">

    <head>

        <title>Pathology</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" type="image/x-icon" href="logo.png">
        <link href="style.css" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>

        <?php 	

require_once 'connect.php';
		
$servername = "localhost";
$username = "Ananya13";
$password = "Ananya@13";
$dbname = "health";
   
 $stmt1 = $conn->query("SELECT * FROM $myDB.test");

 echo '<div class="px-4 mt-12 ml-8">
            <h3 class="text-4xl font-medium leading-6 text-red-600">Pathology</h3>
        </div>
        <div class="p-8 md:col-span-2 md:mt-0">
        <div>';
        
echo '<table class="w-full table-auto">
                    <thead>';

	echo '<tr class="bg-blue-700 h-24 text-center">
                            
                            <th
                                class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Test id
                            </th>
                        
                            <th
                                class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Test Name
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Test Cost
                            </th>
                            
                        </tr>';
  echo 	'</thead>';
  echo 	'<tbody>';
	while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['tid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['t_name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['t_cost'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";


		$name = $cost ="";
    
    // echo "reached";

		// if(isset($_POST['name']) && isset($_POST['dob']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['hostel']) && isset($_POST['covid']) && isset($_POST['blood_group']) && isset($_POST['issue']) && isset($_POST['number']) && isset($_POST['password'])) 
    if(isset($_POST['name']) )
    {  
            $name = $_POST["name"];
		    $cost = $_POST["cost"];

		    // if (strlen($_POST["pass"]) <= 8){
		    //     $passErr = "Your Password Must Contain At Least 8 Characters!";
		    // }
		    // elseif(!preg_match("#[0-9]+#",$pass)){
		    //     $passErr = "Your Password Must Contain At Least 1 Number!";
		    // }
		    // elseif(!preg_match("#[A-Z]+#",$pass)){
		    //     $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
		    // }
		    // elseif(!preg_match("#[a-z]+#",$pass)){
		    //     $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
		    // } 
		    // elseif( ($_POST["pass"] != $_POST["cpass"]) ) {
		    //     $cpassErr = "Please Check You've Entered Or Confirmed Your Password!";
		    // }
		    // else{    
				

		  // set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.test (`t_name`,`t_cost`)VALUES('$name', '$cost')";
		  // use exec() because no results are returned
		  $stmt=$conn->prepare($sql);
      $stmt->execute();

      header("Location:pathology.php"); 
            exit();
		// }
		}	
?>

    </body>

</html>