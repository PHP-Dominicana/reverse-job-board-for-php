<x-guest-layout>
    <x-main-menu />
        <div class="relative isolate pt-14">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">The reverse job board for PHP developers</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">We empower developers to help them find their next job. Create a profile and sit back as companies reach out to you.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ url('/register') }}" class="rounded-md bg-blue-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Get started</a>
                        <a href="{{ url('/about') }}" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>

         {{--  Developers available now  --}}
         <section class="py-5  relative">
            <header class="flex flex-col justify-center items-center">
              <h2 class="text-2xl font-bold text-gray-700 py-2">Developers <span class="bg-blue-900 px-2 text-white">available</span> now</h2>
            </header>
          <div class="flex flex-col justify-center items-center max-w-7xl m-auto lg:px-8">
              @forelse($developers as $developer)
                  <x-developers.item :developer="$developer"/>
              @empty
                  <div class="p-20 text-lg text-gray-600 text-center">
                      Looking for reverse job board for PHP developers?
                      <p>
                          <a href="{{ route('developers.create') }}"
                              class="my-2 inline-flex items-center px-4 py-2 border border-transparent leading-6 font-medium rounded-md text-white bg-indigo-600 hover:text-white-600 hover:bg-indigo-500
                      focus:outline-none focus:border-light-indigo-300 focus:shadow-outline-light-indigo active:bg-indigo-50 active:text-white-700 transition duration-150 ease-in-out">
                              Register as a developer
                          </a>
                      </p>
                  </div>
              @endforelse
           </div>

            <div class="flex justify-center items-center">
                <a href="{{ route('developers.index') }}" class="text-sm font-semibold leading-6 text-gray-900" title="View all developers">View all developers <span aria-hidden="true">→</span></a>
            </div>
        </section>
</x-guest-layout>
