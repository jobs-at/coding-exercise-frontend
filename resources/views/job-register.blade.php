@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4">
            <h2 class="text-center mt-4 mb-4">Add new Job Ad</h2>
            <div class="card">
                <div class="card-header">Add new Job</div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('job-store') }}" method="POST">
                        @csrf

                        {{-- Show Errors --}}
                        @if ($errors->any())
                            <div class="row">
                                <div class="col-12">

                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif


                        <div class="row ">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group mt-4 mb-4 p-0 m-0">
                                    <label class="mb-2" for="title">Titel</label>
                                    <input class="form-control" type="text" required name="title" id="title"
                                           value="{{ old('title') }}">
                                </div>
                                <div class="form-group mt-4 mb-4 p-0 m-0">
                                    <label class="mb-2" for="published_at">Published at</label>
                                    <input class="form-control" type="datetime-local" required name="published_at"
                                           id="published_at" value="{{ old('published_at') }}">
                                </div>
                                <div class="form-group mt-4 p-0 m-0">
                                    <label class="mb-2" for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group mt-4 mb-4 p-0 m-0">
                                    <label class="mb-2" for="company">Company</label>
                                    <select class="form-control" required name="company" id="company">
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-4 mb-4 p-0 m-0">
                                    <label class="mb-2" for="location">Location</label>
                                    <select class="form-control" required name="location" id="location">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->location }}">{{ $location->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-4 mb-4 p-0 m-0">
                                    <label class="mb-2" for="status">Status</label>
                                    <select class="form-control" required name="active" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-6">
                                <input class="btn btn-success text-light" type="submit" value="Add">
                                <a class="btn btn-danger text-light float-right" href="{{ route('jobs') }}">abort</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection



