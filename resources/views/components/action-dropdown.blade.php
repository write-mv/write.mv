<div {{$attributes}}>
<div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"
  class="relative inline-block text-left">
  <div>
    <button type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
      id="options-menu" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" aria-expanded="true">
      <span class="sr-only">Open options</span>
      {{$icon}}
    </button>
  </div>


  <div x-description="Dropdown menu, show/hide based on menu state." x-show="open"
    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
    class="origin-top-right absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
    role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
    <div class="py-1" role="none">
      {{$slot}}
    </div>
  </div>

</div>

</div>