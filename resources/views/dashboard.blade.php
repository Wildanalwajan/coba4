
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>this is user dashboard</h1>

    <!-- Navbar -->
    <nav class="bg-pink-600 p-4 flex justify-between items-center text-white">
        <h1 class="text-2xl font-bold">Kandani</h1>
        <input type="text" placeholder="Cari produk..." class="px-4 py-2 rounded text-black">
        <div class="flex gap-4">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="flex items-center text-gray-500 hover:text-red-600 bg-white rounded">
                    <span class="mr-2 m-2">Keluar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h3m-5-6V9a2 2 0 00-2-2H7m-2 0a2 2 0 00-2 2v10a2 2 0 002 2h3a2 2 0 002-2v-1"/>
                    </svg>
                </button>
            </form>
            <button class="bg-white text-pink-600 px-4 py-2 rounded"><a href="#">Keranjang</a></button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto p-4 flex gap-4">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg mb-2">Kategori</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block p-2 hover:bg-pink-100 rounded">Hijab Segi Empat</a></li>
                <li><a href="#" class="block p-2 hover:bg-pink-100 rounded">Pashmina</a></li>
                <li><a href="#" class="block p-2 hover:bg-pink-100 rounded">Bergo</a></li>
                <li><a href="#" class="block p-2 hover:bg-pink-100 rounded">Hijab Instan</a></li>
            </ul>
        </aside>

        <!-- Produk Section -->
        <main class="w-4/5">
            <!-- Banner -->
            <div class="mb-4">
                <img src="https://via.placeholder.com/1200x300" alt="Banner Promo" class="w-full rounded">
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-4 gap-4">
                <!-- Produk Card -->
                <div class="bg-white p-4 rounded shadow">
                    <img src="https://via.placeholder.com/200" alt="Hijab 1" class="w-full rounded">
                    <h3 class="font-semibold mt-2">Hijab Segi Empat Polos</h3>
                    <p class="text-pink-600 font-bold">Rp 50.000</p>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded mt-2 w-full">Beli</button>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <img src="https://via.placeholder.com/200" alt="Hijab 2" class="w-full rounded">
                    <h3 class="font-semibold mt-2">Pashmina Premium</h3>
                    <p class="text-pink-600 font-bold">Rp 75.000</p>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded mt-2 w-full">Beli</button>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <img src="https://via.placeholder.com/200" alt="Hijab 3" class="w-full rounded">
                    <h3 class="font-semibold mt-2">Hijab Bergo Syar'i</h3>
                    <p class="text-pink-600 font-bold">Rp 65.000</p>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded mt-2 w-full">Beli</button>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <img src="https://via.placeholder.com/200" alt="Hijab 4" class="w-full rounded">
                    <h3 class="font-semibold mt-2">Hijab Instan Motif</h3>
                    <p class="text-pink-600 font-bold">Rp 80.000</p>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded mt-2 w-full">Beli</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
