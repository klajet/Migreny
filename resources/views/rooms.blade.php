@extends('crudTemplate')

@section('tableName')Rooms @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 40%">floor</th>
            <th style="width: 40%">door</th>
            <th colspan="2" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
            <tr>
                <td><span>{{ $room->id }}</span></td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->door }}</td>
                <td class="center"><a class="btn btn-primary" onclick="show({{$room->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('rooms.destroy',$room->id) }}" method="Post" class="center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('rooms.update',$room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editFloor" name="floor" value="{{ $room->floor }}" class="form-control {{$room->id}}" hidden></td>
                <td><input type="text" id="editDoor" name="door" value="{{ $room->door }}" class="form-control {{$room->id}}" hidden></td>
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$room->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg " /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $rooms->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="floor" placeholder="floor" class="m-2" required>
        <input type="text" name="door" placeholder="door" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection