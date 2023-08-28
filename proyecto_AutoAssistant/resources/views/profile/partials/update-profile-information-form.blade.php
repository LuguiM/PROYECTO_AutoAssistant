<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del Perfil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
        {{ __("Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre:')" />
            <x-text-input style="margin-left: 85px;" id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <p></p>
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico:')" />
            <x-text-input style="margin-left: 5px;"  id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Tu dirección de correo electrónico no está verificada.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haz clic aquí para reenviar el correo electrónico de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <p></p>
        <div class="float-right ml-8">
        <x-input-label for="edad" :value="__('Edad:')" />
        <x-text-input style="margin-left: 106px;"  id="edad" name="edad" type="number" class="mt-1 block w-full" :value="old('edad', $user->edad)" required autocomplete="edad" />
        <x-input-error class="mt-2" :messages="$errors->get('edad')" />
        </div>
        

        @if(auth()->user()->hasAnyRole('conductor','futuro_conductor')) 
        <p></p>
        <div>
            <x-input-label for="license" :value="__('Licencia:')" />
            <select style="margin-left: 85px;" id="licencia" name="licencia" class="mt-1 block w-full">
                <option value="SI" {{ old('licencia') == 'SI' ? 'selected' : '' }}>Sí</option>
                <option value="NO" {{ old('licencia') == 'NO' ? 'selected' : '' }}>No</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('licencia')" />
        </div>
        <p></p>
        <div>
            <x-input-label for="license" :value="__('Numero de licencia:')" />
            <x-text-input id="numero_licencia" name="numero_licencia" type="text" class="mt-1 block w-full" :value="old('numero_licencia', $user->numero_licencia)" autocomplete="numero_licencia" />
            <x-input-error class="mt-2" :messages="$errors->get('numero_licencia')" />
        </div>
        <p></p>

        @if ($isGoogleUser && empty($user->edad) && empty($user->licencia) && empty($user->numero_lucencia))
                <div class="alert alert-warning" role="alert">
                {{ __('Debe completar su edad, licencia y número de licencia (Estos datos en caso de tenerlos sino hacer caso omiso).') }}
                </div>
                
            @endif
        @endif
        

<br>
        <div class="flex items-center gap-4">
            <x-primary-button class="btn_card_profile">{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>

            @endif

           
        </div>
    </form>
</section>