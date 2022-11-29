<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Employees</title>
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
   
 $stmt1 = $conn->query("SELECT * FROM $myDB.employee");

 echo '<div class="px-4 mt-12 ml-8">
            <h3 class="text-4xl font-medium leading-6 text-red-600">Employees</h3>
        </div>
        <div class="p-8 md:col-span-2 md:mt-0">
        <div>';
        
echo '<table class="w-full table-auto">
                    <thead>';

	echo '<tr class="bg-blue-700 h-24 text-center">
                            
                            <th
                                class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Employee id
                            </th>
                        
                            <th
                                class="text-dark  border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Name
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Gender
                            </th>
                            <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Role
                            </th>
                             <th
                                class="text-dark border-b border-l border-[#E8E8E8] bg-blue-600 py-5 px-2 text-center text-base font-medium">
                                Joining date
                            </th>
                            
                            
                        </tr>';
  echo 	'</thead>';
  echo 	'<tbody>';
	while ($row=$stmt1->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['eid'];
		echo '</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['name'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['gender'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['role'];
		echo '</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">';
		echo $row['joining_date'];
	echo "</td></tr>";
}
 echo 	'</tbody>';
echo 	"</table>";
echo "</div>";
echo "</div>";

?>
          
    </body>

</html>