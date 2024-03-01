{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <title>Document</title>--}}
{{--    #ea422b--}}
{{--</head>--}}
{{--<body class=" bg-orange-100">--}}

{{--<div class="flex items-center justify-center p-12">--}}
{{--    <!-- Author: FormBold Team -->--}}
{{--    <!-- Learn More: https://formbold.com -->--}}
{{--    <div class="mx-auto w-full max-w-[550px]">--}}
{{--        <form action="{{route('reservations.store')}}" method="POST">--}}
{{--            @csrf--}}
{{--            <div class="-mx-3 flex flex-wrap">--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="first_name"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            First Name--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            value="{{old('first_name')}}"--}}
{{--                            type="text"--}}
{{--                            name="first_name"--}}
{{--                            id="first_name"--}}
{{--                            placeholder="First Name"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    @error('first_name')--}}
{{--                    <p class="text-red-500 text-sm mb-5">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="last_name"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Last Name--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            value="{{old('last_name')}}"--}}
{{--                            type="text"--}}
{{--                            name="last_name"--}}
{{--                            id="last_name"--}}
{{--                            placeholder="Last Name"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    @error('last_name')--}}
{{--                    <p class="text-red-500 text-sm mb-5">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="mb-5">--}}
{{--                <label--}}
{{--                    for="phone_number"--}}
{{--                    class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                >--}}
{{--                    Phone Number--}}
{{--                </label>--}}
{{--                <input--}}
{{--                    value="{{old('phone_number')}}"--}}
{{--                    type="text"--}}
{{--                    name="phone_number"--}}
{{--                    id="phone_number"--}}
{{--                    placeholder="09121236587"--}}
{{--                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                />--}}
{{--            </div>--}}
{{--            @error('phone_number')--}}
{{--            <p class="text-red-500 text-sm mb-5">{{ $message }}</p>--}}
{{--            @enderror--}}

{{--            <div class="-mx-3 flex flex-wrap">--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="reservation_date"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Date--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            value="{{old('reservation_date')}}"--}}
{{--                            type="date"--}}
{{--                            name="reservation_date"--}}
{{--                            id="reservation_date"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    @error('reservation_date')--}}
{{--                    <p class="text-red-500 text-sm mb-5">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="reservation_time"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Time--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            value="{{old('reservation_time')}}"--}}
{{--                            type="time"--}}
{{--                            name="reservation_time"--}}
{{--                            id="reservation_time"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    @error('reservation_time')--}}
{{--                    <p class="text-red-500 text-sm mb-5">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <input type="hidden" name="service_id" value="{{ $service_id }}">--}}

{{--            <div>--}}
{{--                <input type="submit" name="submit" value="Submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}
<!-- resources/views/reservation.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}">
                @error('first_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}">
                @error('last_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                    Phone Number
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" name="phone_number" type="text" placeholder="Phone Number" value="{{ old('phone_number') }}">
                @error('phone_number')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_date">
                    Date
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_date" name="reservation_date" type="date" value="{{ old('reservation_date') }}">
                @error('reservation_date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="time_option">
                    Choose Time Option
                </label>
                <select id="time_option" name="time_option" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="earliest" @if(old('time_option') == 'earliest') selected @endif>Earliest Available Time Slot</option>
                    <option value="choose" @if(old('time_option') == 'choose') selected @endif>Choose Day and Time</option>
                </select>
            </div>
            <div id="choose_time_div" style="display: none;">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                        Time
                    </label>
                    <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time" type="time" value="{{ old('reservation_time') }}">
                    @error('reservation_time')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="service_id" value="{{ $service_id }}">
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
<script>

    function toggleTimeInputVisibility() {
        var timeOption = document.getElementById('time_option');
        var chooseTimeDiv = document.getElementById('choose_time_div');

        if (timeOption.value === 'choose') {
            chooseTimeDiv.style.display = 'block';
        } else {
            chooseTimeDiv.style.display = 'none';
        }
    }

    // Event listener to trigger visibility toggle on option change
    document.getElementById('time_option').addEventListener('change', toggleTimeInputVisibility);

    // Toggle visibility initially on page load
    toggleTimeInputVisibility();

</script>
</body>
</html>
