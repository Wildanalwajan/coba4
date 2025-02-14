<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-image: url(assets/kain.jpg);
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-cover bg-center">
    <div class="flex justify-center w-full max-w-sm md:max-w-5xl shadow-lg rounded-lg overflow-hidden blur-ld">
        @if(session('failed'))
            <div class="bg-red-500 text-white p-3 rounded mb-3">{{ session('failed') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login.proses') }}" method="POST" class="space-y-4 font-bold text-white">
            @csrf
            <div>
                <label for="email" class="block font-medium">Email:</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Daftar</button>
            <button type="reset" id="btnreset" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Reset</button>
            <p class="text-center">Doesn't have an account? Let's go <a href="{{ route('register') }}" class="text-blue-500">Sign Up</a> dulu yukk!</p>
        </form>
    </div>
    <script>
        document.getElementById('btnreset').addEventListener('click', function() {
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('phone_number').value = '';
            document.getElementById('gender').value = '';
        });
    </script>
</body>
</html>
