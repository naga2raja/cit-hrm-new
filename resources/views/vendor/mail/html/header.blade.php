<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ assetUrl('img/logo.png') }}" class="logo" alt="CITHRM">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
