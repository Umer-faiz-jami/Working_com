<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS Website</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/um-assets/css/style.css">



        <!-- Font-Awesome -->
        <script src="https://kit.fontawesome.com/801c6cec4b.js" crossorigin="anonymous"></script>


    </head>
    <body>
        <!--  Start Of Website With Navbar -->

        <nav class="navbar background h-nav-resp">
            <ul class="nav-list v-class-resp">
                <div class="logo">
                    <img src="<?php echo base_url() ?>assets/um-assets/images/main-logo.jpg" alt="logo">
                </div>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="rightnav v-class-resp">
                <button class="login-btn"> <a href="<?php echo base_url()?>auth">Login <i class="fa-solid fa-right-to-bracket"></i></a></button>
            </div>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
        <!-- Navbar Section CLosed! -->

        <!-- First Section -->
        <section class="background firstSection" id="home">
            <div class="box-main">
                <div class="first-half">

                    <h2 class="text-big">We Are Here To Help You!</h2>

                    <h5 class="text-small">With a commitment to support and assist, rest assured, 'We Are Here To Help You!' on every step of your journey to wellness.</h5>

                        <!-- <div class="buttons">
                            <button type="button" class="btn">Let's Go</button>
                            <button type="button" class="btn">Nope</button>
                        </div> -->
                </div>
                <div class="second-half">
                    <img src="<?php echo base_url()?>assets/um-assets/images/first-section.jpg" alt="Image">
                </div>
            </div>
        </section>
        <!-- First Section Closed! -->


        <!-- Second Section Started! (secright) -->
        <section class="second-section" id="about">
            <div class="sec-paragraph">
            <p class="section-tag text-big">Your Health, Our Priority!</p>
            <p class="section-sub-tag text-small">At the heart of our mission lies the unwavering commitment encapsulated in 'Your Health, Our Priority!' Guided by this mantra, we embark on a dedicated journey to prioritize and safeguard your well-being. Our team of healthcare professionals is passionately devoted to ensuring that every aspect of your health is meticulously attended to. From preventive care to personalized treatment strategies, we pledge to be your steadfast partners in the pursuit of optimal health. Your trust is our greatest asset, and your health remains our foremost priority. Together, let's navigate the path to well-being, where your vitality and peace of mind take precedence in every decision and action we undertake.</p>
        </div>
            <div class="thumbnail">
                <img src="<?php echo base_url()?>assets/um-assets/images/thumbnail.jpg" alt="" class="img-fluid">
            </div>
        </section>
       
        <section class="second-section left">
            <div class="sec-paragraph">
            <p class="section-tag text-big">Precision Care, Personalized for You</p>
				<p class="section-sub-tag text-small">
					Experience a new paradigm of healthcare with "Precision Care, Personalized for You." In this transformative approach to well-being, each aspect of your health journey is finely tuned with meticulous attention and tailored to your unique needs. Our commitment to precision goes beyond traditional healthcare, ensuring that every element of your care is delicately calibrated to bring you optimal health outcomes. From diagnostic precision to personalized treatment plans, we strive to create a healthcare experience where your individuality is not just acknowledged but celebrated. Join us on this journey, where precision meets personalization, and your well-being takes center stage with unparalleled attention and care.</p>
        </div>
            <div class="thumbnail">
                <img src="<?php echo base_url()?>assets/um-assets/images/sec.jpg" alt="" class="img-fluid">
            </div>
        </section>
       
        <section class="second-section">
            <div class="sec-paragraph">
            <p class="section-tag text-big">Elegance in Wellness Journey.</p>
            <p class="section-sub-tag text-small">Embarking on a wellness journey becomes an elegant and transformative experience when guided by precision and care. In the realm of health and well-being, our approach is characterized by an unwavering commitment to refinement and sophistication. We strive to create an atmosphere where every step of your wellness journey is seamlessly intertwined with an aura of grace and expertise. From tailored health solutions to compassionate support, our commitment to elegance ensures that your path to well-being is not just a process but a beautifully orchestrated experience. Join us on this refined journey, where the pursuit of health is elevated to an art, and every aspect is designed to bring a sense of poise and excellence to your personal wellness narrative.</p>
        </div>
            <div class="thumbnail">
                <img src="<?php echo base_url()?>assets/um-assets/images/doc.jpg" alt="" class="img-fluid">
            </div>
        </section>
       

        <section class="section-contact" id="contact">
               <h3 class="text-center">Contact Us</h3>

               <div class="contact-container">
                <form action="action_page.php">
              
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="Your name..">
              
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lastname" placeholder="Your last name..">
              
                 
              
                  <label for="Comment">Comment</label>
                  <textarea id="Comment" name="Comment" placeholder="Write something.." style="height:200px"></textarea>
              
                  <input type="submit" value="Submit">
              
                </form>
              </div> 
        </section>

    
        <footer class="footer-section">

            <div class="text-center top-footer-mrgn">
                <div class="icons">
                   <a href="" class="icon-links"> <i class="fa-brands fa-facebook icon"></i></a>
                   <a href="https://wa.me/923105818586?text=I'm%20interested%20in%20your%20service" class="icon-links"> <i class="fa-brands fa-whatsapp icon"></i></a>

                   <a href="" class="icon-links"> <i class="fa-brands fa-linkedin icon"></i></a>
                  
                   <a href="" class="icon-links"> <i class="fa-brands fa-instagram icon"></i></a>
                   
                </div>
                
                <div class="text-center">
                <p>&copy; <?php echo strftime('%Y');?> CMS. All rights reserved.</p>

                </div>
            </div>
        </footer>


        <!-- JS SCRIPT -->

        <!-- SCRIPT FOR RESP  JS -->

        <script src="<?php echo base_url()?>assets/um-assets/js/resp.js"></script>

    </body>
</html>
