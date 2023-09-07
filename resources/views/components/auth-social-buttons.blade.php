<div>
    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-primary"></div>
            </div>
            <div class="relative flex justify-center items-center text-sm ">
              <span class=" px-2 text-gray-500 bg-white">
                Or continue with
              </span>
            </div>
          </div>
    </div>
   <div class="flex items-center my-5 justify-center gap-3">
    <div>
        <a href="{{ url('auth/google') }}" class="inline-flex border px-3 py-2 rounded hover:bg-blue-50 transition w-full">
            <x-icons.google-icon />
            Log in with Google
        </a>
    </div>
    <div>
        <a href="{{ url('auth/github') }}" class="inline-flex border px-3 py-2 rounded hover:bg-blue-50 transition w-full">
            <x-icons.git-hub-icon />
            Log in with Github
        </a>
    </div>
   </div>
</div>
