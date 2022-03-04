<div>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <h1>Featured Pages</h1>
    <a class="btn btn-link btn-color-info btn-active-color-primary me-5 mb-2"
       href="{{ url('') }}/wbpa/featured_pages/create">Add New</a>

    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Reviews</th>
            <th>FAQs</th>
            <th>Content Blocks</th>
            <th>Gallery Images</th>
            <th>Page Banners</th>
            <th>Actions</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach($featured_pages as $key=>$featured_page)
            <tr>
                <td></td>
                <td>{{ $featured_page->title }}</td>

                <td>{{str_limit(strip_tags($featured_page->content),50)}}</td>

                <td>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input wire:click="toggleReview({{$featured_page->id}})" class="form-check-input"
                               type="checkbox" value="1"
                               @if(isset($featured_page->reviews) && $featured_page->reviews==1) checked @endif/>
                    </label>
                </td>

                <td>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input wire:click="toggleFaqs({{$featured_page->id}})" class="form-check-input" type="checkbox"
                               value="1" @if(isset($featured_page->faqs) && $featured_page->faqs==1) checked @endif/>
                    </label>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/featured_pages/{{$featured_page->id}}/blocks">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/featured_pages/{{$featured_page->id}}/images">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-image"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/featured_pages/{{$featured_page->id}}/banners">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-image"></span>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{ url('') }}/wbpa/featured_pages/{{$featured_page->id}}/edit">
                        <button class="btn btn-primary btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                    </a>

                    <button wire:click="deleteFeaturedPages({{$featured_page->id}})" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash"></span>
                    </button>

                    <a class="adm-view" href="{{url('')}}/page/{{$featured_page->slug}}"
                       target="_blank">
                        View Page
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/documentation/documentation.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/search.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/general/datatables/advanced.js')}}"></script>
    <!--end::Page Custom Javascript-->
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
