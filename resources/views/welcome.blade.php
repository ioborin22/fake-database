<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Database API</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-8 fake-users">
    <h2 class="text-3xl font-bold mb-8">Fake Users</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.index')}}" class="text-blue-500 text-xl">/users</a>
            <p class="text-gray-600 mt-2">Get all users (e.g., 100 users)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.show', $id=1)}}" class="text-blue-500 text-xl">/users/{<b>id</b>}</a>
            <p class="text-gray-600 mt-2">Get user by ID (e.g., the first user)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('users.index', ['page' => 1, 'limit' => 15]) }}" class="text-xl text-blue-500">/users?page={<b>number</b>}&limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get users with pagination (e.g., 15 users per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('users.index', ['limit' => 30]) }}" class="text-xl text-blue-500">/users?limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get users without pagination (e.g., 30 users)</p>
        </li>
    </ul>
</div>


<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Employers</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('employers.index')}}" class="text-blue-500 text-xl">/employers</a>
            <p class="text-gray-600 mt-2">Get all employers (e.g., 100 employers)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('employers.show', $id=1)}}" class="text-blue-500 text-xl">/employers/{<b>id</b>}</a>
            <p class="text-gray-600 mt-2">Get employer by ID (e.g., the first employer)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('employers.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/employers?page={<b>number</b>}&limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get employers with pagination (e.g., 15 employers per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('employers.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/employers?limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get employers without pagination (e.g., 30 employers)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Products</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.index') }}" class="text-blue-500 text-xl">/products</a>
            <p class="text-gray-600 mt-2">Get all products</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.show', $id=1) }}" class="text-blue-500 text-xl">/products/{<b>id</b>}</a>
            <p class="text-gray-600 mt-2">Get product by ID (e.g., the first product)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/products?page={<b>number</b>}&limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get products with pagination (e.g., 15 products per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/products?limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get products without pagination (e.g., 30 products)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Posts</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.index') }}" class="text-blue-500 text-xl">/posts</a>
            <p class="text-gray-600 mt-2">Get all posts</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.show', $id=1) }}" class="text-blue-500 text-xl">/posts/{<b>id</b>}</a>
            <p class="text-gray-600 mt-2">Get post by ID (e.g., the first post)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/posts?page={<b>number</b>}&limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get posts with pagination (e.g., 15 posts per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/posts?limit={<b>quantity</b>}</a>
            <p class="text-gray-600 mt-2">Get posts without pagination (e.g., 30 posts)</p>
        </li>
    </ul>
</div>

</body>
</html>
