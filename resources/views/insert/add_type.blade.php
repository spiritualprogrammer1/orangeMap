@extends('layout.apps')

@section('content')
    <div class="">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Entrer le type :</h4>
                   <div class="row">
                        <div class="col-md-3">
                            <form class="needs-validation" novalidate method="post" action="{{url('store_type')}}" >
                                <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                <div class="form-row">

                                        <label for="validationCustom01">Libelle</label>
                                        <input type="text" name="libelle" class="form-control" id="validationCustom01" placeholder="" value="" required>

                                </div>
                                <br>

                                <button class="btn btn-primary" type="submit"> Enregistrer </button>
                            </form>
                        </div>
                       <div class="col-md-9">
                                    <div class=""> <strong>Liste des types</strong> : <span>@if(Session::has('success')) <span class="alert alert-success">suppression effecter</span> @endif</span></div>
                                   <div class="table-responsive m-t-40">
                                       <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                           <thead>
                                           <tr>
                                               <th>#id</th>
                                               <th>Libelle</th>
                                               <th>Action</th>

                                           </tr>
                                           </thead>
                                           <tbody>
                                        @foreach($types as $type)
                                           <tr>
                                                <td>{{$type->id}}</td>
                                               <td>{{$type->libelle}}</td>
                                               <td><a href="{{url('deletetype/'.$type->id)}}"> <button type="button" class="btn waves-effect waves-light btn-sm btn-danger"><i class="icon icon-trash"></i></button> </a></td>
                                           </tr>
                                        @endforeach



                                           </tbody>
                                       </table>
                                   </div>


                       </div>
                   </div>

                </div>
            </div>


    </div>

@endsection
