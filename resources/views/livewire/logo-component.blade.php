@if($logo)
<div class="wrap-logo-top left-section">
    <a href="/" class="link-to-home"><img src="{{asset('assets/images/logo')}}/{{$logo->image}}" alt="mercado"></a>
</div>
@else
<div class="wrap-logo-top left-section">
<a href="/" class="link-to-home"><img src="{{asset('assets/images/Logo/logo-chamocell-1.png')}}" alt="mercado"></a>
</div>
@endif
