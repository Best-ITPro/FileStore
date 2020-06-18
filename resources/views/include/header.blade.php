
<?php
    // Header

    // MyApp - settings
    use App\MyApp;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo MyApp::TITLE ?></title>

    <meta name="description" content="<?php echo MyApp::DESCRIPTION ?>" />
    <meta name="keywords" content="<?php echo MyApp::KEYWORDS ?>" />
    <link href="/img/files.png" rel="icon" />

    <!--    Font Awesome 5.13.0 -->
    <link rel="stylesheet" href="/extentions/fontawesome-free-5.13.0-web/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>

<body class="body_main">

<div id="app">

<div class="container">

        <br>
        <div id="main_block row">
            <div class="col-12 col-md-12">
            <a href="{{ route('home') }}">
            <center><img src="/img/files.png" id="FileStoreImg" class="d-block"></center>
                <center><h1><font color="#4285F4">F</font><font color="#FBBC05">i</font><font color="#34A853">l</font><font color="#EA4335">e</font><font color="black">store</font></h1></center>
            </a>

