<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
    @include('component.navbar')
        <div class="flex justify-center items-center max-h-screen">
            <form class="w-96 p-6" method="POST" action="{{ route('loginProcess') }}">
                @csrf
                <div class="space-y-12">
                  <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                      <div class="col-span-full">
                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                          <input type="text" name="username" id="street-address" autocomplete="street-address" class="w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="nama" >
                        </div>
                      </div>
                      <div class="col-span-full">
                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                          <input type="password" name="password" id="street-address" autocomplete="street-address" class="w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6" placeholder="password" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                  <button type="submit" class="rounded-md bg-blue-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>
        </div>
</body>
</html>
