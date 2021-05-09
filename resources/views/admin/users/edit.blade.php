@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('include.message')
                <div class="card">
                    <div class="card-header">Courier Management System</div>
                    <h2><span class="badge badge-soft-info">Edit Manager</span></h2>
                    @include('include.nav')
                    <div class="card-body">
                        <form method="POST" action="{{route('manager.update', $manager->id)}}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="form-">Manager Name</label>
                                    <input type="text" class="form-control" value="{{$manager->name}}" name="name">
                                </div>
                                <div class="form-group col">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{$manager->phone}}" name="phone">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{$manager->email}}" name="email">
                                </div>
                                @php $office = \App\Models\Office::whereId($manager->office_id)->first() @endphp
                                <div class="form-group col">
                                    <label>Office</label>
                                    <select class="form-control" name="office_id">
                                        @foreach($offices as $office)
                                            <option selected disabled value="{{$manager->office_id}}">{{$office->name}}
                                            </option>
                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="{{$manager->address}}"
                                           name="address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-outline-success">Update manager</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
