<!DOCTYPE html>
<html lang="en" dir="auto" data-theme="auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <title>{{ strip_tags($title) }}</title>

    <!-- Meta Tags -->
    <meta name="description" content="{{ strip_tags($description) }}">
    <meta name="author" content="{{ $author ?? 'scraface' }}">
    <meta name="generator" content="Hugo 0.146.0">
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="{{ canonicalUrl() }}">
    <meta name="theme-color" content="#2e2e33">
    <link rel="alternate" type="application/rss+xml" title="Blog RSS" href="{{ canonicalUrl().'.rss'}}" />

    <!-- Preconnects -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="//sagita-5fm.pages.dev">
    <link rel="preconnect" href="//soloferat.biz.id">

    <!-- Open Graph -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ strip_tags($title) }}">
    <meta property="og:description" content="{{ strip_tags($description) }}">
    <meta property="og:url" content="{{ canonicalUrl() }}">
    <meta property="og:site_name" content="{{ option('site_name') }}">

    @php
        $converter = new \League\CommonMark\CommonMarkConverter(['html_input' => 'allow']);
    @endphp
    @if($images->isNotEmpty())
        @php
            $firstImage = $images->first();
            if (is_object($firstImage)) {
                $firstImageUrl = $firstImage->thumbnail ?? $firstImage->url ?? $firstImage->src ?? $firstImage->image ?? 'https://soloferat.biz.id/images/'.$slug.'.jpg';
            } elseif (is_array($firstImage)) {
                $firstImageUrl = $firstImage['thumbnail'] ?? $firstImage['url'] ?? $firstImage['src'] ?? $firstImage['image'] ?? 'https://soloferat.biz.id/images/'.$slug.'.jpg';
            } else {
                $firstImageUrl = themes('img/icon512.png');
            }
        @endphp
        <meta property="og:image" content="{{ $firstImageUrl }}">
    @else
        <meta property="og:image" content="{{ 'https://soloferat.biz.id/images/'.$slug.'.jpg' }}">
    @endif
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ strip_tags($title) }}">
    <meta name="twitter:description" content="{{ strip_tags($description) }}">
    @if($images->isNotEmpty() && isset($firstImageUrl))
        <meta name="twitter:image" content="{{ $firstImageUrl }}">
    @else
        <meta name="twitter:image" content="{{ 'https://soloferat.biz.id/images/'.$slug.'.jpg' }}">
    @endif

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Inter:wght@300;400;500;600;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- Assets -->
    <link rel="stylesheet" href="{{ themes('css/style.css') }}">
    <link rel="stylesheet" href="{{ themes('css/common.css') }}">

    <!-- Favicons -->
    <link rel="icon" href="{{ themes('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ themes('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ themes('img/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ themes('img/apple-touch-icon.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Custom Post Styles dengan Optimasi Mobile & Iklan -->
    <style>
        /* Variables */
        :root {
            --font-heading: 'Merriweather', serif;
            --font-body: 'Inter', sans-serif;
            --font-subtitle: 'Source Sans Pro', sans-serif;
            --ad-primary: #dc2626;
            --ad-secondary: #ef4444;
            --theme: #fff;
            --entry: #fff;
            --primary: #111;
            --secondary: #444;
            --tertiary: #666;
            --content: #222;
            --border: #e5e7eb;
            --bg-body: #f3f4f6;
            --header-h: 70px;
        }

        [data-theme=dark] {
            --theme: #1a1a1a;
            --entry: #262626;
            --primary: #f3f4f6;
            --secondary: #d1d5db;
            --tertiary: #9ca3af;
            --content: #e5e7eb;
            --border: #404040;
            --bg-body: #111;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: var(--font-body);
            color: var(--primary);
            background: var(--bg-body);
            line-height: 1.6;
            font-size: 16px;
            overflow-x: hidden;
            /* Prevent horizontal scroll from ads */
        }

        /* Navigation */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: var(--header-h);
            padding: 0 20px;
            background: var(--entry);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo a {
            font-family: var(--font-heading);
            font-weight: 900;
            font-size: 1.5rem;
            color: var(--primary);
            text-decoration: none;
        }

        #menu {
            display: flex;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #menu a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
        }

        /* Layout */
        .main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 30px;
            align-items: start;
        }

        /* Post Content */
        .post-single {
            background: var(--entry);
            border-radius: 12px;
            padding: 0;
            /* Updated padding handling */
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .post-header {
            padding: 40px;
            text-align: center;
            background: linear-gradient(to bottom, var(--entry), var(--theme));
            border-bottom: 1px solid var(--border);
        }

        .post-title {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            font-weight: 900;
            margin: 0 0 15px 0;
            line-height: 1.3;
        }

        .post-meta {
            color: var(--tertiary);
            font-size: 0.95rem;
            font-family: var(--font-subtitle);
        }

        .post-content {
            padding: 40px;
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--content);
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        .post-content h2,
        .post-content h3 {
            font-family: var(--font-heading);
            color: var(--primary);
            margin-top: 2.5rem;
        }

        /* Ad Handling - Critical for Mobile */
        .ad-responsive-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            padding: 10px;
            background: var(--bg-body);
            border-radius: 8px;
            overflow: hidden;
            max-width: 100%;
        }

        /* Force scroll for huge ads on mobile to prevent layout break */
        .ad-scroll-container {
            width: 100%;
            overflow-x: auto;
            display: flex;
            justify-content: center;
            -webkit-overflow-scrolling: touch;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-widget {
            background: var(--entry);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .widget-title {
            font-family: var(--font-heading);
            font-size: 1.2rem;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border);
        }

        .sidebar-post-item {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            align-items: center;
        }

        .sidebar-post-item a {
            text-decoration: none;
            color: var(--content);
            font-weight: 500;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        /* Utilities */
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            margin: 20px 0;
        }

        .gallery-item img {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Mobile Optimization */
        @media (max-width: 900px) {
            .content-wrapper {
                grid-template-columns: 1fr;
                /* Stack sidebar below */
            }

            .sidebar {
                margin-top: 0;
                order: 2;
                /* Ensure sidebar is at bottom */
            }

            .post-content-area {
                order: 1;
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 10px;
            }

            .post-header {
                padding: 25px 15px;
            }

            .post-content {
                padding: 20px 15px;
            }

            .post-title {
                font-size: 1.75rem;
            }

            .nav {
                padding: 0 15px;
            }

            #menu {
                display: none;
            }

            /* Simplify menu or use hamburger if needed, for now hidden to clean up */

            /* Make header smaller on mobile */
            .header {
                margin-bottom: 10px;
            }

            /* Ad adjustments */
            .ad-responsive-wrapper {
                margin: 20px -15px;
                /* Bleed to edges */
                border-radius: 0;
                background: #f8fafc;
            }

            /* Scale down 728 ads nicely using CSS transform if sticky/overflow is ugly */
            .scale-on-mobile {
                transform: scale(0.45);
                transform-origin: center center;
                margin: -25px 0;
                /* Compensate for whitespace from scaling */
            }
        }

        /* Bottom Related Posts Section */
        .bottom-related {
            margin-top: 50px;
            padding: 30px;
            background: var(--entry);
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .bottom-related-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary);
            text-align: center;
        }

        .bottom-related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .bottom-related-item {
            background: var(--theme);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 15px;
            transition: all 0.2s;
        }

        .bottom-related-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .bottom-related-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.95rem;
            display: block;
            font-weight: 500;
        }

        .bottom-related-link:hover {
            color: var(--secondary);
        }

        /* Dark Mode overrides for Ads */
        [data-theme=dark] .ad-responsive-wrapper {
            background: #222;
        }

        /* Footer/Misc */
        .footer {
            max-width: 100%;
            border-top: 1px solid var(--secondary);
            padding: 20px;
            text-align: center;
            color: var(--secondary);
            border-top: 1px solid var(--border);
            margin-top: 60px;
        }

        .read-more-link{
            display: block;
        }
        .img-placeholder{
            height: 250px
        }
        .img-placeholder-2{
            height: 60px
        }
        .img-placeholder-3{
            height: 90px
        }
    </style>

    <!-- NoScript -->
    <noscript>
        <style>
            .ad-responsive-wrapper {
                display: none;
            }
        </style>
    </noscript>

    <!-- Theme Script - Inline for fast loading -->
    <script>
        if (localStorage.getItem("pref-theme") === "dark") {
            document.querySelector("html").dataset.theme = 'dark';
        } else if (localStorage.getItem("pref-theme") === "light") {
            document.querySelector("html").dataset.theme = 'light';
        } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.querySelector("html").dataset.theme = 'dark';
        }
    </script>

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{ strip_tags($title) }}",
        "description": "{{ strip_tags($description) }}",
        "image": "{{ isset($firstImageUrl) ? $firstImageUrl : 'https://soloferat.biz.id/images/'.$slug.'.jpg' }}",
        "author": {
            "@type": "Person",
            "name": "{{ $author ?? 'scraface' }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ option('site_name') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ 'https://soloferat.biz.id/images/'.$slug.'.jpg' }}"
            }
        },
        "datePublished": "{{ \Carbon\Carbon::now()->toIso8601String() }}",
        "dateModified": "{{ \Carbon\Carbon::now()->toIso8601String() }}"
    }
    </script>
</head>

<body class="post" id="top">
    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" onclick="closeLightbox()">×</button>
        <img class="lightbox-img" id="lightboxImg" src="" alt="">
    </div>

    <!-- Popunder Guard -->
    <div class="popunder-guard" id="popunderGuard"></div>

    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <a href="/" accesskey="h" title="{{ option('site_name') }}">
                    {{ option('site_name') }}
                </a>
                <div class="logo-switches">
                    <button id="theme-toggle" accesskey="t" title="(Alt + T)" aria-label="Toggle theme">
                        <svg id="moon" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <svg id="sun" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </button>
                </div>
            </div>
            <ul id="menu">
                <li>
                    <a href="{{ pagePermalink('dmca') }}" title="DMCA">
                        <span>DMCA</span>
                    </a>
                </li>
                <li>
                    <a href="{{ pagePermalink('contact') }}" title="Contact">
                        <span>Contact</span>
                    </a>
                </li>
                <li>
                    <a href="{{ pagePermalink('Privacy') }}" title="Privacy Policy">
                        <span>Privacy Policy</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main">
        <!-- Breadcrumbs -->
        <nav class="breadcrumbs" aria-label="breadcrumb">
            <a href="/">Home</a>
            <span> » </span>
            <span>{{ strip_tags($title) }}</span>
        </nav>

        <!-- Content Wrapper with Sidebar -->
        <div class="content-wrapper">
            <!-- Main Article Content -->
            <div class="post-content-area">
                <article class="post-single">
                    <!-- Article Header -->
                    <header class="post-header">
                        <h1 class="post-title">{!! $title !!}</h1>

                        @if(!empty($articles) && isset($articles[0]))
                            <div class="post-subtitle">
                                {!! $converter->convert($articles[0]) !!}
                            </div>
                        @endif

<div class="img-placeholder">
<script>
  atOptions = {
    'key' : '60ded1f7a2f4df72870204b603a6f4f4',
    'format' : 'iframe',
    'height' : 250,
    'width' : 300,
    'params' : {}
  };
</script>
<script src="https://speedingdeadlyplays.com/60ded1f7a2f4df72870204b603a6f4f4/invoke.js"></script>
</div>
                        <div class="post-meta">
                            <span>📅 {{ \Carbon\Carbon::now()->translatedFormat('F j, Y') }}</span>
                            <span>👤 {{ $author ?? 'scraface' }}</span>
                        </div>

                        <div class="post-date">
                            {{ \Carbon\Carbon::now()->format('M d, Y') }}
                        </div>

                        <!-- Top Banner Ad 728x90 - CTA EXPLOSIVE -->
                        <!-- Top Banner Ad 728x90 -->
                        <!-- Top Banner Ad 728x90 -->

                    </header>

                    <!-- Article Content -->
                    <div class="post-content">
                        @php
                            $articleText = '';
                            if (!empty($articles) && is_array($articles)) {
                                foreach ($articles as $para) {
                                    if (is_string($para)) {
                                        $articleText .= $para . "\n\n";
                                    }
                                }
                            }
                            $paragraphs = preg_split('/\n\s*\n/', $articleText, -1, PREG_SPLIT_NO_EMPTY);
                            // Converter already instantiated at top
                        @endphp

<div class="img-placeholder-2">
<script>
  atOptions = {
    'key' : '4c0da0a126ba0fbf06df8c855f78f575',
    'format' : 'iframe',
    'height' : 60,
    'width' : 468,
    'params' : {}
  };
</script>
<script src="https://speedingdeadlyplays.com/4c0da0a126ba0fbf06df8c855f78f575/invoke.js"></script>
</div>
                        @if(!empty($paragraphs))
                            <!-- Opening Paragraph -->
                            @if(count($paragraphs) > 0)
                                {!! $converter->convert(implode("\n\n", array_slice($paragraphs, 0, 3))) !!}
                            @endif

                            <!-- Content Section 1 -->
                            @if(count($paragraphs) > 3)
                                <div class="content-box">
                                    <h3>Understanding the Context</h3>
<div class="img-placeholder-3">
<script>
  atOptions = {
    'key' : '9ae821747dc2bfe810837a30ac46dcd2',
    'format' : 'iframe',
    'height' : 90,
    'width' : 728,
    'params' : {}
  };
</script>
<script src="https://speedingdeadlyplays.com/9ae821747dc2bfe810837a30ac46dcd2/invoke.js"></script>
</div>
                                    {!! $converter->convert(implode("\n\n", array_slice($paragraphs, 3, 4))) !!}
                                </div>
                            @endif

                            <!-- Featured Image -->
                            @if($images->isNotEmpty())
                                @php
                                    $firstImage = $images->first();
                                    if (is_object($firstImage)) {
                                        $imageSrc = $firstImage->thumbnail ?? $firstImage->url ?? $firstImage->src ?? $firstImage->image ?? '';
                                        $imageAlt = $firstImage->title ?? $firstImage->alt ?? $title ?? '';
                                    } elseif (is_array($firstImage)) {
                                        $imageSrc = $firstImage['thumbnail'] ?? $firstImage['url'] ?? $firstImage['src'] ?? $firstImage['image'] ?? '';
                                        $imageAlt = $firstImage['title'] ?? $firstImage['alt'] ?? $title ?? '';
                                    }
                                @endphp
                                @if($imageSrc)
                                    <div class="featured-image">
                                        <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}" loading="lazy" width="800" height="450">
                                    </div>
                                @endif
                            @else
                                <div class="featured-image">
                                    <img src="{{ 'https://soloferat.biz.id/images/'.$slug.'.jpg' }}" alt="{{ $keyword }}" loading="lazy" width="800" height="450">
                                </div>
                            @endif

                            <!-- Gallery 4x4 -->
                            @if($images->count() > 1)
                                <div class="gallery-section">
                                    <h2 class="gallery-title">Image Gallery</h2>
                                    <div class="gallery-grid">
                                        @foreach($images as $index => $image)
                                            @php
                                                if (is_object($image)) {
                                                    $imgSrc = $image->thumbnail ?? $image->url ?? $image->src ?? $image->image ?? '';
                                                    $imgAlt = $image->title ?? $image->alt ?? $title ?? '';
                                                } elseif (is_array($image)) {
                                                    $imgSrc = $image['thumbnail'] ?? $image['url'] ?? $image['src'] ?? $image['image'] ?? '';
                                                    $imgAlt = $image['title'] ?? $image['alt'] ?? $title ?? '';
                                                } else {
                                                    $imgSrc = $image;
                                                    $imgAlt = $title ?? '';
                                                }
                                            @endphp
                                            @if($imgSrc)
                                                <div class="gallery-item" onclick="openLightbox('{{ $imgSrc }}')">
                                                    <img src="{{ $imgSrc }}" alt="{{ $imgAlt }}" loading="lazy" width="300"
                                                        height="300">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Native Ad 1 dengan Positioning Strategis - CTA INSANE -->
                            <!-- Native Banner -->


                            <!-- Content Section 2 -->
                            @if(count($paragraphs) > 7)
                                <div class="content-box">
                                    <h3>Key Insights</h3>
                                    {!! $converter->convert(implode("\n\n", array_slice($paragraphs, 7, 5))) !!}
                                </div>
                            @endif

                            <!-- Second 300x250 Ad - CTA FRENZY -->
                            <!-- Second 300x250 Ad Removed -->

                            <!-- Related Articles -->
                            <div class="related-section">
                                <h3 class="related-title">Continue Reading</h3>
                                <div class="related-list">
                                    @foreach(getRandomPosts(3) as $relatedPost)
                                        <div class="related-item">
                                            <a href="{{ ($relatedPost->slug) }}">
                                                {{ $relatedPost->keyword }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Read More Links -->
                            <div class="read-more-box">
                                <h3 class="read-more-title">🔗 Related Articles You Might Like:</h3>
                                @foreach(getRandomPosts(3) as $relatedPost)
                                    <a href="{{ ($relatedPost->slug) }}" class="read-more-link"
                                        title="{{ $relatedPost->keyword }}">
                                        📰 {{ $relatedPost->keyword }}
                                    </a>
                                @endforeach
                                @if( count($backlinksz) > 0 )
                                    @foreach( $backlinksz as $backlinks)
                                        <a href="{{ ($backlinks[0]) }}" class="read-more-link"
                                            title="{{ $backlinks[1] }}" target="_blank">
                                            📰 {{ $backlinks[1] }}
                                        </a>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Native Ad 2 sebelum closing - CTA APOCALYPSE -->
                            <!-- Native Ad 2 Removed -->

                            <!-- Content Section 3 -->
                            @if(count($paragraphs) > 12)
                                <div class="content-box">
                                    <h3>Final Thoughts</h3>
                                    {!! $converter->convert(implode("\n\n", array_slice($paragraphs, 12, 6))) !!}
                                </div>
                            @endif

                            <!-- Closing Paragraph -->
                            @if(count($paragraphs) > 18)
                                {!! $converter->convert(implode("\n\n", array_slice($paragraphs, 18, 4))) !!}
                            @endif

                            <!-- Bottom Sticky Ad Removed -->

                        @else
                            <div class="content-box">
                                <p>Content is being prepared. Please check back later.</p>
                            </div>
                        @endif
                    </div>
                </article>

                <!-- Bottom Related Posts Grid -->
                <div class="bottom-related">
                    <h3 class="bottom-related-title">📚 You May Also Like These Articles</h3>
                    <div class="bottom-related-grid">
                        @foreach(getRandomPosts(8) as $relatedPostBottom)
                            <div class="bottom-related-item">
                                <a href="{{ ($relatedPostBottom->slug) }}" class="bottom-related-link"
                                    title="{{ $relatedPostBottom->keyword }}">
                                    📌 {{ $relatedPostBottom->keyword }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Sidebar Sticky Ad 160x600 - CTA INSANE -->
                <!-- Sidebar Sticky Ad 160x600 -->


                <!-- Sidebar Ad 300x250 Removed -->

                <!-- Popular Posts Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">🔥 Popular Posts</h3>
                    <ul class="sidebar-post-list">
                        @foreach(getRandomPosts(10) as $popularPost)
                            <li class="sidebar-post-item">
                                <a href="{{ ($popularPost->slug) }}" class="sidebar-post-link"
                                    title="{{ $popularPost->keyword }}">
                                    {{ Str::limit($popularPost->keyword, 70) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sticky Sidebar Ad 2 Removed -->

                <!-- Recent Posts Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">📝 Recent Posts</h3>
                    <ul class="sidebar-post-list">
                        @foreach(getRandomPosts(10) as $recentPost)
                            <li class="sidebar-post-item">
                                <a href="{{ ($recentPost->slug) }}" class="sidebar-post-link"
                                    title="{{ $recentPost->keyword }}">
                                    {{ Str::limit($recentPost->keyword, 70) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Middle Sidebar Ad Removed -->

                <!-- Bottom Sidebar Ad Removed -->
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <span>&copy; {{ date('Y') }} {{ option('site_name') }}</span>
        <span>&nbsp;·&nbsp;</span>
        <span>Powered by WordPress</span>
        <p>Disclaimer: {{ $disclaimer }}</p>
    </footer>

    <!-- Top Link -->
    <a href="#top" aria-label="go to top" title="Go to Top (Alt + G)" class="top-link" id="top-link" accesskey="g">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6" fill="currentColor">
            <path d="M12 6H0l6-6z" />
        </svg>
    </a>
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4829879,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4829879&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
    <!-- Main Scripts -->
    <script>
        // Lightbox Functions
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            lightboxImg.src = src;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Event Listeners
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
        });

        document.getElementById('lightbox')?.addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') closeLightbox();
        });

        // Top link visibility
        var mybutton = document.getElementById("top-link");
        window.onscroll = function () {
            if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
                mybutton.style.visibility = "visible";
                mybutton.style.opacity = "1";
            } else {
                mybutton.style.visibility = "hidden";
                mybutton.style.opacity = "0";
            }
        };

        // Theme toggle
        document.getElementById("theme-toggle").addEventListener("click", () => {
            const html = document.querySelector("html");
            if (html.dataset.theme === "dark") {
                html.dataset.theme = 'light';
                localStorage.setItem("pref-theme", 'light');
            } else {
                html.dataset.theme = 'dark';
                localStorage.setItem("pref-theme", 'dark');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                var id = this.getAttribute("href").substr(1);
                if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    document.querySelector(`[id='${decodeURIComponent(id)}']`)?.scrollIntoView({
                        behavior: "smooth"
                    });
                } else {
                    document.querySelector(`[id='${decodeURIComponent(id)}']`)?.scrollIntoView();
                }
                if (id === "top") {
                    history.replaceState(null, null, " ");
                } else {
                    history.pushState(null, null, `#${id}`);
                }
            });
        });

        // Lazy Loading dengan interseksi observer
        document.addEventListener('DOMContentLoaded', function () {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.classList.add('loaded');
                            observer.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => observer.observe(img));
            }
        });
    </script>


</body>

</html>
