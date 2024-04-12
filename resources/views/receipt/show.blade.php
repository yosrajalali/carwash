@php
    $totalPrice = 0;
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoce </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-3/5 bg-white shadow-lg">
        <div class="flex justify-between p-4">

        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>
        <div class="flex justify-between p-4">
            <div>
                <h6 class="font-bold">Name : <span class="text-sm font-medium"> {{$user->first_name . ' ' . $user->last_name}}</span></h6>
                <h6 class="font-bold">Phone Number: <span class="text-sm font-medium"> {{$user->phone_number}}</span></h6>
            </div>

            <div></div>
        </div>
        <div class="flex justify-center p-4">
            <div class="border-b border-gray-200 shadow">
                <table class="">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Reservation Number
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Service Name
                        </th>
                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Tracking Code
                        </th>

                        <th class="px-4 py-2 text-xs text-gray-500 ">
                            Price
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">

                    @foreach($reservations as $reservation)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$reservation->id}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                   {{$reservation->service->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">
                                    {{$reservation->tracking_code}}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                {{$reservation->service->price}}
                            </td>
                        </tr>
                        @php
                            $totalPrice += $reservation->service->price;
                        @endphp

                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right font-bold">Total Price:</td>
                        <td class="px-6 py-4">{{ $totalPrice }}</td>
                    </tr>

                    <!--end tr-->

                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full h-0.5 bg-indigo-500"></div>

        <div class="p-4">
            <div class="flex items-center justify-center">
                Thank you very much for doing business with us.
            </div>
            <div class="flex items-end justify-end space-x-3">
                <button class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button>
                <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</button>
                <button class="px-4 py-2 text-sm text-red-600 bg-red-100">Cancel</button>
            </div>
        </div>

    </div>
</div>
</body>

</html>
