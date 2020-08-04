@extends('layout.apps')

@section('content')

        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-4">


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmation de mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Creer
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-8">


                        <h4 class="card-title">Liste des utilisateurs : @if(Session::has('success')) <span class="alert alert-success"> Supression effectuer </span> @endif </h4>
                        <div class="table-responsive">
                            <table class="table color-table warning-table full-color-table full-warning-table hover-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom et prenom</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                 @if($user->id != \Illuminate\Support\Facades\Auth::id())
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{url('deleteUser/'.$user->id)}}"> <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger"> <i class="icon icon-trash"></i> </button></a></td>

                                </tr>
                                @endif
                                @empty

                                @endforelse



                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

        </div>


@endsection
