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
        @if (session('not_available'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Warning!</strong>
                <span class="block sm:inline">{{ session('not_available') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path fill-rule="evenodd" d="M14.354 5.646a.5.5 0 0 1 0 .708l-8 8a.5.5 0 0 1-.708-.708l8-8a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M5.646 5.646a.5.5 0 0 0 0 .708l8 8a.5.5 0 0 0 .708-.708l-8-8a.5.5 0 0 0-.708 0z"/>
            </svg>
        </span>
            </div>
        @endif
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="time_option">
                    Choose Time Option
                </label>

                <select id="time_option" name="time_option" onchange="toggleTimeOptions(this.value)" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option selected disabled>Select a Time Option</option>
                    <option value="earliest" @if(old('time_option') == 'earliest') selected @endif>Earliest Available Time Slot</option>
                    <option value="choose" @if(old('time_option') == 'choose') selected @endif>Choose Day and Time</option>
                </select>
            </div>

            <div id="time_div" class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                    Time
                </label>

                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">
                    <option selected disabled>Select</option>
                    @forelse($availableTimeSlots as $timeSlot)
                        <option value="{{ $timeSlot->start_time }}">{{ $timeSlot->start_time }}</option>
                    @empty
                        <option value="" disabled>No time available</option>
                    @endforelse
                </select>

                @error('reservation_time')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
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
    function toggleTimeOptions(value) {
        var timeDiv = document.getElementById('time_div');

        if (value === 'earliest') {
            timeDiv.innerHTML = `
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                    Time
                </label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">
                    <option value="{{ $earliestTimeSlot }}" selected>{{ $earliestTimeSlot }}</option>
                </select>

                @error('reservation_time')
                 <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror`;
             } else {
            timeDiv.innerHTML = `
                <label class="block text-gray-700 text-sm font-bold mb-2" for="reservation_time">
                    Time
                </label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reservation_time" name="reservation_time">
                    <option selected disabled>Select</option>
                   @forelse($availableTimeSlots as $timeSlot)
                    <option value="{{ $timeSlot->start_time }}">{{ $timeSlot->start_time }}</option>
                            @empty
                    <option value="" disabled>No time available</option>
                  @endforelse
                </select>
                @error('reservation_time')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror`;
        }
    }
</script>


</body>
</html>
