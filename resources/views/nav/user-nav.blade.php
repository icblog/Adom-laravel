<li>
            <a
            href="{{route('home.index')}}"
            class="header-nav-link {{ Route::currentRouteNamed('home.index') ? 'active' : '' }}"
            >
            Home
        </a>
    </li>
    <li>
        <a

        href="{{route('about.index')}}"
        class="header-nav-link {{ Route::currentRouteNamed('about.index') ?  'active' : '' }}"
        >
        About 
    </a>
</li>
<li>
    <a href="{{route('work.index')}}" class="header-nav-link {{ Route::currentRouteNamed('work.index') ? 'active' : '' }}">
        Our work
    </a>
</li>
<li>
    <a

    href="{{route('review.index')}}"
    class="header-nav-link {{ Route::currentRouteNamed('review.index') ? 'active' : '' }}"
    >
    Reviews
</a>
</li>

<li>
    <a

    href="/contact"
    class="header-nav-link"
    id="contact-link"
    >
    Contact
</a>
</li>