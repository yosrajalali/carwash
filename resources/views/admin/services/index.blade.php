<!DOCTYPE html>
<html>
<head>
    <title>Service List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 p-4">
<div class="max-w-lg mx-auto">
    <h1 class="text-3xl font-bold mb-4">Service List</h1>
    <a href="{{ route('admin.services.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New Service</a>
    <ul>
        @foreach ($services as $service)
            <li class="bg-white shadow-md rounded-lg p-4 mb-4 flex justify-between items-center">
                <div>
                    <span class="font-bold">{{ $service->name }}</span>
                    <span class="text-gray-600"> - {{ $service->duration_minutes }} minutes - ${{ $service->price }}</span>
                </div>
                <div>
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
