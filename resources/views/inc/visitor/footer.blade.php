

<footer class="font-main bg-blue-900">
    <div class="md:grid grid-cols-2 gap-4 py-4">
        <div class="flex flex-col justify-center items-center my-6 text-center">
            <h2 class="mb-3 font-main text-white text-2xl md:text-3xl"> Subscribe in our Newsletter</h2>
            <form action="" class="" method="POST">
                @csrf
                <input type="text" class="p-2 border bg-white border-grey-light round text-grey-dark text-sm h-auto" placeholder="Your email address">
                <button class="bg-orange-500 text-white rounded-sm h-auto text-xs p-3" type="submit">Subscribe</button>
            </form>

        </div>
        <div class=" flex flex-col justify-center items-center my-6">
            <h2 class="mb-3 font-main text-white text-2xl md:text-3xl"> Contact Us</h2>
            <div class="flex flex-row  items-center justify-center">
                <a href="http://">
                    <img class="mx-3" src="{{ asset('assets/images/facebook.svg') }}" alt="facebook">
                </a>
                <a href="http://">
                    <img class="mx-3" src="{{ asset('assets/images/instagram.svg') }}" alt="instagram">
                </a>
                <a href="http://">
                    <img class="mx-3" src="{{ asset('assets/images/github.svg') }}" alt="github">
                </a>
            </div>
        </div>
    </div>
    <p class="py-4 text-center  text-gray-600 text-xl md:text-2xl ">© 2020 Copyright: EgyStack.com</p>

</footer>
