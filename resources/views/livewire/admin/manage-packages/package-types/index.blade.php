<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Package Types</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/package_types/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Banners</th>
            <th>Action</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach($package_types as $package_type)
            <tr>
                <td>{{ $package_type->title }}</td>
                <td>
                    {!! str_limit(strip_tags($package_type->content,'50')) !!}
                </td>
                <td>
                    @if($package_type->image!="")
                        <img src={{asset('img/package_types/'.$package_type->image)}}
                             style="max-width:100px;max-height:100px;"/>
                    @endif
                    @if($package_type->image=="")
                        N/A
                    @endif
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/package_types/{{$package_type->id}}/images">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-image"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/package_types/{{$package_type->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                    <button type="submit" wire:click="deletePackageType({{$package_type->id}})" class="btn btn-danger btn-sm"><span class="fa fa-trash"
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
