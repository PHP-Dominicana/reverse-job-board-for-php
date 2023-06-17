<x-guest-layout>
    <div class="bg-white">
        <x-main-menu />
        <div class="relative mt-14 py-14 md:py-20 max-w-6xl mx-auto sm:px-8">
            <div>
                <h1 class="mb-4 text-black text-3xl leading-tight font-bold">
                    The #1 Job Board for PHP developers.
                </h1>
                <p class="text-gray-700 line-clamp-3 break-words leading-loose lg:leading-loose">
                    Find companies looking to hire PHP developers or post a job if you are hiring PHP developers.
                </p>
            </div>
            <div class="mt-14 ml-4">
                <livewire:search-job />
            </div>
            <div class="mt-14">
                <livewire:show-jobs />
            </div>
        </div>
    </div>
</x-guest-layout>
