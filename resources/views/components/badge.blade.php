@props([
    "label" => "badge",
    "color" => "green"
])

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$color}}-100 text-{{$color}}-800">
    {{$label}}
  </span>