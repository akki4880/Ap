<x-app-layout>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-8 mt-40">
        @if(session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('change.password.update') }}" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="current_password" class="block">Current Password:</label>
                <input type="password" name="current_password" id="current_password" required
                    class="form-input mt-1 block w-full">
                @error('current_password')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="new_password" class="block">New Password:</label>
                <input type="password" name="new_password" id="new_password" required
                    class="form-input mt-1 block w-full">
                @error('new_password')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block">Confirm New Password:</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                    class="form-input mt-1 block w-full">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Change
                Password</button>
        </form>
    </div>
</x-app-layout>