<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Blogs</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/blogs/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{str_limit(strip_tags($blog->content,'50'))}}</td>
                <td>
                    @if($blog->image!="")
                        <img src="{{url('')}}/img/blogs/{{ $blog->image }}"  style="max-width:100px;max-height:100px;"/>
                    @endif
                    @if($blog->image=="")
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/blogs/{{$blog->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </button>
                    </a>
                    <button wire:click="deleteBlog({{$blog->id}})" class="btn btn-danger btn-sm">
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
