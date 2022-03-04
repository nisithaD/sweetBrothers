<div>
    <h1>Edit Postage Option</h1>

    <div class="form-group mb-3">
        {!! Form::label('title', 'Title:') !!}
        <input type="text" name="title" wire:model="title" placeholder="Enter Title" class="form-control">
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price::') !!}
        <input type="number" step="1" name="price" wire:model="price" placeholder="Enter Price" class="form-control">
    </div>
    <input type="button" class="btn btn-primary mt-5" value="Update" wire:click="updatePostage({{$postage->id}})">
</div>
