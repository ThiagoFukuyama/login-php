<?php

session_start();

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
    <script src="./assets/main.js"></script>
</head>
<body>
    <main>

        <section>

            <div class="flex flex-col lg:flex-row lg:h-screen justify-center items-center">

                <!-- LOGIN -->
                <div id="login" class="group relative w-full h-full bg-indigo-500 px-4 py-20 flex-1 flex justify-center items-center">
                    <form action="includes/login.inc.php" method="post" class="group-hover:scale-105 max-w-[330px] w-full flex flex-col justify-center items-center duration-150">

                        <div class="text-center">
                            <h1 class="text-white sm:text-6xl text-4xl font-bold mb-6 sm:mb-10">
                                Login
                            </h1>
                            <p class="text-gray-200 text-lg mb-6">
                                Já tem uma conta? Entre agora!
                            </p>
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

                        <button type="submit" name="submit" class="rounded-full text-white border-2 border-white px-5 py-2 uppercase font-semibold hover:bg-white hover:text-indigo-500 duration-150">
                            Entrar
                        </button>

                    </form>

                    <span class="absolute bottom-0 translate-y-2/4 lg:bottom-auto lg:right-0 lg:translate-x-2/4 rounded-full w-12 h-12 bg-white text-gray-500 border-2 border-gray-300 flex justify-center items-center font-bold uppercase">
                        ou
                    </span>
                </div>

                <!-- SIGN UP -->
                <div id="signup" class="group w-full h-full bg-white px-5 py-20 flex-1 flex justify-center items-center">
                    <form action="includes/signup.inc.php" method="post" class="group-hover:scale-105 max-w-[400px] w-full flex flex-col justify-center items-center duration-150">
                        
                        <div class="text-center">
                            <h1 class="text-indigo-500 sm:text-6xl text-4xl font-bold mb-6 sm:mb-10 ">
                                Registrar-se
                            </h1>
                            <p class="text-gray-400 font-medium text-lg mb-7">
                                Ainda não é associado? Registre-se aqui mesmo!
                            </p>
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

                        <button type="submit" name="submit" class="rounded-full text-white border-2 border-indigo-500 bg-indigo-500 px-5 py-2 uppercase font-semibold hover:bg-white hover:text-indigo-500 duration-150">
                            Registrar-se
                        </button>

                    </form>
                </div>

            </div>

        </section>

    </main>

</body>
</html>