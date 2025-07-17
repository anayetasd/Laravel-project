 @extends("layouts.master")

@section('page')
<a  class="btn btn-success" href="{{url('products')}}">Back</a>
<br>
Are  you sure?
<br>
<h2 class="p-3">{{$sale->id}}</h2>



<form class="p-3" action="{{url('sales/'.$sale->id)}}" method="post">
    @csrf
    @method("DELETE")
    <input class="btn btn-danger" type="submit" value="confirm" />
</form>

@endsection