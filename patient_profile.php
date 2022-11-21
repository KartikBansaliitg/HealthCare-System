<?php

   require_once 'connect.php';
     $email="";
     $password="";
    
     if(isset($_POST['email']) && isset($_POST['password']))
     {   
         $email=$_POST["email"];
         $password=$_POST["password"];
         
         $stmt1 = $conn->query("SELECT pass_wrd FROM $myDB.patient WHERE email='$email'");
         $val=$stmt1->fetch(PDO::FETCH_ASSOC);
         if($val["pass_wrd"]!=$password)
          {
          header("Location:error.php"); 
          exit();
          }
          else {
             $stmt1 = $conn->query("SELECT * FROM $myDB.patient WHERE email='$email' AND pass_wrd='$password';");
             $data=$stmt1->fetch(PDO::FETCH_ASSOC);
          }
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

<body class="flex bg-blue-100 h-full" x-data="{panel:false, menu:true}">

<?php 	
		$pid = $did = $issue ="";
    if(isset($_POST['pid']) )
    {  
      echo "reached";
        $pid = $_POST["pid"];
		    $did = $_POST["did"];
		    $issue = $_POST["issue"];
		  
		$servername = "localhost";
		$username = "Ananya13";
		$password = "Ananya@13";
		$dbname = "health";

		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $sql = "INSERT INTO $myDB.appointment (`pid`,`did`,`issue`)VALUES('$pid', '$did', '$issue')";
		  $stmt2=$conn->prepare($sql);
      $stmt2->execute();
		$conn = null;
    }	
?>

    <aside class="flex flex-col" :class="{'hidden sm:flex sm:flex-col': window.outerWidth > 500}">
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


<!-- -------------------------------------------navbar------------------------------------------------------------------------ -->
    <div class="flex-grow text-black">
        <header class="flex items-center h-16 px-6 sm:px-10 bg-white shadow-md">
            <div class="flex flex-shrink-0 items-center ml-auto">
                <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                    <div>
                                    <h2 id="name" class="text-lg font-semibold text-gray-900"><?php echo $data['name'];?></h2>
                                    <div class="border-b"></div>
                                </div>
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

    
<!-- -------------------------------------------profile------------------------------------------------------------------------ -->
                <div class="h-full">

                    <div class="border-b-2 block  md:flex">

                        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white rounded-lg shadow-md">
                            <div class="flex mb-2 justify-between">
                                <span class="text-xl font-semibold block">Patient Profile</span>
                                <h2 id="name" class="text-xl font-semibold text-gray-600"><?php echo $data['pid'];?></h2>
                            </div>

                
                            <div class="flex flex-row space-x-36 pl-6">
                                
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Birthday </span>
                                    <h2 id="DOB" class="text-md font-semibold text-gray-900"><?php echo $data['dob'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Age </span>
                                    <h2 id="age" class="text-md font-semibold text-gray-900"><?php echo $data['age'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-40 pl-6">
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Gender </span>
                                    <h2 id="gender" class="text-md font-semibold text-gray-900"><?php echo $data['gender'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Blood Group </span>
                                    <h2 id="blood_grp" class="text-md font-semibold text-gray-900"><?php echo $data['blood_group'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Email </span>
                                    <h2 id="email" class="text-md font-semibold text-gray-900"><?php echo $data['email'];?></h2>
                                    <div class="border-b"></div>
                                </div>
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Contact No </span>
                                    <h2 id="contact" class="text-md font-semibold text-gray-900"><?php echo $data['contact_no'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-44 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Course </span>
                                    <h2 id="course" class="text-md font-semibold text-gray-900"><?php echo $data['course'];?></h2>
                                    <div class="border-b"></div>
                                </div>
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Hostel </span>
                                    <h2 id="hostel" class="text-md font-semibold text-gray-900"><?php echo $data['hostel'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>
                            
                        </div>

<!-- -------------------------------------------medical history------------------------------------------------------------------------ -->

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
                                            Issue
                                          </th>
                                          <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Treated by
                                          </th>
                                          <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                            Date
                                          </th>
                                          <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Medicines
                                          </th>
                                          <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                           Test
                                          </th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="text-dark   bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Fever
                                          </td>
                                          <td class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Kartik
                                          </td>
                                          <td class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            03.11.2022
                                          </td>
                      
                                          <td class="text-dark   bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Dolo
                                          </td>
                                          
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                        </div>
                    </div>
                </div>

            <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">

<!-- -------------------------------------------appointments------------------------------------------------------------------------ -->
                <div class="flex flex-col md:col-span-4 bg-white shadow rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="px-6 py-5 text-xl font-semibold block  border-gray-100">Available Appointment</h2>
                        </div>
                        
                    </div>
                    <div class="p-4 flex-grow">
                        <div>
                 <table class="w-full table-auto">
                                <thead class="border-b">
                                    <tr class=" text-center">
                                        <th
                                            class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                                            Doctor's Name
                                        </th>
                                        <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Specialization
                                        </th>
                                        <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Time
                                        </th>
                                        <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Book Appointments
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
 $stmt1 = $conn->query("SELECT * FROM $myDB.doctor");
 while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC)) {
      ?> 
       
 		<tr> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['name'];?>
 		</td> <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['availability'];?>
 		</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<?php echo $row1['specialisation']; ?>
 		</td><td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
 		<button class="mybtn border-primary text-primary bg-green-500 hover:bg-primary inline-block rounded border py-2 px-6 hover:text-white" data-pid="<?php echo $data['pid']; ?>" data-did="<?php echo $row1['did'];?>" data-issue="<?php echo $row1['specialisation'];?>" >Fix Appointment</button>
</td></tr>
<?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


<!-- <----------------------------------hidden form------------------------------------------->
            <section id="mysection" class="hidden">
                <div class="flex flex-col md:col-span-1 md:row-span-2 bg-white shadow rounded-lg">
                    <div class="mx-12 my-20">
                        <div class="sm:mt-0">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                        
                                <div class="mt-5 md:col-span-2 md:mt-0">

                                    <form  class=" max-h-full" method="POST" >
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Patient's ID</label>
                                            <input type="text" name="pid" id="pid"
                                            class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor's ID</label>
                                            <input type="text" name="eid" id="eid"
                                            class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Related Issue</label>
                                            <input type="text" name="issue" id="issue"
                                            class="mt-1 block w-full h-12 rounded-md border-2 shadow-sm" placeholder=" your name">
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-500 ">Confirm</button>
                                        </div>
                                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
        </main>
    </div>


<!-- <------------------------------------------hidden form---------------------------------------->
 
</body>

<script src="jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
     $('.mybtn').click(function(){

         $("#pid").val($(this).data("pid"));
         $("#did").val($(this).data("did"));
         $("#issue").val($(this).data("issue"));
         $('#mysection').removeClass('hidden');
         
        
     });
    });
</script>

</html>
