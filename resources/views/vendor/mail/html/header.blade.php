<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="/images/logo.svg" class="logo" alt="Writemv Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
