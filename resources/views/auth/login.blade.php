<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Add intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
        }

        .logo {
            margin-right: 10px;
        }

        .divider {
            border: 0;
            height: 1px;
            background-color: #e0e0e0;
            margin: 10px 0;
        }

        .input-group {
            display: flex;
            align-items: center;
            gap: 5px;
            width: 100%;
        }

        .iti {
            width: 100%;
        }

        .intl-tel-input {
            width: 100%;
        }

        /* Add custom styles for input fields */
        .custom-input {
            padding: 10px; /* Match padding with password input */
            border: 1px solid #ced4da; /* Match border style */
            border-radius: 0.375rem; /* Match border radius */
            width: 100%; /* Ensure it fills available width */
            font-size: 1rem; /* Match font size */
        }

        /* Add focus styles for custom input */
        .custom-input:focus {
            border-color: #80bdff; /* Match focus color */
            outline: none; /* Remove default outline */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Add focus shadow */
        }
    </style>

    <!-- Login Form -->
    <form method="POST" action="{{ action('AuthenticatedSessionController@store') }}">        
        @csrf <!-- een token VERWIJDER NIET--> 

        <div class="header">
            <img src="/img/DePoortLogo.png" alt="" class="logo" width="50" height="50">
            <h2>De Poort</h2>
        </div>

        <hr class="divider">

        <!-- Phone Number Input -->
        <div>
            <x-input-label for="phone" :value="__('Phone Number')" />
            <div class="input-group">
                <input type="text" id="phone" class="custom-input block mt-1" required> <!-- Added custom-input class -->
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="wachtwoord" :value="__('Password')" />
            <x-text-input id="wachtwoord" class="block mt-1 w-full"
                            type="password"
                            name="wachtwoord"
                            required autocomplete="current-password" />
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

    <!-- Add intl-tel-input JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script>
        // Initialize intl-tel-input on the phone input
        const phoneInput = document.querySelector("#phone");
        const iti = intlTelInput(phoneInput, {
            initialCountry: "nl", // standaar land is Nl
            preferredCountries: ["nl", "us", "gb", "de"],
            separateDialCode: true, // Show only the country code separately
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js", // Utils script for formatting and validation
        });

        // Restrict input to not allow spaces, letters, and limit to 9 digits
        /*
        phoneInput.addEventListener('input', function () {
            // Remove all spaces and letters from the input
            phoneInput.value = phoneInput.value.replace(/[^0-9]/g, '');
            
            // Limit input to 9 digits
            if (phoneInput.value.length > 9) {
                phoneInput.value = phoneInput.value.slice(0, 9);
            }
        });
*/
        // Clear the input when the country code changes
        phoneInput.addEventListener('countrychange', function () {
            // Clear the input to avoid invalid entries when switching countries
            phoneInput.value = '';
        });
    </script>
</x-guest-layout>
