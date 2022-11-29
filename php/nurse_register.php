<!DOCTYPE html>
<html lang="en">

<head>

  <title>Register</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="logo.png">
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

<?php 	

require_once 'connect.php';
		$specialisation = $qualification ="";
    
    if(isset($_POST['specialisation']) && isset($_POST['qualification']))
    {  
      
		    $specialisation= $_POST["specialisation"];
		    $qualification = $_POST["qualification"];
	
          $servername = "localhost";
		$username = "Ananya13";
		$password = "Ananya@13";
		$dbname = "health";
		  
		 
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	          $val = "SELECT MAX(eid) $myDB.employee";
		  $sql = "INSERT INTO $myDB.nurse (`nid`,`specialisation`,`qualification`) VALUES (`$val`,'$specialisation','$qualification')";
		  $stmt=$conn->prepare($sql);
      $stmt->execute();
		  header("Location:nurse_profile.php"); 
			$conn = null;

		// }
		}	
?>

<!-- -------------------------------------------------------------------- -->

  <div class="mx-12 my-20">

    <div class="sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0 ">
            <h3 class="text-4xl font-medium leading-6 text-red-600">Personal Information</h3>
            <p class="mt-2 text-lg text-gray-800">Fill your personal details </p>
          </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">

          <form class="frm" method="POST">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                                      <label for="first-name" class="block text-sm font-medium text-gray-700">Specialization</label>
                                      <input type="text" name="specialisation" id="specialisation"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" ">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                      <label for="first-name" class="block text-sm font-medium text-gray-700">Qualification</label>
                                      <input type="text" name="qualification" id="qualification"
                                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" ">
                  </div>

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit"
                  class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
