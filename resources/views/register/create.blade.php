<x-layout>
    <div class="px-6 py-8">


        <main class="max-w-lg max-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">


            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form action="/register" method="post" class="mt-10">
            

                <div class="mb-6">

                    @csrf
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
                    <input placeholder="NAME" value="{{ old('name') }}" type="text" name="name" id="name" required class="border border-gray-400 p-2 w-full">
                    
                        @error('name')

                            <p style="color:red">{{ $message }}</p>

                        @enderror

                </div>

                <div class="mb-6">


                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">UserName</label>
                    <input placeholder="USERNAME" value="{{ old('username') }}" type="text" name="username" id="username" required class="border border-gray-400 p-2 w-full">
                    
                    @error('username')

                    <p style="color:red">{{ $message }}</p>

                @enderror
                </div>

                <div class="mb-6">


                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                    <input placeholder="EMAIL" value="{{ old('email') }}" type="email" name="email" id="email" required class="border border-gray-400 p-2 w-full">
                    
                    @error('email')

                    <p style="color:red">{{ $message }}</p>

                @enderror
                </div>

                <div class="mb-6">


                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">PASSWORD</label>
                    <input placeholder="PASSWORD" type="password" name="password" id="password" required class="border border-gray-400 p-2 w-full">
                    
                    @error('password')

                    <p style="color:red">{{ $message }}</p>

                @enderror
                </div>

                <div class="mb-6">

                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>

                </div>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>
                @endforeach
            </form>

        </main>


    </div>


</x-layout>