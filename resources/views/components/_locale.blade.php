<form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">

    @csrf

    <button type="submit bandiera" class="btn py-0 ">

        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="20" height="20"/>
        
    </button>
    
</form>