<?php
require_once 'includes/connect.php';

$sql = "
  SELECT 
    projects.*, 
    media.file_path AS landing_image
  FROM projects
  LEFT JOIN media 
    ON media.project_id = projects.project_id 
    AND media.media_type = 'landing'
  ORDER BY projects.created_at DESC
";


$stmt = $connect->query($sql);
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <script type="module" src="js/home.js"></script>
  <title>Document</title>
</head>

<body>

  <header>
    <div class="header-sec grid-con">
      <nav class="col-span-full" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0;">
        <!-- Logo on the left -->
        <img src="images/Portfolio_content/onoh_logo.svg" alt="Logo" style="height: 30px; width: auto;" />
        
        <!-- Navigation links on the right -->
        <div class="nav-links">
          <a href="#work">Work</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <section class="index-hero-section" id="hero">
      <div class="grid-con hero-section">
        <div class="col-span-full hero-img">
            <img src="images/Portfolio_content/portfolio.png" alt="Poerfolio">
        </div>
        <div class="col-span-full hero-text">
          <p>Graphic & Product Designer</p>
          <p>2025</p>
        </div>
      </div>
    </section>

    <section id="service">
      <div class="grid-con service-section">
        <div class="col-span-full">
            <div class="heading-text">
              <h2>01</h2>
              <p>
                Creating cool things one pixel at a time.
              </p>
            </div>
            <div class="service-vid">
              <div class="video">
                <video class="showcase" controls width="400px" height="auto">
                  <source src="images/Portfolio_content/demo-reel.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
        </div>
      </div>
    </section>
    
    

    <section id="projects">

      <div class="grid-con projects-section">

        <div class="heading-text">
          <h2>02</h2>
          <p>
            PROJECTS
          </p>
        </div>

        <div class="col-span-full" id="projects-con"> 
        <?php foreach ($projects as $project): ?>
    <div class="project-box">
    <a href="case-study.php?project_id=<?= $project['project_id'] ?>" data-preview="<?= htmlspecialchars(substr($project['description'], 0, 120)) ?>...">
            <img src="<?= htmlspecialchars($project['landing_image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
        </a>
        <div class="project-text">
            <h3><?= htmlspecialchars($project['title']) ?></h3>
            <p><?= htmlspecialchars($project['description']) ?></p>
        </div>
    </div>
<?php endforeach; ?>

</div>


      </div>
      
    </section>

    <section id="about">
      <div class="grid-con about-section">
        <div class="col-span-full">
            <div class="heading-text">
              <h2>03</h2>
              <p>
                About
              </p>
            </div>
            <div class="about-text">
              <p>
                Hi, I'm Onoh, a passionate graphic and product designer dedicated to crafting innovative products for brands. 
                I thrive on the challenge of bringing ideas to life through creative design solutions. When I'm not 
                immersed in the world of design, you can find me exploring new skills that test my physical limits—let's just 
                say I have a hidden strength! I'm also an avid reader, music lover, and food enthusiast. As a self-proclaimed homebody, 
                I find solace in late-night design sessions. Let's collaborate and create something amazing together!s
              </p>
            </div>
        </div>
      </div>
    </section>

    <section id="slice-carousel">
  <div class="marquee-section">
    <div class="heading-text" style="text-align: center; margin-bottom: 60px;">
      <h2 style="color: #666; font-size: 18px; font-weight: normal;">Industries we work with</h2>
    </div>
    
    <!-- First scrolling row -->
    <div class="marquee-container marquee-row">
      <div class="marquee-text">
        <span class="outline">TECHNOLOGY</span>
        <span class="separator">—</span>
        <span class="solid">SPORTS</span>
        <span class="separator">—</span>
        <span class="outline">FASHION</span>
        <span class="separator">—</span>
        <span class="solid">MEDIA</span>
        <span class="separator">—</span>
        <span class="outline">HEALTH</span>
        <span class="separator">—</span>
        <span class="solid">E-COMMERCE</span>
      </div>
    </div>

    <!-- Second scrolling row (moves opposite direction) -->
    <div class="marquee-container marquee-row">
      <div class="marquee-text">
        <span class="solid">BRANDING</span>
        <span class="separator">—</span>
        <span class="outline">DESIGN</span>
        <span class="separator">—</span>
        <span class="solid">INNOVATION</span>
        <span class="separator">—</span>
        <span class="outline">CREATIVITY</span>
        <span class="separator">—</span>
        <span class="solid">EXCELLENCE</span>
      </div>
    </div>
  </div>
</section>

    <section id="contact">
      <div class="grid-con contact-section">
        <div class="col-span-full">
            <div class="heading-text">
              <h2>04</h2>
              <p>
                LET'S CREATE
              </p>
            </div>
            
        </div>
        <div class="contact-form col-span-full">
          <form id="contactForm">
            <div class="form-item">
              <label for="name">Name</label>
              <input class="input-box" type="text" id="name" name="name" required />
            </div>

            <div class="form-item">
              <label for="email">Email</label>
              <input class="input-box" type="email" id="email" name="email" required />
            </div>

            <div class="form-item">
              <label for="message">Message</label>
              <textarea class="input-box" id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Send</button>
          </form>

          <div id="feedback"></div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <div class="grid-con footer-con">
        <div class="divider col-span-full">
        </div>
        <div class="col-span-full footer-item">
          <p>© ONOH 2025 | ALL RIGHTS RESERVED</p>
        </div>

        <div class="col-span-full footer-item">
      <a href="https://www.linkedin.com/in/osarieme-ogbeide-1a8209292/" target="_blank">
          <img src="images/linkedin.png" alt="LinkedIn Profile" width="30"> 
      </a>

        <div class="col-span-full footer-item">
          <div class="socials">
            <img src="" alt="">
            <img src="" alt="">
          </div>
        </div>
      </div>
    </footer>

  </main>
     
  <!-- <header>
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
  </header> -->


<!-- <main>
  <section class="index-hero-section">
    <div class="grid-con hero-section">
      <div class="col-span-full hero-section-text">
        <h1>Hello!</h1>
          <p>Welcome, I'm Onoh—a product, motion, and 3D designer based in London, Ontario. I specialize in crafting
            comprehensive UX/UI designs and immersive 3D animations that blend interactivity with visual appeal, creating
            seamless and engaging user experiences.
          </p>
      </div>
    </div>
  </section>



<footer class="grid-con">
    <div class="col-span-full footer-con">
      <small>© OGBEIDE ONOH. ALL RIGHTS RESERVED.</small> 
        <div>
          <a href="https://www.linkedin.com/in/your-profile" target="_blank">
            <img src="images/Portfolio-image/Cover images/LinkedIn.png" alt="LinkedIn Profile" width="30">
          </a>
        </div>
    </div>
</footer>  -->

<script src="js/main.js" type="module"></script>
</body>

</html>