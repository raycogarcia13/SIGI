<aside class="main-sidebar" id="sidebar-wrapper">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            @if(isset($menu))
                @include($menu)
            @else
                @include('layouts.menu')
            @endif
        </ul>
    </section>
</aside>