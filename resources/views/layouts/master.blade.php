<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../favicon.png" />
    <title>{{ config('app.name', 'Chalets System') }}</title>
    @livewireStyles
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="/css/soft-ui-dashboard-tailwind.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css"  rel="stylesheet" />

  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

    <!-- sidenav  -->
    @include('layouts.sidebar')

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:mr-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
    @include('layouts.navbar')

      <!-- end Navbar -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        @if(session('message'))
            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('message') }}</span>
                </div>
            </div>
        @endif
        @yield('content')

        <!-- card 2 -->

        <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                  © {{ date('Y')}},
                  Mohamed Hamdy
                </div>
              </div>

            </div>
          </div>
        </footer>
      </div>
      <!-- end cards -->
    </main>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
  @livewireScripts
</html>
