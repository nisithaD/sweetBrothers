<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Landing Pages</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{ url('') }}/wbpa/landing_pages/create">Add new</a>
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>Title</th>
            <th>Link</th>
            <th>Reviews</th>
            <th>FAQs</th>
            <th>Content Blocks</th>
            <th>Gallery Images</th>
            <th>Banners</th>
            <th>Actions</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach($landing_pages as $key=>$landing_page)
            <tr>
                <td>{{$landing_page->title}}</td>
                <td><a href="{{url('')}}/landing/{{$landing_page->link}}" target="_blank">
                        {{$landing_page->link}}
                    </a></td>
                <td>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input wire:click="toggleReview({{$landing_page->id}})" class="form-check-input" type="checkbox"
                               value="1"
                               @if(isset($landing_page->reviews) && $landing_page->reviews==1) checked @endif/>
                    </label>
                </td>

                <td>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input wire:click="toggleFaqs({{$landing_page->id}})" class="form-check-input" type="checkbox"
                               value="1" @if(isset($landing_page->faqs) && $landing_page->faqs==1) checked @endif/>
                    </label>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/landing_pages/{{$landing_page->id}}/blocks">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/landing_pages/{{$landing_page->id}}/images">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-image"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/landing_pages/{{$landing_page->id}}/banners">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-image"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <button class="btn btn-danger btn-sm" wire:click="deletePage({{$landing_page->id}})">
                        <span class="fa fa-trash"></span>
                    </button>

                    <a href="{{ url('') }}/wbpa/landing_pages/{{$landing_page->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
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
