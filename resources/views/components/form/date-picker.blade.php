@props(['options' => []])
@php
  $options = array_merge([
                    'dateFormat' => 'Y-m-d h:m',
                    'enableTime' => true,
                    'altFormat' =>  'j F Y h:m',
                    'altInput' => true
                    ], $options);
@endphp
<div wire:ignore>
     <input
     x-data
     x-init="flatpickr($refs.input, {{json_encode((object)$options)}});"
     x-ref="input"
     type="text"
     {{ $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:bg-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md']) }}
 />
</div>

