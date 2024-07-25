<x-backend.app-layout>

@section('title')
    {{ localize('Student') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

<section class="tt-section pt-4">
  <div class="container">
      <div class="row mb-3">
          <div class="col-12">
              <div class="card tt-page-header">
                  <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                      <div class="tt-page-title">
                          <h2 class="h5 mb-lg-0">{{ localize('Student') }}</h2>
                      </div>
                      <div class="d-flex justify-content-end gap-1">
                      <div class="tt-action"> 
                          <a href="{{ route('admin.student.create') }}" class="btn btn-primary"><i data-feather="plus"></i> {{ localize('Add Student') }}</a> 
                      </div>
                      <div class="tt-action"> 
                        <a href="{{ route('admin.student.import') }}" class="btn btn-primary"><i data-feather="plus"></i> {{ localize('Import') }}</a> 
                     </div>
                     <div class="tt-action"> 
                        <a href="{{ route('admin.student.exportData') }}" class="btn btn-primary"><i data-feather="download"></i> {{ localize('Export') }}</a> 
                     </div>
                      </div>

                     {{-- <form action="{{ route('admin.student.exportData') }}" method="POST">
                        @csrf
                        <button type="submit" id="export_submit"
                            class="btn  d-flex align-items-center mg-r-5 btn-primary">
                            <i class="fa fa-cloud-download" aria-hidden="true"></i>
                            <span class=" d-sm-inline mg-l-5">Export Student</span>
                        </button>
                    </form> --}}

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
                              <th class="" width="7%">{{ localize('S/L') }}</th>
                              <th>{{ localize('Institute Name') }}</th>
                              <th>{{ localize('Student Name') }}</th>
                              <th>{{ localize('Email') }}</th>
                              <th>{{ localize('Parent Name') }}</th>
                              <th>{{ localize('Phone') }}</th>
                              <th>{{ localize('Status') }}</th>
                              <th data-breakpoints="xs sm" class="">{{ localize('Action') }}
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                             @if(!empty($studentlist))
                                @foreach ($studentlist as $k=>$student)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>@if(!empty($student->institute)){{ $student->institute->name }}@endif</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->parent_name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" onchange="updateStatus(this)"
                                                class="form-check-input"
                                                @if ($student->status) checked @endif
                                                value="{{ $student->id }}">
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="dropdown tt-tb-dropdown">
                                            <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end shadow">
    
                                                <a class="dropdown-item" href="detailModal_{{$student->id}}" data-bs-toggle="modal" data-bs-target="#detailModal_{{$student->id}}">
                                                    <i data-feather="eye" class="me-2"></i>{{localize('View Detail')}}
                                                </a>

                                                @can('edit_roles_and_permissions')

                                                <a class="dropdown-item" href="{{ route('admin.students.edit', ['id' => $student->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                    <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                </a>
                                                @endcan
    
                                                @can('delete_roles_and_permissions')
                                                <a href="#" class="dropdown-item confirm-delete" data-href="{{ route('admin.students.delete', $student->id) }}" title="{{ localize('Delete') }}">
                                                    <i data-feather="trash-2" class="me-2"></i>
                                                    {{ localize('Delete') }}
                                                </a>
                                                @endcan
                                            </div>
                                        </div> 
                                    </td>

                                </tr>
                                    <!--Detail Modal Start-->
                                    <div class="modal fade" id="detailModal_{{$student->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="detailModalLabel">Student Detail</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-3">
                                                            <strong>Institute  Name</strong> :@if(!empty($student->institute)) {{ $student->institute->name }}@endif
                                                        </div>

                                                        <div class="col-lg-12 mb-3">
                                                            <strong>Class  Name</strong> :@if(!empty($student->classes)) {{ $student->classes->name }}@endif
                                                        </div>



                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  Name</strong> : {{ $student->name }}
                                                        </div>
                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  Parent Name</strong> : {{ $student->parent_name ?? localize('n/a') }}
                                                        </div>
                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  Email</strong> : {{ $student->email  ?? localize('n/a') }}
                                                        </div>
    
                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  Phone</strong> : {{ $student->phone ?? localize('n/a') }}
                                                        </div>

                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  DOB</strong> : {{ $student->dob ?? localize('n/a') }}
                                                        </div>

                                                      

                                                        <div class="col-lg-12 mb-3">
                                                            <strong>  Aadhar No</strong> : {{ $student->adhar_no ?? localize('n/a') }}
                                                        </div>

                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <!--Detail Modal End-->
                                      
                                @endforeach
                             @endif
                      </tbody>
                  </table> 
                   <!--pagination start-->
                   <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                    <span>{{ localize('Showing') }}
                        {{ $studentlist->firstItem() }}-{{ $studentlist->lastItem() }} {{ localize('of') }}
                        {{ $studentlist->total() }} {{ localize('results') }}</span>
                    <nav>
                        {{ $studentlist->appends(request()->input())->links() }}
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
        $.post('{{ route('admin.students.updateStatus') }}', {
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

 
 