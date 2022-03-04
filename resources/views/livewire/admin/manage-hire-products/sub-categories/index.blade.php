<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Hire Collection - Sub Categories</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/subcats/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Parent Category</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach ($subcats as $subcat)
            <tr>
                <td>{{ $subcat->title }}</td>
                <td>
                    @foreach($cats as $cat)
                        @if($subcat->category_id==$cat->id)
                            {{$cat->title}}
                        @endif
                    @endforeach
                </td>
                <td>
                    {!! str_limit(strip_tags($subcat->content,'50')) !!}
                </td>
                <td>
                    @if($subcat->image!="")
                        <img src="/img/subcats/{{ $subcat->image }}"  style="max-width:100px;max-height:100px;"/>
                    @endif
                    @if($subcat->image=="")
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/subcats/{{$subcat->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                    <button type="button" wire:click="deleteSubCategory({{$subcat->id}})"
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
