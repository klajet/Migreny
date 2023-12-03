@extends('updateTemplate')

@section('id') {{ $doctor->id }} @endsection

@section('form')
    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <span>{{ $doctor->id }}</span>
            <input type="text" id="editName" name="name" value="{{ $doctor->name }}" class="form-control">
            <input type="text" id="editLastname" name="lastname" value="{{ $doctor->lastname }}" class="form-control">
            <input type="text" id="editPesel" name="pesel" value="{{ $doctor->pesel }}" class="form-control">
            <input type="text" id="editPhone" name="phone" value="{{ $doctor->phone }}" class="form-control">
            <input type="text" id="editRoom_id" name="room_id" value="{{ $doctor->room_id }}" class="form-control">
            <input type="text" id="editAdress_id" name="address_id" value="{{ $doctor->address_id }}" class="form-control">
            <button type="submit" class="">Update</button>
        </form>
@endsection