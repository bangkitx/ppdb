@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1> SMPTQ Pangeran Diponegoro </h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
