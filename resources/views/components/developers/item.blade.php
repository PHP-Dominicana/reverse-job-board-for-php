@props([
'developer',
'editable' => false
])

<li {{ $attributes->merge([]) }}>
    <a href="#" class="block hover:bg-light-blue-50 hover:shadow-2xl focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
        <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <div class="flex-shrink-0">
                    @if (!empty($developer->profile_photo_url))
                        <img class="w-16 h-16 rounded-full flex-shrink-0" src="{{ $developer->profile_photo_url }}" alt="{{ $developer->name }}">
                    @else
                        <x-icons.default-logo class="w-16 h-16 rounded-full flex-shrink-0"/>
                    @endif
                </div>
                <div class="min-w-0 flex-1 pl-4 md:grid md:gap-4">
                    <div>
                        <div class="text-base leading-5 font-medium text-light-blue-600 truncate">{{ $developer->title }}</div>
                        <div class="text-sm py-2 leading-2 text-green-700 truncate">{{ $developer->status }}</div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <div class="sm:flex">
                                <div class="mr-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    {{ $developer->short_description }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <div class="sm:flex">
                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    {{ $developer->location }}
                                </div>
                                <div class="mr-6 flex items-end text-sm hover:text-green-700 leading-5 text-gray-500 sm:mt-0">
                                    {{ __('View details') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</li>
