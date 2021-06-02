@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Employees</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
        </div>
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(count($employees) > 0)
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Company</th>
        <th>Email</th>
        <th>Phone</th>
        <th with='290px'>Action</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
        <td>{{$employee->company->name}}</td>
        <td>{{$employee->email}}</td> 
        <td>{{$employee->phone}}</td>

        <td>
            <form action="{{url('employee', [$employee->id])}}" method="POST">

                <a href="{{ route('employee.edit',$employee->id)}}" class="btn btn-primary">Edit</a>

                <input type="hidden" name="_method" value="DELETE">     
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@else
<div style="font-size: 25px; height: 100px;background-color: #f1a1a1"class="p-3 mb-3 bg-danger text-white text-center ">
    No Records Found
</div>

@endif
{!!$employees->links()!!}
@endsection