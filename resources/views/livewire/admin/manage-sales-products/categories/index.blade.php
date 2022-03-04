<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Sales Collection - Categories</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/sales-categories/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->title }}</td>
                <td>
                    @foreach($product_types as $type)
                        @if($type->id == $category->type)
                            {{$type->title}}
                        @endif
                    @endforeach
                </td>
                <td>
                    {!! str_limit(strip_tags($category->content,'50')) !!}
                </td>
                <td>
                    @if($category->image!="")
                        <img src="/img/categories/{{ $category->image }}"  style="max-width:100px;max-height:100px;"/>
                    @endif
                    @if($category->image=="")
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/sales-categories/{{$category->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                    <button type="button" wire:click="deleteProductCategory({{$category->id}})"
                            class="btn btn-danger btn-sm"><span class="fa fa-trash"
                                                                aria-hidden="true"></span></button>
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
