@extends('frontend.layouts.app')

@section('head')
    <style>
        .video-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
        }

        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .title{
            margin-top: 15px;
            color: var(--white-color);
            font-size: 18px;
            font-weight: 600;
        }
        .description{
            margin-top: 10px;
            color: var(--deep-color);
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
@endsection

@section('content')
    <section class="youtube-list py-4">
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <a href="{{ route('frontend.videos') }}"> &laquo; Back</a>
                    <div class="video-player mt-3">
                        <div class="video-wrapper">
                            <video controls poster="{{ asset($video->thumbnail) }}">
                                <source src="{{ asset($video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                            <h2 class="title">{{ $video->title }}</h2>
                            <p class="description">{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
