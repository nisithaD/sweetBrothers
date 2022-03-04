<div>
    <h1>Edit content block</h1><h3>{{$blocks->title}}</h3>

    <form>
        <label for="title">Title</label>
        <div class="mb-5">
            <input class="form-control" wire:model="title" id="title" type="text" name="title" placeholder="Title"/>
            @error('title') <span class="error text-danger">* {{ $message }}</span> @enderror
        </div>
        <label for="content">Contents</label>
        <div class="form-floating mb-5">
            <input class="form-control"  wire:model.defer="content" type="text" name="content"
                   placeholder="Content">
        </div>
        <select class="form-select mb-5" wire:model.defer="imageDisplay" name="imageDisplay" aria-label="Select example">
            <option value="0">None</option>
            <option value="1">Left</option>
            <option value="2">Right</option>
        </select>
        <label for="content">Image Upload : </label>
        @if (isset($image))
            Photo Preview:
            <img width="10%" src="{{ $image->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="image">
        @error('image') <span class="error">{{ $message }}</span> @enderror

        <br>

        <input type="button" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="editContentBlock({{$blocks->id}},{{$landing->id}})" value="Update">
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
