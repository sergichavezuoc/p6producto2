

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        
        <h2><b>Registro como estudiante</b></h2>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('students.postregistration') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Surname -->
            <div class="mt-4">
                <x-label for="surname" value="Surname" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="" required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" value="Username" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="" required />
            </div>
                        <!-- telhpone -->
                        <div class="mt-4">
                <x-label for="telephone" value="Telephone" />

                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" value="" required />
            </div>
                        <!-- Nif -->
                        <div class="mt-4">
                <x-label for="nif" value="Nif" />

                <x-input id="nif" class="block mt-1 w-full" type="text" name="nif" value="" required />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('students.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>