<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://bfam.bibleforallmission.org/auth/images/BFAM-Bible-Club.png" class="logo" alt="App Logo" style="width: 80%">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
