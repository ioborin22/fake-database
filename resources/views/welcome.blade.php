<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Database API</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">API User Controller</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.index')}}" class="text-blue-500 text-xl">/users/all</a>
            <p class="text-gray-600 mt-2">Get all users</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('users.index', ['page' => 1, 'limit' => 15]) }}" class="text-xl text-blue-500">/users?page=1&limit=15</a>
            <p class="text-gray-600 mt-2">Get 15 users</p>
            <p class="text-gray-600 mt-2">To implement pagination in a GET request, simply add the page and limit parameters to the URL. For example, /users?page=1&limit=15 retrieves the first page with 15 items per page. Adjust the values of page and limit according to your desired pagination configuration.</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.show', $id=1)}}" class="text-blue-500 text-xl">/users/:id</a>
            <p class="text-gray-600 mt-2">Get user by ID</p>
        </li>
    </ul>
</div>
</body>
</html>
