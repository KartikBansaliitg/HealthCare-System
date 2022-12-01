<?php

   require_once 'connect.php';
     $email="";
     $password="";
    
     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         $stmt1 = $conn->query("SELECT * FROM $myDB.employee WHERE email='$email'");
         $val=$stmt1->fetch(PDO::FETCH_ASSOC);
         if($val["pass_wrd"]!=$password)
          {
          header("Location:error.php"); 
          exit();
          }
          else {
             $stmt1 = $conn->query("SELECT * FROM $myDB.doctor D JOIN $myDB.employee E WHERE E.email='$email' AND E.pass_wrd='$password' AND D.eid=E.eid;");
             $data=$stmt1->fetch(PDO::FETCH_ASSOC);
          }
     }

     else
   {    
             $stmt2 = $conn->query("SELECT * FROM $myDB.doctor D JOIN $myDB.employee E ORDER BY D.did DESC LIMIT 1;");
             $data=$stmt2->fetch(PDO::FETCH_ASSOC);
     }
    ?>

    <!DOCTYPE html>
<html lang="en">

<head>

    <title>Profile</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="logo.png">
    <link href="style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex bg-green-100 h-full" x-data="{panel:false, menu:true}">

<?php 	
		$did = $pid = $dname=$issue ==$pres="";
    if(isset($_POST['did']) && isset($_POST['pid']) && isset($_POST['dname']) && isset($_POST['issue']) && isset($_POST['pres']))
    {  
                    $did = $_POST["did"];
		    $pid = $_POST["pid"];
		    $dname = $_POST["dname"];
		    $issue = $_POST["issue"];
                    $pres = $_POST["pres"];
		  
		$servername = "localhost";
		$username = "Ananya13";
		$password = "Ananya@13";
		$dbname = "health";

		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.prescription ('$did', '$pid','$dname', '$issue','$pres')";
		  $stmt2=$conn->prepare($sql);
      $stmt2->execute();
		$conn = null;
    }	
?>

    <aside class="flex flex-col min-h-screen" :class="{'hidden sm:flex sm:flex-col': window.outerWidth > 500}">
        <a href="#" class="inline-flex items-start justify-start pt-2 h-20 w-full bg-white shadow-md">

            <img class="w-14 h-14 mt-2 pl-2"
                src="https://online.iitg.ac.in/tnp/static/media/iitglogo.d364692baec36d70b8ff.png" alt="">
            <h6 class="pt-4 pl-2 text-black font-semibold">Welcome to IITG <br>Hospital Portal</h6>

        </a>

        <div class="flex-grow flex flex-col justify-between text-black bg-white">
            <nav class="flex flex-col mx-12 my-6 space-y-2">

                <a href="d_pharmacy.php"
                    class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2"
                    :class="{'justify-start': menu, 'justify-center': menu == false}">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span class="ml-2" x-show="menu">Pharmacy</span>
                </a>
                <a href="d_pathology.php"
                    class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2"
                    :class="{'justify-start': menu, 'justify-center': menu == false}">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span class="ml-2" x-show="menu">Pathology</span>
                </a>

            </nav>

        </div>
    </aside>
    <div class="flex-grow text-black">
        <header class="flex items-center h-16 px-6 sm:px-10 bg-white shadow-md">
            <div class="flex flex-shrink-0 items-center ml-auto">
                <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                    <h2 id="name" class="text-xl font-semibold text-gray-900"></h2>
                    <div class="border-b"></div>
                </div>
                <div class="border-l pl-3 ml-3 space-x-1">
                    <button
            class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full" onclick="window.location.assign('login.php');">
            <span class="sr-only">Log out</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </button>
                </div>
            </div>
        </header>
        <main class="p-6 sm:p-10 space-y-6">
                <div class="h-full">

                    <div class="border-b-2 block  md:flex">

                        <div class="w-full h-96 md:col-span-4 p-4 sm:p-6 lg:p-8 bg-white rounded-lg shadow-md">
                            <div class="flex justify-between">
                                <span class="text-xl font-semibold block">Doctor's Profile</span>
                                <a href="#"
                                    class="-mt-2 text-md font-bold text-white bg-blue-400 rounded-full px-5 py-2 hover:bg-blue-500">Edit</a>
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Birthday </span>
                                    <h2 id="dob" class="text-xl font-semibold text-gray-900"><?php echo $data['dob']?></h2>
                                    <div class="border-b"></div>
                                </div>
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Age </span>
                                    <h2 id="age" class="text-xl font-semibold text-gray-900"><?php echo $data['age']?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Gender </span>
                                    <h2 id="gender" class="text-xl font-semibold text-gray-900"><?php echo $data['gender']?></h2>
                                    <div class="border-b"></div>
                                </div>
                                
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Email </span>
                                    <h2 id="email" class="text-xl font-semibold text-gray-900"><?php echo $data['email']?></h2>
                                    <div class="border-b"></div>
                                </div>
    
                                <div>
                                    <span class="text-md font-semibold pl-4 block text-gray-400">Contact No </span>
                                    <h2 id="contact" class="text-xl pl-4 font-semibold text-gray-900"><?php echo $data['contact_no']?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Working hours </span>
                                    <h2 id="blood_grp" class="text-xl font-semibold text-gray-900"><?php echo $data['availability']?></h2>
                                    <div class="border-b"></div>
                                </div>
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Work Experience </span>
                                    <h2 id="blood_grp" class="text-xl font-semibold text-gray-900"><?php echo $data['experience']?></h2>
                                    <div class="border-b"></div>
                                </div>
                                
                            </div>
                            
                            
                        </div>

                        

                    </div>

                </div>
<section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                
                        <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 rounded-lg shadow-md">
                            
                                <div class="flex justify-between">
                                  <div>
                                    <h2 class="text-xl font-semibold block">Medical History</h2>
                                  </div>
                                  
                                </div>
                                <div class="p-4 flex-grow">
                                  <div>
                                    <table class="w-full table-auto">
                                      <thead class="border-b">
                                        <tr class=" text-center">
                                          <th class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                                            Patient ID
                                          </th>
                                          <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Patient Name
                                          </th>
                                          <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                            Gender
                                          </th>
                                          <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Issue
                                          </th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>

<?php
 $stmt1 = $conn->query("SELECT * FROM $myDB.appointment WHERE did=$data['did']");
 while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC)) {
      ?> 
       
 		<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['pid'];?>
 		</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['name'];?>
 		</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['gender']; ?>
 		</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['issue']; ?>
</td></tr>
<?php } ?>
                                    </table>
                                  </div>
                                </div>
                        </div>
                    </div>
                </div>

            </section>

        </main>
    </div>


 <div class="flex flex-col md:col-span-4 bg-white shadow rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="px-6 py-5 text-xl font-semibold block  border-gray-100">Write Prescription</h2>
                        </div>
                        
                    </div>
                    <div class="p-4 flex-grow">
                        <div>
                        <form class="frm" method="POST">

            <div class="overflow-hidden shadow sm:rounded-md">
              <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                  <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor's ID</label>
                    <input type="text" name="did" id="did"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here">
                  </div>

                 <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Patient's ID</label>
                    <input type="text" name="pid" id="pid"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor's Name</label>
                    <input type="text" name="dname" id="dname"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Issue</label>
                    <input type="text" name="issue" id="issue"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Prescription</label>
                    <input type="text" name="pres" id="pres"
                      class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" Enter here">
                  </div>

                 <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit"
                  class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
              </div>

		</form>
		</div>
		</div>
</body>
</html>
