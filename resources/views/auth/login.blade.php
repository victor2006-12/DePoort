<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            /* Set your login page background color */
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: #f8f9fa;
            /* Match this to your login page background color */
            margin-bottom: 10px;
            /* Space between header and line */
        }

        .logo {
            margin-right: 10px;
        }

        .divider {
            border: 0;
            height: 1px;
            background-color: #e0e0e0;
            /* Color of the line */
            margin: 10px 0;
            /* Space around the line */
        }

        .content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 20px;
            /* Adjust as needed */
        }

        img {
            position: relative;
            /* Adjust as needed */
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
        }

        /* Hide the spinner buttons in Chrome, Safari, and Edge */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="header">
            <img src="/img/DePoortLogo.png" alt="" class="logo" width="50" height="50"> <!-- Replace with your logo -->
            <h2>De Poort</h2>
        </div>

        <hr class="divider"> <!-- Line between header and form -->

        <!-- Number Input -->
        <div>
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')"
                required autofocus autocomplete="off" min="0"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center mt-4">
            <x-primary-button class="mb-3" style="text-align: center">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>