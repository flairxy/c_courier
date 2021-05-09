@extends('layouts.user_sidebar')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12 col-md-12">
        <form>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <button type="button" class="btn btn-success" onclick="payWithPaystack()"> Pay ₦{{ $amount/100 }} Now
            </button>
        </form>

        <form method="POST" action="{{ route('user.shipments.callback') }}" id="callback">
            @csrf
            <input type="hidden" value="" name="paystack_data" id="pstack">
            <input type="hidden" value="{{ $shipment_id }}" name="shipment_id">
            <input type="hidden" value="{{ $transaction_id }}" name="transaction_id">
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
          key: 'pk_test_796a000f2a13fb933d98186483637964b83dc72f',
          email: 'dev.okonkwoflair@gmail.com',
          amount: {{ $amount }},
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference.
          callback: function(response){
              $('#pstack').val(JSON.stringify(response))
              $('form#callback').submit();
          },
          onClose: function(){
              alert('window closed');
          }
        });
        handler.openIframe();
      }
</script>
@endsection
