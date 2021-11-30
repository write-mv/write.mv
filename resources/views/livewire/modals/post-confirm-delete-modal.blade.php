<x-modal.confirmation wire:model.defer="showConfirmModal">
    <x-slot name="title">Delete post</x-slot>
    <x-slot name="content">


        <div class="mt-2">
            <p class="text-sm text-gray-500">
                Are you sure you want to remove this post?
            </p>
        </div>

    </x-slot>

    <x-slot name="footer">
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button wire:click="destroy" type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Delete
            </button>
            <button wire:click="$set('showConfirmModal', false)" type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-slot>
</x-modal.confirmation>