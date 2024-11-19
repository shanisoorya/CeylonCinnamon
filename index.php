<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylone Cinnamon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css"> 

   
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/tooplate-antique-cafe.css">
    <link rel="stylesheet" href="css/rr.css">
    

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
                    <li class="inline-block mb-4 mx-4"><a href="#contact" class="tm-text-gold py-1 md:py-3 px-4">Contact</a></li>
                </ul>
            </div> 
        </nav>
        <button type="submit" class="signupbtn"name="submit" onclick="return validateForm()">Signup</button>
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
                    <div class="inline-block">
                        <a href="register.php" class="flex justify-center items-center bg-black bg-opacity-70 py-6 px-8 rounded-lg font-semibold tm-text-2xl tm-text-gold hover:text-gray-200 transition">
                            <i class="fas fa-coffee mr-3"></i>
                            <span>Register Now...</span>                                           
                        </a>
                    </div>                    
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
            <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                <?php
                include 'config.php'; 
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div style="display: flex; flex-direction: column; justify-content: space-between; background-color: white; padding: 15px; border-radius: 10px; color: black; width: 250px; margin: 10px;">'; 
                        echo '<img src="'. $row['product_image'] . '" alt="Product Image" style="width: 100%; border-radius: 10px;">';
                        echo '<div style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">';
                        echo '<div style="flex-grow: 1;">';
                        echo '<h3 style="font-size: 1.5rem; margin-bottom: 10px;">' . $row['product_name'] . '</h3>';
                        echo '<div style="font-size: 1.2rem; margin-bottom: 5px;">$' . $row['product_price'] . '</div>';
                        echo '<div style="font-size: 1.2rem; margin-bottom: 5px;">Quantity: ' . $row['product_qty'] . '</div>';
                        echo '</div>';
                        echo '<a href="product_detail.php?id=' . $row['product_id'] . '" style="align-self: center; margin-top: 10px; background-color: rgba(0, 0, 0, 0.7); padding: 10px 20px; border-radius: 5px; font-weight: bold; color: gold; transition: color 0.3s;">Order Now</a>'; 
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
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
                </div>
                <a href="https://en.wikipedia.org/wiki/Cinnamon" class="inline-block tm-bg-green transition text-white text-xl pt-3 pb-4 px-8 rounded-md">
                    <i class="far fa-comments mr-4"></i>
                    More Info
                </a>
            </div>           
        </div>        
    </div>
    <div id="contact" class="parallax-window" data-parallax="scroll" data-image-src="img/antique-cafe-bg-06.jpg">
        <div class="container mx-auto tm-container pt-24 pb-48 sm:py-48">
            <div class="flex flex-col lg:flex-row justify-around items-center lg:items-stretch">
                <div class="flex-1 rounded-xl px-10 py-12 m-5 bg-white bg-opacity-80 tm-item-container">
                    <h2 class="text-3xl mb-6 tm-text-green">Contact Us</h2>
                    <p class="mb-6 text-lg leading-8">
                        CEYLON GOLDEN CINNAMON is an authorized Ceylon spices exporter/seller in Export Development Board, Sri Lanka (Reg No: E19050001083) and As a USDA organic certified company (Reg No: CU 877940), we are proud to present the World's finest Ceylon Cinnamon and other Ceylon spices from the Wonder of Asia, Sri Lanka.
                    </p>
                    <p class="mb-10 text-lg">
                        <span class="block mb-2">Tel: <a href="tel:+94 912 292 494" class="hover:text-yellow-600 transition">091 229 2494</a></span>
                        <span class="block">Email: <a href="mailto:Ceylonecinnamon.com" class="hover:text-yellow-600 transition">Ceylonecinnamon.com</a></span>                        
                    </p>
                    <div class="text-center">
                        <a href="https://www.google.com/maps" class="inline-block text-white text-2xl pl-10 pr-12 py-6 rounded-lg transition tm-bg-green">
                            <i class="fas fa-map-marked-alt mr-8"></i>
                            Open Maps
                        </a>
                    </div>                    
                </div>
                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                <form action="submit_form.php" method="POST" class="text-lg">
    <input type="text" name="name" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Name" required />
    <input type="email" name="email" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Email" required />
    <textarea rows="6" name="message" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Message..." required></textarea>
    <div class="text-right">
        <button type="submit" class="text-white hover:text-yellow-500 transition">Send it</button>
    </div>                        
</form>
                </div>
            </div>
            <footer class="absolute bottom-0 left-0 w-full">
                <div class="text-white container mx-auto tm-container p-8 text-lg flex flex-col md:flex-row justify-between">
                    <!-- Footer content here -->
                </div>
            </footer>
        </div>        
    </div>    

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>
        function checkAndShowHideMenu() {
            if(window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');                
            } else {
                $('#tm-nav ul').removeClass('hidden');
            }
        }

        $(function(){
            var tmNav = $('#tm-nav');
            tmNav.singlePageNav();

            checkAndShowHideMenu();
            window.addEventListener('resize', checkAndShowHideMenu);

            $('#menu-toggle').click(function(){
                $('#tm-nav ul').toggleClass('hidden');
            });

            $('#tm-nav ul li').click(function(){
                if(window.innerWidth < 768) {
                    $('#tm-nav ul').addClass('hidden');
                }                
            });

            $(document).scroll(function() {
                var distanceFromTop = $(document).scrollTop();

                if(distanceFromTop > 100) {
                    tmNav.addClass('scroll');
                } else {
                    tmNav.removeClass('scroll');
                }
            });
            
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>
