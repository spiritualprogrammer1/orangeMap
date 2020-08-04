@extends('layout.apps')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="{{url('submit')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token"  value="{{csrf_token()}}">
                 <div class="row">
                     <div class="col-md-8">

                         <div class="custom-file">
                             <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
                             <label class="custom-file-label" for="validatedCustomFile">Choisir le fichier...</label>
                             <div class="invalid-feedback">Charger le template svp!!</div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Enregistrer</button>
                     </div>

                 </div>

                </form>
            </div>
        </div>
    </div>

@endsection
