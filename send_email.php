<?php
error_reporting(0); 
ini_set('display_errors', 0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Set JSON response header
header('Content-Type: application/json');

// POST request check
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        'status' => 'error',
        'message' => 'Only POST requests allowed'
    ]);
    exit;
}

// Form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validation
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'All fields are required'
    ]);
    exit;
}

if (strlen($name) < 2) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Name must be at least 2 characters'
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid email address'
    ]);
    exit;
}

if (strlen($subject) < 3) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Subject must be at least 3 characters'
    ]);
    exit;
}

if (strlen($message) < 10) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Message must be at least 10 characters'
    ]);
    exit;
}

// Sanitize
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
$date = date('d M Y, h:i A');

// Gmail SMTP Config
$SMTP_HOST = "smtp.gmail.com";
$SMTP_USER = "gautamamit557@gmail.com";
$SMTP_PASS = "sfusdxojgnacmscb";
$SMTP_PORT = 587;

try {
    // ============================================
    //  EMAIL TO YOU (AMIT)
    // ============================================
    $mail = new PHPMailer(true);
    
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = $SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = $SMTP_USER;
    $mail->Password = $SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $SMTP_PORT;
    $mail->CharSet = 'UTF-8';
    
    // From & To
    $mail->setFrom($SMTP_USER, "Amit Gautam Portfolio");
    $mail->addAddress("Gautamamit557@gmail.com", "Amit Gautam");
    $mail->addReplyTo($email, $name);
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = "🔔 Portfolio Contact: $subject";
    
    // Beautiful Email Template
    $mail->Body = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f4f4; }
            .container { max-width: 600px; margin: 30px auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
            .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px 30px; text-align: center; }
            .header h1 { font-size: 28px; margin-bottom: 10px; }
            .header p { font-size: 14px; opacity: 0.9; }
            .content { padding: 40px 30px; }
            .info-box { background: #f8f9fa; border-left: 4px solid #fbbf24; padding: 20px; margin: 20px 0; border-radius: 5px; }
            .info-row { margin: 10px 0; font-size: 15px; }
            .label { font-weight: bold; color: #667eea; }
            .message-box { background: white; border: 2px solid #e9ecef; padding: 20px; margin: 20px 0; border-radius: 5px; }
            .message-box h3 { color: #333; margin-bottom: 15px; }
            .btn { display: inline-block; background: #fbbf24; color: #000; padding: 12px 30px; text-decoration: none; border-radius: 25px; font-weight: bold; margin: 20px 0; }
            .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; font-size: 13px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🎉 New Contact Message!</h1>
                <p>Someone contacted you through your portfolio</p>
            </div>
            <div class='content'>
                <div class='info-box'>
                    <div class='info-row'><span class='label'>Name:</span> $name</div>
                    <div class='info-row'><span class='label'>Email:</span> <a href='mailto:$email'>$email</a></div>
                    <div class='info-row'><span class='label'>Subject:</span> $subject</div>
                    <div class='info-row'><span class='label'>Date:</span> $date</div>
                </div>
                <div class='message-box'>
                    <h3>💬 Message:</h3>
                    <p style='line-height: 1.6;'>$message</p>
                </div>
                <div style='text-align: center;'>
                    <a href='mailto:$email' class='btn'>📧 Reply to $name</a>
                </div>
            </div>
            <div class='footer'>
                <p><strong>Amit Gautam Portfolio</strong></p>
                <p>© 2025 All Rights Reserved</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $mail->send();
    
    // ========== CONFIRMATION EMAIL TO USER ==========
    $userMail = new PHPMailer(true);
    
    $userMail->isSMTP();
    $userMail->Host = $SMTP_HOST;
    $userMail->SMTPAuth = true;
    $userMail->Username = $SMTP_USER;
    $userMail->Password = $SMTP_PASS;
    $userMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $userMail->Port = $SMTP_PORT;
    $userMail->CharSet = 'UTF-8';
    
    $userMail->setFrom($SMTP_USER, "Amit Gautam");
    $userMail->addAddress($email, $name);
    
    $userMail->isHTML(true);
    $userMail->Subject = "Thank you for contacting me!";
    
    $userMail->Body = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f4f4; }
            .container { max-width: 600px; margin: 30px auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
            .header { background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: #000; padding: 40px 30px; text-align: center; }
            .header h1 { font-size: 28px; margin-bottom: 10px; }
            .content { padding: 40px 30px; }
            .greeting { font-size: 20px; color: #333; margin-bottom: 20px; font-weight: bold; }
            .text { color: #555; line-height: 1.8; margin: 15px 0; }
            .highlight { background: #f8f9fa; border-left: 4px solid #667eea; padding: 20px; margin: 20px 0; border-radius: 5px; }
            .social { text-align: center; margin: 30px 0; }
            .social a { display: inline-block; margin: 0 10px; color: #667eea; text-decoration: none; font-size: 14px; }
            .footer { background: #1f2937; color: white; padding: 30px; text-align: center; }
            .footer p { margin: 5px 0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Message Received!</h1>
                <p>Thank you for reaching out</p>
            </div>
            <div class='content'>
                <div class='greeting'>Hello $name! 👋</div>
                <p class='text'>
                    Thank you for contacting me through my portfolio website. I have successfully received your message and truly appreciate you taking the time to reach out.
                </p>
                <div class='highlight'>
                    <p><strong>Subject:</strong> $subject</p>
                    <p><strong>Sent on:</strong> $date</p>
                </div>
                <p class='text'>
                    I will review your message carefully and get back to you as soon as possible. Typically, I respond within 24-48 hours during business days.
                </p>
                <div class='social'>
                    <p style='margin-bottom: 15px;'><strong>Connect with me:</strong></p>
                    <a href='https://www.linkedin.com/in/amit-gautam-590695217/'>LinkedIn</a> |
                    <a href='mailto:Gautamamit557@gmail.com'>Email</a> |
                    <a href='tel:+918573965259'>+91 8573965259</a>
                </div>
            </div>
            <div class='footer'>
                <p><strong>Amit Gautam</strong></p>
                <p>Software Engineer | Full Stack Developer</p>
                <p style='margin-top: 10px; font-size: 12px; opacity: 0.8;'>© 2025 All Rights Reserved</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $userMail->send();
    
    // SUCCESS - Return JSON response
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you for your message! I will get back to you soon.'
    ]);
    exit;
    
} catch (Exception $e) {
    // ERROR - Return JSON response
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to send message. Please try again or contact directly via email.'
    ]);
    exit;
}
?>