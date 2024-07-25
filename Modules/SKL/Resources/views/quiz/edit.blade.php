<x-backend.app-layout>

@section('title')
    {{ localize('Update Quiz') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
 
<section class="tt-section pt-4">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Update Quiz') }}</h2>
                        </div>
  
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mb-4 g-4">
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.quize.update') }}" method="POST" class="pb-650" id="product-form">
                    @csrf 
                    <input type="hidden" name="id" id="id" value="{{ $quiz->id }}">
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">
 
                            <div class="mb-4">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select  border border-2" name="level" id="level" required>
                                <option value="">Select Level</option>
                                @if(!empty($levelist))
                                    @foreach ($levelist as $level)
                                        <option value="{{ $level->id }}" {{ ($quiz->level_id == $level->id)?'selected':'' }}>{{ $level->name }}</option> 
                                    @endforeach 
                                @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="title" class="form-label">{{ localize('Title') }}<sup class="text-danger">*</sup></label>
                                <input class="form-control" type="text" value="{{$quiz->title}}"  id="title"  name="title" required> 
                            </div>
                
                            <div class="mb-4">
                                <label for="description" class="form-label">{{ localize('Description') }}<sup class="text-danger">*</sup></label>
                                <textarea name="description" id="description" class="form-control">{{ $quiz->description }}</textarea>
                            </div>
                            {{-- @dd($quiz->start_time) --}}
                            <div class="mb-4">
                                <label for="start_time" class="form-label">{{ localize('Start Time') }}<sup class="text-danger">*</sup></label>
                                <input class="form-control date-time-picker" type="text" value="{{ \Carbon\Carbon::parse($quiz->start_time)->format('Y-m-d H:i:s') }}" id="start_time"  name="start_time" required> 
                            </div>
                            <div class="mb-4">
                                <label for="durations" class="form-label">{{ localize('Duration') }}<sup class="text-danger">*</sup></label>
                                <input class="form-control" type="time" value="{{$quiz->durations}}" id="durations"  name="durations" required> 
                                {{-- <input type="number"  class="form-control"id="minutes" name="minutes" min="0" max="59" placeholder="0" required value="{{$quiz->durations}}"> --}}

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!--right sidebar-->
            <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                <div class="card tt-sticky-sidebar">
                    <div class="card-body">
                        <h5 class="mb-4">{{ localize('Quiz Information') }}</h5>
                        <div class="tt-vertical-step">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#section-1" class="active">{{ localize('Update Information') }}</a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
</section>
</x-backend.app-layout>

@section('scripts')
    <script type="text/javascript">
  
    </script>

@endsection

