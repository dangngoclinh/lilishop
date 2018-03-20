@if(isset($menus))
    <aside class="widget widget_categories">
        <h3 class="widgettitle">@lang('Mục')</h3>
        <ul>
            @foreach($menus as $menu)
                <li><a href="{{ $menu->link }}">{{ $menu->label }}</a></li>
            @endforeach
        </ul>
    </aside>
@endif