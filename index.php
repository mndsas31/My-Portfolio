<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.'); window.history.back();</script>";
    } else {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "portfolio_db";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        
        if ($stmt->execute()) {
            echo "<script>alert('Thank you for your message. I will get back to you soon!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mondo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">Mondo</a>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <?php include 'nav.php'; ?>
        </div>
    </header>

    <section class="hero" id="home">
        <div class="container hero-content">
            <h1>I'm <span class="hero-highlight">Reymondo Sastrillas</span></h1>
            <h2>BSIT 2nd Year Student</h2>
            <p>IT student chasing dreams to become a web developer.</p>
            <div class="hero-buttons">
                <a href="#projects" class="btn btn-primary">View Work</a>
                <a href="#contact" class="btn btn-outline">Contact Me</a>
            </div>
        </div>
    </section>

    <section class="section about" id="about">
        <div class="container">
            <div class="section-title">
                <h2>About <span>Me</span></h2>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <img src="Mondo.jpg" alt="Reymondo Sastrillas">
                </div>
                <div class="about-text">
                    <h3>Who am I?</h3>
                    <p>I'm a second-year BSIT student passionately pursuing my dream of becoming a skilled web developer and achieving financial success.</p><br>
                    <div class="about-info">
                        <div class="info-item">
                            <span>Name:</span>Reymondo Sastrillas
                        </div>
                        <div class="info-item">
                            <span>Email:</span>sastrillasr@gmail.com
                        </div>
                        <div class="info-item">
                            <span>From:</span>Lapu-lapu, Cebu
                        </div>
                        <div class="info-item">
                            <span>Freelance:</span>Available
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Download CV</a>
                        <a href="#contact" class="btn btn-outline">Hire Me</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section skills" id="skills">
        <div class="container">
            <div class="section-title">
                <h2>My <span>Skills</span></h2>
            </div>
            <div class="skills-container">
                <div class="skills-column">
                    <h3>Technical Skills</h3>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">HTML/CSS</span>
                            <span class="skill-percent">40%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 40%;"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">JavaScript</span>
                            <span class="skill-percent">20%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 20%;"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Java</span>
                            <span class="skill-percent">35%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 35%;"></div>
                        </div>
                    </div>
                </div>
                <div class="skills-column">
                    <h3>Professional Skills</h3>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Communication</span>
                            <span class="skill-percent">30%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 30%;"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Team Work</span>
                            <span class="skill-percent">55%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 55%;"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Creativity</span>
                            <span class="skill-percent">35%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 35%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section projects" id="projects">
        <div class="container">
            <div class="section-title">
                <h2>My <span>Projects</span></h2>
            </div>
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="computore.PNG" alt="E-commerce Platform">
                    </div>
                    <div class="project-content">
                        <h3>E-commerce Platform</h3>
                        <p>A full-featured online store with payment integration and inventory management.</p>
                        <div class="project-tags">
                            <span class="tag">PHP</span>
                            <span class="tag">CSS</span>
                            <span class="tag">JavaScript</span>
                            <span class="tag">CodeIgniter3</span>
                        </div>
                        <a href="index.php" class="project-link">
                            View Project <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">
                        <img src="portfolio.PNG" alt="Portfolio Website">
                    </div>
                    <div class="project-content">
                        <h3>Portfolio Website</h3>
                        <p>A responsive portfolio website showcasing creative work and services.</p>
                        <div class="project-tags">
                            <span class="tag">HTML/CSS</span>
                            <span class="tag">JavaScript</span>
                            <span class="tag">PHP</span>
                        </div>
                        <a href="index.php" class="project-link">
                            View Project <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="projects-more">
                <a href="#" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </section>

    <section class="section experience" id="experience">
        <div class="container">
            <div class="section-title">
                <h2>Work <span>Experience</span></h2>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-date">2025 - Present</span>
                        <h3 class="timeline-title">BSIT - 2nd Year</h3>
                        <p class="timeline-company">ACLC of Mandaue</p>
                        <p class="timeline-description">
                            Dedicated student working hard to master coding and expand programming skills.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact <span>Me</span></h2>
            </div>
            <div class="contact-container">
                <form class="contact-form" action="index.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" required></textarea>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <a href="#" class="footer-logo">Portfolio<span>.</span></a>
                    <p class="footer-about">
                        Keep trying hard!
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Web Development</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Contact Info</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Lapu-lapu, Cebu</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>09859048153</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>sastrillasr@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Mondo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>