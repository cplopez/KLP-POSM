@extends('layouts.app')
@section('content')
    {!! Form::open(['action' => ['BeveragesController@update', $beverages->id], 'method' => 'POST']) !!}
    <div class="form-group">
        <input class="form-control" placeholder="Supplier's Name" name="name" value="{{$customer->name}}" required>
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Address" name="address" value="{{$customer->address}}" required>
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Contact Number" name="contact" value="{{$customer->contact}}" required>
    </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="save">Add</button>
    </div>
    <input type="hidden" name="_method" value="PUT">
    {!! Form::close() !!}
@endsection