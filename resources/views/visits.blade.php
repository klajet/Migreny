@extends('crudTemplate')

@section('tableName')Visits @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 25%">visitDate</th>
            <th style="width: 10%">cost</th>
            <th style="width: 10%">doctor_id</th>
            <th style="width: 10%">patient_id</th>
            <th style="width: 10%">prescription_id</th>
            <th colspan="2" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visits as $visit)
            <tr>
                <td><span>{{ $visit->id }}</span></td>
                <td>{{ $visit->visitDate }}</td>
                <td>{{ $visit->cost }}</td>
                <td>{{ $visit->doctor_id }}</td>
                <td>{{ $visit->patient_id }}</td>
                <td>{{ $visit->prescription_id }}</td>
                <td class="center"><a class="btn btn-primary" onclick="show({{$visit->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('visits.destroy',$visit->id) }}" method="Post" class="center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('visits.update',$visit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editVisitDate" name="visitDate" value="{{ $visit->visitDate }}" class="form-control {{$visit->id}}" hidden></td>
                <td><input type="text" id="editCost" name="cost" value="{{ $visit->cost }}" class="form-control {{$visit->id}}" hidden></td>
                <td><input type="text" id="editDoctor_id" name="doctor_id" value="{{ $visit->doctor_id }}" class="form-control {{$visit->id}}" hidden></td>
                <td><input type="text" id="editPatient_id" name="patient_id" value="{{ $visit->patient_id }}" class="form-control {{$visit->id}}" hidden></td>
                <td><input type="text" id="editPrescription_id" name="prescription_id" value="{{ $visit->prescription_id }}" class="form-control {{$visit->id}}" hidden></td>
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$visit->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg " /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $visits->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('visits.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="visitDate" placeholder="visitDate" class="m-2" required>
        <input type="text" name="cost" placeholder="cost" class="m-2" required>
        <input type="text" name="doctor_id" placeholder="doctor_id" class="m-2" required>
        <input type="text" name="patient_id" placeholder="patient_id" class="m-2" required>
        <input type="text" name="prescription_id" placeholder="prescription_id" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection