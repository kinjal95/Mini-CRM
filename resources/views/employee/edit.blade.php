@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Employee</h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('employee.update',$employee->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" class="form-control"  value="{{ $employee->first_name }}" placeholder="First Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}"  placeholder="Last Name"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Company:</strong>
                <select id="company" class="form-control" name="company_id"  value="{{ $employee->company->name}}">
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{$company->id == $employee->company_id  ? 'selected' : ''}} >{{ $company->name }}</option>
                    @endforeach
                </select>
                <!--<input type="text" class="form-control" name="company_id" value="{{ $employee->company->name}}"  placeholder="company"></textarea>-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" name="email" value="{{ $employee->email }}"  placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Logo:</strong>
                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}"  placeholder="logo">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endsection


