<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Dancing+Script:wght@700&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/constyling.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>
    <section class="contact">
        <div class="content">
            <h2>Contact us</h2>
            <!-- <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse repudiandae officia, sint cupiditate quibusdam tenetur! Itaque quos laborum quia error voluptates deserunt reprehenderit tempora at nisi deleniti, tenetur harum. Neque.
            </p> -->
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="ri-map-pin-2-fill"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>500 Ramokonopi west,<br>
                        Katlehong,<br>
                        1431
                        </p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="ri-phone-fill"></i></div>
                    <div class="text">
                        <h3>Phones</h3>
                        <p>067-769-0242</p> 
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="ri-mail-line"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>kevkunene@icloud.com</p>
                    </div>
                </div>

            </div>
            <div class="contactForm">
                <form action="contact-backend.php" method="GET">
                    <h2>Send Message</h2>

                    <div class="inputBox">
                        <label>Full Name</label>
                        <input type="text" name="fullname">
                    </div>

                    <div class="inputBox">
                        <label>Email</label>
                        <input type="text" name="email" >
                    </div>

                    <div class="inputBox">
                        <label>Type your Message...</label>
                        <textarea  name="message"></textarea>
                    </div>

                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>