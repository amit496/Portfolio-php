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

    // REMOVED: Loading animation that was causing the flicker
    // $('body').css('opacity', '0');
    // $(window).on('load', function () {
    //     $('body').animate({ opacity: 1 }, 1500);
    // });

    console.log('🚀 Amit Gautam Portfolio loaded successfully!');
});



// Toaster message function
function showToaster(message, type = 'info') {
    const toasterContainer = document.getElementById('toaster-container');
    const toasterId = 'toaster-' + Date.now();

    const toasterHTML = `
                <div class="toaster-message ${type}" id="${toasterId}">
                    <div class="toaster-content">
                        <div class="toaster-title">
                            ${type === 'success' ? 'Success!' : type === 'error' ? 'Error!' : 'Info'}
                        </div>
                        <div class="toaster-text">${message}</div>
                    </div>
                    <button class="toaster-close" onclick="closeToaster('${toasterId}')">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="progress-bar"></div>
                </div>
            `;

    toasterContainer.insertAdjacentHTML('beforeend', toasterHTML);

    const toasterElement = document.getElementById(toasterId);

    // Show toaster with animation
    setTimeout(() => {
        toasterElement.classList.add('show');
    }, 100);

    // Auto remove after 5 seconds
    const autoRemove = setTimeout(() => {
        closeToaster(toasterId);
    }, 5000);

    // Store timeout ID for manual close
    toasterElement.setAttribute('data-timeout', autoRemove);
}

function closeToaster(toasterId) {
    const toasterElement = document.getElementById(toasterId);
    if (!toasterElement) return;

    // Clear auto-remove timeout
    const timeoutId = toasterElement.getAttribute('data-timeout');
    if (timeoutId) clearTimeout(timeoutId);

    // Hide with animation
    toasterElement.classList.remove('show');
    toasterElement.classList.add('hide');

    // Remove from DOM after animation
    setTimeout(() => {
        if (toasterElement.parentNode) {
            toasterElement.parentNode.removeChild(toasterElement);
        }
    }, 500);
}

// Check URL parameters and show toaster messages
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status && message) {
        const decodedMessage = decodeURIComponent(message);

        if (status === 'success') {
            showToaster(decodedMessage, 'success');
        } else if (status === 'error') {
            showToaster(decodedMessage, 'error');
        }

        // Clean URL (remove parameters)
        const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, cleanUrl);
    }
});

// Close toaster on click anywhere on toaster (except close button)
document.addEventListener('click', function (e) {
    if (e.target.closest('.toaster-message') && !e.target.closest('.toaster-close')) {
        const toaster = e.target.closest('.toaster-message');
        closeToaster(toaster.id);
    }
});
