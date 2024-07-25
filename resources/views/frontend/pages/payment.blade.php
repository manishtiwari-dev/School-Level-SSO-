
<x-frontend.app-layout>
<div class="card card-default">
    <div class="card-header">
        <h4 class="text-center"> Payment</h4>
     
    </div>
    <div class="card-body text-center">
        <form action="{{ route('payment.store') }}" method="POST" >
            @csrf 
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="{{ env('RAZORPAY_KEY') }}"
                    data-amount="10000"
                    data-buttontext="Pay 100 INR"
                    data-name="{{$SSOStudent->name}}"
                    data-description="Razorpay payment"
                    data-image="/images/logo-icon.png"
                    data-prefill.name="ABC"
                    data-prefill.email="{{$SSOStudent->email}}"
                    data-theme.color="#ff7529">
            </script>
        </form>
    </div>
</div>
</x-frontend.app-layout>