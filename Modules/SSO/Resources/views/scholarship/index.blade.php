<x-backend.app-layout>

@section('title')
    {{ localize('Scholarship') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

<section class="tt-section pt-4">
  <div class="container">
      <div class="row mb-3">
          <div class="col-12">
              <div class="card tt-page-header">
                  <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                      <div class="tt-page-title">
                          <h2 class="h5 mb-lg-0">{{ localize('Scholarship') }}</h2>
                      </div>
                      <div class="tt-action"> 
                        @can('add_scholarships')
                          <a href="{{ route('admin.scholarship.create') }}" class="btn btn-primary"><i data-feather="plus"></i> {{ localize('Add Scholarship') }}</a> 
                          @endcan
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
                              <th>{{ localize('Status ') }}</th> 
                              <th>{{ localize('Action') }}  </th>
                          </tr>
                      </thead>
                      <tbody> 
                        @if(!empty($scholarShipData))
                            @foreach ($scholarShipData as $k=>$scholar)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $scholar->name }}</td> 
                                  
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" onchange="updateStatus(this)"
                                                class="form-check-input"
                                                @if ($scholar->status) checked @endif
                                                value="{{ $scholar->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown tt-tb-dropdown">
                                            <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end shadow">
    
                                                @can('edit_scholarships')
                                                <a class="dropdown-item" href="{{ route('admin.scholarship.edit', ['id' => $scholar->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                    <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                </a>
                                                @endcan
    
                                                @can('delete_scholarships')
                                                <a href="#" class="dropdown-item confirm-delete" data-href="{{ route('admin.scholarship.delete', $scholar->id) }}" title="{{ localize('Delete') }}">
                                                    <i data-feather="trash-2" class="me-2"></i>
                                                    {{ localize('Delete') }}
                                                </a>
                                                @endcan
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach 
                        @endif
                      </tbody>
                  </table> 

                   <!--pagination start-->
                   <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                    <span>{{ localize('Showing') }}
                        {{ $scholarShipData->firstItem() }}-{{ $scholarShipData->lastItem() }} {{ localize('of') }}
                        {{ $scholarShipData->total() }} {{ localize('results') }}</span>
                    <nav>
                        {{ $scholarShipData->appends(request()->input())->links() }}
                    </nav>
                </div>
                <!--pagination end-->
              </div>
          </div>
      </div>
  </div>
</section>
@push('scripts')
<script>
    "use strict";

    function updateStatus(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('admin.scholarship.updateStatus') }}', {
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
@endpush
</x-backend.app-layout>

 