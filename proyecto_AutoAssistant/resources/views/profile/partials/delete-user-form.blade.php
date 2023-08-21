<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se borrarán permanentemente.') }}
        </p>
    </header>

    <x-danger-button
        class="btn_card_profile"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Eliminar') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" class="btn_card" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="btn_card">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Estas Seguro de Eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se borrarán permanentemente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.') }}
            </p>

            @if($hasPassword)
                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Contraseña') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>
            @endif

            <div class="mt-6 flex justify-end">
                <x-danger-button class="btn_card_profile" x-on:click="$dispatch('close')" >
                    {{ __('Cancelar') }}
                </x-danger-button>

                <x-danger-button class="ml-3" class="btn_card_profile">
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
