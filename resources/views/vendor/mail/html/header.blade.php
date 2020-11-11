<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
<img src={{asset('storage/images/logo_email_75x75.png')}} class="logo" alt="Laravel Logo">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
