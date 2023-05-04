@props([
'developer',
'editable' => false
])

<article {{ $attributes->merge([ 'class' => 'my-5 w-full bg-white shadow-sm rounded-md overflow-hidden hover:shadow-xl focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out']) }}>
    <a href="{{ route('developers.detail', $developer->id)  }}" title="{{ $developer->name }}">
        <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <div class="flex-shrink-0">
                        <img class="w-24 h-24 rounded-full flex-shrink-0" src="{{ $developer->profile_photo_url }}" alt="{{ $developer->name }}">
                </div>
                <div class="min-w-0 flex-1 pl-4 md:grid md:gap-4">
                    <div>
                        <header>
                            <h2 class="text-xl font-semibold leading-tight text-blue-900 truncate">{{ $developer->title }}</h2>
                            <p class="text-sm py-2  font-semibold text-green-600  leading-2  truncate">{{ $developer->status }}</p>
                        </header>
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
                                   <x-icons.location-icon class="w-4 h-4 mr-1 flex-shrink-0 fill-gray-500" /> {{ $developer->location }}
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
</article>
