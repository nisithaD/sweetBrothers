<div>
    <h1>Edit offer</h1>
    <div class="form-group mb-3">
        {!! Form::label('title', 'Title:') !!}
        <input class="form-control" wire:model="title" id="title" type="text" name="title"
               placeholder="Title"/>
    </div>
    <div class="form-group mb-3">
        {!! Form::label('link', 'Link:') !!}
        <input class="form-control" wire:model="link" id="link" type="text" name="link"
               placeholder="Link"/>
    </div>
    <button type="submit" wire:click="update({{$offer->id}})" class="btn btn-primary">Update</button>
</div>
