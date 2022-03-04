<div>
   <h1>Add new offer</h1>
    <div class="form-group mb-3">
        {!! Form::label('title', 'Title:') !!}
        <input class="form-control" wire:model="input.title" id="title" type="text" name="title"
               placeholder="Title"/>
    </div>
    <div class="form-group mb-3">
        {!! Form::label('link', 'Link:') !!}
        <input class="form-control" wire:model="input.link" id="link" type="text" name="link"
               placeholder="Link"/>
    </div>
    <button type="submit" wire:click="submit" class="btn btn-primary">Save</button>
</div>
