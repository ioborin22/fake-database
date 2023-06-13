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
            <a href="{{route('users.all')}}" class="text-blue-500 text-xl">/users/all</a>
            <p class="text-gray-600 mt-2">Get all users</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.users15')}}" class="text-blue-500 text-xl">/users/users15</a>
            <p class="text-gray-600 mt-2">Get 15 users</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="#" class="text-blue-500 text-xl">/users/:id</a>
            <p class="text-gray-600 mt-2">Get user by ID</p>
        </li>
    </ul>
</div>
</body>
</html>
