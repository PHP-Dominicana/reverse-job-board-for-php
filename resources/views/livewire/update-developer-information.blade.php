<x-form-section submit="updateDeveloperInformation">
    <x-slot name="title">
        {{ __('Developer Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your developer\'s profile information.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="title" value="{{ __('Title') }}" />
            <x-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" />
            <x-input-error for="title" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Description') }}" />
            <x-textarea id="description" type="text" class="mt-1 block w-full" wire:model.defer="state.description" autocomplete="description" />
            <x-input-error for="description" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="status" value="{{ __('Status') }}" />
            <x-select id="status" class="mt-1 block w-full" :options="$developStatuses" wire:model.defer="state.status" autocomplete="status">
            </x-select>
            <x-input-error for="status" class="mt-2" />
        </div>

        <!-- Developer level -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="experience_level" value="{{ __('Experience Level') }}" />
            <x-select id="experience_level" class="mt-1 block w-full" :options="$experienceLevels" wire:model.defer="state.experience_level" autocomplete="experience_level">
            </x-select>
            <x-input-error for="experience_level" class="mt-2" />
        </div>

        <!-- location -->
        <div class="col-span-6 sm:col-span-4" >
            <x-label for="location" value="{{ __('Location') }}" />
            <x-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="state.location" autocomplete="location" />
            <x-input-error for="location" class="mt-2" />
        </div>

        <!-- Phone number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="state.phone_number" autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
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
