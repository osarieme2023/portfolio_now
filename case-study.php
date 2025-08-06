<?php
require_once 'includes/connect.php';

// Check if project_id exists in URL
if (!isset($_GET['project_id']) || !is_numeric($_GET['project_id'])) {
    echo "Invalid project ID";
    exit;
}

$projectId = (int) $_GET['project_id'];

// Fetch the case study data from database
$sql = "SELECT * FROM case_studies WHERE project_id = ?";
$stmt = $connect->prepare($sql);
$stmt->execute([$projectId]);
$caseStudy = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if case study exists
if (!$caseStudy) {
    echo "Case study not found.";
    exit;
}

// Fetch project title
$projectSql = "SELECT title FROM projects WHERE project_id = ?";
$projectStmt = $connect->prepare($projectSql);
$projectStmt->execute([$projectId]);
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Check if project exists
if (!$project) {
    echo "Project not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <script type="module" src="js/home.js"></script>
  <title><?php echo htmlspecialchars($project['title']); ?> - Case Study</title>
</head>

<body>
  <header>
    <div class="header-sec grid-con">
      <nav class="col-span-full" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0;">
        <!-- Logo on the left -->
        <img src="images/Portfolio_content/onoh_logo.svg" alt="Logo" style="height: 30px; width: auto;" />
        
        <!-- Navigation links on the right -->
        <div class="nav-links">
          <a href="index.php">Home</a>
          <a href="#work">Work</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
        </div>
      </nav>
    </div>
  </header>

  <div class="case-study-container">
    <main>
      <div class="top-images-grid">
        <?php if (!empty($caseStudy['top_image_1'])): ?>
        <img src="<?php echo htmlspecialchars($caseStudy['top_image_1']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="top-image">
        <?php endif; ?>
        
        <?php if (!empty($caseStudy['top_image_2'])): ?>
        <img src="<?php echo htmlspecialchars($caseStudy['top_image_2']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="top-image">
        <?php endif; ?>
        
        <?php if (!empty($caseStudy['top_image_3'])): ?>
        <img src="<?php echo htmlspecialchars($caseStudy['top_image_3']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="top-image">
        <?php endif; ?>
      </div>

      <section class="intro">
        <div class="case-hero">
          <h2><?php echo htmlspecialchars($project['title']); ?></h2>
          <p>
            <?php echo nl2br(htmlspecialchars($caseStudy['introduction'])); ?>
          </p>
          <div class="hero-image-container">
            <?php if (!empty($caseStudy['hero_image'])): ?>
            <img src="<?php echo htmlspecialchars($caseStudy['hero_image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?> hero" class="hero-image">
            <?php endif; ?>
          </div>
        </div>
      </section>
      
      <section class="case-study">

        <div class="challenge">
          <div class="case-text">
            <h3>The Challenge</h3>
            <p>
              <?php echo nl2br(htmlspecialchars($caseStudy['challenge'])); ?>
            </p>
          </div>
  
          <div class="case-image">
            <?php if (!empty($caseStudy['challenge_image'])): ?>
            <img src="<?php echo htmlspecialchars($caseStudy['challenge_image']); ?>" alt="Challenge" class="section-image">
            <?php endif; ?>
          </div>
        </div>

        <div class="solution">
          <div class="case-image">
            <?php if (!empty($caseStudy['solution_image'])): ?>
            <img src="<?php echo htmlspecialchars($caseStudy['solution_image']); ?>" alt="Solution" class="section-image">
            <?php endif; ?>
          </div>
  
          <div class="case-text">
            <h3>The Solution</h3>
            <p>
              <?php echo nl2br(htmlspecialchars($caseStudy['solutions'])); ?>
            </p>
          </div>
        </div>
  
        <div class="outcome">
          <div class="case-text">
            <h3>The Outcome</h3>
            <p>
              <?php echo nl2br(htmlspecialchars($caseStudy['outcome'])); ?>
            </p>
          </div>

          <div class="case-image">
            <?php if (!empty($caseStudy['outcome_image'])): ?>
            <img src="<?php echo htmlspecialchars($caseStudy['outcome_image']); ?>" alt="Outcome" class="section-image">
            <?php endif; ?>
          </div>
       </div>
       
       <div class="section-img">
        <?php if (!empty($caseStudy['final_showcase_image'])): ?>
        <img src="<?php echo htmlspecialchars($caseStudy['final_showcase_image']); ?>" alt="Final result" class="final-showcase-image">
        <?php endif; ?>
      </div>
      </section>

      <div class="next-project-section">
        <a href="index.php#projects">
          <button><strong>Back to Projects</strong></button>
        </a>
      </div>

    </main>
  </div>

<footer>
  <small>© OGBEIDE ONOH. ALL RIGHTS RESERVED.</small> 
  <div>
      <a href="https://www.linkedin.com/in/osarieme-ogbeide-1a8209292/" target="_blank">
          <img src="images/linkedin.png" alt="LinkedIn Profile" width="30"> 
      </a>
  </div>
</footer>
</body>
</html>