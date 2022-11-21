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
		$name = $dob = $gender=$age = $number = $email= $address = $experience = $working = $password = $specialisation = $qualification="";
    
    if(isset($_POST['name']) )
    {  
      
        $name = $_POST["name"];
		    $dob = $_POST["dob"];
		    $gender = $_POST["gender"];
		    $age = $_POST["age"];
		    $email = $_POST["email"];
		    $number = $_POST["number"];
		    $working = $_POST["working"];
		    $experience = $_POST["experience"];
		    $specialisation= $_POST["specialisation"];
		    $qualification = $_POST["qualification"];
		    $password = $_POST["password"];

		   
        
          $servername = "localhost";
		$username = "Ananya13";
		$password = "Ananya@13";
		$dbname = "health";
		  
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.doctor (`name`,`dob`,`gender`,`age`,`email`,`contact_no`,`availability`,`experience`,`specialisation`,`qualification`,`pass_wrd`) VALUES ('$name', '$dob','$gender', '$age', '$email', '$number', '$working','$experience','$specialisation','$qualification','$password')";
		  $stmt=$conn->prepare($sql);
      $stmt->execute();
		  header("Location:doctor_login.php"); 
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
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of birth</label>
                    <input type="date" name="dob" id="dob" class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm">
                  </div>

                 <div class="col-span-6 sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" name="gender" autocomplete="gender"
                      class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option>Select an option</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" id="age"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact No</label>
                    <input type="number" name="number" id="number"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder="1234567890">
                  </div>
        
                  

                  <div class="col-span-6 sm:col-span-3">
                    <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                    <input type="number" name="experience" id="experience"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="working" class="block text-sm font-medium text-gray-700">Working Hours</label>
                    <select id="working" name="working"
                      class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option>Select an option</option>
                      <option>Morning(6am-2pm)</option>
                      <option>Evening(2pm-10pm)</option>
                      <option>Night(10pm-6am)</option>
                    </select>
                  </div>
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
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-4xl font-medium leading-6 text-red-600">For Login purposes</h3>
            <p class="mt-2 text-lg text-gray-800">Set a secure password.</p>
          </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <fieldset>
                  <div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="email-address" class="block text-sm font-medium text-gray-700">Outlook Id</label>
                      <input type="text" name="email" id="email" autocomplete="email"
                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" example123@iitg.ac.in">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                      <input type="password" name="password" id="password"
                        class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" ********">
                    </div>
                  </div>
                </fieldset>
              </div>
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
