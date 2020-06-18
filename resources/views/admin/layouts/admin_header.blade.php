
<?php
// Admin Header

// MyApp - settings
use App\MyApp;

use Illuminate\Support\Facades\Storage;

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <meta name="description" content="<?php echo MyApp::DESCRIPTION ?>" />
    <meta name="keywords" content="<?php echo MyApp::KEYWORDS ?>" />
    <link href="/img/files.png" rel="icon" />

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!--    Font Awesome 5.13.0 -->
    <link rel="stylesheet" href="/extentions/fontawesome-free-5.13.0-web/css/all.min.css">

</head>

<body>

<div id="app">

<!-- Top admin menu -->
@include('admin.layouts.topmenu')
<!-- Top admin menu -->

<div class="container-fluid">
    <div id="main_block_admin col-12 row">


        <center>

            <main class="py-4">
                @yield('content')
            </main>

    </div>
</div>

@include('admin.layouts.admin_footer')

