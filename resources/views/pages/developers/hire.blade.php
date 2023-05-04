<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hire a developer')  }}
        </h2>
    </x-slot>

    <div>
        <livewire:developer-hire :developer="$developer" />
    </div>
</x-app-layout>
