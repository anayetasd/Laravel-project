@extends("layouts.master")

@section('page')
<a class="btn btn-success" href="{{url('customers')}}">Back</a>
<br>
Are you sure?
<br>
<h2 class="p-3">{{$customer->name}}</h2>

<form class="p-3" action="{{url('customers/'.$customer->id)}}" method="post">
    @csrf 
    @method("DELETE")
    <input class="btn btn-danger" type="submit" value="confirm">
</form>

@endsection