@extends('crudTemplate')

@section('tableName')Addresses @endsection

@section('tableRead')
    <thead>
        <tr>
            <th>#</th>
            <th>Road</th>
            <th>Number</th>
            <th>City</th>
            <th>cityCode</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($addresses as $address)
            <tr>
                <td><span>{{ $address->id }}</span>
                
                </td>
                <td>{{ $address->road }}</td>
                <td>{{ $address->number }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->cityCode }}</td>
                <td>{{ $address->country }}</td>
                <td><a class="btn btn-primary" onclick="show({{$address->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('addresses.destroy',$address->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('addresses.update',$address->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editRoad" name="road" value="{{ $address->road }}" class="form-control {{$address->id}}" hidden></td>
                <td><input type="text" id="editNumber" name="number" value="{{ $address->number }}" class="form-control {{$address->id}}" hidden></td>
                <td><input type="text" id="editCity" name="city" value="{{ $address->city }}" class="form-control {{$address->id}}" hidden></td>
                <td><input type="text" id="editCityCode" name="cityCode" value="{{ $address->cityCode }}" class="form-control {{$address->id}}" hidden></td>
                <td><input type="text" id="editCountry" name="country" value="{{ $address->country }}" class="form-control {{$address->id}}" hidden></td>
                <td colspan="2"><button type="submit" class="btn btn-warning {{$address->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg " /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $addresses->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('addresses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="road" placeholder="road" required>
        <input type="text" name="number" placeholder="number" required>
        <input type="text" name="city" placeholder="city" required>
        <input type="text" name="cityCode" placeholder="cityCode" required>
        <input type="text" name="country" placeholder="country"required>
        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection