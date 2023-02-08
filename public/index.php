<?php

session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4 - Sistema de Login com OOP PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap" rel="stylesheet">    
    <style>

        #login:hover > form,
        #signup:hover > form {
            transform: scale(1.05);
        }

        .main-nav {
            background-color: #30323D;
        }

        .main-nav .logo {
            font-family: "Kanit", auto;
            font-weight: 500;
        }

    </style>
</head>
<body>

    <nav class="main-nav md:absolute w-full flex justify-center md:p-4 p-3">
        <div class="max-w-[1900px] w-full flex flex-wrap gap-x-10 gap-y-2 items-center justify-between">
            <a class="logo text-2xl text-gray-200 font-semibold" href="index.php">LoginOOP</a>

            <?php
                if (isset($_SESSION["userId"])) { 
            ?>

            <div class="flex items-center gap-5">
                <p class="text-gray-300">Olá, <span class="underline font-bold"><?= $_SESSION["userUid"]  ?></span>!</p>
                <a href="includes/logout.inc.php" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-sm px-2 py-1 rounded-md duration-150">SAIR</a>
            </div>

            <?php
                } else { 
            ?>

            <p class="text-gray-300 font-semibold">Você não está logado</p>

            <?php 
                }
            ?>

        </div>
    </nav>
    
    <main>

        <section>

            <div class="flex flex-col md:flex-row md:h-screen justify-center items-center">

                <!-- LOGIN -->
                <div id="login" class="w-full h-full bg-indigo-500 flex-1 flex justify-center items-center">
                    <form action="includes/login.inc.php" method="post" class="max-w-[330px] w-full flex flex-col justify-center items-center px-4 py-10 duration-150">

                        <div class="text-center">
                            <h1 class="text-white sm:text-6xl text-4xl font-bold mb-6 sm:mb-10">Login</h1>
                            <p class="text-gray-200 text-lg mb-6">Já tem uma conta? Entre agora!</p>
                        </div>
                        <div class="w-full flex flex-col justify-center gap-3 mb-5">

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-50 rounded-md">
                                <i class="bi bi-person-fill text-gray-500 text-md"></i>
                                <input type="text" name="uid" id="uid" placeholder="Usuário" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-50 rounded-md">
                                <i class="bi bi-lock-fill text-gray-500 text-md"></i>
                                <input type="password" name="password" id="password" placeholder="Senha" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                        </div>

                        <button type="submit" name="submit" class="rounded-full text-white border-2 border-white px-5 py-2 uppercase font-semibold hover:bg-white hover:text-indigo-500 duration-150">Entrar</button>

                    </form>
                </div>

                <!-- SIGN UP -->
                <div id="signup" class="w-full h-full bg-white  flex-1 flex justify-center items-center">
                    <form action="includes/signup.inc.php" method="post" class="max-w-[400px] w-full flex flex-col justify-center items-center px-4 py-10 duration-150">
                        
                        <div class="text-center">
                            <h1 class="text-indigo-500 sm:text-6xl text-4xl font-bold mb-6 sm:mb-10 ">Registrar-se</h1>
                            <p class="text-gray-400 font-medium text-lg mb-7">Ainda não é associado? Registre-se aqui mesmo!</p>
                        </div>

                        <div class="w-full flex flex-col justify-center gap-3 mb-5">

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-100 rounded-md">
                                <i class="bi bi-person-fill text-gray-500 text-md"></i>
                                <input type="text" name="uid" id="uidReg" placeholder="Usuário" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-100 rounded-md">
                                <i class="bi bi-lock-fill text-gray-500 text-md"></i>
                                <input type="password" name="password" id="passwordReg" placeholder="Senha" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-100 rounded-md">
                                <i class="bi bi-lock text-gray-500 text-md"></i>
                                <input type="password" name="passwordRepeat" id="passwordRepeatReg" placeholder="Repita a senha" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                            <div class="flex items-center gap-3 w-full px-5 py-3 bg-gray-100 rounded-md">
                                <i class="bi bi-envelope-fill text-gray-500 text-md"></i>
                                <input type="email" name="email" id="emailReg" placeholder="E-mail" required class="w-full text-gray-600 focus:outline-none bg-transparent placeholder:text-gray-400 placeholder:font-semibold">
                            </div>

                        </div>

                        <button type="submit" name="submit" class="rounded-full text-white border-2 border-indigo-500 bg-indigo-500 px-5 py-2 uppercase font-semibold hover:bg-white hover:text-indigo-500 duration-150">Registrar-se</button>

                    </form>
                </div>

            </div>

        </section>

    </main>

</body>
</html>