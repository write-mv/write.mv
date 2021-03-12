<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Insights') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

       <div class="flex justify-center gap-5">     
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left shadow-xl">
        <h3 class="text-lg leading-6 font-medium text-center text-gray-900">
            Lifetime Summary
        </h3>
        <x-metric.group rowitem="2">
            <x-metric.stats title="Total views" value="400" />
            <x-metric.stats title="Visit Today" value="400" />
        </x-metric.group>
    </div>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left shadow-xl">
        <h3 class="text-lg leading-6 font-medium text-center text-gray-900">
            Monthly Summary
        </h3>
        <x-metric.group rowitem="2">
            <x-metric.stats title="Visit Today" value="400" />
            <x-metric.stats title="Visit Today" value="400" />
        </x-metric.group>
    </div>
</div>

        </div>
    </div>
</div>
