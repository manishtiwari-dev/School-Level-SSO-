<table class="table tt-footable border-top" data-use-parent-width="true" id="">
    <thead>
        <tr>
            <th class="text-center" width="7%">{{ localize('S/L') }}</th>
            <th>{{ localize('Quiz') }}</th>
            <th>{{ localize('Question Name') }}</th>
            <th>{{ localize('Question Type') }}</th>
            <th >{{ localize('Action') }}
            </th>
        </tr>
    </thead>
    <tbody> 
       
      @if(!empty($questionlist))
          @foreach ($questionlist as $k=>$questions)
              <tr>
                  <td>{{ $k+1 }}</td>
                  <td>{{ $questions->quizzes->title ?? '' }}</td>
                  <td>{{ $questions->question_text }}</td>
                  <td>
                      @php
                          if($questions->question_type == 1){
                              $type = "Multiple Choice";
                          }else if( $questions->question_type == 2){
                              $type = "True & False";
                          }
                      @endphp
                      {{ $type }}
                  </td>
                  <td>
                      <div class="dropdown tt-tb-dropdown">
                          <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                              <i data-feather="more-vertical"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end shadow">

                              @can('edit_roles_and_permissions')
                              <a class="dropdown-item" href="{{ route('admin.questions.edit', ['id' => $questions->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                  <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                              </a>
                              @endcan

                              @can('delete_roles_and_permissions')
                              <a href="#" class="dropdown-item confirm-delete" data-href="{{ route('admin.questions.delete', $questions->id) }}" title="{{ localize('Delete') }}">
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