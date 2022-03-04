<div>
    <h1>Edit Sales Product</h1>
    <div class="form-group mb-3">
        {!! Form::label('title', 'Title:') !!}
        <input class="form-control" wire:model="title" id="title" type="text" name="title" placeholder="Title"/>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        {!! Form::label('type', 'Product Type: ') !!}
                        <select class="form-control" wire:model.defer="type_id" name="type_id" id="type_id">
                            <option value="0">-- select --</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                        @if(isset($products->type_id) && $type->id==$products->type_id) selected @endif>
                                    {{$type->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        {!! Form::label('category', 'Category: ') !!}
                        <select class="form-control" wire:model.defer="category_id" name="category_id" id="category_id">
                            <option value="0">-- select --</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}"
                                        @if(isset($products->category_id) && $cat->id==$products->category_id) selected @endif>
                                    {{$cat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        {!! Form::label('subcategory', 'Sub Category: ') !!}
                        <select class="form-control" wire:model.defer="sub_category_id" name="sub_category_id" id="sub_category_id">
                            <option value="0">-- select --</option>
                            @foreach($subcats as $subcat)
                                <option value="{{$subcat->id}}"
                                        @if(isset($products->sub_category_id) && $subcat->id==$products->sub_category_id) selected @endif>
                                    {{$subcat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        {!! Form::label('type', 'Product Type 2: ') !!}
                        <select class="form-control" wire:model.defer="type_id_2" name="type_id_2" id="type_id_2">
                            <option value="0">-- select --</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                        @if(isset($products->type_id_2) && $type->id==$products->type_id_2) selected @endif>
                                    {{$type->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        {!! Form::label('category', 'Category 2: ') !!}
                        <select class="form-control" wire:model.defer="category_id_2" name="category_id_2" id="category_id_2">
                            <option value="0">-- select --</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}"
                                        @if(isset($products->category_id_2) && $cat->id==$products->category_id_2) selected @endif>
                                    {{$cat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        {!! Form::label('subcategory', 'Sub Category 2: ') !!}
                        <select class="form-control" wire:model.defer="sub_category_id_2" name="sub_category_id_2" id="sub_category_id_2">
                            <option value="0">-- select --</option>
                            @foreach($subcats as $subcat)
                                <option value="{{$subcat->id}}"
                                        @if(isset($products->sub_category_id_2) && $subcat->id==$products->sub_category_id_2) selected @endif>
                                    {{$subcat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        {!! Form::label('type', 'Product Type 3: ') !!}
                        <select class="form-control" wire:model.defer="type_id_3" name="type_id_3" id="type_id_3">
                            <option value="0">-- select --</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                        @if(isset($products->type_id_3) && $type->id==$products->type_id_3) selected @endif>
                                    {{$type->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        {!! Form::label('category', 'Category 2: ') !!}
                        <select class="form-control" wire:model.defer="category_id_3" name="category_id_3" id="category_id_3">
                            <option value="0">-- select --</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}"
                                        @if(isset($products->category_id_3) && $cat->id==$products->category_id_3) selected @endif>
                                    {{$cat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        {!! Form::label('subcategory', 'Sub Category 3: ') !!}
                        <select class="form-control" wire:model.defer="sub_category_id_3" name="sub_category_id_3" id="sub_category_id_3">
                            <option value="0">-- select --</option>
                            @foreach($subcats as $subcat)
                                <option value="{{$subcat->id}}"
                                        @if(isset($products->sub_category_id_3) && $subcat->id==$products->sub_category_id_3) selected @endif>
                                    {{$subcat->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('price', 'Price:') !!}
        <input class="form-control" wire:model="price" id="price" type="price" step="0.01" name="price"  placeholder="Price"/>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                {!! Form::label('youtube', 'Youtube:') !!}
                <input class="form-control" wire:model="youtube" id="youtube" type="text" name="youtube"  placeholder="Youtube"/>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('short_content', 'Short Description:') !!}
        <textarea class="form-control" wire:model="short_content" id="short_content" type="text" name="short_content"  placeholder="Content"></textarea>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('content', 'Long Description:') !!}
        <textarea class="form-control" wire:model="content" id="content" type="text" name="content"  placeholder="Content"></textarea>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('image', 'Image Upload:') !!}
        @if (isset($image))
            Photo Preview:
            <img width="10%" src="{{ $image->temporaryUrl() }}">
        @endif
        <br>
        <input type="file" wire:model="image">
        <br>
        @error('image') <span class="error">{{ $message }}</span> @enderror
        <br>
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
    <input type="button" class="btn btn-primary ml-auto mr-auto mt-5" wire:click="updateProduct({{$products->id}})" value="Update">
    <script>
        CKEDITOR.replace('short_content', {
            height: 300,
            uiColor: '#3c8dbc',
            filebrowserImageUploadUrl: '{{url('')}}/upload_image?type=Images&_token={{csrf_token()}}'
        });
    </script>
    <script>
        CKEDITOR.replace('content', {
            height: 300,
            uiColor: '#3c8dbc',
            filebrowserImageUploadUrl: '{{url('')}}/upload_image?type=Images&_token={{csrf_token()}}'
        });
    </script>
</div>
