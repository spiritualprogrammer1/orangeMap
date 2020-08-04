@extends('layout.apps')

@section('content')
    <div class="container">
        <form action="{{url('submit')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token"  value="{{csrf_token()}}">
            <input type="file" name="file">

            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Enregistrer</button>
        </form>

        <div class="row">

        </div>
    </div>
@endsection