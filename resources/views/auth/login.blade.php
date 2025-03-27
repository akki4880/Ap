<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center justify-center  mt-40">
        <div class="max-w-md w-full bg-white shadow-md rounded-md overflow-hidden">
            <div class="p-6">
                <h2 class="fs-3 mb-4">{{ __('Log in') }}</h2>
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf 
                    <!-- UserId Address -->
                    <div>
                        <x-input-label for="UserId" :value="__('UserId')" />
                        <input id="UserId" type="text" name="UserId" :value="old('UserId')" required autofocus
                            autocomplete="username"
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                        <x-input-error :messages="$errors->get('UserId')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                        <label for="remember_me" class="ml-2 text-sm text-gray-900">{{ __('Remember me') }}</label>
                    </div>

                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif

                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Log in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>