@props(['post'])
<div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4" style="color:#fff">Add New Category</h3>
    <div id="form-message-warning" class="mb-4"></div>
    <form method="POST" id="contactForm" name="contactForm" enctype="multipart/form-data" novalidate="novalidate" action="/admin/category/create">
        @csrf
        <div class="row">
        <x-Form.Input name="name" type="text" />
        <x-Form.Input name="slug" type="text" />
   

<button class="button-10" role="button">ADD</button>

        
       
        
       
    </div>

    
    </form>
</div>    

    