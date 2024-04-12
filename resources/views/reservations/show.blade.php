@php
    $totalPrice = 0;
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

<div class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-3/5 bg-white shadow-lg">
        <div class="flex justify-between p-4">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
            @endif


        </div>

        <div class="flex justify-between p-4">
            <div>

            </div>

            <div></div>
        </div>
        <div class="flex justify-center p-4">
            <div class="border-b border-gray-200 shadow">
                <table class="">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Service Name
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Reservation Time
                        </th>

                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Price
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">


                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$reservation->service->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">
                                    {{$reservation->reservation_time}}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                {{$reservation->service->price}}
                            </td>
                        </tr>
                        @php
                            $totalPrice += $reservation->service->price;
                        @endphp

                    <!--end tr-->

                    </tbody>
                </table>
            </div>
        </div>

        <div class="p-4">
            <div class="flex items-center justify-end space-x-3">
                <a href="{{route('reservations.edit', ['id'=>$reservation->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{route('reservations.update', ['id'=>$reservation->id])}}" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this reservation?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </form>
            </div>
        </div>

    </div>
</div>
</body>

</html>

