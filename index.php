<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amit Gautam - Software Engineer Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
    
    <!-- Toaster Message Styles -->
    <style>
        .toaster-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 10000;
            max-width: 400px;
        }

        .toaster-message {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 20px;
            margin-bottom: 10px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border-left: 4px solid #fbbf24;
        }

        .toaster-message.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toaster-message.hide {
            transform: translateX(400px);
            opacity: 0;
        }

        .toaster-message.success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-left-color: #34d399;
        }

        .toaster-message.error {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-left-color: #f87171;
        }

        .toaster-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .toaster-content {
            flex: 1;
        }

        .toaster-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .toaster-text {
            font-size: 13px;
            opacity: 0.9;
            line-height: 1.4;
        }

        .toaster-close {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
            padding: 4px;
            border-radius: 4px;
        }

        .toaster-close:hover {
            opacity: 1;
            background: rgba(255,255,255,0.1);
        }

        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(255,255,255,0.5);
            width: 100%;
            border-radius: 0 0 12px 12px;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: white;
            animation: progress 5s linear forwards;
        }

        @keyframes progress {
            from { width: 100%; }
            to { width: 0%; }
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .toaster-container {
                top: 80px;
                right: 10px;
                left: 10px;
                max-width: none;
            }

            .toaster-message {
                transform: translateY(-100px);
            }

            .toaster-message.show {
                transform: translateY(0);
            }

            .toaster-message.hide {
                transform: translateY(-100px);
            }
        }
    </style>
</head>

<body class="text-white overflow-x-hidden">
    <!-- Toaster Container -->
    <div class="toaster-container" id="toaster-container"></div>

    <canvas id="three-canvas"></canvas>

    <div class="code-rain" id="code-rain"></div>

    <div class="social-float">
        <a href="https://www.linkedin.com/in/amit-gautam-590695217/" class="linkedin"
            title="Connect with me on LinkedIn" target="_blank">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://x.com/AKGAUTA77532668" class="twitter" title="Follow me on Twitter" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://wa.me/918573965259" class="whatsapp" title="Message me on WhatsApp" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:+918573965259" class="phone" title="Call me" target="_blank">
            <i class="fas fa-phone"></i>
        </a>
    </div>

    <div class="back-to-top" id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <div class="visiting-card" id="visiting-card">
        <div class="flex items-center justify-between h-full">
            <div class="flex-1">
                <h3 class="text-2xl font-bold text-yellow-400 mb-2">Amit Gautam</h3>
                <p class="text-base text-gray-300 mb-1">Software Engineer</p>
                <p class="text-sm text-gray-400 mb-3">Full Stack Developer</p>
                <div class="text-sm text-gray-400 space-y-1">
                    <p><i class="fas fa-envelope mr-2 text-yellow-400"></i>
                        <a href="mailto:Gautamamit557@gmail.com">Gautamamit557@gmail.com</a>
                    </p>
                    <p><i class="fas fa-phone mr-2 text-yellow-400"></i>
                        <a href="tel:+918573965259">+91 8573965259</a>
                    </p>
                    <p><i class="fas fa-map-marker-alt mr-2 text-yellow-400"></i>Aminabad, Lucknow, Uttar Pradesh, India
                    </p>
                    <p><i class="fas fa-calendar mr-2 text-yellow-400"></i>3+ Years Experience</p>
                </div>
            </div>
            <div class="text-right">
                <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center mb-3 animate-pulse">
                    <i class="fas fa-code text-black text-2xl"></i>
                </div>
                <p class="text-xs text-gray-400 font-semibold">Portfolio</p>
                <p class="text-xs text-yellow-400 font-bold">2025</p>
            </div>
        </div>
    </div>

    <nav class="fixed top-0 w-full z-50 glass-effect">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-white">
                    <span class="text-yellow-400">&lt;</span>
                    Amit Gautam
                    <span class="text-yellow-400">/&gt;</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="nav-link hover:text-yellow-400 transition-colors font-semibold">Home</a>
                    <a href="#about" class="nav-link hover:text-yellow-400 transition-colors font-semibold">About</a>
                    <a href="#skills" class="nav-link hover:text-yellow-400 transition-colors font-semibold">Skills</a>
                    <a href="#services"
                        class="nav-link hover:text-yellow-400 transition-colors font-semibold">Services</a>
                    <a href="#experience"
                        class="nav-link hover:text-yellow-400 transition-colors font-semibold">Experience</a>
                    <a href="#projects"
                        class="nav-link hover:text-yellow-400 transition-colors font-semibold">Projects</a>
                    <a href="#contact"
                        class="nav-link hover:text-yellow-400 transition-colors font-semibold">Contact</a>
                </div>
                <button class="md:hidden text-white" id="mobile-menu-btn">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden fixed top-0 left-0 w-full h-full glass-effect bg-opacity-95 z-50"
        id="mobile-menu">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between items-center mb-12">
                <div class="text-2xl font-bold text-white">
                    <span class="text-yellow-400">&lt;</span>
                    Amit Gautam
                    <span class="text-yellow-400">/&gt;</span>
                </div>
                <button class="text-white text-2xl" id="mobile-menu-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col space-y-8 text-center">
                <a href="#home"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Home</a>
                <a href="#about"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">About</a>
                <a href="#skills"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Skills</a>
                <a href="#services"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Services</a>
                <a href="#experience"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Experience</a>
                <a href="#projects"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Projects</a>
                <a href="#contact"
                    class="nav-link text-2xl font-bold text-white hover:text-yellow-400 transition-colors py-4">Contact</a>
            </div>
        </div>
    </div>

    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="container mx-auto px-6 text-center z-10">
            <div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow">
                    Hi, I'm <span class="name-logo">Amit Gautam</span>
                </h1>
                <div class="text-2xl md:text-4xl mb-8 typewriter" id="typewriter-text">
                    Software Engineer & Problem Solver
                </div>
                <p class="text-lg md:text-xl mb-12 max-w-3xl mx-auto opacity-90 leading-relaxed">
                    I'm a passionate software engineer with 3+ years of experience in building
                    scalable web applications using modern technologies like PHP, Laravel, JavaScript, and MySQL.
                </p>
                <div class="space-x-4 flex flex-wrap justify-center gap-4">
                    <button id="view-work-btn"
                        class="bg-yellow-400 text-gray-900 px-10 py-4 rounded-full font-bold hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-eye mr-2"></i>View My Work
                    </button>
                    <button class="resume-btn" onclick="downloadResume()">
                        <i class="fas fa-download mr-2"></i>Download Resume
                    </button>
                    <button id="get-touch-btn"
                        class="border-2 border-yellow-400 px-10 py-4 rounded-full font-bold hover:bg-yellow-400 hover:text-gray-900 transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-envelope mr-2"></i>Get In Touch
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">About Me</h2>
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="card-3d glass-effect p-10 rounded-3xl">
                    <h3 class="text-3xl font-bold mb-6 text-yellow-400">My Journey</h3>
                    <p class="text-lg mb-6 opacity-90 leading-relaxed">
                        I'm a dedicated software engineer with 3+ years of hands-on experience in full-stack
                        development. My expertise spans across modern web technologies including PHP, Laravel,
                        JavaScript, and database management.
                    </p>
                    <p class="text-lg mb-6 opacity-90 leading-relaxed">
                        I specialize in creating robust, scalable web applications that deliver exceptional user
                        experiences. My passion lies in solving complex problems and turning innovative ideas into
                        reality through clean, efficient code.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <span class="tech-stack">Problem Solving</span>
                        <span class="tech-stack">Team Leadership</span>
                        <span class="tech-stack">Project Management</span>
                        <span class="tech-stack">Code Review</span>
                    </div>
                </div>
                <div class="floating">
                    <div class="engineer-avatar mx-auto hologram-effect">
                        <img src="amit.png" alt="Amit Gautam - Software Engineer" class="engineer-photo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">Technical Skills</h2>

            <!-- Frontend Skills -->
            <div class="skill-category">
                <h3 class="category-title">Frontend Development</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-html5 text-5xl text-[#E44D26] mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">HTML</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="88"></div>
                            </div>
                            <span class="text-sm opacity-75">88%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-css3-alt text-5xl text-[#1572B6] mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">CSS</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="88"></div>
                            </div>
                            <span class="text-sm opacity-75">88%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-js-square text-5xl text-yellow-400 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">JavaScript</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="88"></div>
                            </div>
                            <span class="text-sm opacity-75">88%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fas fa-code text-5xl text-green-500 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">jQuery</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="85"></div>
                            </div>
                            <span class="text-sm opacity-75">85%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Framework Skills -->
            <div class="skill-category">
                <h3 class="category-title">Frameworks & Libraries</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-bootstrap text-5xl text-purple-500 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">Bootstrap</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="90"></div>
                            </div>
                            <span class="text-sm opacity-75">90%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fas fa-wind text-5xl text-cyan-400 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">Tailwind CSS</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="85"></div>
                            </div>
                            <span class="text-sm opacity-75">85%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-laravel text-5xl text-red-500 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">Laravel</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="83"></div>
                            </div>
                            <span class="text-sm opacity-75">83%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-node-js text-5xl text-green-600 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">Node.js</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="75"></div>
                            </div>
                            <span class="text-sm opacity-75">75%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backend Skills -->
            <div class="skill-category">
                <h3 class="category-title">Backend Development</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-php text-5xl text-indigo-400 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">PHP</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="87"></div>
                            </div>
                            <span class="text-sm opacity-75">87%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fas fa-database text-5xl text-orange-400 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">MySQL</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="80"></div>
                            </div>
                            <span class="text-sm opacity-75">80%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fab fa-git-alt text-5xl text-orange-600 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">Git & GitHub</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="85"></div>
                            </div>
                            <span class="text-sm opacity-75">85%</span>
                        </div>
                    </div>
                    <div class="skill-card card-3d glass-effect p-6 rounded-2xl equal-height">
                        <div class="card-content text-center">
                            <i class="fas fa-server text-5xl text-blue-400 mb-4"></i>
                            <h3 class="text-lg font-bold mb-2">REST API</h3>
                            <div class="bg-gray-700 rounded-full h-3 mb-2">
                                <div class="skill-bar" data-skill="82"></div>
                            </div>
                            <span class="text-sm opacity-75">82%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-20 bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">My Services</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-laptop-code text-6xl text-yellow-400 mb-4"></i>
                            <h3 class="text-xl font-bold">Web Development</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Full-stack web development using modern technologies like PHP, Laravel, JavaScript, and
                            MySQL to create dynamic, responsive websites.
                        </p>
                    </div>
                </div>

                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-mobile-alt text-6xl text-blue-400 mb-4"></i>
                            <h3 class="text-xl font-bold">Responsive Design</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Creating mobile-first, responsive designs that work perfectly across all devices and screen
                            sizes using Bootstrap and Tailwind CSS.
                        </p>
                    </div>
                </div>

                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-database text-6xl text-green-400 mb-4"></i>
                            <h3 class="text-xl font-bold">Database Design</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Designing efficient database structures and optimizing queries for better performance using
                            MySQL and database management best practices.
                        </p>
                    </div>
                </div>

                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-cog text-6xl text-purple-400 mb-4"></i>
                            <h3 class="text-xl font-bold">API Development</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Building robust RESTful APIs and web services for seamless integration between different
                            systems and platforms.
                        </p>
                    </div>
                </div>

                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-shopping-cart text-6xl text-red-400 mb-4"></i>
                            <h3 class="text-xl font-bold">E-commerce Solutions</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Developing complete e-commerce platforms with payment integration, inventory management, and
                            admin panels.
                        </p>
                    </div>
                </div>

                <div class="service-card card-3d glass-effect p-8 rounded-2xl equal-height">
                    <div class="card-content">
                        <div class="text-center mb-6">
                            <i class="fas fa-tools text-6xl text-orange-400 mb-4"></i>
                            <h3 class="text-xl font-bold">Maintenance & Support</h3>
                        </div>
                        <p class="text-gray-300 text-center">
                            Providing ongoing maintenance, updates, and technical support to ensure your applications
                            run smoothly and efficiently.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">Professional Experience</h2>
            <div class="experience-timeline">
                <div class="experience-item card-3d glass-effect p-8 rounded-2xl experience-equal-height">
                    <div class="card-content">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Senior Software Engineer</h3>
                        <h4 class="text-xl text-white  mb-2">Jamtech Technologies Pvt Ltd</h4>
                        <p class="text-gray-400 mb-4"><i class="fas fa-calendar mr-2"></i>June 2025 - Present</p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Leading development of enterprise-level web applications using Laravel and modern JavaScript
                            frameworks.
                            Mentoring junior developers and implementing best practices for code quality and performance
                            optimization.
                            Managing complex database architectures and ensuring scalable solutions for high-traffic
                            applications.
                            Successfully delivered 5+ major projects with 99.9% uptime and improved system performance
                            by 45%.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="tech-stack">Laravel</span>
                            <span class="tech-stack">PHP</span>
                            <span class="tech-stack">MySQL</span>
                            <span class="tech-stack">JavaScript</span>
                        </div>
                    </div>
                </div>

                <div class="experience-item card-3d glass-effect p-8 rounded-2xl experience-equal-height">
                    <div class="card-content">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Full Stack Developer</h3>
                        <h4 class="text-xl text-white mb-2">Singsys : Mobile & Web Application Development Company</h4>
                        <p class="text-gray-400 mb-4"><i class="fas fa-calendar mr-2"></i>May 2024 - May 2025</p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Developed and maintained multiple client projects using PHP, Laravel, and modern front-end
                            technologies.
                            Collaborated with design teams to create responsive, user-friendly interfaces and
                            implemented RESTful APIs.
                            Successfully delivered 15+ projects on time with high client satisfaction rates and 98% code
                            quality scores.
                            Optimized existing applications resulting in 30% faster load times and improved user
                            experience.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="tech-stack">PHP</span>
                            <span class="tech-stack">Laravel</span>
                            <span class="tech-stack">Bootstrap</span>
                            <span class="tech-stack">jQuery</span>
                        </div>
                    </div>
                </div>

                <div class="experience-item card-3d glass-effect p-8 rounded-2xl experience-equal-height">
                    <div class="card-content">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Backend Developer</h3>
                        <h4 class="text-xl text-white mb-2">Inventics Software Pvt Ltd</h4>
                        <p class="text-gray-400 mb-4"><i class="fas fa-calendar mr-2"></i>March 2024 - April 2024</p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Focused on server-side development and database optimization. Implemented RESTful APIs and
                            improved
                            application performance through efficient database queries and caching strategies. Reduced
                            API response
                            time by 40% through optimization techniques and implemented robust security measures for
                            data protection.
                            Worked closely with frontend teams to ensure seamless integration and optimal user
                            experience.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="tech-stack">PHP</span>
                            <span class="tech-stack">MySQL</span>
                            <span class="tech-stack">REST API</span>
                            <span class="tech-stack">Git</span>
                        </div>
                    </div>
                </div>

                <div class="experience-item card-3d glass-effect p-8 rounded-2xl experience-equal-height">
                    <div class="card-content">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Junior Web Developer</h3>
                        <h4 class="text-xl text-white mb-2">Quick Infotech Technologies Private Limited</h4>
                        <p class="text-gray-400 mb-4"><i class="fas fa-calendar mr-2"></i>May 2022 - February 2024</p>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Started professional journey building dynamic websites and learning industry best practices.
                            Gained expertise in HTML, CSS, JavaScript, and began working with PHP and MySQL databases.
                            Contributed to 10+ successful web projects and learned modern development workflows
                            including version control,
                            testing, and deployment processes. Developed strong problem-solving skills and attention to
                            detail.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="tech-stack">HTML5</span>
                            <span class="tech-stack">CSS3</span>
                            <span class="tech-stack">JavaScript</span>
                            <span class="tech-stack">PHP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-20 bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">Featured Projects</h2>
            <div class="owl-carousel owl-theme" id="projects-carousel">
                <!-- Project 1 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=200&fit=crop"
                            alt="E-Commerce Platform" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">ShopMaster Pro</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Complete e-commerce solution with advanced admin panel, secure payment gateway
                                integration,
                                comprehensive inventory management, order tracking, customer management system, and
                                real-time analytics dashboard.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-500 text-xs px-2 py-1 rounded-full">Laravel</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">PHP</span>
                                    <span class="bg-orange-500 text-xs px-2 py-1 rounded-full">MySQL</span>
                                    <span class="bg-purple-500 text-xs px-2 py-1 rounded-full">Bootstrap</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://shopmaster-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/shopmaster-pro" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=200&fit=crop"
                            alt="Task Management System" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">TaskFlow Manager</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Advanced project management tool featuring real-time notifications, team collaboration
                                workspace,
                                progress tracking dashboards, time logging, file sharing, and comprehensive reporting
                                system for enhanced productivity.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-indigo-500 text-xs px-2 py-1 rounded-full">PHP</span>
                                    <span class="bg-yellow-500 text-xs px-2 py-1 rounded-full">JavaScript</span>
                                    <span class="bg-green-500 text-xs px-2 py-1 rounded-full">jQuery</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">MySQL</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://taskflow-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/taskflow-manager" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=200&fit=crop"
                            alt="Analytics Dashboard" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">DataViz Analytics</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Real-time analytics dashboard with interactive charts, advanced data visualization,
                                comprehensive reporting features, data export capabilities, customizable widgets, and
                                automated insights generation.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-500 text-xs px-2 py-1 rounded-full">Laravel</span>
                                    <span class="bg-yellow-500 text-xs px-2 py-1 rounded-full">Chart.js</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">JavaScript</span>
                                    <span class="bg-cyan-500 text-xs px-2 py-1 rounded-full">Tailwind</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://dataviz-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/dataviz-analytics" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=200&fit=crop"
                            alt="CMS Blog Platform" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">BlogCraft CMS</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Professional content management system with user authentication, role-based access
                                control,
                                SEO optimization tools, media management, comment system, newsletter integration, and
                                advanced blog publishing features.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-indigo-500 text-xs px-2 py-1 rounded-full">PHP</span>
                                    <span class="bg-red-500 text-xs px-2 py-1 rounded-full">Laravel</span>
                                    <span class="bg-purple-500 text-xs px-2 py-1 rounded-full">Bootstrap</span>
                                    <span class="bg-orange-500 text-xs px-2 py-1 rounded-full">MySQL</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://blogcraft-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/blogcraft-cms" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&h=200&fit=crop"
                            alt="Social Media App" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">SocialConnect Hub</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Modern social networking platform with real-time messaging, photo sharing capabilities,
                                user profiles, friend connections, news feed, story features, live chat, and
                                comprehensive privacy controls.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-yellow-500 text-xs px-2 py-1 rounded-full">JavaScript</span>
                                    <span class="bg-indigo-500 text-xs px-2 py-1 rounded-full">PHP</span>
                                    <span class="bg-green-500 text-xs px-2 py-1 rounded-full">jQuery</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">WebSocket</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://socialconnect-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/socialconnect-hub" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop"
                            alt="Event Management" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">EventPro Manager</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Comprehensive event booking and management system with secure payment processing,
                                automated email notifications, ticket generation, attendee management, venue booking,
                                and detailed event analytics dashboard.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-500 text-xs px-2 py-1 rounded-full">Laravel</span>
                                    <span class="bg-purple-500 text-xs px-2 py-1 rounded-full">Bootstrap</span>
                                    <span class="bg-yellow-500 text-xs px-2 py-1 rounded-full">JavaScript</span>
                                    <span class="bg-green-500 text-xs px-2 py-1 rounded-full">PayPal API</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://eventpro-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/eventpro-manager" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 7 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=200&fit=crop"
                            alt="Business Website" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">CorpWeb Solutions</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Professional business website with portfolio showcase, interactive contact forms,
                                responsive design, service pages, testimonials section, blog integration, and
                                SEO-optimized content management system.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-orange-500 text-xs px-2 py-1 rounded-full">HTML5</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">CSS3</span>
                                    <span class="bg-yellow-500 text-xs px-2 py-1 rounded-full">JavaScript</span>
                                    <span class="bg-purple-500 text-xs px-2 py-1 rounded-full">Bootstrap</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://corpweb-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/corpweb-solutions" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 8 -->
                <div class="item">
                    <div class="project-card card-3d glass-effect rounded-2xl overflow-hidden project-equal-height">
                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop"
                            alt="Learning Management System" class="project-image">
                        <div class="p-6 card-content">
                            <h3 class="text-xl font-bold mb-3">EduPlatform LMS</h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                Advanced online learning platform with comprehensive course management, student progress
                                tracking,
                                assessment tools, video streaming, discussion forums, certificate generation, and
                                integrated payment system.
                            </p>
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-yellow-400 mb-2">Technologies Used:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-500 text-xs px-2 py-1 rounded-full">Laravel</span>
                                    <span class="bg-blue-500 text-xs px-2 py-1 rounded-full">PHP</span>
                                    <span class="bg-green-500 text-xs px-2 py-1 rounded-full">MySQL</span>
                                    <span class="bg-purple-500 text-xs px-2 py-1 rounded-full">Vue.js</span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-auto">
                                <a href="https://eduplatform-demo.netlify.app" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                </a>
                                <a href="https://github.com/johndoe/eduplatform-lms" target="_blank"
                                    class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    <i class="fab fa-github mr-1"></i> Source Code
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="section-heading">Get In Touch</h2>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16">
                <div class="space-y-8">
                    <div class="card-3d glass-effect p-8 rounded-2xl equal-height">
                        <h3 class="text-2xl font-bold mb-6 text-yellow-400">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-12 h-12 bg-yellow-400 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-yellow-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Name</h4>
                                    <p class="text-gray-300">Amit Gautam</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-12 h-12 bg-yellow-400 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-yellow-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Email</h4>
                                    <p class="text-gray-300">
                                        <a href="mailto:Gautamamit557@gmail.com"
                                            class="text-white">Gautamamit557@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-12 h-12 bg-yellow-400 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone text-yellow-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Phone</h4>
                                    <p class="text-gray-300">
                                        <a href="tel:+918573965259" class="text-white">+91 8573965259</a>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-12 h-12 bg-yellow-400 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-yellow-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Address</h4>
                                    <p class="text-gray-300">Aminabad, Lucknow, Uttar Pradesh, India</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Map -->
                    <div class="card-3d glass-effect p-8 rounded-2xl">
                        <h3 class="text-2xl font-bold mb-4 text-center text-yellow-400">Find Me Here</h3>
                        <div class="w-full h-64 bg-gray-700 rounded-lg overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31757.87367011658!2d80.83565708534187!3d26.84923132989213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfdc48716ecad%3A0x80a5111ef7198c49!2sKundari%20Rakabganj%2C%20Lucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1706927400000!5m2!1sen!2sin"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Location map of Aminabad, Lucknow, Uttar Pradesh, India">
                            </iframe>
                        </div>
                    </div>
                </div>

                <form class="contact-form card-3d glass-effect p-8 rounded-2xl" id="contact-form" action="send_email.php" method="post">
                    <h3 class="text-2xl font-bold mb-6 text-center text-yellow-400">Send Message</h3>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Full Name *</label>
                        <input type="text" name="name" placeholder="Your Name" required
                            class="w-full bg-gray-800 border-2 border-gray-600 rounded-lg px-6 py-4 focus:outline-none focus:border-yellow-400 transition-colors text-white placeholder-gray-400">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                        <input type="email" name="email" placeholder="Your Email" required
                            class="w-full bg-gray-800 border-2 border-gray-600 rounded-lg px-6 py-4 focus:outline-none focus:border-yellow-400 transition-colors text-white placeholder-gray-400">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Subject *</label>
                        <input type="text" name="subject" placeholder="Subject" required
                            class="w-full bg-gray-800 border-2 border-gray-600 rounded-lg px-6 py-4 focus:outline-none focus:border-yellow-400 transition-colors text-white placeholder-gray-400">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Message *</label>
                        <textarea name="message" placeholder="Your Message" rows="6" required
                            class="w-full bg-gray-800 border-2 border-gray-600 rounded-lg px-6 py-4 focus:outline-none focus:border-yellow-400 transition-colors text-white placeholder-gray-400"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-yellow-400 text-gray-900 font-bold py-4 rounded-lg hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300 text-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                    <p class="text-xs text-gray-400 text-center mt-6">* Required fields</p>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-8 text-center border-t border-gray-800">
        <p class="text-gray-400 text-lg">&copy; 2025 Amit Gautam Portfolio.</p>
    </footer>

    <script src="script.js"></script>

</body>

</html>