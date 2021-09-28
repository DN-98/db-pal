<html lang="id" class="light">

<head>
    <!-- BEGIN: Head -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() ?>/images/logo.svg" type="image/gif">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>" />
    <title>LOGIN - Condition Monitoring</title>
    <!-- END: Head -->
</head>

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-25" src="<?= base_url() ?>/images/logopal.png">
                    <!-- <span class="text-white text-lg ml-3"> <span class="font-medium">One</span> </span> -->
                </a>
                <div class="my-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="<?= base_url() ?>/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        - NIAGA DIVISION -
                        <br>
                        Machine Condition Monitoring
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">Please Sign-in to your account first</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <!-- <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div> -->
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account.</div>
                    <form action="/" method="post">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="User ID" name="id_pengguna">
                            <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" name="kata_sandi">
                        </div>
                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top" name="submit">Login</button>
                            <button hidden class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Sign up</button>
                        </div>
                    </form>
                    <!-- <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                        By signin up, you agree to our
                        <br>
                        <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a>
                    </div> -->
                </div>
            </div>

            <!-- END: Login Form -->
        </div>
    </div>
</body>

</html>