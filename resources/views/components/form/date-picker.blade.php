@props(['options' => []])
@php
    $options = array_merge([
                    'enableTime' => true
                    ], $options);
@endphp
<div wire:ignore>
     <input
     x-data="{value: @entangle($attributes->wire('model')), instance: undefined}"
     x-init="() => {
             $watch('value', value => instance.setDate(value, true));
             instance = flatpickr($refs.input, {{ json_encode((object)$options) }});
         }"
     x-ref="input"
     x-bind:value="value"
     type="text"
     {{ $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md']) }}
 />
</div>

