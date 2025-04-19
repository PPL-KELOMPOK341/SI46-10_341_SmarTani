<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F6F9F6] min-h-screen font-sans">
    <div class="max-w-4xl mx-auto py-10 px-4">
    <title>@yield('title')</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        main {
            max-width: 800px;
            margin: 2rem auto;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            margin-bottom: 1rem;
        }
        a.button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f0f0f0;
        }
        .alert-success {
            color: green;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>SmarTani - Pengeluaran Pertanian</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
