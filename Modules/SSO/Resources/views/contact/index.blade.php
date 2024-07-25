<x-backend.app-layout>

@section('title')
    {{ localize('Enquiry') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

<section class="tt-section pt-4">
  <div class="container">
      <div class="row mb-3">
          <div class="col-12">
              <div class="card tt-page-header">
                  <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                      <div class="tt-page-title">
                          <h2 class="h5 mb-lg-0">{{ localize('Enquiry ') }}</h2>
                      </div>
                     
                  </div>
              </div>
          </div>
      </div>

      <div class="row g-4">
          <div class="col-12">
              <div class="card mb-4" id="section-1">  
                {{-- <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                    <div class="card-header border-bottom-0">
                        <div class="row justify-content-between g-3">
                            <div class="col-auto flex-grow-1">
                                <div class="tt-search-box">
                                    <div class="input-group">
                                        <span
                                            class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                            <i data-feather="search"></i></span>
                                        <input class="form-control rounded-start w-100" type="text"
                                            id="search" name="search"
                                            placeholder="{{ localize('Search') }}"
                                            @isset($searchKey)
                            value="{{ $searchKey }}"
                        @endisset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="search" width="18"></i>
                                    {{ localize('Search') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form> --}}
                  <table class="table tt-footable border-top" data-use-parent-width="true">
                      <thead>
                          <tr>
                              <th>{{ localize('S/L') }}</th>
                              <th>{{ localize('Name') }}</th> 
                              <th>{{ localize('Email') }}</th> 
                              <th>{{ localize('Phone') }}  </th>
                            

                          </tr>
                      </thead>
                      <tbody> 
                        @if(!empty($contactList))
                            @foreach ($contactList as $k=>$contact)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $contact->name }}</td> 
                                    <td>
                                        {{ $contact->email }}
                                    </td>
                                    <td>
                                        {{ $contact->phone }}
                                    </td>
                                 
                                </tr>
                            @endforeach 
                        @endif
                      </tbody>
                  </table> 
              </div>
          </div>
      </div>
  </div>
</section>
</x-backend.app-layout>
@section('scripts')
<script>
    "use strict";

    function updateStatus(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('admin.class.updateStatus') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            },
            function(data) {
                if (data == 1) {
                    notifyMe('success', '{{ localize('Status updated successfully') }}');
                } else {
                    notifyMe('danger', '{{ localize('Something went wrong') }}');
                }
            });
    }

</script>
@endsection