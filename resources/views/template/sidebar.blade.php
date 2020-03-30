<aside class="main-sidebar" id="sidebar-wrapper">
    @if(isset($menu))
        @include($menu)
    @else
        @include('template.menu')
    @endif
</aside>

