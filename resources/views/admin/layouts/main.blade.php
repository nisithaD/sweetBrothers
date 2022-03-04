<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.header')
<livewire:styles/>
<!--begin::Body-->
<body id="kt_body" class="aside-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
    @include('admin.layouts.sidebar')
    <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header align-items-stretch">
                @include('admin.layouts.navbar')
            </div>
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-fluid">
                    @if(isset($slot))
                        {{$slot}}
                    @else
                        @yield('content')
                    @endif
                </div>
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
</div>
</body>
<livewire:scripts/>
@include('admin.layouts.scripts')
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: false,
        timer: 5000,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert', ({detail: {type, message}}) => {
        Toast.fire({
            icon: type,
            title: message
        })
    })
</script>
</html>
