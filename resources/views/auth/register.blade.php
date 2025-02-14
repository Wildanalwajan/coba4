<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="flex items-center justify-center h-screen bg-gray-100">
        <div class="flex flex-col md:flex-row w-full max-w-5xl shadow-lg rounded-lg overflow-hidden">
            @if(session('failed'))
                <div class="bg-red-500 text-white p-3 rounded mb-3">{{ session('failed') }}</div>
            @endif
            <h3 class="text-2xl font-bold mb-4">Register lur</h3>
            @if($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.proses') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block font-medium">Name:</label>
                    <input type="text" id="name" name="name" required class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="email" class="block font-medium">Email:</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="password" class="block font-medium">Password:</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="phone_number" class="block font-medium">Phone Number:</label>
                    <input type="number" id="phone_number" name="phone_number" required class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Daftar</button>
                <button type="reset" id="btnreset" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Reset</button>
                <p class="text-center">Already have an account? Let's go <a href="{{ route('login') }}" class="text-blue-500">Login</a> bro, hayukk!</p>
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
