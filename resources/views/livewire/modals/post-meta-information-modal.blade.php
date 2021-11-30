<x-modal.dialog wire:model.defer="showMetaModal">
    <x-slot name="title">Meta informations</x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-2">
            <label for="meta_title" class="block text-sm font-medium text-gray-700 poppins">Title</label>
            <input type="text" name="meta_title" id="meta_title" wire:model.lazy="post.meta.title"
                class="mt-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300">
            @error('post.meta.title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="col-span-6 sm:col-span-2 mt-3">
            <label for="description" class="block text-sm font-medium text-gray-700 poppins">Description</label>
            <textarea id="meta_description" name="meta_description" wire:model.lazy="post.meta.description" rows="5"
                class="mt-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-md rounded-md border-gray-300"></textarea>
            @error('post.meta.description') <p class=" mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


    </x-slot>

    <x-slot name="footer">
        <a wire:click="$set('showMetaModal', false)"
            class="ml-3 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 poppins">
            Done
        </a>

    </x-slot>
</x-modal.dialog>
