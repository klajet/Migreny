@extends('crudTemplate')

@section('tableName')Prescriptions @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 15%">Expires</th>
            <th style="width: 70%">Description</th>
            <th colspan="2" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prescriptions as $prescription)
            <tr>
                <td><span>{{ $prescription->id }}</span></td>
                <td>{{ $prescription->expires }}</td>
                <td>{{ $prescription->description }}</td>
                <td class="center"><a class="btn btn-primary" onclick="show({{$prescription->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('prescriptions.destroy',$prescription->id) }}" method="Post" class="center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('prescriptions.update',$prescription->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editExpires" name="expires" value="{{ $prescription->expires }}" class="form-control {{$prescription->id}}" hidden></td>
                <td><input type="text" id="editDescription" name="description" value="{{ $prescription->description }}" class="form-control {{$prescription->id}}" hidden></td>
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$prescription->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg " /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $prescriptions->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="expires" placeholder="expires" class="m-2" required>
        <input type="text" name="description" placeholder="description" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection