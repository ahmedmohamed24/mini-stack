<div class="slider w-full bg-white flex flex-row  items-center overflow-auto">
    @foreach($moreTags as $tag)
        <div class="tag my-10 mx-5 p-4  bg-gray-300 rounded-full border-2 text-blue-700">{{ $tag->title }}</div>
    @endforeach
</div>

<style>
    .slider::-webkit-scrollbar {
        width: 0.5rem;
    }
    .slider::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }
    .slider::-webkit-scrollbar-thumb {
        background-color: #e2e8f0;
    }
    .slider{
        transform:rotate(180deg);
        margin-top:1rem;
   }
    .slider > div {
        transform: rotate(180deg);

    }
</style>
