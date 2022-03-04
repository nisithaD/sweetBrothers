<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Hire Products</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{asset('/wbpa/products/create')}}">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Additional Images</th>
            <th>Actions</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>
                    @foreach($types as $type)
                        @if($type->id == $product->type_id)
                            {{$type->title}}
                        @endif
                    @endforeach
                    <br>
                    @foreach($cats as $cat)
                        @if($cat->id == $product->category_id)
                            {{$cat->title}}
                        @endif
                    @endforeach
                    <br>
                    @foreach($subcats as $subcat)
                        @if($subcat->id == $product->sub_category_id)
                            {{$subcat->title}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @isset($product->price)
                        £{{$product->price}}
                    @endisset
                </td>
                <td>
                    @if($product->image!="")
                        <img src="/img/products/{{ $product->image }}"  style="max-width:100px;max-height:100px;"/>
                    @endif
                    @if($product->image=="")
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/products/{{$product->id}}/images">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-image"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ url('') }}/wbpa/products/{{$product->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                    <a href="{{ url('') }}/product/{{$product->slug}}">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-eye"></span>
                        </button>
                    </a>
                    <button type="button" wire:click="deleteProduct({{$product->id}})"
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
