<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Database API</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Users</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.index')}}" class="text-blue-500 text-xl">/users</a>
            <p class="text-gray-600 mt-2">Get all users (e.g., 100 users)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{route('users.show', $id=1)}}" class="text-blue-500 text-xl">/users/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get user by ID (e.g., the first user)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('users.index', ['page' => 1, 'limit' => 15]) }}" class="text-xl text-blue-500">/users?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get users with pagination (e.g., 15 users per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('users.index', ['limit' => 30]) }}" class="text-xl text-blue-500">/users?limit=<b>{quantity}</b></a>
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
            <a href="{{route('employers.show', $id=1)}}" class="text-blue-500 text-xl">/employers/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get employer by ID (e.g., the first employer)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('employers.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/employers?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get employers with pagination (e.g., 15 employers per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('employers.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/employers?limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get employers without pagination (e.g., 30 employers)</p>
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
            <a href="{{ route('posts.show', $id=1) }}" class="text-blue-500 text-xl">/posts/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get post by ID (e.g., the first post)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/posts?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get posts with pagination (e.g., 15 posts per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('posts.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/posts?limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get posts without pagination (e.g., 30 posts)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Images</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('images.index') }}" class="text-blue-500 text-xl">/images</a>
            <p class="text-gray-600 mt-2">Get all images</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('images.show', $id=1) }}" class="text-blue-500 text-xl">/images/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get image by ID (e.g., the first image)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('images.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/images?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get images with pagination (e.g., 15 images per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('images.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/images?limit==<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get images without pagination (e.g., 30 images)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake User Contacts</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('contacts.index', $id=1, ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/contacts/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get all contacts by ID (e.g., the first user, id=1)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('contacts.added', $id=1) }}" class="text-blue-500 text-xl">/contacts/<b>{id}</b>/added</a>
            <p class="text-gray-600 mt-2">Get added contacts by ID (e.g., the first user, id=1)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('contacts.blocked', $id=1) }}" class="text-blue-500 text-xl">/contacts/<b>{id}</b>/blocked</a>
            <p class="text-gray-600 mt-2">Get blocked contacts by ID (e.g., the first user, id=1)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Messages</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('messages.index', $sender_id=1) }}"
               class="text-blue-500 text-xl">/messages/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get all messages by ID (e.g., the first message, sender_id=1)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('messages.show', [$sender_id=1, $receiver_id=2]) }}" class="text-blue-500 text-xl">/messages/<b>{sender_id}</b>/<b>{receiver_id}</b></a>
            <p class="text-gray-600 mt-2">Get messages with pagination (e.g., 15 messages per page)</p>
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
            <a href="{{ route('products.show', $id=1) }}" class="text-blue-500 text-xl">/products/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get product by ID (e.g., the first product)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/products?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get products with pagination (e.g., 15 products per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('products.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/products?limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get products without pagination (e.g., 30 products)</p>
        </li>
    </ul>
</div>

<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-8">Fake Orders</h2>
    <ul class="api-list space-y-4 text-center">
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.index') }}" class="text-blue-500 text-xl">/orders</a>
            <p class="text-gray-600 mt-2">Get all orders</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.index', ['page' => 1, 'limit' => 15]) }}" class="text-blue-500 text-xl">/orders?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get orders with pagination (e.g., 15 orders per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.index', ['limit' => 30]) }}" class="text-blue-500 text-xl">/orders?limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get orders without pagination (e.g., 30 orders)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.show', $id=1) }}" class="text-blue-500 text-xl">/orders/<b>{id}</b></a>
            <p class="text-gray-600 mt-2">Get order by ID (e.g., the first user, id=1)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.show', [$id=1, 'page' => 1, 'limit' => 5]) }}" class="text-blue-500 text-xl">/orders/<b>{id}</b>?page=<b>{number}</b>&limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get orders by User ID with pagination (e.g., 5 orders per page)</p>
        </li>
        <li class="border border-gray-300 rounded p-4">
            <a href="{{ route('orders.show', [$id=1, 'limit' => 5]) }}"
               class="text-blue-500 text-xl">/orders/<b>{id}</b>?limit=<b>{quantity}</b></a>
            <p class="text-gray-600 mt-2">Get orders by User ID without pagination (e.g., 5 orders)</p>
        </li>
    </ul>
</div>
<footer class="flex flex-col items-center" style="margin-bottom: 24px;">
    <ul class="flex space-x-8">
        <li>
            <a href="https://github.com/ioborin22" class="flex items-center space-x-3 hover:text-sky-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>
                <span>Github</span>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/ioborin22" class="flex items-center space-x-3 hover:text-sky-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
                <span>Twitter</span>
            </a>
        </li>
        <li>
            <a href="https://facebook.com/ioborin22" class="flex items-center space-x-3 hover:text-sky-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                <span>Facebook</span>
            </a>
        </li>
    </ul>
</footer>
</body>
</html>
