@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Companies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('company.create') }}"> Create New Company</a>
        </div>
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(count($companys) > 0)
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Logo</th>
        <th>Website</th>
        <th with='290px'>Action</th>
    </tr>
    @foreach($companys as $company)
    <tr>
        <td>{{$company->id}}</td>
        <td>{{$company->name}}</td>
        <td>
            <img src="{{Storage::url('public/'.$company->logo)}}" width="50px" higth="50px" alt="image">  
        </td>
        <td>{{$company->website}}</td>
        <td>
            <form action="{{url('company', [$company->id])}}" method="POST">
                <!--<a href="{{ route('company.show',$company->id)}}" class="btn btn-primary">Show</a>-->
                <a href="{{ route('company.edit',$company->id)}}" class="btn btn-primary">Edit</a>
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
{!! $companys->links() !!}
@endsection