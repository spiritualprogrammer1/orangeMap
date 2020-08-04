@extends('layout.apps')

@section('content')
    <div class="">

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div > <strong> Liste des sites :</strong> @if(Session::has('success')) <span class="alert alert-success">suppression effecter</span> @endif </div>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>code_site</th>
                                    <th>Libelle</th>
                                    <th>gestionnaire</th>
                                    <th>ville</th>
                                    <th>commune</th>
                                    <th>quartier</th>
                                    <th>zone</th>
                                    <th>longitude</th>
                                    <th>latitude</th>
                                    <th>Priorite</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sites as $key=> $site)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$site->code_site}}</td>
                                        <td>{{$site->libelle}}</td>
                                        <td>{{$site->gestionnaire_description}}</td>
                                        <td>{{$site->ville}}</td>
                                        <td>{{$site->commune}}</td>
                                        <td>{{$site->quartier}}</td>
                                        <td>{{$site->zone_description}}</td>
                                        <td>{{$site->longitude}}</td>
                                        <td>{{$site->latitude}}</td>
                                        <td>{{$site->priorite}}</td>
{{--                                        <td>{{$site->proprietaire_pylone->libelle}}</td>--}}
                                        <td><a href="{{url('deletesite/'.$site->id)}}"> <button type="button" class="btn waves-effect waves-light btn-sm btn-success"><i class="icon icon-trash"></i></button> </a></td>


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
