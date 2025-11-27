<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>403 - Forbidden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 100px;
            background-color: #f9fafb;
            color: #333;
        }
        h1 {
            font-size: 96px;
            color: #e3342f;
            margin-bottom: 0;
        }
        h2 {
            font-size: 36px;
            margin-top: 0;
        }
        p {
            font-size: 20px;
            margin: 20px 0 40px;
        }
        a {
            font-size: 18px;
            color: #3490dc;
            text-decoration: none;
            border: 2px solid #3490dc;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        a:hover {
            background-color: #3490dc;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>403</h1>
    <h2>Forbidden</h2>
    <p>You do not have permission to access this page.</p>
    <a href="{{ url()->previous() }}">Go Back</a>
</body>
</html>
