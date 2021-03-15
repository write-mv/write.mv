@props(['title', 'value' => 0])
<div class="bg-white overflow-hidden rounded-lg">
    <div class="px-4 py-5 sm:p-6 poppins">
      <dt class="flex justify-between items-center">
       <span class="text-sm font-medium text-gray-500 truncate uppercase">{{$title}} </span>
       {{$icon ?? ''}}
      </dt>
      <dd class="mt-1 text-3xl font-semibold text-gray-700">
       {{$value}}
      </dd>
    </div>
</div>