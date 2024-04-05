<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/index.css" />
</head>
<body>
    <div class="main">
            <div class="nav">
                <div class="color1"><a class="redtext" href="z_SA.php">Book Appointment</a></div>
                <div class="color2"><a class="bluetext" href="z_WI.php">Walk In Request</a></div>
                <div class="logout"><a href="index.php">Logout</a></div>
            </div>
        <div class="home-section">
            
            <div class="logo">
                 <img src="./assets/images/medical-symbol 1.png" alt="">
                <img src="./assets/images/340463690_6911935242155729_5781001705819074781_n-removebg-preview 1.png" alt="">
                <img src="./assets/images/healthcare 1.png" alt=""> 
                <div>Baranggay Mapulang Lupa Health Services</div>
                
            </div>
           

             <div class="table">
                <div class="flex">
                    <h2 class="available">Available Doctor</h2>
                    
                </div>
                
                <div class="list">
    <table>
        <tr style="background: black; color: whitesmoke;">
            <th>Doctors</th>
            <th>Specialty</th>
        </tr>
        <!--DISPLAY DOCTOR TABLE-->
        <?php
        $conn = mysqli_connect("localhost", "root", "dejuan", "pms_db");
        $sql = "SELECT name, specialty FROM doctors"; // Modify the query to select only the name and specialty columns
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["specialty"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results</td></tr>"; // Show a message within the table if there are no results
        }
        $conn->close();
        ?>
    </table>
</div>

                
                
            </div>

            
        </div>





        <div class="service-section">
            <div class="head-service">
                <div class="logo-container">
                <img src="./assets/images/customer-service 2.png" alt="">
                </div>
                <div class="logo-center">
                <img src="./assets/images/24-hours 1.png" alt="">
                <h2 class="ourservice">OUR SERIVICES</h2>
                </div>
               
            </div>
             <div class="parag">We provide quality healthcare services to all members of the community regardless of their age or socio-economic status
                <div class="line"></div>
             </div>

             <div class="item-service">
            
                <div style=" margin-top: 30px;" class="items"><img src="./assets/images/stethoscope 1.png" alt="">
                    <p>Primary and specialty, consultation</p>
                </div>
                <div style=" margin-top: 30px;" class="items"><img src="./assets/images/lab 1.png" alt="">
                    <p>Laboratory and Diagnostic </p>
                </div>
                <div style=" margin-top: 30px;" class="items"><img src="./assets/images/medical-checkup 1.png" alt="">
                    <p>Rehabilitation Medicine<br> Services</p>
                </div>
                <div class="items"><img src="./assets/images/surgery 1.png" alt="">
                    <p>Outpatient Surgery</p>
                </div>
                <div class="items"><img src="./assets/images/hospital 1.png" alt="">
                    <p>Corporate Clinic Management</p>
                </div>
                <div class="items"><img src="./assets/images/hospital (1) 1.png" alt="">
                    <p>On-Site Medical Services</p>
                </div>
                
             </div>
             
        </div>
        <div class="carousel">
            <h2 class="info">Health Infos you might need</h2>
            <!-- Slideshow container -->
<div style="text-align-last: center;" class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      
      <p>Walking can help boost creativity: A study has found that walking especially outdoors, can increase
        creative thingking.
      </p>
      
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <p>Healty life style</p>
      
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <p>Excercise always to health your body</p>
      
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <div class="location">
    <div class="brgy-location">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1681973437500!6m8!1m7!1s6FyvH2tIPGWqlU1p_zu7tw!2m2!1d14.7026024141999!2d121.0007777435695!3f177.1088!4f0!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
  </div>
        </div>

        


    
        <div class="footer-section">
            <div class="contact">Contact Us</div>
            <div class="contact-1">
                <img src="./assets/images/pin 1.png" alt="">
                <p> Sto. Rosario St. Mapulang Luca, Valenzuela Philippines</p>
                <img src="./assets/images/gmail 1.png" alt="">
                <p>mailto:brgy.mapulanglupa2018@gmail.com</p>
            </div>
            <div class="contact-2">
                <img src="./assets/images/phone-call 1.png" alt="">
                <p>09230888995</p>
                <img src="./assets/images/web 1.png" alt="">
                <p> <a href="https://www.facebook.com/bagongmapulanglupa2018">https://www.facebook.com/bagongmapulanglupa2018</a></p>
            </div>
            <div class="contact-page">
                <p><a href="z_contact.php">More info<span>></span></a></p>
            </div>
        </div>
        
        
    </div>




    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
    </script>
</body>
</html>