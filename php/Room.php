<!DOCTYPE html>

<html lang="en">

    <head>

        <title>Room</title>

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
   
 $stmt1 = $conn->query("SELECT * FROM $myDB.room");

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
                                Room id
                            </th>
                        
                            <th
                                class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Room Name
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                               Room Cost
                            </th>
                            
                        </tr>';
  echo 	'</thead>';
  echo 	'<tbody>';
	while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['rid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['r_name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['r_cost'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";


		$id=$name = $cost ="";
  
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['cost']) )
    {  
            $name = $_POST["name"];
		    $cost = $_POST["cost"];
		$id = $_POST["id"];

		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.book_room (`rid`,`r_name`,`r_cost`)VALUES('$id','$name', '$cost')";
		  // use exec() because no results are returned
		  $stmt=$conn->prepare($sql);
      $stmt->execute();

      header("Location:room.php"); 
            exit();
		// }
		}	
?>


  <!-- <------------------------------php----------------------------->

        <div class="mx-12 my-20">

            <div class="sm:mt-0">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                  <div class="px-4 sm:px-0 ">
                    <h3 class="text-4xl font-medium leading-6 text-red-600">Book Room</h3>
                    <p class="mt-2 text-lg text-gray-800">Fill the details accurately.</p>
                  </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
        
        
        
                  <form class="frm" method="POST">
        
                    <div class="overflow-hidden shadow sm:rounded-md">
                      <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
        
        
                         <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Room ID</label>
                            <input type="text" name="id" id="id"
                              class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" rid">
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Room name</label>
                            <input type="text" name="name" id="name"
                              class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                            <label for="first-cost" class="block text-sm font-medium text-gray-700">Cost</label>
                            <input type="number" name="cost" id="cost"
                              class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="Enter cost">
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
                    Book room
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