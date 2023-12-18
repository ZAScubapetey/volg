        <!-- Buttons -->
        @php $initial = 1; @endphp

        @foreach($links as $link)
        @php $linkName = str_replace('default ','',$link->title) @endphp
        @switch($link->name)
            @case('icon')
                @break
            @case('phone')
            <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-default button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}"><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(theme('use_custom_icons') == "true"){{ url('themes/' . $GLOBALS['themeName'] . '/extra/custom-icons')}}/phone{{theme('custom_icon_extension')}} @else{{ asset('\/assets/linkstack/icons\/')}}phone.svg @endif"></i>{{ $link->title }}</a></div>
                @break
            @case('default email')
            @case('default email_alt')
            <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-default button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}"><img alt="email" class="icon hvr-icon" src="@if(theme('use_custom_icons') == "true"){{ url('themes/' . $GLOBALS['themeName'] . '/extra/custom-icons')}}/email{{theme('custom_icon_extension')}} @else{{ asset('\/assets/linkstack/icons\/')}}email.svg @endif"></i>{{ $link->title }}</a></div>
                @break
            @case('buy me a coffee')
            <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-coffee button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(theme('use_custom_icons') == "true"){{ url('themes/' . $GLOBALS['themeName'] . '/extra/custom-icons')}}/coffee{{theme('custom_icon_extension')}} @else{{ asset('\/assets/linkstack/icons\/')}}coffee.svg @endif">Buy me a Coffee</a></div>
                @break
                   @case('space')
                   @php $title = $link->title; if (is_numeric($title)) { echo str_repeat("<br>", $title < 10 ? $title : 10); } else { echo "<br><br><br>"; } @endphp
                @break
            @case('heading')
            <div class="fadein"><h2>{{ $link->title }}</h2></div>
                @break
            @case('text')
            <div class="fadein"><span style="">@if(env('ALLOW_USER_HTML') === true){!! $link->title !!}@else{{ $link->title }}@endif</span></div>
                @break
            @case('vcard')
                <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-default button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('vcard') . '/' . $link->id }}"><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(theme('use_custom_icons') == "true"){{ url('themes/' . $GLOBALS['themeName'] . '/extra/custom-icons')}}/vcard{{theme('custom_icon_extension')}} @else{{ asset('\/assets/linkstack/icons\/')}}vcard.svg @endif"></i>{{ $link->title }}</a></div>
                    @break
            @case('custom')
              @if($link->custom_css === "" or $link->custom_css === "NULL" or (theme('allow_custom_buttons') == "false"))
               <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-{{ $link->name }} button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><i style="color: {{$link->custom_icon}}" class="icon hvr-icon fa {{$link->custom_icon}}"></i>{{ $link->title }}</a></div>
                  @break
               @elseif($link->custom_css != "")
               <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-hover icon-hover" style="{{ $link->custom_css }}" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><i style="color: {{$link->custom_icon}}" class="icon hvr-icon fa {{$link->custom_icon}}"></i>{{ $link->title }}</a></div>
                  @break
                @endif
            @case('custom_website')
               @if($link->custom_css === "" or $link->custom_css === "NULL" or (theme('allow_custom_buttons') == "false"))
                 <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-custom_website button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(file_exists(base_path("assets/favicon/icons/").localIcon($link->id))){{url('assets/favicon/icons/'.localIcon($link->id))}}@else{{getFavIcon($link->id)}}@endif" onerror="this.onerror=null; this.src='{{asset('assets/linkstack/icons/website.svg')}}';">{{ $link->title }}</a></div>
                   @break
               @elseif($link->custom_css != "")
                <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-hover icon-hover" style="{{ $link->custom_css }}" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(file_exists(base_path("assets/favicon/icons/").localIcon($link->id))){{url('assets/favicon/icons/'.localIcon($link->id))}}@else{{getFavIcon($link->id)}}@endif" onerror="this.onerror=null; this.src='{{asset('assets/linkstack/icons/website.svg')}}';">{{ $link->title }}</a></div>
                 @break
               @endif
               @default
            <?php include base_path('config/button-names.php'); $newLinkName = $linkName; $isNewName = "false"; foreach($buttonNames as $key => $value) { if($newLinkName == $key) { $newLinkName = $value; $isNewName = "true"; }} ?>
            <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a class="button button-{{ $link->name }} button button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ route('clickNumber') . '/' . $link->id . "?" . $link->link }}" @if(theme('open_links_in_same_tab') != "true")target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(theme('use_custom_icons') == "true"){{ url('themes/' . $GLOBALS['themeName'] . '/extra/custom-icons')}}/{{$link->name}}{{theme('custom_icon_extension')}} @else{{ asset('\/assets/linkstack/icons\/') . $link->name }}.svg @endif">@if($isNewName == "true"){{ ucfirst($newLinkName) }}@else{{ ucfirst($newLinkName) }}@endif</a></div>
        @endswitch
    @endforeach