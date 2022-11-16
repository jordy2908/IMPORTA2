@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://importaapp.com/wp-content/uploads/2022/01/LogoColor_ImportaApp.png" class="width: 125%; height: 75px;" alt="">
@endif
</a>
</td>
</tr>
