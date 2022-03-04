<div>
    <h1>Re-Order Offers</h1>
    <div class="row row-cols-lg-2 g-10 draggable-zone">
        @foreach ($offers as $key=>$offer)
            <div class="draggable" id="{{$offer->id}}">
                <!--begin::Card-->
                <div class="card card-bordered">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> {{$key+1}} . {!! $offer->title !!}</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-hover-light-primary draggable-handle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2x">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none">
																			<path
                                                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                                                fill="black"></path>
																			<path opacity="0.3"
                                                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                                                  fill="black"></path>
																		</svg>
																	</span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $offer->link !!}
                    </div>
                </div>
                <!--end::Card-->
            </div>
        @endforeach
    </div>
    <script src="{{asset('assets/plugins/custom/draggable/draggable.bundle.js')}}"></script>
    <script>
        var containers = document.querySelectorAll(".draggable-zone");

        var sortable = new Sortable.default(containers, {
            draggable: ".draggable",
            handle: ".draggable .draggable-handle",
            mirror: {
                //appendTo: selector,
                appendTo: "body",
                constrainDimensions: true
            },
        });
        sortable.on('drag:start', (e) => {
            const draggable = document.querySelector('.draggable').id;
            console.log(draggable);
        });

        sortable.on('sortable:stop', (e) => {
            console.log(e.oldIndex,e.newIndex);
        });

    </script>
</div>
