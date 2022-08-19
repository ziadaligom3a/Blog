<x-layout>
@include ('components.posts.header')
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
   
    @if($posts->count())
    @dd($posts)
    <x-posts.posts-featured-card :post="$posts[6]"/>

  
    <div class="lg:grid lg:grid-cols-2">
        @foreach($posts->skip(1) as $post)
        <x-posts.card :post="$post" />
            @endforeach
          
    </div>
      {{ $posts->links() }}
      @else
    <p>No Posts yet, Please check back later.</p>
  @endif
 
</main>

</x-layout>
