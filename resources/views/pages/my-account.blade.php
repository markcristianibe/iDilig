@section('pageTitle')My Account @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/my-account.css') }}">
@endsection

<script src="{{ asset('js/pages/my-account.js') }}"></script>

<div id="header" class="container bg-m_green_secondary pt-5 pb-5">
    <h2 class="text-light my-3">My Account</h2>
</div>

<div id="body" class="container bg-m_green_light">
    <center>
        <img src="{{ asset('img/PLANTS_icon_bg.jpg') }}" alt="" class="user-avatar">
        <h4>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }} <a id="edit_btn" href="">🖊️</a></h4>
    </center>
    <hr>
    <h3>Account Links</h3>
    <div class="row mb-2">
        <div class="col-2">
            <img src="{{ asset('img/icons/icons8-google-50.png') }}" alt="" class="social-icon">
        </div>
        <div class="col">
            <h4 class="social-txt">{{ auth()->user()->email }}</h4>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-2">
            <img src="{{ asset('img/icons/icons8-facebook-50.png') }}" alt="" class="social-icon">
        </div>
        <div class="col">
            <h4 class="social-txt">Link Account</h4>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-2">
            <img src="{{ asset('img/icons/icons8-twitter-50.png') }}" alt="" class="social-icon">
        </div>
        <div class="col">
            <h4 class="social-txt">Link Account</h4>
        </div>
    </div>
    <hr>
    <a href="" class="setting-item">
        <div class="row pt-2">
            <div class="col-1">
                <i class="material-icons">help</i>
            </div>
            <div class="col">
                <h5> FAQ</h5>
            </div>
            <div class="col-1">
                <i class="material-icons">arrow_forward_ios</i>
            </div>
        </div>
    </a>
    <hr>
    <a href="" class="setting-item">
        <div class="row pt-2">
            <div class="col-1">
                <i class="material-icons">text_snippet</i>
            </div>
            <div class="col">
                <h5> User Agreement</h5>
            </div>
            <div class="col-1">
                <i class="material-icons">arrow_forward_ios</i>
            </div>
        </div>
    </a>
    <hr>
    <a href="" class="setting-item">
        <div class="row pt-2">
            <div class="col-1">
                <i class="material-icons">info</i>
            </div>
            <div class="col">
                <h5> About Us</h5>
            </div>
            <div class="col-1">
                <i class="material-icons">arrow_forward_ios</i>
            </div>
        </div>
    </a>
    <hr>
    <button id="logout_btn" class="btn btn-outline-danger">Sign Out</button>
</div>