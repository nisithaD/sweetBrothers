<!--begin::Aside-->
<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
             data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div
                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
                id="#kt_aside_menu" data-kt-menu="true">


                <div class="menu-item">
                    <a class="menu-link" href="{{asset('/dashboard')}}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">Website Content</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/content') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Page Content</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/featured_pages') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Featured Pages</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/banners') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Page Banners</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/blogs') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Blogs</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/partners') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Partners</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/reviews') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Reviews</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/faqs') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">FAQs</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/product_faqs') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Product FAQs</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/ordersManage') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Add Orders details</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/offers') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Offers Banner</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/landing_pages') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Landing Pages</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">Manage Packages</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/package_types') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Package Types</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/packages') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Packages</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">Manage Hire Products</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/product_types') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Product Types</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/categories') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Categories</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/subcats') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Sub Categories</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/products') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Products</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">Manage Sales Products</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/sales-product_types') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Product Types</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/sales-categories') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Categories</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/sales-subcats') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Sub Categories</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ url('wbpa/sales-products') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Products</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/coupons') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Coupons</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/postage') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Postage</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/quotes') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Quotes</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/orders') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Manage Orders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{ url('wbpa/contact/1/edit') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-title">Site Settings</span>
                    </a>
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pb-5" id="kt_aside_footer">
        <!--begin::Aside user-->
        <div class="aside-user">
            <!--begin::User-->
            <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                <!--begin::User image-->
            {{--                        <div class="me-5">--}}
            {{--                            <!--begin::Symbol-->--}}
            {{--                            <div class="symbol symbol-40px cursor-pointer"--}}
            {{--                                 data-kt-menu-trigger="{default: 'click', lg: 'hover'}"--}}
            {{--                                 data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">--}}
            {{--                                <img src="assets/media/avatars/150-26.jpg" alt=""/>--}}
            {{--                            </div>--}}
            {{--                            <!--end::Symbol-->--}}
            {{--                        </div>--}}
            <!--end::User image-->
                <!--begin::Wrapper-->
                <div class="flex-row-fluid flex-wrap">
                    <!--begin::Section-->
                    <div class="d-flex align-items-center flex-stack">
                        <!--begin::Info-->
                        <div class="me-2">
                            <!--begin::Username-->
                            <a href="#"
                               class="text-gray-800 text-hover-primary fs-6 fw-bold lh-0">{{Auth::user()->name}}</a>
                            <!--end::Username-->
                            <!--begin::Description-->
                            <span class="text-gray-400 fw-bold d-block fs-8">{{Auth::user()->email}}</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Action-->
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="btn btn-icon btn-active-color-primary me-n4" data-bs-toggle="tooltip"
                           title="End session and singout">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-gray-400">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" width="12" height="2" rx="1"
                                                          transform="matrix(-1 0 0 1 15.5 11)" fill="black"/>
													<path
                                                        d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                                        fill="black"/>
													<path
                                                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                                        fill="#C4C4C4"/>
												</svg>
											</span>
                            <!--end::Svg Icon-->
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <!--end::Action-->
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::User-->
        </div>
        <!--end::Aside user-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
