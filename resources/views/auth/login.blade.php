<x-guest-layout>
    
    <x-auth-session-status class="mb-4" :status="session('status')" />

   
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

        
        .custom-input {
            padding: 10px; 
            border: 1px solid #ced4da; 
            border-radius: 0.375rem; 
            width: 100%; /
            font-size: 1rem; 
        }

      
        .custom-input:focus {
            border-color: #80bdff; 
            outline: none; 
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>

  
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="header">
            <img src="/img/DePoortLogo.png" alt="" class="logo" width="50" height="50">
            <h2>De Poort</h2>
        </div>

        <hr class="divider">


        <div>
            <x-input-label for="phone" :value="__('Phone Number')" />
            <div class="input-group">
                <input type="text" id="phone" class="custom-input block mt-1" required> 
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="custom-input block mt-1" type="password" name="password" required
                autocomplete="current-password" /> 
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script>
       
        const phoneInput = document.querySelector("#phone");
        const iti = intlTelInput(phoneInput, {
            initialCountry: "nl", 
            preferredCountries: ["nl", "us", "gb", "de"], 
            separateDialCode: true, 
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js", 
        });

        \
        phoneInput.addEventListener('input', function () {
            phoneInput.value = phoneInput.value.replace(/[^0-9]/g, '');
         
            if (phoneInput.value.length > 9) {
                phoneInput.value = phoneInput.value.slice(0, 9);
            }
        });

        phoneInput.addEventListener('countrychange', function () {
            phoneInput.value = '';
        });
    </script>
</x-guest-layout>
