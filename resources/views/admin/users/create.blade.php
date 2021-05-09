@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('include.message')
                <div class="card">
                    <div class="card-header">Courier Management System</div>
                    <h2><span class="badge badge-soft-info">Add Manager</span></h2>
                    @include('include.nav')
                    <div class="card-body">
                        <form method="POST" action="{{route('manager.store')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="form-">Manager Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                                </div>
                                <div class="form-group col">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ old('email') }}" name="email">
                                </div>
                                <div class="form-group col">
                                    <label>Password</label>
                                    <input type="text" class="form-control" value="{{ old('password') }}" name="password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Office</label>
                                    <select class="form-control" name="office_id">
                                        @foreach($offices as $office)
                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-outline-success">Create manager</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
