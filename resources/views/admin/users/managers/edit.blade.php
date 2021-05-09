@extends('layouts.admin_sidebar')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12 col-md-12">
        <div class="block block-content block-content-full">
            <div class="block-content">
                <form action="{{ route('admin.managers.update', $manager->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-w300">
                               Edit Manager
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{$manager->name}}" placeholder="" required>
                                @error('sender_name')
                                <emailan class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </emailan>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{$manager->email}}" required>
                                @error('email')
                                <emailan class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </emailan>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Default password is secret</label>
                                <input type="hidden" value="secret" name="password">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-primary">Update Manager</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    var currentValue = 'YES';
        function handleClick(myRadio) {
            currentValue = myRadio.value;
            if(currentValue == 'NO'){
                $('#newPickupAddress').show()
            }else{
                $('#newPickupAddress').hide()
            }
        }

</script>
@endsection
