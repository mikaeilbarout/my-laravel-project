<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Resume Bank</title>

    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* General */
        body { 
            font-family: 'Arial', sans-serif; 
            background: #c2abab; 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
            color: #333;
        }

        /* Header */
        header { 
            background: #520645; 
            color: white; 
            padding: 40px 20px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        header h1 { 
            position: absolute;
            left: 50%; 
            transform: translateX(-50%);
            margin: 0; 
            font-size: 32px; 
            letter-spacing: 2px;
            flex-grow: 1;
            text-align: center;
        }

        /* Navigation links */
        nav a { 
            color: white; 
            text-decoration: none; 
            margin: 0 10px; 
            font-weight: bold;
            transition: color 0.2s ease;
        }

        nav a:hover { 
            color: #1b2933;
        }

        /* Social icons */
        .social-icons a { 
            color: white; 
            margin-left: 15px; 
            font-size: 20px; 
            transition: transform 0.2s, color 0.2s; 
        }

        .social-icons a:hover { 
            transform: scale(1.2);
            color: #1b2933;
        }

        /* Main content */
        .content { 
            flex: 1; 
            max-width: 900px; 
            margin: 30px auto; 
            background: #e2e2e2; 
            padding: 30px; 
            width: 90%; 
            border-radius: 10px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* Footer */
        footer { 
            background: #520645; 
            color: white; 
            text-align: center; 
            padding: 15px; 
            margin-top: auto; 
            font-size: 14px;
        }

        footer p { 
            margin: 0; 
        }
    </style>
</head>
<body>

    <header>
        <!-- Navigation on the left -->
        <nav>
            <a href="/">Home</a> | 
            <a href="/login">Login</a> | 
            <a href="/register">Register</a>
        </nav>

        <!-- Header Title in center -->
        <h1>Portfolio & Resume System</h1>

        <!-- Social Icons on the right -->
        <div class="social-icons">
            <a href="https://github.com/mikaeilbarout" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://instagram.com/YourUsername" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </header>

    <div class="content">
        @yield('main')
    </div>

    <footer>
        <p>© 2026 - All rights reserved</p>
    </footer>

</body>
</html>