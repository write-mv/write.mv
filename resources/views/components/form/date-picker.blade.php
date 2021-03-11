<div x-data="app()" x-init="initFlatpickr">
    <input class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md" x-ref="picker" />
</div>

<script> 
    function app() {
           return {
               initFlatpickr() {
                   const fp = flatpickr(this.$refs.picker, {
                       enableTime: true,
                   });
               }
           }
       }
</script>
