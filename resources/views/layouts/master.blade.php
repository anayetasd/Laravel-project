@include('layouts.header')
<div class="dashboard-main-wrapper">
@include("layouts.topbar")
@include("layouts.sidebar")

<div class="dashboard-wrapper">

@yield("page")

</div>

</div>

@include("layouts.footer")