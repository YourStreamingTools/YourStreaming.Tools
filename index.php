<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>YourStreamingTools - By Streamers, For Streamers</title>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.ico" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <nav class="navbar is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item" href="#home">
                <img src="https://cdn.yourstreamingtools.com/img/logo.ico" alt="Logo" style="max-height: 2.5rem;">
                <span style="margin-left: 0.5rem; font-weight: bold;">YourStreamingTools</span>
            </a>
            <div class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="#about">About</a>
                <a class="navbar-item" href="#team">Team</a>
                <a class="navbar-item" href="#projects">Projects</a>
                <a class="navbar-item" href="#contact">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero is-fullheight" id="home">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1">
                    <i class="fas fa-broadcast-tower"></i>
                    YourStreamingTools
                </h1>
                <h2 class="subtitle is-3">
                    By Streamers, For Streamers
                </h2>
                <p class="is-size-5 mb-6">
                    We're a passionate team dedicated to creating innovative tools and solutions for the streaming community.
                </p>
                <div class="buttons is-centered">
                    <a class="button is-primary is-large" href="#projects">
                        <span class="icon">
                            <i class="fas fa-rocket"></i>
                        </span>
                        <span>Explore Our Projects</span>
                    </a>
                    <a class="button is-light is-large" href="#team">
                        <span class="icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span>Meet the Team</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="has-text-centered mb-6">
                <h2 class="title is-2">About Us</h2>
                <p class="subtitle">Our mission and what drives us</p>
            </div>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <p class="is-size-5 has-text-centered">
                                    YourStreamingTools was born from the streaming community's need for better, more intuitive tools. 
                                    As streamers ourselves, we understand the challenges and opportunities in the streaming world.
                                </p>
                                <br>
                                <div class="columns">
                                    <div class="column">
                                        <div class="stats-card">
                                            <div class="stat-number">2+</div>
                                            <div>Years Active</div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="stats-card">
                                            <div class="stat-number">5+</div>
                                            <div>Projects</div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="stats-card">
                                            <div class="stat-number">50+</div>
                                            <div>Streamers Helped</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section" id="team">
        <div class="container">
            <div class="has-text-centered mb-6">
                <h2 class="title is-2">Our Team</h2>
                <p class="subtitle">The passionate people behind YourStreamingTools</p>
            </div>
            <div class="columns is-multiline">
                <div class="column is-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="team-member">
                                <div class="avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h3 class="title is-4">Lachlan (gfaUnDead)</h3>
                                <p class="subtitle is-6">Lead Developer & Founder</p>
                                <p>The passionate developer behind YourStreamingTools, bringing real-world streaming experience to every project created.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="team-member">
                                <div class="avatar">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="title is-4">Community</h3>
                                <p class="subtitle is-6">Contributors & Testers</p>
                                <p>Our amazing community of streamers who provide feedback, test our tools, and help us understand what the streaming world really needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="section" id="projects">
        <div class="container">
            <div class="has-text-centered mb-6">
                <h2 class="title is-2">Our Projects</h2>
                <p class="subtitle">Tools and platforms we've built for the streaming community</p>
            </div>
            <div class="columns is-multiline projects-grid">
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">BotOfTheSpecter</h3>
                                        <p class="subtitle is-6">Advanced Twitch Chat Bot</p>
                                        <p>A comprehensive Twitch chat bot system with advanced features for streamers.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <a href="https://botofthespecter.com/" target="_blank" class="button is-primary">
                                            <span class="icon">
                                                <i class="fas fa-external-link-alt"></i>
                                            </span>
                                            <span>Visit Project</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-music"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">DMCA-Free Music</h3>
                                        <p class="subtitle is-6">Streaming Music Solution</p>
                                        <p>A browser source music player with DMCA-free music for streamers, featuring automatic VoD track separation.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <a href="https://botofthespecter.com/" target="_blank" class="button is-primary">
                                            <span class="icon">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span>Integrated with BotOfTheSpecter</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-list-check"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">YourListOnline</h3>
                                        <p class="subtitle is-6">Todo List Management</p>
                                        <p>A simple yet powerful online todo list manager for streamers and content creators.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <a href="https://botofthespecter.com/" target="_blank" class="button is-primary">
                                            <span class="icon">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span>Integrated with BotOfTheSpecter</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">API Services</h3>
                                        <p class="subtitle is-6">Developer Tools</p>
                                        <p>Time, weather, and quote APIs that power various streaming tools and applications.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <span class="button is-light" disabled>
                                            <span class="icon">
                                                <i class="fas fa-archive"></i>
                                            </span>
                                            <span>Legacy Service</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">Streaming Tools</h3>
                                        <p class="subtitle is-6">Utilities & Widgets</p>
                                        <p>Various streaming utilities, overlays, and widgets to enhance your streaming experience.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <span class="button is-info" disabled>
                                            <span class="icon">
                                                <i class="fas fa-hammer"></i>
                                            </span>
                                            <span>In Development</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="project-card-content">
                                <div class="project-icon">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="project-info">
                                    <div class="project-description">
                                        <h3 class="title is-4">Future Projects</h3>
                                        <p class="subtitle is-6">What's Coming Next</p>
                                        <p>We're always working on new ideas and tools to help the streaming community grow and thrive.</p>
                                    </div>
                                    <div class="project-buttons">
                                        <span class="button is-success" disabled>
                                            <span class="icon">
                                                <i class="fas fa-lightbulb"></i>
                                            </span>
                                            <span>Stay Tuned</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
        <div class="container">
            <div class="has-text-centered mb-6">
                <h2 class="title is-2">Get In Touch</h2>
                <p class="subtitle">Connect with us and stay updated</p>
            </div>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="card">
                        <div class="card-content has-text-centered">
                            <p class="is-size-5 mb-4">
                                We love connecting with fellow streamers and developers! 
                                Whether you have questions, feedback, or collaboration ideas, we'd love to hear from you.
                            </p>
                            <div class="social-links">
                                <a href="https://github.com/YourStreamingTools" target="_blank" title="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="https://discord.com/invite/ANwEkpauHJ" target="_blank" title="Discord">
                                    <i class="fab fa-discord"></i>
                                </a>
                                <a href="https://twitter.com/Tools4Streaming" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="mailto:contact@yourstreamingtools.com" title="Email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>YourStreamingTools</strong> - By Streamers, For Streamers<br>
                    © 2025 YourStreamingTools. Made with <i class="fas fa-heart" style="color: #ff6b6b;"></i> for the streaming community.
                </p>
                <p class="is-size-7 has-text-grey-light">
                    All our projects are developed with the streaming community in mind. 
                    We believe in creating tools that genuinely help streamers succeed.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Navbar burger functionality
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }

            // Smooth scrolling for navigation links
            const navLinks = document.querySelectorAll('a[href^="#"]');
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        targetSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        // Close mobile menu if open
                        const navbarMenu = document.getElementById('navbarMenu');
                        const navbarBurger = document.querySelector('.navbar-burger');
                        if (navbarMenu && navbarBurger) {
                            navbarMenu.classList.remove('is-active');
                            navbarBurger.classList.remove('is-active');
                        }
                    }
                });
            });

            // Add scroll effect to navbar
            let lastScrollTop = 0;
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', () => {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up
                    navbar.style.transform = 'translateY(0)';
                }
                lastScrollTop = scrollTop;
            });

            // Add transition to navbar
            navbar.style.transition = 'transform 0.3s ease-in-out';
        });
    </script>
</body>
</html>