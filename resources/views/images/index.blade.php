   @extends('layouts.app')

@section('content')

    
    <div class="container">
        <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                 
                <a class="btn btn-success" href="{{ route('images.create') }}" title="Upload files"> <i class="fas fa-upload"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
         
      
        <div class="row">
            @foreach ($images as $image)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $image->name }}" width="100%" height="200px" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

     
@endsection