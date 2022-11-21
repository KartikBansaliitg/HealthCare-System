<!DOCTYPE html>

<html lang="en">

<head>

    <title>Pharmacy</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link href="style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <!-- <------------------------------php----------------------------->

    <?php 	

require_once 'connect.php';
$servername = "localhost";
$username = "Ananya13";
$password = "Ananya@13";
$dbname = "health";

$stmt1 = $conn->query("SELECT * FROM $myDB.medicine");
	
  echo '<div class="px-4 mt-12 ml-8">
        <h3 class="text-4xl font-medium leading-6 text-red-600">Pharmacy</h3>
    </div>
    <div class="p-8 md:col-span-2  md:mt-0">
        <div>
        <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-700 h-24 text-center">

                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine id
                        </th>

                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Name
                        </th>
                        <th class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Company Name
                        </th>
                        <th
                            class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                            Medicine Cost
                        </th>
                    </tr>
                </thead>
                <tbody>';
    
                while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['mid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['med_name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['med_cost'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['company'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";


		$name = $cost = $company = "";
    
    // echo "reached";

		// if(isset($_POST['name']) && isset($_POST['dob']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['hostel']) && isset($_POST['covid']) && isset($_POST['blood_group']) && isset($_POST['issue']) && isset($_POST['number']) && isset($_POST['password'])) 
    if(isset($_POST['name']) )
    {  
            $name = $_POST["name"];
		    $cost = $_POST["cost"];
		    $company = $_POST["company"];

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
		  $sql = "INSERT INTO $myDB.medicine (`med_name`,`med_cost`,`company`)VALUES('$name', '$cost', '$company')";
		  // use exec() because no results are returned
		  $stmt=$conn->prepare($sql);
      $stmt->execute();
		  // echo "New record created successfully";
		 header("Location:pharmacy.php"); 
            exit();

		// }
		}	
?>


  <!-- <------------------------------php----------------------------->
    <!-- ------------------Medicine Form---------------- -->
    <div class="mx-12 my-20">

        <div class="sm:mt-0">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0 ">
                <h3 class="text-4xl font-medium leading-6 text-red-600">Add Medicine</h3>
                <p class="mt-2 text-lg text-gray-800">Use a permanent address where you can receive mail.</p>
              </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
    
    
    
              <form class="frm" method="POST">
    
                <div class="overflow-hidden shadow sm:rounded-md">
                  <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
    
    
    
                      <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="cost" class="block text-sm font-medium text-gray-700">Cost</label>
                        <input type="number" name="cost" id="cost"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="Enter cost">
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                        <input type="text" name="company" id="company"
                          class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Company name">
                      </div>
    
                      
    
                    </div>
                  </div>
                </div>
                
    
            </div>
          </div>
        </div>
    
        
        <div class="text-dark  border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
            <button
                class="border-primary text-primary bg-green-500 hover:bg-primary inline-block rounded border py-2 px-6 hover:text-white">
                Add medicine
        </button>
        </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    


</body>

</html>