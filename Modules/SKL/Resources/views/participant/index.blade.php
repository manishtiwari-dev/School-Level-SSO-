{{-- @extends('backend.layouts.master') --}}
<x-backend.app-layout>

@section('title')
    {{ localize('Participate') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

<section class="tt-section pt-4">
  <div class="container">
      <div class="row mb-3">
          <div class="col-12">
              <div class="card tt-page-header">
                  <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                      <div class="tt-page-title">
                          <h2 class="h5 mb-lg-0">{{ localize('Participate') }}</h2>
                      </div>
                      <div class="tt-action"> 
                          <a href="{{ route('admin.participant.create') }}" class="btn btn-primary"><i data-feather="plus"></i> {{ localize('Add Participate') }}</a> 
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
                              <th class="text-center" width="7%">{{ localize('S/L') }}</th>
                              <th>{{ localize('Name') }}</th>
                              <th>{{ localize('Contact') }}</th>
                              <th>{{ localize('Email') }}</th>
                              {{-- <th>{{ localize('Durations') }}</th> --}}
                              <th >{{ localize('Action') }}
                              </th>
                          </tr>
                      </thead>
                      <tbody> 
                        @if(!empty($participatelist))
                            @foreach ($participatelist as $k=>$participate)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $participate->name}}</td>
                                    <td>{{ $participate->contact_no ?? ''}}</td>
                                    <td>{{ $participate->email }}</td>
                                    {{-- <td>{{ $quize->durations }}</td> --}}
                                    <td>
                                        <div class="dropdown tt-tb-dropdown">
                                            <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end shadow">
    
                                                @can('edit_roles_and_permissions')
                                                <a class="dropdown-item" href="{{ route('admin.participant.edit', ['id' => $participate->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                    <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                </a>
                                                @endcan
    
                                                @can('delete_roles_and_permissions')
                                                <a href="#" class="dropdown-item confirm-delete" data-href="{{ route('admin.participant.delete', $participate->id) }}" title="{{ localize('Delete') }}">
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
                    {{-- <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                        <span>{{ localize('Showing') }}
                            {{ $participate->firstItem() }}-{{ $participate->lastItem() }} {{ localize('of') }}
                            {{ $participate->total() }} {{ localize('results') }}</span>
                        <nav>
                            {{ $participate->appends(request()->input())->links() }}
                        </nav>
                    </div> --}}
                    <!--pagination end-->
              </div>
          </div>
      </div>
  </div>
</section>
</x-backend.app-layout>
{{-- @endsection --}}
