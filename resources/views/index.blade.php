@extends('layouts.header')
@section('content')
@auth
<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Your Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">

            @forelse ($courses as $course)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-4"> {{$course->name}} </h3>
                        <h6 class="mb-0"> {{$course->description}} </h6>
                        <br>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i> {{$course->field}} </small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i> {{$course->duration}} Hours</small>

                    </div>
                </div>
            </div>
            @empty
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">No Courses</h6>
        </div>
            @endforelse
        </div>


    </div>
</div>
<!-- Courses End -->
@endauth
@endsection





