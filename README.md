# Onoh Portfolio

A modern, responsive portfolio website showcasing graphic and product design work with interactive features and clean aesthetics.

## Overview

This portfolio website features a dark theme with white accents and strategic red highlights. Built for a graphic and product designer, it showcases projects through an interactive gallery system with detailed case studies.

## Features

### Homepage
- **Hero section** with portfolio introduction and demo reel
- **Project gallery** with lightbox effects
- **About section** with personal introduction
- **Marquee effect** displaying industries and services (inspired by Obys Agency)
- **Contact form** with validation and feedback messages
- **Smooth scrolling** navigation between sections

### Case Study Pages
- **Dynamic content** loaded from MySQL database
- **Image galleries** with top thumbnail grid and hero images
- **Structured layout**: Challenge, Solution, Outcome sections
- **Alternating text/image** layout for better visual flow
- **Back to projects** navigation button

### Interactive Features
- **Lightbox gallery** for all portfolio images with navigation
- **Keyboard support** (arrow keys, escape to close)
- **Mobile-responsive** design across all devices
- **Hover animations** and smooth transitions

## Technologies

### Frontend
- **HTML5** - Semantic markup structure
- **CSS3** - Custom styling with animations and transitions
- **JavaScript (ES6)** - Interactive lightbox gallery and form handling
- **Sass (SCSS)** - Organized stylesheets with variables and mixins

### Backend
- **PHP** - Server-side logic and database interactions
- **MySQL** - Database for storing project and case study data
- **PDO** - Secure database connections

### Tools
- **Custom Grid System** - Responsive 12-column layout
- **Live Sass Compiler** - Real-time Sass compilation
- **Git** - Version control


## Setup

1. **Clone the repository**
  
2. **Database Configuration**
   - Create a MySQL database for the project
   - Import your project and case study tables
   - Update database credentials in `includes/connect.php`

3. **Sass Compilation**
   - Install Live Sass Compiler extension in VS Code
   - Open the project and start watching Sass files
   - CSS will automatically compile to `css/main.css`

4. **Local Development**
   - Set up local server (XAMPP, WAMP, or MAMP)
   - Ensure PHP and MySQL services are running
   - Access the site via `localhost/portfolio_now`

## Key Features Explained

### Lightbox Gallery
- Click any image to open in fullscreen lightbox
- Navigate with arrow keys or on-screen buttons
- Press Escape to close
- Works on both homepage projects and case study images

### Marquee Effect
- CSS-only animation inspired by modern agency websites
- Two rows of text scrolling in opposite directions
- Displays industries and design services
- Fully responsive with mobile optimization

### Responsive Grid
- Custom 4-column grid on mobile
- 12-column grid on tablet and desktop
- Fluid breakpoints at 768px and 1200px
- Optimized spacing and typography scaling

## Contact

**Onoh (Osarieme Ogbeide)**  
LinkedIn: [Profile Link](https://www.linkedin.com/in/osarieme-ogbeide-1a8209292/)
