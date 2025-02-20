@extends('layouts.header')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset((string)'/storage/'. $course->image)}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Course</h6>
                    <h1 class="mb-4"> {{$course->name}} </h1>
                    <p class="mb-4"> {{$course->description}} </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-5">
                            <p class="mb-0"><i class="fa fa-user-tie text-primary me-2"></i><span class="text-primary">Field: </span>{{$course->field}}</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="mb-0"><i class="fa fa-clock text-primary me-2"></i></i><span class="text-primary">Duration: </span>{{$course->duration}} Hours</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0"><i class="fa fa-clock text-primary me-2"></i></i><span class="text-primary">Price: </span>{{$course->price}}$</p>
                        </div>
                    </div>
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Teacher</h6>
                    <h1 class="mb-2"> {{$teacher->name}} </h1>
                    <div class="row gy-2 gx-4 mb-2">
                        <div class="col-sm-5">
                            <p class="mb-0"><i class="fa fa-user-tie text-primary me-2"></i><span class="text-primary">Role: </span>Teacher</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <a class="btn btn-primary py-3 px-5 mt-2" href="{{route('courses.edit',[$course->id])}}">Modify Course</a>
                        <form action="{{route('courses.destroy',[$course->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger py-3 px-5 mt-2" href="">Delete Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
