@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Websites</h2>
            <div class="alert alert-success" style="display: none"></div>
            @if (count($websites) > 0)
                <table class="table table-bordered">
                    <tr>
                        <td>name</td>
                        <td>url</td>
                        <td>created_at</td>
                        <td>last scraped at</td>
                        <td>links to be scrapped</td>
                    </tr>
                    @foreach ($websites as $website)
                        <tr>
                            <td>{{ $website->Website_name }}</td>
                            <td><a href="{{ $website->Website_link }}">{{ $website->Website_link }}</a> </td>
                            <td><span>{{ $website->created_at }}</span></td>
                            <td><span>{{ $website->last_scraped_at }}</span></td>
                            <td>
                                @foreach ($website->links as $link)
                                    <li><a href="{{ $link->url }}">{{ $link->url }}</a><br>
                                        <button type="button" class="btn btn-primary btn-scrape"
                                            title="pull the latest items" id="{{ $link->id }}">Rescrape <i
                                                class="glyphicon glyphicon-repeat fast-right-spinner"
                                                style="display: none"></i></button>
                                    </li>
                                @endforeach

                            </td>

                        </tr>
                    @endforeach
                </table>

                @if (count($websites) > 0)
                    <div class="pagination">
                        <?php echo $websites->render(); ?>
                    </div>
                @endif

            @else
                <i>No websites found</i>

            @endif
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

            $(".btn-scrape").click(function() {
                var btn = $(this);

                btn.find(".fast-right-spinner").show();

                btn.prop("disabled", true);

                var tRowId = $(this).attr("id");
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ url('dashboard/links/scrape') }}",
                    data: {
                        link_id: tRowId,
                        _token: "{{ csrf_token() }}"
                    },
                    method: "post",
                    dataType: "json",
                    success: function(response) {

                        if (response.status == 1) {
                            $(".alert").removeClass("alert-danger").addClass("alert-success")
                                .text(response.msg).show();
                                location.reload();
                        } else {
                            $(".alert").removeClass("alert-success").addClass("alert-danger")
                                .text(response.msg).show();
                        }

                        btn.find(".fast-right-spinner").hide();
                    }
                });
            });
        });

    </script>
@endsection
