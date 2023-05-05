<div>
    <h2 class="text-lg lg:text-xl leading-loose lg:leading-loose text-left text-black font-semibold">
        Search developers
    </h2>
    <form method="get" class="flex flex-col md:flex-row w-full md:space-x-4 items-start md:items-end pl-4 md:pl-0 space-y-2" action="/developers">
        <div class="w-96">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" wire:model.defer="location" name="location" id="location" autocomplete="location" value="" class="mt-1 block w-full border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" />
        </div>
        <div class="max-w-xs">
            <label for="experienceLevel" class="block text-sm font-medium text-gray-700">Experience Level</label>
            <select id="experienceLevel" wire:model.defer="experienceLevel" name="ExperienceLevel" class="mt-1 block w-full border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="">Search...</option>
                <option value="Junior">Junior</option>
                <option value="Mid">Mid-level</option>
                <option value="Senior">Senior</option>
                <option value="Lead">Lead</option>
            </select>
        </div>
        <div class="max-w-xs">
            <button type="button" wire:click="applyFilter"  class="text-base font-semibold text-white bg-blue-900 hover:bg-blue-800 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-auto max-w-sm md:w-auto">
                Apply
            </button>
        </div>
    </form>
</div>
