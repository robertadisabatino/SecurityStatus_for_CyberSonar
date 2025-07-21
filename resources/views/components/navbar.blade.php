<nav class="navbar navbar-expand-lg navbarglass ">
    <div class="container-fluid ">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img id="logo" src="/media/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto ">
                <a class="nav-link hide-on-welcome active text-white" aria-current="page" href="#overview">Overview</a>
                <a class="nav-link hide-on-welcome text-white" href="#punteggi">{{__('ui.punteggi')}}</a>
                <a class="nav-link hide-on-welcome text-white" href="#vulnerabilities">{{__('ui.vulnerabilita')}}</a>
                <a class="nav-link hide-on-welcome text-white" href="#email">{{__('ui.email_certificati')}}</a>
                <a class="nav-link hide-on-welcome text-white" href="#rete">{{__('ui.rete')}}</a>
                <a class="nav-link hide-on-welcome text-white" href="#summary">{{__('ui.summary')}}</a>
                @php
                $locales = ['it' => 'IT', 'en' => 'EN'];
                $currentLocale = app()->getLocale();
                @endphp
                <div class="dropdown">
                    <button class="btn dropdown-toggle custom-dropdown-btn" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $locales[$currentLocale] }}
                    </button>
                    <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="dropdownLang">
                        @foreach ($locales as $code => $label)
                        @if ($code !== $currentLocale)
                        <li>
                            <a class="dropdown-item custom-dropdown-item" href="{{ route('setLocale', $code) }}">
                                {{ $label }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                
                
            </div>
        </div>
    </div>
</nav>