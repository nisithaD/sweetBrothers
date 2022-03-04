<div>
    <h1>Edit FAQ</h1>
    <label for="title">Title</label>
    <div class="form-floating mb-3">
        <input class="form-control" wire:model.defer="title" id="title" type="text" name="title"
               placeholder="Title"/>
        @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
    </div>
    <label for="content">Answer</label>
    <div class="form-group mb-3" wire:ignore>
        <textarea id="note" data-note="@this" wire:model.defer="content" class="form-control">{{$content}}</textarea>
        {{--            <textarea class="form-control" id="content" wire:model="input.contents" type="text" name="contents"--}}
        {{--                      placeholder="Content"></textarea>--}}
    </div>

    <input type="button" id="create" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="updateFaq({{$faqs->id}})" value="Update">

    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/search.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#note'))
            .then(editor => {
                // editor.model.document.on('change:data',()=>{
                //    let note=$('#note').data('note');
                //    eval(note).set('input.contents',editor.getData());
                // });
                document.querySelector('#create').addEventListener('click', () => {
                    let note = $('#note').data('note');
                    eval(note).set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
