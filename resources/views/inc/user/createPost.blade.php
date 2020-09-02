@section('scripts')
    <script src="https://cdn.tiny.cloud/1/723f1lnz7dfuc5bhrq3acg835sfp6xyx4fjnmc0fjjpim8uz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            tinymce.init({
                selector: 'textarea',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'EGY',
            });
        })
    </script>
@endsection

<textarea>Don't hesitate, Ask Your Question!</textarea>
