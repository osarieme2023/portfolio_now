<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <title>Contact Page</title>
</head>

<body>
    <header>
        <div class="header-sec grid-con">
          <nav class="navigation col-span-full l-col-start-">
            <picture>
              <img src="images/main-logo.svg" alt="Logo" />
            </picture>
    
            <ul class="sidebar" id="desk-hid">
              <li>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#e8eaed">
                    <path
                      d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                  </svg></a>
              </li>
              <li><a href="index.php">PORTFOLIO</a></li>
              <li><a href="about.html">ABOUT</a></li>
              <li><a href="contact.html">CONTACT</a></li>
            </ul>
    
            <ul>
              <li class="hidemobile"><a href="index.php">PORTFOLIO</a></li>
              <li class="hidemobile"><a href="about.html">ABOUT</a></li>
              <li class="hidemobile"><a href="contact.html">CONTACT</a></li>
              <li class="hideondesktop">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </header>
    

    <main>
        <section class="grid-con">
            <div class="contact-head col-span-full">
                <h1>Let’s chat! </h1>
                <p>Whether it's business or just a quick hello, I’d love to hear from you.</p>
            </div>
        </section>

        <section class="grid-con contact">
            <div class="col-span-full contact-form">
                <form action="">
                    <div id="name">
                        <input type="text" placeholder="NAME" name="" required>
                        <label for=""></label>
                    </div>

                    <div id="email">
                        <input type="text" placeholder="EMAIL" name="" required>
                        <label for=""></label>
                    </div>

                    <div class="message">
                        <input type="text" placeholder="MESSAGE" name="" required>
                        <label for=""></label>
                    </div>

                    <div id="send-btn">
                        <button>SEND</button>
                    </div>
                </form>
            </div>
        </section>
        
    </main>



<footer class="grid-con">
    <div class="col-span-full footer-con">
      <small>© OGBEIDE ONOH. ALL RIGHTS RESERVED.</small> 
        <div>
          <a href="https://www.linkedin.com/in/your-profile" target="_blank">
            <img src="images/Portfolio-image/Cover images/LinkedIn.png" alt="LinkedIn Profile" width="30">
          </a>
        </div>
    </div>
</footer> 


<script src="js/main.js" type="module"></script>
</body>
</html>
