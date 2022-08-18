<x-layout>
    
    <x-Forms heading="Create New Category">
    <form method="POST" action="test">
        @csrf
        <x-Form.Input name="name" type="text" />
        <x-Form.Input name="slug" type="text" />
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror  
        </div>
        <div class="flex justify-end mt-6 pt-6">
    
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
    
        </div>
      </form>
    </div>
  
</x-Forms>
    </x-layout>