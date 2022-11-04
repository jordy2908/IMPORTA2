<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre / Razon social')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- RUC / CEDULA -->
            <div class="mt-4">
                <x-input-label for="cedula" :value="__('Ruc / C.I')" />

                <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required />

                <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
            </div>

            <!-- METODO DE PAGO -->
            <div class="mt-4 flex flex-col w-full">
                <x-input-label :value="__('METODO DE PAGO')" />
                    <div class="flex p-8 space-x-12 justify-center mt-2">
                        <div class="flex items-center mx-8 w-full justify-center ">
                            <x-input-label  :value="__('VISA')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="pago" value="VISA" required >
                        </div>
                        <div class="flex items-center mx-8 w-full justify-center">
                            <x-input-label  :value="__('PAYPAL')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="pago" value="PAYPAL" required >
                        </div>
                        <div class="flex items-center mx-8 w-full justify-center">
                            <x-input-label  :value="__('FREE')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="pago" value="FREE" required >
                        </div>
                    </div>
                <x-input-error :messages="$errors->get('pago')" class="mt-2" />
            </div>

            <!-- METODO DE BUSQUEDA -->
            <div class="mt-4 flex flex-col w-full">
                <x-input-label :value="__('METODO DE BUSQUEDA')" />
                    <div class="flex p-8 space-x-12 justify-center mt-2">
                        <div class="flex items-center mx-8 w-full justify-center">
                            <x-input-label :value="__('PROVEEDORES')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="busqueda" value=1 required >
                        </div>
                        <div class="flex items-center mx-8 w-full justify-center">
                            <x-input-label  :value="__('ARANCELES')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="busqueda" value=0 required >
                        </div>
                    </div>
                <x-input-error :messages="$errors->get('pago')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
