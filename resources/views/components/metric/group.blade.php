@props([
    "rowitem" => "3"
])
<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-{{$rowitem}}">
    {{$slot}}
</dl>