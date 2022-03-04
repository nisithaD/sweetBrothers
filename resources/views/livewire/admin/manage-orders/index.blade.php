<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Orders</h1>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Bill Name</th>
            <th>Transaction Id</th>
            <th>Payment Status</th>
            <th>Date</th>
            <th>PDF</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $cont)
            <tr>
                <td>{{ $cont->firstname }} {{ $cont->lastname }}</td>
                <td>{{ $cont->transaction_id }}</td>
                <td>{{ $cont->payment_status }}</td>
                <td>{{ \Carbon\Carbon::parse($cont->created_at)->format('d F Y')}}</td>
                <td>
                    <a href="{{ url('') }}/wbpa/orders/{{$cont->id}}/pdf" target="_blank">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-file"></span>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/orders/{{$cont->id}}/view">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-eye" aria-hidden="true"></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/search.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/general/datatables/advanced.js')}}"></script>
    <!--end::Page Custom Javascript-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
</div>
