<x-app-layout>
    @if(session('success'))
    <div class="text-green-600">{{ session('success') }}</div>
    @endif



    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6 mt-40">
        <form method="POST" action="{{ route('contact.details.update') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block">Email:</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                    class="form-input mt-1 block w-full">
                @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="PhoneNumber" class="block">Phone Number:</label>
                <input type="text" name="PhoneNumber" value="{{ old('PhoneNumber', auth()->user()->PhoneNumber) }}"
                    required class="form-input mt-1 block w-full">
                @error('PhoneNumber')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>
            @if(session('error'))
            <div class="text-red-600">{{ session('error') }}</div>
            @endif
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                Contact Details</button>
        </form>

    </div>
</x-app-layout>