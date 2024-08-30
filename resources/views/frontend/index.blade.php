@extends('frontend.master')

@section('home')
    @php
        $music = App\Models\Music::latest()->get();
        $allMusic = App\Models\Music::latest()->limit(6)->get();
        $musicOne = App\Models\Music::latest()->limit(1)->first();
    @endphp

    <style>
        .my-photo {
            width: 100% !important;
            max-height: 150px !important;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .my-video {
            width: 100% !important;
            max-height: 160px !important;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
    </style>

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Latest Albums</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        @foreach ($music as $item)
                            <div class="single-album">
                                <img src="{{ asset($item->photo) }}" alt="" class="my-photo">
                                <div class="album-info">
                                    <a href="{{route('artist.details', $item->id)}}">
                                        <h5>{{ $item->artist_name }}</h5>
                                    </a>
                                    <p>Song: {{ $item->song_title }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        @foreach ($music as $item)
                            <div class="single-album">
                                <iframe width="100%" height="215"
                                src="https://www.youtube.com/embed/{{ $item->youtube_url }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <div class="album-info">
                                    <a href="#">
                                        <h5>{{ $item->artist_name }}</h5>
                                    </a>
                                    <p>Song: {{ $item->song_title }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Buy What’s New</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Album Area -->
                @foreach ($allMusic as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <video controls crossorigin playsinline poster="{{ asset($item->photo) }}" id="player" class="my-video">
                                <!-- Video files -->
                                <source src="{{ asset($item->video) }}" type="video/mp4" />
                            </video>
                            <!-- Album Price -->
                            <div class="album-price">
                                <p>{{ $item->artist_name }}</p>
                            </div>
                            <div class="album-price">
                                <p>{{ $item->song_title }}</p>
                            </div>
                        </div>
                        <div class="album-info">
                            {{-- <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
{{--
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
        style="background-image: url(img/bg-img/bg-4.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="img/bg-img/fa.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Buy What’s New</h2>
                        </div>
                        <p></p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>01. Main Hit Song</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{$musicOne->audio}}">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->

            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    {{-- <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img"
        style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i
                                            class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### Contact Area End ##### -->
@endsection
