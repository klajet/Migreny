@extends('crudTemplate')

@section('tableName')Patients @endsection

@section('tableRead')
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>PESEL</th>
            <th>Email</th>
            <th>doctor_id</th>
            <th>address_id</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td><span>{{ $patient->id }}</span></td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->lastname }}</td>
                <td>{{ $patient->pesel }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->doctor_id }}</td>
                <td>{{ $patient->address_id }}</td>
                <td><a class="btn btn-primary" onclick="show({{$patient->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('patients.destroy',$patient->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><img src="trash.svg " /></button>
                    </form>
                </td>
            </tr>
            <tr>
                <form action="{{ route('patients.update',$patient->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td></td>
                <td><input type="text" id="editName" name="name" value="{{ $patient->name }}" class="form-control {{$patient->id}}" hidden></td>
                <td><input type="text" id="editLastname" name="lastname" value="{{ $patient->lastname }}" class="form-control {{$patient->id}}" hidden></td>
                <td><input type="text" id="editPesel" name="pesel" value="{{ $patient->pesel }}" class="form-control {{$patient->id}}" hidden></td>
                <td><input type="text" id="editEmail" name="email" value="{{ $patient->email }}" class="form-control {{$patient->id}}" hidden></td>
                <td><input type="text" id="editDoctor_id" name="doctor_id" value="{{ $patient->doctor_id }}" class="form-control {{$patient->id}}" hidden></td>
                <td><input type="text" id="editAdress_id" name="address_id" value="{{ $patient->address_id }}" class="form-control {{$patient->id}}" hidden></td>
                <td colspan="2"><button type="submit" class="btn btn-warning {{$patient->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg" /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $patients->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="lastname" placeholder="lastname" required>
        <input type="text" name="pesel" placeholder="pesel" required>
        <input type="text" name="email" placeholder="email" required>
        <input type="text" name="doctor_id" placeholder="doctor_id"required>
        <input type="text" name="address_id" placeholder="address_id" required>
        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection