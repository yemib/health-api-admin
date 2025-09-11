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
                @foreach($data as $key => $value)
                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}<br>
                @endforeach
            </p>   
            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name')  }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
