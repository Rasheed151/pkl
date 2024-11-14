<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Klipaa | Login</title>
    <!-- End | Title -->

    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        /* CSS Kustom untuk warna */
        .bg-customBlue {
            background-color: #2c7e9e;
        }
        .text-customBlue {
            color: #2c7e9e;
        }
        .outline-customBlue {
            outline-color: #2c7e9e;
        }
    </style>

</head>

<body class="bg-white flex flex-col justify-center items-center min-h-screen p-6">

    <!-- Container -->
    <div class="grid md:grid-cols-2 items-center gap-8 bg-white max-w-4xl w-full shadow-lg rounded-md overflow-hidden">
        <!-- Konten Kiri -->
        <div class="flex flex-col justify-center p-8 bg-customBlue w-full h-full">
            <div class="max-w-md space-y-12 mx-auto">
                <div>
                    <h4 class="text-white text-lg font-semibold">Selamat Datang di Klipaa</h4>
                    <p class="text-sm text-white mt-2">Silakan login untuk melanjutkan.</p>
                </div>
                <div>
                    <h4 class="text-white text-lg font-semibold">Akses Mudah dan Aman</h4>
                    <p class="text-sm text-white mt-2">Dengan menggunakan akun Anda, Anda dapat mengakses semua fitur dan informasi yang kami tawarkan.</p>
                </div>
                <div>
                    <h4 class="text-white text-lg font-semibold">Privasi Anda Terjaga</h4>
                    <p class="text-sm text-white mt-2">Kami menjaga data Anda dengan sangat hati-hati sesuai dengan kebijakan privasi kami.</p>
                </div>
            </div>
        </div>
        <!-- End | Konten Kiri -->

        <!-- Konten Kanan -->
        <div class="p-8">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/L-Klipaa.png') }}" alt="Klipa Logo" class="h-[40%] w-[40%]">
            </div>
            <h3 class="text-customBlue text-3xl font-extrabold mb-6 text-center">Login Akun Klipaa</h3>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="text-gray-800 text-sm mb-2 block">{{ __('Username') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md outline-customBlue" placeholder="Masukkan name Anda" required autofocus>
                        @error('name')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-gray-800 text-sm mb-2 block">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded-md outline-customBlue" placeholder="Masukkan password Anda" required>
                        @error('password')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mt-4 text-red-500">
                        <strong>Error!</strong> {{ $errors->first() }}
                    </div>
                @endif

                <div class="flex items-center mt-6">
                    <input class="h-4 w-4 rounded" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-3 block text-sm" for="remember">{{ __('Tetap Login') }}</label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-customBlue hover:bg-blue-600 focus:outline-none transition-all">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="text-customBlue hover:underline text-sm block text-center mt-2" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>

            <div class="mt-6 text-center">
                <p>Lupa Password? <a href="/reset" class="text-customBlue hover:underline">Reset</a></p>
            </div>
        </div>
        <!-- End | Konten Kanan -->

    </div>
    <!-- End | Container -->

</body>

</html>
