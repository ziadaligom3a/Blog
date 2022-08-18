<x-layout>


    <div class="px-6 py-8">


        <main class="max-w-lg max-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">


            <h1 class="text-center font-bold text-xl">Log In !</h1>

            <form action="/login" method="post"  class="mt-10">
                @csrf
                <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
                <input type="text" value="{{ old('username') }}" name="username" id="username" class="border border-gray-400 p-2 w-full">
                    
                @error('username')
                    <p style="color:red">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full">
           
                @error('password')
                <p style="color:red">{{ $message }}</p>
                @enderror
                
            </div>
            
        <div class="mb-6">

            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Log In</button>

        </div>

            </form>

        </main>
    </div>


</x-layout>