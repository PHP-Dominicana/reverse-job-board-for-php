<x-form-section submit="updateSocialInformationForm">
    <x-slot name="title">
        {{ __('Online presence') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Where can people learn more about you and your work?') }}
    </x-slot>

    <x-slot name="form">
        
        <div class="col-span-6 sm:col-span-4">
            <x-label for="website" value="{{ __('Website URL') }}" />
            <x-input id="website" type="text" class="mt-1 block w-full" wire:model.defer="state.website" autocomplete="website" placeholder="https://example.com" />
            <x-input-error for="website" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4" >
            <x-label for="linkedin" value="{{ __('LinkedIn URL') }}" />
            <x-input id="linkedin" type="text" class="mt-1 block w-full" wire:model.defer="state.linkedin" autocomplete="linkedin" placeholder="https://linkedin.com/in/username/" />
            <x-input-error for="linkedin" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4" >
            <x-label for="twitter" value="{{ __('Twitter username') }}" />
            <x-input id="twitter" type="text" class="mt-1 block w-full" wire:model.defer="state.twitter" autocomplete="twitter" placeholder="http://twitter.com/username" />
            <x-input-error for="twitter" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4" >
            <x-label for="github" value="{{ __('Github username') }}" />
            <x-input id="github" type="text" class="mt-1 block w-full" wire:model.defer="state.github" autocomplete="github" placeholder="http://github.com/username" />
            <x-input-error for="github" class="mt-2" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
