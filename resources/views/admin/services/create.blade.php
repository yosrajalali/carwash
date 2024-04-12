<!DOCTYPE html>
<html>
<head>
    <title>Add New Service</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 p-4">
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-8">
    <h1 class="text-3xl font-bold mb-6">Add New Service</h1>
    <form method="POST" action="{{ route('admin.services.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="duration_minutes" class="block text-gray-700 font-bold mb-2">Duration (Minutes):</label>
            <input type="number" id="duration_minutes" name="duration_minutes" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-6">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
            <input type="text" id="price" name="price" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-end">
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
</div>
</body>
</html>
