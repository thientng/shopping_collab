    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach ($sliders as $slider)
            <div class="single-hero-items set-bg" data-setbg="{{ $slider->image_path }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>TNG.store ®</span>
                            <h1>{{ $slider->title }}</h1>
                            <p>{!! $slider->description !!}</p>
                            <a href="{{ route('home.san-pham') }}" class="primary-btn">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="single-hero-items set-bg" data-setbg="{{ asset('assets/client_view/img/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Hero Section End -->