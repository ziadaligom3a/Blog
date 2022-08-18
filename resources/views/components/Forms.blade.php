<section class="py-8 max-w-4xl mx-auto">

   

        
        <h1 class="text-lg font-bold mb-6 pb-2 border-b">
        
          dasdsadsa
        
        </h1>

        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-4">Links</h4>
    
                <ul>
                    <li>
                        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">Dashboard</a>
                    </li>
    
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                    <li>
                        <a href="/admin/category/create" class="{{ request()->is('admin/category/create') ? 'text-blue-500' : ''}}">New Category</a>
                    </li>
                </ul>
            </aside>
    
            <main class="flex-1">
                <div>
                    
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
        
            <x-Form.Input name="title" type="text" />
            <x-Form.Input name="slug" type="text" />
            <x-Form.Input name="thumbnail" type="file"/>
            <x-Form.TextArea name="excerpt" />
            <x-Form.TextArea name="body" />
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Category
                </label>
        
                <select name="category_id" id="category_id">
        
        
                    @foreach(App\Models\category::all() as $category)
        
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
        
                    @endforeach
        
                </select>
        
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="flex justify-end mt-6 pt-6">
        
                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        
            </div>
          </form>
                </div>
            </main>
        </div>
</section>