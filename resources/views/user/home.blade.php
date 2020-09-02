<div>
    @include('inc/user/nav')
    <div class="grid grid-cols-12 ">
        <div class="col-span-3">
            @include('inc/user/slectedTags')
        </div>
        <div class="col-span-9 px-3">
            @include('inc/user/moreTags')
            @include('inc/user/createPost')
            @include('inc/user/questions')
        </div>
    </div>
    @include('inc/user/footer')

</div>
