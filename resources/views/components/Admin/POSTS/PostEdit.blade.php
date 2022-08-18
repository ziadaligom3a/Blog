@props(['post'])
<html>
    <head>
        <title>
            Edit Post
        </title>
        <link rel="stylesheet" href="/style.css">

    </head>
    <body>
        
   
<div class="contact-wrap w-100 p-md-5 p-4" style="overflow:scroll; height:950px;">
    <h3 class="mb-4" style="color:#fff">Edit Post: {{ $post->title }}</h3>
    <div id="form-message-warning" class="mb-4"></div>
    <form class="form" method="POST" id="contactForm" name="contactForm" enctype="multipart/form-data" novalidate="novalidate" action="/admin/Edit/{{ $post->id }}">
        @csrf
        @method('patch')
        <div class="row">
        <x-Form.Input name="title" type="text" value="{{ $post->title }}" />
        <x-Form.Input name="slug" type="text" value="{{ $post->slug }}" />
        <div class="col-md-12">
            <div class="form-group">
                <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="5" placeholder="Excerpt" spellcheck="false">{{ $post->excerpt }}</textarea>
            </div>
        </div>      
          <div class="col-md-12">
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="Body" spellcheck="false">{{ $post->body }}</textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <div class="bg-blue-400 text-white rounded py-2 px-0.5 hover:bg-blue-500"   name="category_id">
                        <select name="category_id" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"> 
                            <option value="{{ $post->category_id }}">{{ $post->category->name }}</option>
                            @foreach(\App\Models\category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                  </div>
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
               <div class="flex mt-6">
               <img   src="/tuhmbnails/{{ $post->thumbnail }}" class="rounded-xl" width="100" alt="">
           </div>
        </div>
       </div>

<button class="button-10" role="button">Update</button>

       
    </div>
    
    
    </form>
</div>    

</body>
</html>