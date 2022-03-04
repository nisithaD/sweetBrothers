<div>
    <div class="container-fluid">
        <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <h1>Create Featured Page</h1>
        <form>
            <label for="title">Title</label>
            <div class="form-floating mb-3">
                <input class="form-control" wire:model.defer="input.title" id="title" type="text" name="title" placeholder="Title"/>
                @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
            </div>

            <label for="title">Link</label>
            <div class="form-floating mb-3">
                <input class="form-control" wire:model.defer="input.link" id="link" type="text" name="link" placeholder="Link"/>
                <small class="text-info">Add a link to link to an existing page otherwise leave blank to create a new page</small>
                @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
            </div>

            <label for="content">Content</label>
            <div class="form-group mb-3" wire:ignore>
                <textarea id="note" data-note="@this" wire:model.defer="input.content" class="form-control"></textarea>
                {{--            <textarea class="form-control" id="content" wire:model="input.contents" type="text" name="contents"--}}
                {{--                      placeholder="Content"></textarea>--}}
            </div>
            @if (isset($image))
                Photo Preview:
                <img width="10%" src="{{ $image->temporaryUrl() }}">
            @endif
            <br>
            <input type="file" wire:model.lazy="image">
            <br>
            @error('image') <span class="error">{{ $message }}</span> @enderror
            <br>
            <div class="form-group mb-3">
                {!! Form::label('meta_title', 'Meta Title:') !!}
                <input class="form-control" wire:model.defer="input.meta_title" id="title" type="text" name="meta_title"
                       placeholder="Meta title"/>
            </div>

            <div class="form-group mb-3">
                {!! Form::label('meta_description', 'Meta Description:') !!}
                <input class="form-control" wire:model.defer="input.meta_description" id="title" type="text" name="meta_description"
                       placeholder="Meta Description"/>
            </div>

            <div class="form-group mb-3">
                {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                <input class="form-control" wire:model.defer="input.meta_keywords" id="title" type="text" name="meta_keywords"
                       placeholder="Meta Keywords"/>
            </div>
            <input type="button" id="create" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="createNewFeaturedPage" value="Create">
        </form>
        <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
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
                        eval(note).set('input.content',editor.getData());
                    })
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>

    </div>


</div>
