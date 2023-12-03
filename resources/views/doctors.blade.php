@extends('crudTemplate')

@section('tableName')Doctors @endsection

@section('tableRead')
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>PESEL</th>
            <th>Phone</th>
            <th>room_id</th>
            <th>address_id</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
            <tr>
                <td><span>{{ $doctor->id }}</span>
                
                </td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->lastname }}</td>
                <td>{{ $doctor->pesel }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->room_id }}</td>
                <td>{{ $doctor->address_id }}</td>
                {{-- <td><a class="btn btn-primary" href="{{ route('doctors.edit',$doctor->id) }}"><img src="pencil-square.svg " /></a></td> --}}
                <td><a class="btn btn-primary" onclick="show({{$doctor->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('doctors.destroy',$doctor->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>

                <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editName" name="name" value="{{ $doctor->name }}" class="form-control {{$doctor->id}}" hidden></td>
                <td><input type="text" id="editLastname" name="lastname" value="{{ $doctor->lastname }}" class="form-control {{$doctor->id}}" hidden></td>
                <td><input type="text" id="editPesel" name="pesel" value="{{ $doctor->pesel }}" class="form-control {{$doctor->id}}" hidden></td>
                <td><input type="text" id="editPhone" name="phone" value="{{ $doctor->phone }}" class="form-control {{$doctor->id}}" hidden></td>
                <td><input type="text" id="editRoom_id" name="room_id" value="{{ $doctor->room_id }}" class="form-control {{$doctor->id}}" hidden></td>
                <td><input type="text" id="editAdress_id" name="address_id" value="{{ $doctor->address_id }}" class="form-control {{$doctor->id}}" hidden></td>
                <td colspan="2"><button type="submit" class="btn btn-warning {{$doctor->id}}" hidden><img src="check.svg " onclick="return confirm('Are you sure you want to update this item?');" /></button></td>
            </form>


            </tr>
        @endforeach
    </tbody>
    </table>
    {{ $doctors->links() }}
@endsection

@section('tableCreate')
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="pesel" placeholder="pesel">
        <input type="text" name="phone" placeholder="phone">
        <input type="text" name="room_id" placeholder="room_id">
        <input type="text" name="address_id" placeholder="address_id">
        <button type="submit" class="">Create</button>
    </form>
@endsection