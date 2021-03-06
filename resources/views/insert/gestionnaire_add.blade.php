@extends('layout.apps')

@section('content')
    <div class="">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nouveau le gestionnaire :</h4>
                <div class="row">
                    <div class="col-md-3">
                        <form class="needs-validation" novalidate method="post" action="{{url('new_gestionnaire')}}" >
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

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Libelle</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gestionnaire as $gestionnair)
                                    <tr>
                                        <td>{{$gestionnair->id}}</td>
                                        <td>{{$gestionnair->libelle}}</td>
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
