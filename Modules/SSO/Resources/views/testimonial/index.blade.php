<x-backend.app-layout>

@section('title')
    {{ localize('Testimonial') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


<section class="tt-section pt-4">
  <div class="container">
      <div class="row mb-3">
          <div class="col-12">
              <div class="card tt-page-header">
                  <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                      <div class="tt-page-title">
                          <h2 class="h5 mb-lg-0">{{ localize('Testimonial') }}</h2>
                      </div>
                      <div class="tt-action"> 
                        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary"><i data-feather="plus"></i> {{ localize('Add Testimonial') }}</a> 
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
                              <th>{{ localize('Name') }}</th> 
                              <th>{{ localize('Phone') }}  </th>
                              <th>{{ localize('Action') }}  </th>

                          </tr>
                      </thead>
                      <tbody> 
                        @if(!empty($testimonialList))
                            @foreach ($testimonialList as $k=>$testi)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $testi->name }}</td> 
                                    <td>
                                        {{ $testi->phone }}
                                    </td>
                                    <td>
                                        <div class="dropdown tt-tb-dropdown">
                                            <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end shadow">
    
                                                @can('edit_roles_and_permissions')
                                                <a class="dropdown-item" href="{{ route('admin.testimonial.edit', ['id' => $testi->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                    <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                </a>
                                                @endcan
    
                                                @can('delete_roles_and_permissions')
                                                <a href="#" class="dropdown-item confirm-delete" data-href="{{ route('admin.testimonial.delete', $testi->id) }}" title="{{ localize('Delete') }}">
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