@props([
    'is_grid' => ''
])
<fieldset x-data="radioGroup()">
    <label for="blog_style" class="block text-sm font-medium text-gray-700">
        Blog Style
    </label>

    <div class="bg-white rounded-md -space-y-px flex gap-4" x-ref="radiogroup">


        <div :class="{ 'border-gray-200': !(active === 0), 'bg-blue-50 border-blue-200 z-10': active === 0 }"
            class="relative border rounded-tl-md rounded-tr-md p-4 flex border-gray-200">
            <div class="flex items-center h-5">
                <input id="settings-option-0" name="privacy_setting" type="radio" @click="select(0)"
                    @keydown.space="select(0)" @keydown.arrow-up="onArrowUp(0)" @keydown.arrow-down="onArrowDown(0)"
                    class="focus:ring-blue-500 h-4 w-4 text-blue-600 cursor-pointer border-gray-300" {{$is_grid == 1  ? "checked" : ""}}>
            </div>
            <label for="settings-option-0" class="ml-3 flex flex-col cursor-pointer">
                <img class="mx-auto h-12 w-auto" src="/icons/list.svg">
                <span :class="{ 'text-blue-900': active === 0, 'text-gray-900': !(active === 0) }"
                    class="block text-sm font-medium text-gray-900">
                    List View
                </span>

            </label>
        </div>


        <div :class="{ 'border-gray-200': !(active === 1), 'bg-blue-50 border-blue-200 z-10': active === 1 }"
            class="relative border border-gray-200 p-4 flex">
            <div class="flex items-center h-5">
                <input id="settings-option-1" name="privacy_setting" type="radio" @click="select(1)"
                    @keydown.space="select(1)" @keydown.arrow-up="onArrowUp(1)" @keydown.arrow-down="onArrowDown(1)"
                    class="focus:ring-blue-500 h-4 w-4 text-blue-600 cursor-pointer border-gray-300" {{$is_grid == 0 ? "checked" : ""}}>
            </div>
            <label for="settings-option-1" class="ml-3 flex flex-col cursor-pointer">
            
                <img class="mx-auto h-12 w-auto" src="/icons/grid.svg">
                <span :class="{ 'text-blue-900': active === 1, 'text-gray-900': !(active === 1) }"
                    class="block text-sm font-medium text-gray-900">
                   
                    Grid View
                </span>
            </label>
        </div>



    </div>
</fieldset>
<script>
function radioGroup() {
    return {
     active: @entangle('blog.is_grid'),
    onArrowUp(index) {
        this.select(this.active - 1 < 0 ? this.$refs.radiogroup.children.length - 1 : this.active - 1);
    },
    onArrowDown(index) {
        this.select(this.active + 1 > this.$refs.radiogroup.children.length - 1 ? 0 : this.active + 1);
    },
    select(index) {
        this.active = index;
    },
 };
}
</script>