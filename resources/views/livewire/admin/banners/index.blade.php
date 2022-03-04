<div>
    <div>
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <h1>Banners</h1>
        <div class="mt-5">
            @foreach ($banners as $banner)
                <div class="col-xxl-12 mb-xxl-10">
                    <!--begin::Card widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Chart-->
                            <div class="d-flex flex-center me-7 me-xxl-12 pt-2">
                                {{--                            image--}}
                                <img src="{{asset('/img/banners/'.$banner->banner)}}"  style="max-width:100%;max-height:80px;"/>
                            </div>
                            <!--end::Chart-->
                            <div class="d-flex fs-6 fw-bold" style="margin-left: auto">
                                <a class="btn btn-primary btn-sm" style="margin-right: 5px" href="{{url('')}}/wbpa/banner_edit/{{$banner->id}}">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <button class="btn btn-danger btn-sm" wire:click="deleteBanner({{$banner->id}})" type="submit"><span class="fa fa-trash"></span></button>
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 4-->
                </div>
            @endforeach
            <!--begin::Form-->
                <form>
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Dropzone-->
                        <div class="dropzone" id="kt_dropzonejs_example_1">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                                <!--begin::Icon-->
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Dropzone-->
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->
        </div>
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script>
            var myDropzone;
            myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
                url: "/imageUploader", // Set the url for your upload script location
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                accept: function (file, done) {
                    if (file.name == "wow.jpg") {
                        done("Naha, you don't.");
                    } else {
                        uploadImages(file);
                    }
                }
            });

            function uploadImages(file) {
            @this.upload('uploadImage', file, (uploadedFilename) => {
                Livewire.emit('imageAdded', file.upload.filename)
            }, () => {
                // Error callback.
            }, (event) => {
                // Progress callback.
                // event.detail.progress contains a number between 1 and 100 as the upload progresses.
            })
            }
        </script>
    </div>

</div>
