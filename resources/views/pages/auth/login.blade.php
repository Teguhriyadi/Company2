<!DOCTYPE HTML>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ empty($profil) ? '-' : $profil->profil_nama }} - Hame Aplikasi
    </title>
    @if (empty($profil))
    @else
        <link rel="icon" type="image/png" href="{{ $profil->profil_foto }}" />
    @endif
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            height: 100vh;
            background-image: url(https://dosenit.com/wp-content/uploads/2020/10/Gunung-Fuji-Jepang-1024x640-1.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        p {
            color: white;
            font-family: 'Open Sans', sans-serif;
            padding-top: 10px;
        }

        h1 {
            text-align: center;
            padding-left: 100px;
            padding-bottom: 20px;
        }

        a {
            color: white;
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 25px;
            width: 300px;

            background-color: rgba(0, 0, 0, .7);
            box-shadow: 0 0 10px rgba(255, 255, 255, .3);
        }

        .container h1 {
            text-align: left;
            color: #fafafa;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 4px solid #752BEA;
        }

        .container label {
            text-align: left;
            color: #90caf9;
        }

        .container form input {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid #752BEA;
            color: #fff;
            font-size: 20px;
        }

        .container form button {
            width: 100%;
            height: 40px;
            padding: 5px 0;
            border: none;
            background-color: #752BEA;
            font-size: 18px;
            color: #fafafa;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <label>Email</label>
            <br>
            <input type="email" id="email" name="email">
            <br>
            <label>Password</label>
            <br>
            <input type="password" id="password" name="password">
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
