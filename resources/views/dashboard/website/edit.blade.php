<script>
    function validate(ev) {
        let title = document.getElementById("title");
        let titleError = document.getElementById("titleError");
        if (title.value == "") {
            title.focus();
            titleError.classList.add("text-danger");
            titleError.innerHTML = "title is required";
            return false;
        }


        let url = document.getElementById("url");
        let urlErr = document.getElementById("urlErr");

        if (url.value == "") {
            url.focus();
            urlErr.classList.add("text-danger");
            urlErr.innerHTML = "url is required";
            return false;
        }



    }

</script>
@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Update Website #{{ $website->id }}</h2>

            @if (session('error') != '')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form method="post" action="{{ url('dashboard/websites/' . $website->id) }}" enctype="multipart/form-data"
                onsubmit="return(validate());">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Title:</strong>

                            <input type="text" name="title" value="{{ $website->Website_name }}" class="form-control"
                                id="title" />
                            <span id="titleError"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Url:</strong>

                            <input type="text" name="url" value="{{ $website->Website_link }}" class="form-control"
                                id="url" />
                            <span id="urlErr"></span>
                        </div>
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary" id="btn-save">Update</button>

                </div>

            </form>
        </div>
    </div>

@endsection
