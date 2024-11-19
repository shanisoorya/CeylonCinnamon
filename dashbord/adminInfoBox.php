<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags, title, and stylesheets -->
</head>

<body>
    <!-- Your existing HTML structure -->
    <div class="container">
        <div class="header">
            <div class="nav">
                <!-- Other header elements... -->
                <div class="user">
                    <!-- Button to show user's profile -->
                    <a href="#" class="btn" id="userProfileBtn">
                        <div class="img-case">
                            <img src="user.png" alt="User Profile">
                        </div>
                    </a>
                    <!-- Small box to display admin's name and email -->
                    <div id="adminInfoBox" style="display: none;">
                        <p id="adminName"></p>
                        <p id="adminEmail"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <!-- Other content... -->
        </div>
    </div>

    <!-- JavaScript to handle button click and display admin info -->
    <script>
        // Function to display admin info
        function showAdminInfo(name, email) {
            document.getElementById('adminName').textContent = "Name: " + name;
            document.getElementById('adminEmail').textContent = "Email: " + email;
            document.getElementById('adminInfoBox').style.display = 'block';
        }

        // Simulated login data
        const adminName = "John Doe";
        const adminEmail = "john.doe@example.com";

        // Call the function to display admin info on page load (you can adjust this based on your login logic)
        showAdminInfo(adminName, adminEmail);

        // Add event listener for the user profile button
        document.getElementById('userProfileBtn').addEventListener('click', function() {
            // Here you can add the logic to handle the button click, for example, redirecting to the user's profile page
            // For now, let's just log a message to the console
            console.log("User profile button clicked!");
        });
    </script>
</body>

</html>
