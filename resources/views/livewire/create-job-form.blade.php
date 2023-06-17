<div>
    <x-form-section submit="createJob">
        <x-slot name="title">
            {{ __('Job Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Create a new job.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Job Photo -->
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $state['photo_url'] }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($state['photo_path'])
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>

            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" />
                <x-input-error for="title" class="mt-2" />
            </div>

            <!-- Company Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="company_name" value="{{ __('Company Name') }}" />
                <x-input id="company_name" type="text" class="mt-1 block w-full" wire:model.defer="state.company_name" autocomplete="company_name" />
                <x-input-error for="company_name" class="mt-2" />
            </div>

            <!-- Location -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="location" value="{{ __('Location Name') }}" />
                <x-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="state.location" autocomplete="location" />
                <x-input-error for="location" class="mt-2" />
            </div>

            <!-- Remote policy -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="remote_policy" value="{{ __('Remote policy') }}" />
                <x-select id="remote_policy" class="mt-1 block w-full" :options="$remotePolicies" wire:model.defer="state.remote_policy" autocomplete="remote_policy">
                </x-select>
                <x-input-error for="remote_policy" class="mt-2" />
            </div>

            <!-- Job Type -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="job_type" value="{{ __('Job Type') }}" />
                <x-select id="job_type" class="mt-1 block w-full" :options="$jobTypes" wire:model.defer="state.job_type" autocomplete="job_type">
                </x-select>
                <x-input-error for="job_type" class="mt-2" />
            </div>

            <!-- Job url to apply -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="apply_url" value="{{ __('Apply url') }}" />
                <x-input id="apply_url" type="text" class="mt-1 block w-full" wire:model.defer="state.apply_url" autocomplete="apply_url" />
                <x-input-error for="apply_url" class="mt-2" />
            </div>

            <!-- Job website url -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="website_url" value="{{ __('Website url') }}" />
                <x-input id="website_url" type="text" class="mt-1 block w-full" wire:model.defer="state.website_url" autocomplete="website_url" />
                <x-input-error for="website_url" class="mt-2" />
            </div>

            <!-- Experience Level -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="experience_level" value="{{ __('Experience Level') }}" />
                <x-select id="experience_level" class="mt-1 block w-full" :options="$experienceLevels" wire:model.defer="state.experience_level" autocomplete="experience_level">
                </x-select>
                <x-input-error for="experience_level" class="mt-2" />
            </div>

            <!-- Salary -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="salary" value="{{ __('Salary') }}" />
                <x-input id="salary" type="text" class="mt-1 block w-full" wire:model.defer="state.salary" autocomplete="salary" />
                <x-input-error for="salary" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <x-textarea id="description" type="text" class="mt-1 block w-full" wire:model.defer="state.description" autocomplete="description" />
                <x-input-error for="description" class="mt-2" />
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
</div>
