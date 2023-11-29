@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
@endsection

<navbar class="nav">
    <a id="home_tab" href="/home" class="nav-link active">
        <i class="material-icons">home</i>
        <span class="nav-text">Home</span>
    </a>
    <a id="diagnose_tab" href="/diagnose" class="nav-link">
        <i class="material-icons">medical_services</i>
        <span class="nav-text">Diagnose</span>
    </a>
    <a id="scan_tab" href="/scan" class="nav-link">
        <i class="material-icons">add_a_photo</i>
        <span class="nav-text">Scan</span>
    </a>
    <a id="plants_tab" href="/my-plants" class="nav-link">
        <i class="material-icons">forest</i>
        <span class="nav-text">My Plants</span>
    </a>
    <a id="account_tab" href="/account" class="nav-link">
        <i class="material-icons">person</i>
        <span class="nav-text">My Account</span>
    </a>
</navbar>

