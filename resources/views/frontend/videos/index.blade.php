@extends('frontend.layouts.app')

@section('head')
    <style>
        /* YouTube Specific Styles */
        .youtube-list {
            /* background-color: var(--dark-gray-color); */
            /* #121212 */
        }

        .video-card {
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .thumbnail-box {
            position: relative;
            overflow: hidden;
        }

        .thumbnail-box img {
            width: 100%;
            object-fit: cover;
            transition: border-radius 0.3s;
        }

        /* Hover effect like YouTube */
        .video-card:hover .thumbnail-box img {
            border-radius: 0 !important;
        }

        .video-duration {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 2px 6px;
            font-size: 12px;
            border-radius: 4px;
            font-weight: 500;
        }

        .video-info-container .channel-logo img {
            width: 36px;
            height: 36px;
        }

        .video-details .video-title {
            color: var(--white-color);
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Title max 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .video-details .channel-name,
        .video-details .video-meta {
            color: #aaaaaa;
            font-size: 12px;
            margin-bottom: 0;
        }

        .video-details .channel-name:hover {
            color: white;
        }

        /* Responsive adjustment for small devices */
        @media (max-width: 576px) {
            .video-details .video-title {
                font-size: 16px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="youtube-list py-5">
        <div class="container-fluid px-4">
            <div class="row g-4 justify-content-center">
                @forelse ($videos as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ route('frontend.video.watch', $item->slug) }}" class="video-card text-decoration-none">
                            <div class="thumbnail-box">
                                <img src="{{ asset($item->thumbnail) }}" class="img-fluid rounded-3" alt="Thumbnail">
                            </div>
                            <div class="video-info-container d-flex mt-2">
                                <div class="channel-logo">
                                    <img src="{{ asset(setting()->logo) }}" class="rounded-circle border" alt="{{ setting()->site_name }}" >
                                </div>
                                <div class="video-details ms-3">
                                    <h6 class="video-title">{{ $item->title }}</h6>
                                    <p class="channel-name">{{ setting()->author_name }} <i class="bi bi-check-circle-fill"></i></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="alert alert-bg-color mb-0 text-center text-white">No videos found.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
