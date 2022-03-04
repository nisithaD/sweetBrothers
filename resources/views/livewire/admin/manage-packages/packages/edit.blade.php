<div>
    <h1>Package edit</h1>
    <h5>{{$packages->package_type}}</h5>

    <div class="form-group mb-3">
        {!! Form::label('title', 'Title:') !!}
        <input type="text" class="form-control" name="title" wire:model="title">
    </div>

    <div class="form-group mb-3">
        {!! Form::label('type_id', 'Package Type: ') !!}
        <select class="form-control" wire:model.defer="type_id" name="type_id" id="type_id">
            <option value="">-- select --</option>
            @foreach($types as $type)
                <option value="{{$type->id}}" @if(isset($packages->type_id) && $type->id==$packages->type_id) selected @endif>
                    {{$type->title}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('level', 'Package Level: ') !!}
        <select class="form-control" wire:model.defer="level" name="level" id="level">
            <option value="">-- select --</option>
            <option value="1" @if(isset($packages->level) && $packages->level==1) selected @endif>Bronze</option>
            <option value="2" @if(isset($packages->level) && $packages->level==2) selected @endif>Silver</option>
            <option value="3" @if(isset($packages->level) && $packages->level==3) selected @endif>Gold</option>
            <option value="4" @if(isset($packages->level) && $packages->level==4) selected @endif>Platinum</option>
        </select>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-3">
                {!! Form::label('price', 'Price:') !!}
                <input type="number" class="form-control" name="price" wire:model="price" step="0.01">
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                {!! Form::label('price_old', 'Previous Price:') !!}
                <input type="number" class="form-control" name="price_old" wire:model="price_old" step="0.01">
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        {!! Form::label('content', 'Contents:') !!}
        <textarea name="content" wire:model="content" class="form-control"></textarea>
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

    <button type="button" class="btn btn-primary" wire:click="updatePackage({{$packages->id}})">Update</button>

    @section('scripts')
        <script>
            CKEDITOR.replace( 'content', {
                height : 300,
                uiColor :'#3c8dbc',
                filebrowserImageUploadUrl: '{{url('')}}/upload_image?type=Images&_token={{csrf_token()}}'
            });
        </script>
        <script type="text/javascript" src="{{url('')}}/js/metacount.js"></script>
    @endsection
</div>
