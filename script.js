$(document).ready(function () {
    // ========== MOBILE MENU FIX ==========
    // Mobile menu toggle
    $('#mobile-menu-btn').click(function () {
        $('#mobile-menu').addClass('active');
        $('body').css('overflow', 'hidden');
    });

    // Mobile menu close
    $('#mobile-menu-close').click(function () {
        $('#mobile-menu').removeClass('active');
        $('body').css('overflow', 'auto');
    });

    // Close mobile menu when clicking on links
    $('#mobile-menu .nav-link').click(function () {
        $('#mobile-menu').removeClass('active');
        $('body').css('overflow', 'auto');

        // Smooth scroll to section
        const target = $(this).attr('href');
        smoothScrollTo(target);
    });

    // Three.js Background Animation
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({
        canvas: document.getElementById('three-canvas'),
        alpha: true
    });
    renderer.setSize(window.innerWidth, window.innerHeight);

    // Create floating particles
    const particles = new THREE.Group();
    const geometries = [
        new THREE.SphereGeometry(0.15, 12, 12),
        new THREE.BoxGeometry(0.3, 0.3, 0.3),
        new THREE.ConeGeometry(0.15, 0.4, 8),
        new THREE.OctahedronGeometry(0.2)
    ];

    for (let i = 0; i < 200; i++) {
        const geometry = geometries[Math.floor(Math.random() * geometries.length)];
        const material = new THREE.MeshBasicMaterial({
            color: Math.random() > 0.7 ? 0xfbbf24 : Math.random() > 0.5 ? 0x8b5cf6 : Math.random() > 0.3 ? 0x3b82f6 : 0xef4444,
            transparent: true,
            opacity: 0.8
        });
        const particle = new THREE.Mesh(geometry, material);

        particle.position.x = (Math.random() - 0.5) * 80;
        particle.position.y = (Math.random() - 0.5) * 80;
        particle.position.z = (Math.random() - 0.5) * 80;

        particle.userData = {
            velocityX: (Math.random() - 0.5) * 0.03,
            velocityY: (Math.random() - 0.5) * 0.03,
            velocityZ: (Math.random() - 0.5) * 0.03,
            rotationSpeed: Math.random() * 0.02
        };

        particles.add(particle);
    }
    scene.add(particles);
    camera.position.z = 5;

    function animate() {
        requestAnimationFrame(animate);

        particles.children.forEach(particle => {
            particle.rotation.x += particle.userData.rotationSpeed;
            particle.rotation.y += particle.userData.rotationSpeed;

            particle.position.x += particle.userData.velocityX;
            particle.position.y += particle.userData.velocityY;
            particle.position.z += particle.userData.velocityZ;

            if (Math.abs(particle.position.x) > 40) particle.userData.velocityX *= -1;
            if (Math.abs(particle.position.y) > 40) particle.userData.velocityY *= -1;
            if (Math.abs(particle.position.z) > 40) particle.userData.velocityZ *= -1;
        });

        particles.rotation.x += 0.0008;
        particles.rotation.y += 0.0015;
        renderer.render(scene, camera);
    }
    animate();

    // Code Rain Effect
    function createCodeRain() {
        const codeChars = ['0', '1', '{', '}', '<', '>', '/', 'function', 'const', 'let', 'var', '=>', '()', '[]', 'PHP', 'JS', 'CSS', 'HTML', 'Laravel', 'Nodejs', 'React', 'MySql'];
        const codeRain = $('#code-rain');

        setInterval(() => {
            const drop = $('<div class="code-drop"></div>');
            drop.text(codeChars[Math.floor(Math.random() * codeChars.length)]);
            drop.css({
                left: Math.random() * 100 + '%',
                animationDuration: (Math.random() * 4 + 3) + 's',
                fontSize: (Math.random() * 8 + 12) + 'px'
            });
            codeRain.append(drop);

            setTimeout(() => drop.remove(), 7000);
        }, 150);
    }
    createCodeRain();

    // Initialize Owl Carousel for Projects
    $('#projects-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            1024: { items: 3 }
        }
    });

    // Resume Download Function
    window.downloadResume = function () {
        const fileId = '1H8WdpXvkH28CiZyjOQiec_S6_lylCIhr';
        const downloadUrl = `https://drive.google.com/uc?export=download&id=${fileId}`;

        const link = document.createElement('a');
        link.href = downloadUrl;
        link.download = 'amit-gautam.pdf';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        alert('Resume download started!');
    };

    // Show visiting card after 3 seconds
    setTimeout(() => {
        $('#visiting-card').addClass('show');
    }, 3000);

    // Hide visiting card on click
    $('#visiting-card').click(function () {
        $(this).removeClass('show');
    });

    // Smooth scrolling function
    function smoothScrollTo(target) {
        const targetElement = $(target);
        if (targetElement.length) {
            const navHeight = $('nav').outerHeight();
            const targetPosition = targetElement.offset().top - navHeight;

            $('html, body').animate({
                scrollTop: targetPosition
            }, 800, 'swing');
        }
    }

    // Navigation link clicks
    $('.nav-link').click(function (e) {
        e.preventDefault();
        const target = $(this).attr('href');
        smoothScrollTo(target);
    });

    // CTA Button clicks
    $('#view-work-btn').click(function (e) {
        e.preventDefault();
        smoothScrollTo('#projects');
    });

    $('#get-touch-btn').click(function (e) {
        e.preventDefault();
        smoothScrollTo('#contact');
    });

    // Back to Top Button
    $(window).scroll(function () {
        const scrolled = $(window).scrollTop();

        if (scrolled > 300) {
            $('#back-to-top').addClass('show');
        } else {
            $('#back-to-top').removeClass('show');
        }

        // Skill bars animation
        $('.skill-card').each(function () {
            const skillTop = $(this).offset().top;
            const skillBottom = skillTop + $(this).outerHeight();
            const windowTop = $(window).scrollTop();
            const windowBottom = windowTop + $(window).height();

            if (windowBottom > skillTop && windowTop < skillBottom) {
                $(this).find('.skill-bar').addClass('animate');
            }
        });
    });

    $('#back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });

    // Contact form submission
    // $('.contact-form').submit(function (e) {
    //     e.preventDefault();
    //     const btn = $(this).find('button');
    //     const originalText = btn.html();

    //     btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Sending...').prop('disabled', true);

    //     setTimeout(() => {
    //         btn.html('<i class="fas fa-check mr-2"></i>Message Sent!').removeClass('bg-yellow-400').addClass('bg-green-500');

    //         setTimeout(() => {
    //             $(this)[0].reset();
    //             btn.html(originalText).removeClass('bg-green-500').addClass('bg-yellow-400').prop('disabled', false);
    //         }, 3000);
    //     }, 2000);
    // });

    // Contact form submission - UPDATED
    $('#contact-form').submit(function (e) {
        e.preventDefault();

        const btn = $(this).find('button');
        const originalText = btn.html();
        const formMessages = $('#form-messages');

        // Show loading state
        btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Sending...').prop('disabled', true);
        formMessages.addClass('hidden').removeClass('bg-green-500 bg-red-500').text('');

        // Form data collect karo
        const formData = {
            name: $('input[name="name"]').val(),
            email: $('input[name="email"]').val(),
            subject: $('input[name="subject"]').val(),
            message: $('textarea[name="message"]').val()
        };

        // AJAX request to PHP
        $.ajax({
            url: 'send_email.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Success message
                    formMessages.removeClass('hidden').addClass('bg-green-500').text(response.message);
                    btn.html('<i class="fas fa-check mr-2"></i>Message Sent!');

                    // Form reset karo
                    $('#contact-form')[0].reset();

                    // 5 seconds baad button reset karo
                    setTimeout(() => {
                        btn.html(originalText).prop('disabled', false);
                        formMessages.addClass('hidden');
                    }, 5000);
                } else {
                    // Error message
                    formMessages.removeClass('hidden').addClass('bg-red-500').text(response.message);
                    btn.html(originalText).prop('disabled', false);
                }
            },
            error: function () {
                // Network error
                formMessages.removeClass('hidden').addClass('bg-red-500').text('Network error. Please try again later.');
                btn.html(originalText).prop('disabled', false);
            }
        });
    });

    // Advanced typing effect
    const texts = [
        'Software Engineer 💻',
        'PHP Developer 🔧',
        'Laravel Expert 🚀',
        'Full Stack Developer ⚡',
        'Problem Solver 🧩',
        'Code Enthusiast 💡',
        'Database Architect 🗄️',
        'Web Developer 🌐'
    ];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typewriterElement = $('#typewriter-text');

    function advancedTypeWriter() {
        const currentText = texts[textIndex];

        if (isDeleting) {
            typewriterElement.text(currentText.substring(0, charIndex - 1));
            charIndex--;
        } else {
            typewriterElement.text(currentText.substring(0, charIndex + 1));
            charIndex++;
        }

        let typeSpeed = isDeleting ? 80 : 120;

        if (!isDeleting && charIndex === currentText.length) {
            typeSpeed = 3000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typeSpeed = 500;
        }

        setTimeout(advancedTypeWriter, typeSpeed);
    }

    setTimeout(advancedTypeWriter, 2000);

    // Add scroll-triggered animations
    function checkScroll() {
        $('.card-3d, .skill-card, .project-card, .experience-item, .service-card').each(function () {
            const elementTop = $(this).offset().top;
            const elementBottom = elementTop + $(this).outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-in');
            }
        });
    }

    $(window).scroll(checkScroll);
    checkScroll();

    // Window resize handler
    $(window).resize(function () {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    // Add loading animation
    $('body').css('opacity', '0');
    $(window).on('load', function () {
        $('body').animate({ opacity: 1 }, 1500);
    });

    console.log('🚀 Amit Gautam Portfolio loaded successfully!');
});