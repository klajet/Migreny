@extends('crudTemplate')

@section('tableName')Doctors @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 10%">Name</th>
            <th style="width: 15%">Last Name</th>
            <th style="width: 15%">PESEL</th>
            <th style="width: 15%">Phone</th>
            <th style="width: 5%">room_id</th>
            <th style="width: 5%">address_id</th>
            <th colspan="2" style="width: 10%"></th>
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
                <td class="center"><a class="btn btn-primary" onclick="show({{$doctor->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('doctors.destroy',$doctor->id) }}" method="Post" class="center">
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
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$doctor->id}}"  onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg " /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $doctors->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="name" placeholder="name" class="m-2" required>
        <input type="text" name="lastname" placeholder="lastname" class="m-2" required>
        <input type="text" name="pesel" placeholder="pesel" class="m-2" required>
        <input type="text" name="phone" placeholder="phone" class="m-2" required>
        <input type="text" name="room_id" placeholder="room_id" class="m-2" required>
        <input type="text" name="address_id" placeholder="address_id" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection