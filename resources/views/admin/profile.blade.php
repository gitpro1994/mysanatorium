@extends('admin.layouts.master')
@section('page-title', 'Profil')
@section('content')

<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{asset('backend/images/users/').(Auth::user()->image=="" ? '/user-5.jpg' : '/'.Auth::user()->image)}}" class="rounded-circle avatar-lg img-thumbnail"
                     alt="profile-image">

                <h4 class="mb-0">{{ Auth::user()->name.' '.Auth::user()->surname }}</h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
                <form action="{{ route('admin.profile.update_pi', ['id'=> Auth::user()->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="file" id="example-fileinput" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-warning btn-sm ">
                            Dəyiş
                        </button>
                    </div>

                </form>

            </div>
        </div> <!-- end card -->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane show active" id="timeline">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                                <form class="form-horizontal update-personal-information" method="POST" action="{{ route('admin.profile.update', ['id'=>Auth::user()->id]) }}" name="update-personal-information">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Ad</label>
                                        <div class="col-8 col-xl-9">
                                            <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Soyad</label>
                                        <div class="col-8 col-xl-9">
                                            <input type="text" name="surname" value="{{ Auth::user()->surname }}" class="form-control @error('surname') is-invalid @enderror" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Email</label>
                                        <div class="col-8 col-xl-9">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Şifrə</label>
                                        <div class="col-8 col-xl-9">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="yeni şifrəni daxil edin...">
                                        </div>
                                    </div>

                                    <div class="justify-content-end row">
                                        <div class="col-8 col-xl-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light update-pi-button">Yadda saxla</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>

                    </div>

                </div> <!-- end tab-content -->
            </div>
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>
@endsection

