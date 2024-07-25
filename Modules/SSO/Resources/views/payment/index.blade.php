<x-backend.app-layout>

    @section('title')
        {{ localize('Transaction') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
    @endsection
    
    <section class="tt-section pt-4">
      <div class="container">
          <div class="row mb-3">
              <div class="col-12">
                  <div class="card tt-page-header">
                      <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                          <div class="tt-page-title">
                              <h2 class="h5 mb-lg-0">{{ localize('Transaction') }}</h2>
                          </div>
                         
                      </div>
                  </div>
              </div>
          </div>
    
          <div class="row g-4">
              <div class="col-12">
                  <div class="card mb-4" id="section-1">  
        
                      <table class="table tt-footable border-top" data-use-parent-width="true">
                          <thead>
                              <tr>
                                  <th>{{ localize('S/L') }}</th>
                                  <th>{{ localize('Payment Id') }}</th> 
                                  <th>{{ localize('Email') }}</th> 
                                  <th>{{ localize('Method') }}  </th>
                                  <th>{{ localize('Amount') }}  </th>
    
                              </tr>
                          </thead>
                          <tbody> 
                            @if(!empty($paymentList))
                                @foreach ($paymentList as $k=>$payment)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $payment->payment_id }}</td> 
                                        <td>
                                            {{ $payment->user_email }}
                                        </td>
                                        <td>
                                            {{ $payment->method }}
                                        </td>
                                        <td>
                                            {{ $payment->amount }}
                                        </td>
                                    </tr>
                                @endforeach 
                            @endif
                          </tbody>
                      </table> 

                        <!--pagination start-->
                   <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                    <span>{{ localize('Showing') }}
                        {{ $paymentList->firstItem() }}-{{ $paymentList->lastItem() }} {{ localize('of') }}
                        {{ $paymentList->total() }} {{ localize('results') }}</span>
                    <nav>
                        {{ $paymentList->appends(request()->input())->links() }}
                    </nav>
                </div>
                <!--pagination end-->
                  </div>
              </div>
          </div>
      </div>
    </section>
    
    </x-backend.app-layout>
 