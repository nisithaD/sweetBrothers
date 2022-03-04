<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <h1>Add New Content Block</h1>
    <form>
        <label for="title">Title</label>
        <div class="mb-5">
            <input class="form-control" wire:model.defer="title" id="title" type="text" name="title" placeholder="Title"/>
            @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
        </div>
        <label for="content">Content</label>
        <div class="form-group mb-3" wire:ignore>
            <textarea id="note" data-note="@this" wire:model.defer="content" class="form-control"></textarea>
            {{--            <textarea class="form-control" id="content" wire:model="input.contents" type="text" name="contents"--}}
            {{--                      placeholder="Content"></textarea>--}}
        </div>
        <label for="content">Image display</label>
        <select class="form-select mb-5" wire:model.defer="imageDisplay" name="imageDisplay" aria-label="Select example">
            <option value="0">None</option>
            <option value="1">Left</option>
            <option value="2">Right</option>
        </select>
        <label for="content">Image Upload : </label>
        @if ($image)
            Photo Preview:
            <img width="10%" src="{{ $image->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="image">
        @error('image') <span class="error">{{ $message }}</span> @enderror

        <br>

        <button type="button" id="create" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="createNewContentBlock">Create</button>
    </form>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/search.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#note' ) )
            .then( editor => {
                // editor.model.document.on('change:data',()=>{
                //    let note=$('#note').data('note');
                //    eval(note).set('input.contents',editor.getData());
                // });
                document.querySelector('#create').addEventListener('click',()=>{
                    let note=$('#note').data('note');
                    eval(note).set('content',editor.getData());
                })
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

</div>

