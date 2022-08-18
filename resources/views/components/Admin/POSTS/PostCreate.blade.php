@props(['post'])
<div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4" style="color:#fff">Add New Post</h3>
    <div id="form-message-warning" class="mb-4"></div>
    <form method="POST" id="contactForm" name="contactForm" enctype="multipart/form-data" novalidate="novalidate" action="/admin/posts">
        @csrf
        <div class="row">
        <x-Form.Input name="title" type="text" />
        <x-Form.Input name="slug" type="text" />
        <div class="col-md-12">
            <div class="form-group">
                <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="5" placeholder="Excerpt" spellcheck="false"></textarea>
            </div>
        </div>      
          <div class="col-md-12">
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="Body" spellcheck="false"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <div class="bg-blue-400 text-white rounded py-2 px-0.5 hover:bg-blue-500"   name="category_id">
                        <select name="category_id" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"> 
                            <option value="#">Categories</option>
                            @foreach(\App\Models\category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                  </div>
            </div>

        <div class="col-md-12">
             <div class="form-group">
                <div class="check">
                    
                    
                    <input type="file" name="thumbnail" type="file" />
                    @error('thumbnail')
                    <p>{{ $message }}</p>
                    @enderror
            
                </div>
            </div>
        </div>
        </div>

<button class="button-10" role="button">ADD</button>

   
        
       
    </div>

    
    </form>
</div>    

    