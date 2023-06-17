<x-guest-layout>
    <div class="bg-white">
        <x-main-menu />
        <div class="relative isolate px-6 pt-20 lg:px-8">
            <div class="mt-20 bg-white ">
                <div class="mx-auto max-w-7xl px-4 sm:px-8">
                    <div>
                        <div class="p-1 w-20 h-20 bg-white shadow -translate-y-2/3">
                            <div class="overflow-hidden w-full h-full w-full h-full">
                                @if (!empty($job->photo_url))
                                    <img class="w-16 h-16 rounded-full flex-shrink-0" src="{{ $job->photo_url }}" alt="{{ $job->name }}">
                                @else
                                    <x-icons.default-logo class="w-16 h-16 rounded-full flex-shrink-0"/>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col items-start lg:flex-row lg:items-center -mt-4">
                            <div class="mt-4 lg:mt-0">
                                <h1 class="text-black text-4xl leading-tight md:text-5xl md:leading-tight font-bold">
                                    {{ $job->title }}
                                </h1>
                                <div class="flex flex-row space-x-4 items-center mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="grid lg:grid-cols-7 gap-12 pt-8">
                            <div class="lg:order-1 order-2 lg:col-span-5 lg:mt-0 pb-12 blog job text-gray-700 break-words leading-loose lg:leading-loose">
                                {{ $job->description }}
                            </div>
                            <div class="space-y-5 lg:order-1 lg:col-span-2">
                                <div class="border-2 border-indigo-600">
                                    <div class="flex flex-wrap flex-row items-start space-y-3 p-6">
                                        <a href="{{ $job->apply_url }}" class="transition-all group duration-200 ease-in-out border border-blue-400 hover:border-blue-600 hover:border-l-8 hover:ring-2 hover:ring-blue-600 bg-blue-50 text-base text-black-700 py-3 px-5 inline-flex items-center justify-start w-full">
                                            <div class="z-10 text-left">
                                                <p class="mb-2">Remote policy: {{ $job->remote_policy }}</p>
                                                <p class="mb-2">Work type: {{ $job->job_type }}</p>
                                                <p class="mb-2">Salary: {{ $job->salary }}</p>
                                                <p class="text-sm font-bold">Aplly →</p>
                                            </div>
                                        </a>
                                        <div class="w-full">
                                            <h5 class="font-medium text-black mb-1">Start date</h5>
                                            <p class="text-gray-600 text-base inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                    <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>{{ $job->created_at->format('m/d/Y')  }}</span>
                                            </p>
                                        </div>
                                        <div class="w-full">
                                            <h5 class="font-medium text-black mb-1">Experience level</h5>
                                            <p class="text-gray-600 text-base inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>{{ $job->experience_level }}</span>
                                            </p>
                                        </div>
                                        <div class="w-full">
                                            <h5 class="font-medium text-black mb-1">Location</h5>
                                            <p class="text-gray-600 text-base inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM6.262 6.072a8.25 8.25 0 1010.562-.766 4.5 4.5 0 01-1.318 1.357L14.25 7.5l.165.33a.809.809 0 01-1.086 1.085l-.604-.302a1.125 1.125 0 00-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 01-2.288 4.04l-.723.724a1.125 1.125 0 01-1.298.21l-.153-.076a1.125 1.125 0 01-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 01-.21-1.298L9.75 12l-1.64-1.64a6 6 0 01-1.676-3.257l-.172-1.03z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>{{ $job->location }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <a href="{{ $job->apply_url }}" class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-full">
                                            Apply →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
