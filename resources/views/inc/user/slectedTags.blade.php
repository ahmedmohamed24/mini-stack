
<div class="rounded-lg overflow-hidden shadow-lg bg-gray-100 min-h-screen relative">
    <p class=" text-gray-600 mb-2 text-2xl text-center font-thin px-4 pt-3">Popular Tags</p>
    <span >
        <svg class="w-6 h-6 absolute top-0 right-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
    <span>
    <div class="py-5 px-3">
      {{-- @foreach ($collection as $item) --}}
      <div class="flex justify-between px-2 py-2">
        <p class="flex text-gray-700">
          <svg class="w-2 text-gray-500 mx-2" viewBox="0 0 8 8" fill="currentColor">
            <circle cx="4" cy="4" r="3" />
          </svg>
          Tighten Co.
        </p>

      </div>
      {{-- @endforeach --}}
    </div>
    <div class="bg-gray-300 flex flex-row-reverse px-2 py-3">
      <button class="bg-blue-500 py-2 px-4 rounded text-white">Invite</button>
      <button class="py-2 px-4 rounded text-gray-600">Cancel</button>
    </div>
  </div>
