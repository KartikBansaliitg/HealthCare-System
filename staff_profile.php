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

<body class="flex bg-purple-200 h-full" x-data="{panel:false, menu:true}">
    <aside class="flex flex-col" :class="{'hidden sm:flex sm:flex-col': window.outerWidth > 500}">
        <a href="#" class="inline-flex items-start justify-start pt-2 h-20 w-full bg-white shadow-md">

            <img class="w-14 h-14 mt-2 pl-2"
                src="https://online.iitg.ac.in/tnp/static/media/iitglogo.d364692baec36d70b8ff.png" alt="">
            <h6 class="pt-4 pl-2 text-black font-semibold">Welcome to IITG <br>Hospital Portal</h6>

        </a>

        <div class="flex-grow flex flex-col justify-between text-black bg-white">
            <nav class="flex flex-col mx-12 my-6 space-y-2">

                <a href="#"
                    class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2"
                    :class="{'justify-start': menu, 'justify-center': menu == false}">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span class="ml-2" x-show="menu">Pharmacy</span>
                </a>
                <a href="#"
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
                        class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
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

            <!-- <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6"> -->
                <!-- component -->
                <!-- This is an example component -->

                <div class="h-full">

                    <div class="border-b-2 block  md:flex">

                        <div class="w-full md:col-span-4 p-4 sm:p-6 lg:p-8 bg-white rounded-lg shadow-md">
                            <div class="flex justify-between">
                                <span class="text-xl font-semibold block">Doctor Profile</span>
                                <a href="#"
                                    class="-mt-2 text-md font-bold text-white bg-blue-400 rounded-full px-5 py-2 hover:bg-blue-500">Edit</a>
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Birthday </span>
                                    <h2 id="dob" class="text-xl font-semibold text-gray-900"><?php echo ['dob'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Age </span>
                                    <h2 id="age" class="text-xl font-semibold text-gray-900"><?php echo ['age'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                            <div class="flex flex-row space-x-40 pl-6">
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Gender </span>
                                    <h2 id="gender" class="text-xl font-semibold text-gray-900"><?php echo ['gender'];?></h2>
                                    <div class="border-b"></div>
                                </div>

                                
                            </div>

                            <div class="flex flex-row space-x-36 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Email </span>
                                    <h2 id="email" class="text-xl font-semibold text-gray-900"><?php echo ['email'];?></h2>
                                    <div class="border-b"></div>
                                </div>
    
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Contact No </span>
                                    <h2 id="contact" class="text-xl font-semibold text-gray-900"><?php echo ['contact_no'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>

                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Work Experience </span>
                                    <h2 id="hostel" class="text-xl font-semibold text-gray-900"><?php echo ['experience'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>
                            <div class="flex flex-row space-x-40 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Working Hours </span>
                                    <h2 id="blood_grp" class="text-xl font-semibold text-gray-900"><?php echo ['availability'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>
                            <div class="flex flex-row space-x-40 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Qualification </span>
                                    <h2 id="blood_grp" class="text-xl font-semibold text-gray-900"><?php echo ['qualification'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>
                            <div class="flex flex-row space-x-40 pl-6">
                                <div>
                                    <span class="text-md font-semibold block text-gray-400">Specialization </span>
                                    <h2 id="blood_grp" class="text-xl font-semibold text-gray-900"><?php echo ['specialization'];?></h2>
                                    <div class="border-b"></div>
                                </div>
                            </div>
                        </div>

                        

                    </div>

                </div>

            <!-- </section> -->
            <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                <div class="flex flex-col md:col-span-4 md:row-span-1 bg-white shadow rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="px-6 py-5 text-xl font-semibold block  border-gray-100">Recent Appointment</h2>
                        </div>
                        
                    </div>
                    <div class="p-4 flex-grow">
                        <div>

                            <!-- ====== Table Section Start -->

                            <table class="w-full table-auto">
                                <thead class="border-b">
                                    <tr class=" text-center">
                                        <th
                                            class="text-dark   bg-white   py-5 px-2 text-center text-gray-600 font-bold">
                                            Patients's Name
                                        </th>
                                        <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Gender
                                        </th>
                                        <th class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-bold">
                                            Issue
                                        </th>
                                        
                                        <th class="text-dark   bg-white  py-5 px-2 text-center text-gray-600 font-bold">
                                            Appointments
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td
                                            class="text-dark   bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Kartik Bansal
                                        </td>
                                        <td
                                            class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Male
                                        </td>
                                        <td
                                            class="text-dark    bg-white py-5 px-2 text-center text-gray-600 font-medium">
                                            Cold
                                        </td>

                                        

                                        <td
                                            class="text-dark bg-white py-5 px-2 text-center text-base font-bold">
                                            <a href="#"
                                                class=" bg-purple-400 hover:bg-purple-500 text-white text-md  inline-block rounded border py-2 px-6 hover:text-primary">
                                                Clear
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- ====== Table Section End -->

                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>
