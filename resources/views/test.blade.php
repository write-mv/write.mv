<x-guest-layout>
    <div class="w-full max-w-3xl mx-auto my-12">
      
        <fieldset x-data="radioGroup()">
          <legend class="sr-only">
            Privacy setting
          </legend>
      
          <div class="bg-white rounded-md -space-y-px flex gap-4" x-ref="radiogroup">
            
              
                <div :class="{ 'border-gray-200': !(active === 0), 'bg-indigo-50 border-indigo-200 z-10': active === 0 }" class="relative border rounded-tl-md rounded-tr-md p-4 flex border-gray-200">
                  <div class="flex items-center h-5">
                    <input id="settings-option-0" name="privacy_setting" type="radio" @click="select(0)" @keydown.space="select(0)" @keydown.arrow-up="onArrowUp(0)" @keydown.arrow-down="onArrowDown(0)" class="focus:ring-blue-500 h-4 w-4 text-blue-600 cursor-pointer border-gray-300" checked="">
                  </div>
                  <label for="settings-option-0" class="ml-3 flex flex-col cursor-pointer">
                    <img class="mx-auto h-12 w-auto" src="/icons/grid.svg">
                    <span :class="{ 'text-indigo-900': active === 0, 'text-gray-900': !(active === 0) }" class="block text-sm font-medium text-gray-900">
                      Grid View
                    </span>
                  
                  </label>
                </div>
              
              
                <div :class="{ 'border-gray-200': !(active === 1), 'bg-indigo-50 border-indigo-200 z-10': active === 1 }" class="relative border border-gray-200 p-4 flex">
                  <div class="flex items-center h-5">
                    <input id="settings-option-1" name="privacy_setting" type="radio" @click="select(1)" @keydown.space="select(1)" @keydown.arrow-up="onArrowUp(1)" @keydown.arrow-down="onArrowDown(1)" class="focus:ring-blue-500 h-4 w-4 text-blue-600 cursor-pointer border-gray-300">
                  </div>
                  <label for="settings-option-1" class="ml-3 flex flex-col cursor-pointer">
                    <img class="mx-auto h-12 w-auto" src="/icons/list.svg">
                    <span :class="{ 'text-indigo-900': active === 1, 'text-gray-900': !(active === 1) }" class="block text-sm font-medium text-gray-900">
                      List View
                    </span>
                  </label>
                </div>
              
              
              
          </div>
        </fieldset>
      
          </div>
</x-guest-layout>