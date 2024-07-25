<x-backend.app-layout>

@section('title')
    {{ localize('Update Level') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
 
<section class="tt-section pt-4">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Update Level') }}</h2>
                        </div>
  
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mb-4 g-4">
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.level.update') }}" method="POST" class="pb-650" id="product-form">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $level->id }}">
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="name" class="form-label">Level Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $level->name }}" name="name" required/>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Decription</label>
                               <textarea class="form-control" name="description" id="description" required>{{ $level->description }}</textarea>
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
                        <h5 class="mb-4">{{ localize('Level Information') }}</h5>
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

