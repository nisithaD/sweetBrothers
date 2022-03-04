<div>
    <h1>Home</h1>
    <!--begin::Row-->
    <div class="row g-5 my-9 g-xxl-10">
        <!--begin::Col-->
        <div class="row col-xxl-3 mb-xxl-10">
            <!--begin::Card widget 4-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{$visitors}}</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-bold fs-6">Unique Visitors Today</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 4-->
        </div>

        <div class="row col-xxl-3 mx-6 mb-xxl-10">
            <!--begin::Card widget 4-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{$views}}</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-bold fs-6">Page Views Today</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 4-->
        </div>

        <div class="row col-xxl-3 mb-xxl-10" wire:click="generateSiteMap">
            <!--begin::Card widget 4-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Subtitle-->
                        <span class="gray-400 pt-1 fw-bold fs-6">Generate Sitemap</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 4-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>

