@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Company</h2>
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

<form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control"  value="{{ $company->name }}" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" name="email" value="{{ $company->email }}"  placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Logo:</strong>
                <img src="{{url('/image'.$company->logo)}}" width="30px" higth="30px" alt="image" >
                <input type="hidden" class="form-control" name="old_logo" value="{{ $company->logo }}"  >
                <input type="file" class="form-control" name="logo"  placeholder="logo">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Website:</strong>
                <input type="text" class="form-control" name="website" value="{{ $company->website }}"  placeholder="website"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endsection


