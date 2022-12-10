@include('dashboard.partials.header')
@extends('dashboard.partials.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>@yield('page_title')</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
@yield('content')
</main>
@extends('dashboard.partials.footer')
