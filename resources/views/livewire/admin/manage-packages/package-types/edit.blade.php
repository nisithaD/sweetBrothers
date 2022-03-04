<div>
    <h1>Edit package type</h1>
    {{$package_types->title}}

    <form>
        <label for="title">Title:</label>
        <div class="form-floating mb-3">
            <input class="form-control" wire:model="title" id="title" type="text" name="title" placeholder="Title"/>
            @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
        </div>

        <label for="content">Content:</label>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="content" wire:model="contents" type="text" name="contents"
                      placeholder="Title"></textarea>
        </div>
        <div class="form-group mb-3">
            {!! Form::label('meta_title', 'Meta Title:') !!}
            <input class="form-control" wire:model="meta_title" id="title" type="text" name="meta_title"
                   placeholder="Meta title"/>
        </div>

        <div class="form-group mb-3">
            {!! Form::label('meta_description', 'Meta Description:') !!}
            <input class="form-control" wire:model="meta_description" id="title" type="text" name="meta_description"
                   placeholder="Meta Description"/>
        </div>

        <div class="form-group mb-3">
            {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
            <input class="form-control" wire:model="meta_keywords" id="title" type="text" name="meta_keywords"
                   placeholder="Meta Keywords"/>
        </div>
        @if (isset($image))
            Photo Preview:
            <img width="10%" src="{{ $image->temporaryUrl() }}">
        @endif
        <br>
        <input type="file" wire:model="image">
        @error('image') <span class="error">{{ $message }}</span> @enderror
        <br>
        <input type="button" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="updatePackage({{$package_types->id}})" value="Update">
    </form>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/search.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/editors/ckeditor/classic.js')}}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
