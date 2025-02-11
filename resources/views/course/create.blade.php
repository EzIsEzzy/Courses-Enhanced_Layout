@extends('layouts.header')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        {{-- <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;"> --}}
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Course</h6>
                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <h1 class="mb-2">Course Name</h1>
                        <input type="text" name="course_name" id="" value="{{old('course_name')}}" class="form-control"> <br>
                        <p class="mb-2">Description</p>
                        <textarea name="course_description" id="" class="form-control"> {{old('course_description')}} </textarea>
                        <br>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-user-tie text-primary me-2"></i><span class="text-primary">Field: </span></p>
                                <input type="text" name="course_field" id="" value="{{old('course_field')}}" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-clock text-primary me-2"></i></i><span class="text-primary">Duration: </span></p>
                                <input type="text" name="course_duration" id="" value="{{old('course_duration')}}" class="form-control">
                            </div>
                            <p class="mb-2">Image</p>
                                <input type="file" name="course_image" id="" class="form-control">
                        </div>
                        <button class="btn btn-primary py-3 px-5 mt-2" type="submit">Create Course</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

