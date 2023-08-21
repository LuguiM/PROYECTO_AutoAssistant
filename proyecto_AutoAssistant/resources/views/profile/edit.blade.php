<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card">
                <div class="card-body btn_card">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
            <br>
            @if ($hasPassword)
                <div class="card">
                    <div class="card-body btn_card">
                        <div class="max-w-xl">
                        
                            @include('profile.partials.update-password-form')
                       
                        </div>
                    </div>
                </div>
                @endif
            <br>
            <div class="card">
                <div class="card-body btn_card">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
