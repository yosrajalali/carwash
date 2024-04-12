<!DOCTYPE html>
<html>
<head>
    <title>Edit Service</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional styles can be added here if necessary */
    </style>
</head>
<body class="bg-gray-200 p-4">
<div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-3xl font-bold mb-4">Edit Service</h1>
    <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block font-medium text-sm text-gray-700">Name:</label>
            <input type="text" id="name" name="name" value="{{ $service->name }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="duration_minutes" class="block font-medium text-sm text-gray-700">Duration (Minutes):</label>
            <input type="number" id="duration_minutes" name="duration_minutes" value="{{ $service->duration_minutes }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="price" class="block font-medium text-sm text-gray-700">Price:</label>
            <input type="text" id="price" name="price" value="{{ $service->price }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
</div>
</body>
</html>
