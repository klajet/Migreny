@extends('crudTemplate')

@section('tableName')Drugs @endsection

@section('tableRead')
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($drugs as $drug)
            <tr>
                <td><span>{{ $drug->id }}</span></td>
                <td>{{ $drug->name }}</td>
                <td>{{ $drug->description }}</td>
                <td>{{ $drug->cost }}</td>
                <td><a class="btn btn-primary" onclick="show({{$drug->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('drugs.destroy',$drug->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('drugs.update',$drug->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editName" name="name" value="{{ $drug->name }}" class="form-control {{$drug->id}}" hidden></td>
                <td><input type="text" id="editDescription" name="description" value="{{ $drug->description }}" class="form-control {{$drug->id}}" hidden></td>
                <td><input type="text" id="editCost" name="cost" value="{{ $drug->cost }}" class="form-control {{$drug->id}}" hidden></td>
                <td colspan="2"><button type="submit" class="btn btn-warning {{$drug->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg" /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $drugs->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('drugs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="description" placeholder="description" required>
        <input type="text" name="cost" placeholder="cost" required>
        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection