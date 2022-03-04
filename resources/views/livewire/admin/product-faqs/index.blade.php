<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Product FAQs</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/product_faqs/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($product_faqs as $product_faq)
            <tr>
                <td>{{ $product_faq->title }}</td>
                <td>
                    {!! str_limit(strip_tags($product_faq->content,'100')) !!}
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/product_faqs/{{$product_faq->id}}/edit" class="btn btn-primary btn-sm">
                        <span class="fa fa-edit"></span>
                    </a>
                    <button wire:click="deleteFaq({{$product_faq->id}})" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash"></span>
                    </button>
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
