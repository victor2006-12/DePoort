<x-guest-layout>
    @if(session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Voornaam -->
        <div>
            <x-input-label for="voornaam" :value="__('Voornaam')" />
            <x-text-input id="voornaam" class="block mt-1 w-full" type="text" name="voornaam" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('voornaam')" class="mt-2" />
        </div>

        <!-- Tussenvoegsel -->
        <div class="mt-4">
            <x-input-label for="tussenvoegsel" :value="__('Tussenvoegsel')" />
            <x-text-input id="tussenvoegsel" class="block mt-1 w-full" type="text" name="tussenvoegsel" autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('tussenvoegsel')" class="mt-2" />
        </div>

        <!-- Achternaam -->
        <div class="mt-4">
            <x-input-label for="achternaam" :value="__('Achternaam')" />
            <x-text-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('achternaam')" class="mt-2" />
        </div>

        <!-- Adres -->
        <div class="mt-4">
            <x-input-label for="adres" :value="__('Adres')" />
            <x-text-input id="adres" class="block mt-1 w-full" type="text" name="adres" required autocomplete="address-line1" />
            <x-input-error :messages="$errors->get('adres')" class="mt-2" />
        </div>

        <!-- Postcode -->
        <div class="mt-4">
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" required maxlength="6" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
        </div>

        <!-- Woonplaats -->
        <div class="mt-4">
            <x-input-label for="woonplaats" :value="__('Woonplaats')" />
            <x-text-input id="woonplaats" class="block mt-1 w-full" type="text" name="woonplaats" required />
            <x-input-error :messages="$errors->get('woonplaats')" class="mt-2" />
        </div>

        <!-- Land -->
        <div class="mt-4">
            <x-input-label for="land" :value="__('Land')" />
            <x-text-input id="land" class="block mt-1 w-full" type="text" name="land" required />
            <x-input-error :messages="$errors->get('land')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Al geregistreerd?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registreren') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
