<div>
    <h1>Edit review</h1>
    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        <input type="text" name="title" wire:model.defer="title" placeholder="Title" class="form-control">
    </div>
    <div class="form-group" style="margin-top: 25px">
        {!! Form::label('image', 'Image Upload:') !!}
        @if (isset($image))
            Photo Preview:
            <img width="10%" src="{{ $image->temporaryUrl() }}">
        @endif
        <br>
        <input type="file" wire:model.lazy="image">
        <br>
    </div>
    <button class="btn btn-primary" style="margin-top: 25px" wire:click="editReview({{$reviews->id}})">Update</button>
</div>
