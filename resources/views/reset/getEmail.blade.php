@extends('layouts.user')

@section('title')
    reset password
@endsection

@section('content')
<div>
    <div class="text-center mt-24">
        <div class="flex items-center justify-center">
            <svg fill="none" viewBox="0 0 24 24" class="w-12 h-12 text-blue-500" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="text-4xl tracking-tight">
            Enter You account address
        </h2>
    </div>
    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6" id="form-data" >
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='email'>Email
                        address</label>

                    <input
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type='email' required name="email" id="email">
                    @include('errors/email')
                    <button class="btn btn-blue my-4" type="submit">Send</button>

                    <div class="reviewErrors hidden border  border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">

                    </div>
                    <div class=" reviewSuccess hidden items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $('#form-data').submit((e)=>{
            e.preventDefault();
            let formData= new FormData($('#form-data')[0]);
            //make the both containers for success messages and error messages empty and hidden again
            const successContainer=document.querySelector('.reviewSuccess');
            const errorContainer=document.querySelector('.reviewErrors');
            successContainer.innerHTML="";
            successContainer.classList.add('hidden');
            errorContainer.innerHTML="";
            errorContainer.classList.add('hidden');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{ route('pass.send.mail') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        successContainer.classList.remove('hidden');
                        successContainer.innerHTML="<span>"+data.msg+"</span>";
                    }
                    else{
                        errorContainer.classList.remove('hidden');
                        for(let msg in data.msg){
                            var temp=document.createElement('P');
                            temp.innerHTML=data.msg[msg][0];
                            errorContainer.appendChild(temp)

                        }

                    }
                },

            });
        })
    </script>
@endsection
