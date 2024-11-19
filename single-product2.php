<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antique Bakery Cafe HTML Template by Tooplate</title>
</head>
<body>    
    <!-- Intro -->
    <div id="intro" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-01.jpg">
        <nav id="tm-nav" class="fixed w-full">
            <div class="tm-container mx-auto px-2 md:py-6 text-right">
                <button class="md:hidden py-2 px-2" id="menu-toggle"><i class="fas fa-2x fa-bars tm-text-gold"></i></button>
                <ul class="mb-3 md:mb-0 text-2xl font-normal flex justify-end flex-col md:flex-row">
                    <li class="inline-block mb-4 mx-4"><a href="#intro" class="tm-text-gold py-1 md:py-3 px-4">Home</a></li>
                    <li class="inline-block mb-4 mx-4"><a href="#menu" class="tm-text-gold py-1 md:py-3 px-4">Our Product</a></li>
                    <li class="inline-block mb-4 mx-4"><a href="#about" class="tm-text-gold py-1 md:py-3 px-4">About</a></li>
                    <li class="inline-block mb-4 mx-4"><a href="#contact" class="tm-text-gold py-1 md:py-3 px-4">Sign up</a></li>
                </ul>
            </div> 
            <button type="submit" class="signupbtn" name="submit" onclick="return validateForm()">Signup</button>
        </nav>
        <div class="container mx-auto px-2 tm-intro-width">
            <div class="sm:pb-60 sm:pt-48 py-20">
                <div class="bg-black bg-opacity-70 p-12 mb-5 text-center">
                    <h1 class="text-white text-5xl tm-logo-font mb-5">CEYLON GOLDEN CINNAMON</h1>
                    <p class="tm-text-gold tm-text-2xl">BRAND OF DELICIOUSNESS</p>
                </div>    
                <div class="bg-black bg-opacity-70 p-10 mb-5">
                    <p class="text-white leading-8 text-sm font-light">
                        Welcome to CEYLON GOLDEN CINNAMON. We are one of the fastest-growing suppliers of organic Ceylon cinnamon in both the global wholesale and retail markets. Our product range includes both Organic and conventional Ceylon Cinnamon Quills, Cinnamon Powder, Cinnamon Leaf Oil and Bark oil. All sourced directly from the beautiful island of Sri Lanka
                    </p>
                </div>
                <div class="text-center">
                    <a href="#menu" class="flex justify-center items-center bg-black bg-opacity-70 py-6 px-8 rounded-lg font-semibold tm-text-2xl tm-text-gold hover:text-gray-200 transition">
                        <i class="fas fa-coffee mr-3"></i>
                        <span>Let's explore...</span>                        
                    </a>
                </div>                
            </div>
        </div>        
    </div>
    <!-- Cafe Menu -->
    <div id="menu" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-05.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="text-center mb-16">
                <h2 class="bg-white tm-text-brown py-6 px-12 text-4xl font-medium inline-block rounded-md">Our Product</h2>
            </div>            
            <div class="flex flex-col lg:flex-row justify-around items-center">
                <div class="flex-1 m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown tm-item-container">
                    <!-- Product items will be placed here -->
                </div>
                <div class="flex-1 m-5 rounded-xl px-4 py-6 sm:px-8 sm:py-10 tm-bg-brown tm-item-container">
                    <!-- Product items will be placed here -->
                </div>
            </div>
        </div>        
    </div>
    <div id="about" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-07.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
            <div class="tm-item-container sm:ml-auto sm:mr-12 mx-auto sm:px-0 px-4">
                <div class="bg-white bg-opacity-80 p-12 pb-14 rounded-xl mb-5">
                    <h2 class="mb-6 tm-text-green text-4xl font-medium">About us</h2>
                    <p class="mb-6 text-base leading-8">
                        Ceylon Golden Cinnamon, nestled in the heart of Sri Lanka, represents a pinnacle of excellence in the realm of Ceylon cinnamon exports. We specialize in sourcing the finest True Ceylon Cinnamon from small-batch farmers across the island, ensuring both organic and conventional varieties meet stringent international safety standards.
                        After the cinnamon is meticulously harvested by our farmers, Once harvested, the raw materials are promptly sent to our plant in Himbutana, Sri Lanka. Here, we conduct a careful and precise processing of the cinnamon before they are ready for export, preserving their exceptional quality and flavors.
                    </p>
                    <a href="index3.html" class="inline-block tm-bg-green transition text-white text-xl pt-3 pb-4 px-8 rounded-md">
                        <i class="far fa-comments mr-4"></i>
                        More Info
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="absolute bottom-0 left-0 w-full">
        <div class="text-white container mx-auto tm-container p-8 text-lg flex flex-col md:flex-row justify-between">
            <span></span>
            <span class="mt-5 md:mt-0"> <a href="https://www.tooplate.com" target="_parent">Tooplate</a></span>
        </div>                
    </footer>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>
        function checkAndShowHideMenu() {
            if(window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');                
            } else
