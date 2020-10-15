<script>
    function validate(ev) {
        let title = document.getElementById("title");
        let titleError = document.getElementById("titleError");
        var re = /^[a-zA-Z ]*$/;
        if (title.value == "") {
            title.focus();
            titleError.classList.add("text-danger");
            titleError.innerHTML = "title is required";
            return false;
        }
        if (re.test(title.value) == false) {
            title.focus();
            titleError.classList.add("text-danger");
            titleError.innerHTML = "title can not contain numbers";
            return false;
        } else {
            titleError.innerHTML = "";

        }

        let cssExpression = document.getElementById("cssExpression");
        let cssExpressionErr = document.getElementById("cssExpressionErr");

        if (cssExpression.value == "") {
            cssExpression.focus();
            cssExpressionErr.classList.add("text-danger");
            cssExpressionErr.innerHTML = "cssExpression is required";
            return false;
        }

        let fullContentSelector = document.getElementById("fullContentSelector");
        let fullContentSelectorErr = document.getElementById("fullContentSelectorErr");

        if (fullContentSelector.value == "") {
            fullContentSelector.focus();
            fullContentSelectorErr.classList.add("text-danger");
            fullContentSelectorErr.innerHTML = "fullContentSelector is required";
            return false;
        }

    }

</script>
@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Add Item Schema</h2>

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

            <form method="post" action="{{ route('item-schema.store') }}" enctype="multipart/form-data"
                onsubmit="return(validate());">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Title:</strong>

                            <input type="text" id="title" name="title" class="form-control" />
                            <span id="titleError"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>CSS Expression:</strong>

                            <input type="text" name="css_expression" class="form-control" id="cssExpression" />
                            <span id="cssExpressionErr"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Is Full Url To Article/Partial Url:</strong>

                            <input type="checkbox" name="is_full_url" value="1" checked />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Full content selector:</strong>

                            <input type="text" name="full_content_selector" class="form-control" id="fullContentSelector" />
                            <span id="fullContentSelectorErr"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary" id="btn-save">Create</button>

                </div>

            </form>
        </div>
    </div>

@endsection
