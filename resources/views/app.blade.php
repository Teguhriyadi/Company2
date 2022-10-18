<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ empty($data_profil) ? '-' : $data_profil->profil_nama }}
    </title>
    @if (empty($data_profil))
    @else
    <link rel="icon" type="image/png" href="{{ $data_profil->profil_foto }}" />
    @endif

    @include("pages.layouts.partials.css.style")

    @vite('resources/css/app.css')
</head>

<body>
    <div id="app"></div>

    @vite('resources/js/app.js')

    @include("pages.layouts.partials.js.style")

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
