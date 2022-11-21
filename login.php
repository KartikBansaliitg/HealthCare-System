<!DOCTYPE html>

<html lang="en">

<head>

    <title>Login</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

   <link rel="icon" type="image/x-icon" href="logo.png">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <?php
        $login="";

        if(isset($_POST['login']))
        {
            $login=$_POST["login"];
        
            if($login=="Admin")
            {
            header("Location:admin_login.php"); 
            }
            else if($login=="Patient")
            {
            header("Location:patient_login.php"); 
            }
            else if($login=="Employee")
            {
            header("Location:employee_login.php"); 
            }
            
        }
        // echo($login);
        ?>

    <section class="w-full h-screen bg-cover bg-center">
        <div class="container flex flex-col items-center justify-center">
            <div class="bg-white rounded mt-4 lg:w-1/4 md:w-1/2 w-1/2 p-10">
                <div>
                    <div class="h-full flex justify-center">
                        <img class="w-14 h-14 mt-2"
                            src="https://online.iitg.ac.in/tnp/static/media/iitglogo.d364692baec36d70b8ff.png" alt="">
                    </div>
                    <div class="text-2xl font-semibold mt-2 ml-2">
                        Select a Role
                    </div>
                </div>

                <form class="frm" method="POST">
                    <div class="col-span-6 sm:col-span-3">
                        <div class="pl-2 mt-2">
                            <select id="login" name="login" autocomplete="login"
                                class="mt-1 block w-full rounded-md border border-gray-400 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option>Select a option</option>
                                <option>Admin</option>
                                <option>Patient</option>
                                <option>Employee</option>
                            </select>
                        </div>
                    </div>

                    <div class="justify-end mt-4 ml-24">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
                            Continue
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>



</body>

</html>