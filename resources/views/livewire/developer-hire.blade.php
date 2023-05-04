<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact the developer</h2>
    </div>
    <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
                <div class="mt-2.5">
                    <input type="text" value="{{ $developer->name }}" readonly disabled name="first-name" id="first-name" autocomplete="given-name" class="block w-full read-only rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                <div class="mt-2.5">
                    <input type="email" value="{{ $developer->email }}" readonly disabled name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="phone_number" class="block text-sm font-semibold leading-6 text-gray-900">Phone number</label>
                <div class="mt-2.5">
                    <input type="email" value="{{ $developer->phone_number }}" readonly disabled name="phone_number" id="phone_number" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @if($developer?->links?->website)
                <div class="sm:col-span-2">
                    <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">Website</label>
                    <div class="mt-2.5">
                        <a  href="{{ $developer?->links?->website }}" target="_blank" class="transition-all group duration-200 ease-in-out border border-blue-600 hover:border-blue-600 hover:border-l-8 hover:ring-2 hover:ring-blue-600 text-base text-blue-700 py-3 px-5 inline-flex items-center justify-start w-full" >
                            {{ $developer?->links?->website }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($developer?->links?->linkedin)
                <div class="sm:col-span-2">
                    <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">LinkedIn</label>
                    <div class="mt-2.5">
                        <a  href="{{ $developer?->links?->linkedin }}" target="_blank" class="transition-all group duration-200 ease-in-out border border-blue-600 hover:border-blue-600 hover:border-l-8 hover:ring-2 hover:ring-blue-600 text-base text-blue-700 py-3 px-5 inline-flex items-center justify-start w-full" >
                            {{ $developer?->links?->linkedin }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($developer?->links?->twitter)
                <div class="sm:col-span-2">
                    <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">Twitter</label>
                    <div class="mt-2.5">
                        <a  href="{{ $developer?->links?->twitter }}" target="_blank" class="transition-all group duration-200 ease-in-out border border-blue-600 hover:border-blue-600 hover:border-l-8 hover:ring-2 hover:ring-blue-600 text-base text-blue-700 py-3 px-5 inline-flex items-center justify-start w-full" >
                            {{ $developer?->links?->twitter }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($developer?->links?->github)
                <div class="sm:col-span-2">
                    <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">Github</label>
                    <div class="mt-2.5">
                        <a  href="{{ $developer?->links?->github }}" target="_blank" class="transition-all group duration-200 ease-in-out border border-blue-600 hover:border-blue-600 hover:border-l-8 hover:ring-2 hover:ring-blue-600 text-base text-blue-700 py-3 px-5 inline-flex items-center justify-start w-full" >
                            {{ $developer?->links?->github }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </form>
</div>
