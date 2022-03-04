<div>
    <h1>Banner Edit</h1>
    <div class="form-group">
        {!! Form::label('title', 'Main Title:') !!}
        <input class="form-control" wire:model.defer="title" id="title" type="text" name="title" placeholder="Title"/>
    </div>
    <div class="form-group" style="margin-top: 10px">
        {!! Form::label('sub_title', 'Sub Title:') !!}
        <input class="form-control" wire:model.defer="sub_title" id="title" type="text" name="title"
               placeholder="Sub title"/>
    </div>
    @if (isset($image))
        Photo Preview:
        <img width="10%" style="margin-top: 20px" src="{{ $image->temporaryUrl() }}">
    @endif
    <br>
    <input type="file" wire:model="image">
    <br><br>
    <div class="d-flex fs-6 fw-bold" style="margin-left: auto">
        <select class="form-select mb-5" wire:model.defer="pageName"  name="page" aria-label="Select example">
            <optgroup label="Content Pages">
                @foreach($contents as $content)
                    <option value="{{$content->page_name}}"
                            @if($banner->page==$content->page_name) selected @endif>{{$content->page_name}}
                    </option>
                @endforeach
            </optgroup>
        </select>
    </div>
    <button type="button" class="btn btn-primary" wire:click="updateBanner({{$banner->id}})" style="margin-top: 20px">Update</button>
</div>

