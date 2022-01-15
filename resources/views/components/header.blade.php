<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css"/>
    @yield('add_css')
    <title>@yield('title') - Twitch Whisper System</title>
</head>
<body>
<nav class="navbar-expand-lg navbar sticky-top navbar-twitch bg-twitch">
    <div class="col-sm text-center text-md-left">
        <a class="navbar-brand navbar-twitch-brand" href="/">Twitch Whisper System</a>
    </div>
    @if(session()->has("access_token"))
    <div class="col-sm">
        <div class="" id="navbarSupportedContent">
            <ul class="navbar-nav float-sm-right">
                <li class="nav-item dropdown">
                    <img src="<?=$user["data"][0]["profile_image_url"]; ?>" class="nav-link dropdown-toggle rounded-circle mx-auto" height="55" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item text-center text-md-left">Welcome</span>
                        <span class="dropdown-item text-center text-md-left font-weight-bold"><?= $user["data"][0]["display_name"]; ?></span>
                        <a class="dropdown-item text-center text-md-left" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
    @endif


</nav>
