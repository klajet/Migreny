@extends('crudTemplate')

@section('tableName')PrescDrug @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 40%">drug_id</th>
            <th style="width: 40%">presc_id</th>
            <th colspan="2" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prescdrugs as $prescdrug)
            <tr>
                <td><span>{{ $prescdrug->id }}</span></td>
                <td>{{ $prescdrug->drug_id }}</td>
                <td>{{ $prescdrug->presc_id }}</td>
                <td class="center"><a class="btn btn-primary" onclick="show({{$prescdrug->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('presc_drugs.destroy',$prescdrug->id) }}" method="Post" class="center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('presc_drugs.update',$prescdrug->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editDrug_id" name="drug_id" value="{{ $prescdrug->drug_id }}" class="form-control {{$prescdrug->id}}" hidden></td>
                <td><input type="text" id="editPresc_id" name="presc_id" value="{{ $prescdrug->presc_id }}" class="form-control {{$prescdrug->id}}" hidden></td>
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$prescdrug->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg" /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $prescdrugs->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('presc_drugs.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="drug_id" placeholder="drug_id" class="m-2" required>
        <input type="text" name="presc_id" placeholder="presc_id" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection