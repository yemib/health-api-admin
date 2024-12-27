<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            color: #2d3748;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f9fafb;
            padding: 20px 0;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e8e5ef;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 20px;
            font-weight: bold;
            color: #2d3748;
        }
        p {
            font-size: 14px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #718096;
        }
        hr {
            border: 0;
            border-top: 1px solid #e8e5ef;
            margin: 20px 0;
        }
        strong {
            color: #2d3748;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <h1>Therapy Inquiry</h1>
            <p>
                <strong>Name:</strong><br>
                <?php if (isset($data['name'])) { echo htmlspecialchars($data['name']); } ?><br>
                
                <strong>Phone Number:</strong><br>
                <?php if (isset($data['phone'])) { echo htmlspecialchars($data['phone']); } ?><br>
                
                <strong>Email:</strong><br>
                <?php if (isset($data['email'])) { echo htmlspecialchars($data['email']); } ?><br>
                
                <strong>What brings you to seek therapy at this time?</strong><br>
                <?php if (isset($data['therapy'])) { echo htmlspecialchars($data['therapy']); } ?><br>
                
                <strong>How long have you been experiencing these challenges?</strong><br>
                <?php if (isset($data['challenges'])) { echo htmlspecialchars($data['challenges']); } ?><br>
                
                <strong>Have you had any prior experience with therapy?</strong><br>
                <?php if (isset($data['experience'])) { echo htmlspecialchars($data['experience']); } ?><br>
                
                <strong>Convenient Dates:</strong><br>
                <?php if (isset($data['date1'])) { echo htmlspecialchars($data['date1']); } ?><br>
                <?php if (isset($data['date2'])) { echo htmlspecialchars($data['date2']); } ?><br>
            </p>
            <hr>
            <p>
                <?php if (isset($data['message'])) { echo $data['message']; } ?>
            </p>
            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name')  }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
