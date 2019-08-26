@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Photos</div>
                <div class="card-body container-fluid">
                    <div class="row">
                        @foreach($photos as $photo)
                        	<img src="{{ $photo->path }}" alt="" class="img-fluid h-100 col-sm-4" style="margin-bottom: 20px;">
                        @endforeach
                    </div>

                    -----

                    <div id="carouselControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($photos as $i=>$photo)
                                @if($i == 0)
                                    <li data-target="#carouselControls" data-slide-to="{{ $i }}" class="active"></li>
                                @else
                                    <li data-target="#carouselControls" data-slide-to="{{ $i }}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($photos as $i=>$photo)
                                @if($i == 0)
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ $photo->path }}" alt="{{ $photo->id }}">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ $photo->path }}" alt="{{ $photo->id }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add photo</div>

                <div class="card-body">

                	<form method="POST" action="{{ route('addPhoto') }}" enctype="multipart/form-data">
                		{{ csrf_field() }}
                		<div>
                			<label>
                				Add your photo:
                			</label>
                			<input type="file" name="photo" required>
                		</div>

                		<input type="submit" value="Add photo">
                	</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection