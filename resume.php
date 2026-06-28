<?php
$profile = [
    'name' => 'Amit Gautam',
    'title' => 'Software Engineer',
    'email' => 'Gautamamit557@gmail.com',
    'phone' => '+91 8573965259',
    'location' => 'Lucknow, Uttar Pradesh, India',
    'linkedin' => 'linkedin.com/in/amit-gautam-590695217',
    'summary' => 'Software Engineer with 3.5+ years of experience building scalable web applications using PHP, Laravel, MySQL, JavaScript, and jQuery. Strong background in backend architecture, REST API development, database-driven systems, performance optimization, and maintainable full-stack delivery across product and service environments.',
    'coreSkills' => [
        'PHP',
        'Laravel',
        'MySQL',
        'JavaScript',
        'jQuery',
        'REST APIs',
        'Bootstrap',
        'HTML5',
        'CSS3',
        'Git',
        'Backend Architecture',
        'Performance Optimization',
        'AI Feature Integration',
        'Cross-functional Collaboration'
    ],
];

$experience = [
    [
        'role' => 'Software Engineer',
        'company' => 'Skystone AI Tech Private Limited',
        'dates' => 'Jan 2026 - Present',
        'bullets' => [
            'Develop scalable, secure, and high-performance web applications using Laravel, PHP, and MySQL.',
            'Design backend architectures and RESTful APIs for database-driven business applications.',
            'Collaborate with cross-functional teams to integrate AI-driven features and improve product reliability.',
            'Maintain clean, structured, and production-ready code aligned with long-term scalability goals.'
        ]
    ],
    [
        'role' => 'Senior Software Engineer',
        'company' => 'Jamtech Technologies Pvt Ltd',
        'dates' => 'Jun 2025 - Jan 2026',
        'bullets' => [
            'Led development of enterprise web applications using Laravel and modern JavaScript.',
            'Improved application performance, code quality, and maintainability through best practices.',
            'Managed complex database workflows and scalable backend logic for high-traffic use cases.',
            'Supported delivery of major business-critical features across multiple projects.'
        ]
    ],
    [
        'role' => 'Full Stack Developer',
        'company' => 'Singsys : Mobile & Web Application Development Company',
        'dates' => 'May 2024 - Jun 2025',
        'bullets' => [
            'Built and maintained client projects using PHP, Laravel, JavaScript, Bootstrap, and MySQL.',
            'Developed responsive interfaces and integrated backend systems with RESTful APIs.',
            'Delivered multiple projects on time while maintaining strong code quality standards.',
            'Optimized existing modules to improve load time, usability, and overall application stability.'
        ]
    ],
    [
        'role' => 'Junior Web Developer',
        'company' => 'Quick Infotech Technologies Private Limited',
        'dates' => 'May 2022 - Feb 2024',
        'bullets' => [
            'Started professional career building dynamic websites and business web applications.',
            'Worked with HTML, CSS, JavaScript, PHP, and MySQL across end-to-end development tasks.',
            'Contributed to multiple successful web projects while learning industry workflows and version control.',
            'Built a strong foundation in debugging, implementation quality, and practical problem solving.'
        ]
    ]
];

$projects = [
    [
        'name' => 'ShopMaster Pro',
        'stack' => 'Laravel, PHP, MySQL, Bootstrap',
        'description' => 'E-commerce platform with admin workflows, secure payment handling, order management, and user-facing storefront features.'
    ],
    [
        'name' => 'TaskFlow Manager',
        'stack' => 'PHP, JavaScript, jQuery, MySQL',
        'description' => 'Task and team management system with collaboration tools, progress tracking, notifications, and reporting support.'
    ],
    [
        'name' => 'DataViz Analytics',
        'stack' => 'Laravel, JavaScript, Tailwind, Chart.js',
        'description' => 'Analytics dashboard for reporting and visualization with interactive charts and actionable business insights.'
    ],
    [
        'name' => 'BlogCraft CMS',
        'stack' => 'PHP, Laravel, Bootstrap, MySQL',
        'description' => 'Content management platform with authentication, role-based access, media management, and publishing workflows.'
    ]
];

$downloadMode = isset($_GET['download']) && $_GET['download'] === '1';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile['name']); ?> - Resume</title>
    <style>
        :root {
            --ink: #111827;
            --muted: #4b5563;
            --line: #d1d5db;
            --accent: #1f4b99;
            --paper: #ffffff;
            --bg: #eef2f7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: var(--bg);
            line-height: 1.45;
        }

        .toolbar {
            max-width: 900px;
            margin: 24px auto 0;
            padding: 0 16px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            border: 1px solid var(--accent);
            background: var(--accent);
            color: #fff;
            padding: 12px 18px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-secondary {
            background: #fff;
            color: var(--accent);
        }

        .resume-page {
            max-width: 900px;
            margin: 20px auto 40px;
            background: var(--paper);
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.12);
            padding: 40px 44px;
        }

        .header {
            border-bottom: 2px solid var(--ink);
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .name {
            margin: 0;
            font-size: 32px;
            line-height: 1.1;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .title {
            margin: 8px 0 14px;
            font-size: 16px;
            font-weight: 700;
            color: var(--muted);
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 18px;
            font-size: 14px;
            color: var(--muted);
        }

        .contact span {
            white-space: nowrap;
        }

        .section {
            margin-bottom: 22px;
        }

        .section-title {
            margin: 0 0 10px;
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--line);
            padding-bottom: 6px;
        }

        .summary {
            margin: 0;
            font-size: 14px;
        }

        .skills {
            margin: 0;
            font-size: 14px;
        }

        .entry {
            margin-bottom: 18px;
        }

        .entry:last-child {
            margin-bottom: 0;
        }

        .entry-head {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: baseline;
            margin-bottom: 6px;
        }

        .entry-role {
            font-size: 16px;
            font-weight: 700;
        }

        .entry-company {
            font-size: 14px;
            font-weight: 700;
            color: var(--muted);
        }

        .entry-dates {
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
            white-space: nowrap;
        }

        ul {
            margin: 8px 0 0 18px;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .project-line {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .project-line strong {
            font-size: 14px;
        }

        .footnote {
            margin-top: 18px;
            font-size: 12px;
            color: var(--muted);
        }

        @page {
            size: A4;
            margin: 0.5in;
        }

        @media (max-width: 720px) {
            .resume-page {
                margin: 12px;
                padding: 24px 20px;
            }

            .toolbar {
                padding: 0 12px;
                justify-content: stretch;
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .entry-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .contact {
                flex-direction: column;
                gap: 6px;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .toolbar {
                display: none !important;
            }

            .resume-page {
                max-width: none;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

            a {
                color: inherit;
                text-decoration: none;
            }
        }
    </style>
</head>
<body>
    <div class="toolbar">
        <a class="btn btn-secondary" href="index.php">Back to Portfolio</a>
        <button class="btn" type="button" onclick="window.print()">Download PDF</button>
    </div>

    <main class="resume-page">
        <header class="header">
            <h1 class="name"><?php echo htmlspecialchars($profile['name']); ?></h1>
            <p class="title"><?php echo htmlspecialchars($profile['title']); ?></p>
            <div class="contact">
                <span><?php echo htmlspecialchars($profile['location']); ?></span>
                <span><?php echo htmlspecialchars($profile['phone']); ?></span>
                <span><?php echo htmlspecialchars($profile['email']); ?></span>
                <span><?php echo htmlspecialchars($profile['linkedin']); ?></span>
            </div>
        </header>

        <section class="section">
            <h2 class="section-title">Professional Summary</h2>
            <p class="summary"><?php echo htmlspecialchars($profile['summary']); ?></p>
        </section>

        <section class="section">
            <h2 class="section-title">Core Skills</h2>
            <p class="skills"><?php echo htmlspecialchars(implode(', ', $profile['coreSkills'])); ?></p>
        </section>

        <section class="section">
            <h2 class="section-title">Professional Experience</h2>
            <?php foreach ($experience as $job): ?>
                <article class="entry">
                    <div class="entry-head">
                        <div>
                            <div class="entry-role"><?php echo htmlspecialchars($job['role']); ?></div>
                            <div class="entry-company"><?php echo htmlspecialchars($job['company']); ?></div>
                        </div>
                        <div class="entry-dates"><?php echo htmlspecialchars($job['dates']); ?></div>
                    </div>
                    <ul>
                        <?php foreach ($job['bullets'] as $bullet): ?>
                            <li><?php echo htmlspecialchars($bullet); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="section">
            <h2 class="section-title">Selected Projects</h2>
            <?php foreach ($projects as $project): ?>
                <p class="project-line">
                    <strong><?php echo htmlspecialchars($project['name']); ?></strong> |
                    <?php echo htmlspecialchars($project['stack']); ?><br>
                    <?php echo htmlspecialchars($project['description']); ?>
                </p>
            <?php endforeach; ?>
        </section>

        <section class="section">
            <h2 class="section-title">Additional Information</h2>
            <p class="summary">
                Resume layout is designed to remain ATS-friendly with standard headings, single-column structure,
                print-safe formatting, and recruiter-friendly readability for applications across the USA, UK, and
                other international markets.
            </p>
        </section>

        <p class="footnote">Tip: Use the "Download PDF" button and save with paper size set to A4 or Letter for best output.</p>
    </main>

    <script>
        (function () {
            const shouldPrint = <?php echo $downloadMode ? 'true' : 'false'; ?>;
            if (shouldPrint) {
                window.addEventListener('load', function () {
                    window.print();
                });
            }
        })();
    </script>
</body>
</html>
