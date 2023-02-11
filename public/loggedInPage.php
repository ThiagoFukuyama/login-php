<?php

session_start();

require_once "includes/verifyLogin.inc.php";

?><!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP OOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body id="logged-in-page" class="h-screen bg-gradient-to-br from-gray-100 via-indigo-400 to-indigo-600">
    <a href="includes/logout.inc.php" class="text-gray-500 block absolute top-0 left-0 align-middle p-5 flex justify-center items-center">
        <svg class="inverted fill-current w-4 h-4 inline-block mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        <span class="text-lg">Sair</span>
    </a>
    
    <main class="h-full flex justify-center items-center">
        <div id="user-profile" class="bg-white py-16 px-10 shadow-2xl rounded-lg max-w-[350px] w-full mx-5">
            <div class="sm:mb-16 mb-8 mx-auto sm:w-48 sm:h-48 w-24 h-24 flex justify-center items-end bg-gray-100 rounded-full overflow-hidden">
                <svg class="fill-current text-gray-300 w-4/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            </div>

            <div class="text-center">
                <div class="text-gray-800 text-2xl mb-3">
                    Olá, 
                    <span class="font-bold text-indigo-700 opacity-90">
                        <?php echo $_SESSION["userUid"] ?>!
                    </span>
                </div>

                <p class="text-gray-500 break-all">
                    <?php echo $_SESSION["userEmail"] ?>
                </p>
            </div>
        </div>
    </main>
</body>
</html>