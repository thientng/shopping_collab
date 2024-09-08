@if ($menu->menuChildren()->get()->count())
    <ul class="dropdown {{ (isset($subMenuCheck) && $subMenuCheck == true) ? 'sub-menu' : "" }}">
        @foreach ($menu->menuChildren as $menuChild)
            <li>
                <a href="">{{ $menuChild->name }}</a>
                @include('client_view.components.menu.child_menu',['menu' => $menuChild ,'subMenuCheck' => $menuChild->menuChildren->count()])
            </li>
        @endforeach
    </ul>
@endif