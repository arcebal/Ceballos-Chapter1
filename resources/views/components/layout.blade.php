<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $heading ?? 'Pixel Font Top Navigation' }}</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Press Start 2P', cursive;
    }
  </style>
</head>
<body class="bg-black text-white min-h-screen">
  <nav class="fixed top-0 left-0 w-full bg-black border-b border-gray-800 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm md:text-lg">
      
      <!-- Desktop navigation -->
      <div class="hidden md:flex justify-between w-full">
        <div>
          <x-nav-link href="/" :active="request()->is('/')" class="text-yellow-400 hover:text-yellow-300">Home</x-nav-link>
        </div>
        <div class="flex space-x-6">
          <x-nav-link href="/jobs" :active="request()->is('jobs')" class="text-yellow-400 hover:text-yellow-300">Jobs</x-nav-link>
        </div>
      </div>

      <!-- Mobile navigation -->
      <div class="flex justify-between w-full md:hidden">
        <div>
          <x-nav-link href="/" :active="request()->is('/')" class="text-yellow-400 hover:text-yellow-300">Home</x-nav-link>
        </div>
        <div class="flex space-x-6">
          <x-nav-link href="/jobs" :active="request()->is('jobs')" class="text-yellow-400 hover:text-yellow-300">Jobs</x-nav-link>
        </div>
      </div>

    </div>
  </nav>

  <main class="pt-20 max-w-7xl mx-auto px-6">
    <h1 class="text-yellow-400 text-3xl md:text-5xl text-center mt-10">{{ $heading }}</h1>
    <p class="text-gray-400 mt-6 text-center max-w-xl mx-auto">
      By: Ceballos, John Clifford
    </p>

    <div class="mt-10 text-gray-200">
      {{ $slot }}
    </div>
  </main>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: '{{ session('success') }}',
          timer: 2000,
          showConfirmButton: false
      });
  </script>
  @endif
</body>
</html>
