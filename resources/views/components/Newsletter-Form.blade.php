<br>
<h5 class="text-3xl">Stay in touch with the latest posts</h5>
<p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

<div class="mt-10" id="subscribe">
    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

        <form id="newsletter" method="POST" action="/newsletters" class="lg:flex text-sm">
          @csrf
            <div class="lg:py-3 lg:px-5 flex items-center">
                <label for="email" class="hidden lg:inline-block">
                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                </label>

            <div>


                <input name="email" id="email" type="text" placeholder="Your email address"
                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                       @error('email')
                       <span class="text-xs text-red-500">{{ $message }}</span>
                           @enderror

            </div>

            </div>

            <button type="submit"
                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
            >
                Subscribe
            </button>
        </form>
    </div>
</div>