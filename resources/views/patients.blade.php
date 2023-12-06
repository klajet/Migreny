@extends('crudTemplate')

@section('tableName')Patients @endsection

@section('tableRead')
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 10%">Name</th>
            <th style="width: 10%">Last Name</th>
            <th style="width: 10%">PESEL</th>
            <th style="width: 10%">Email</th>
            <th style="width: 5%">doctor_id</th>
            <th style="width: 5%">address_id</th>
            <th colspan="2" style="width: 10%"></th>
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
                <td class="center"><a class="btn btn-primary" onclick="show({{$patient->id}})"><img src="pencil-square.svg " /></a></td>
                <td>      
                    <form action="{{ route('patients.destroy',$patient->id) }}" method="Post" class="center">
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
                <td colspan="2" class="center"><button type="submit" class="btn btn-warning {{$patient->id}}" onclick="return confirm('Are you sure you want to update this item?');" hidden><img src="check.svg" /></button></td>
                </form>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="pagination justify-content-center"> {{ $patients->links() }} </div>    
@endsection

@section('tableCreate')
    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data" class="center">
    @csrf
        <input type="text" name="name" placeholder="name" class="m-2" required>
        <input type="text" name="lastname" placeholder="lastname" class="m-2" required>
        <input type="text" name="pesel" placeholder="pesel" class="m-2" required>
        <input type="text" name="email" placeholder="email" class="m-2" required>
        <input type="text" name="doctor_id" placeholder="doctor_id" class="m-2" required>
        <input type="text" name="address_id" placeholder="address_id" class="m-2" required>
        <button type="submit" class="btn btn-warning m-2" onclick="return confirm('Are you sure you want to insert this item?');">Create</button>
    </form>
@endsection