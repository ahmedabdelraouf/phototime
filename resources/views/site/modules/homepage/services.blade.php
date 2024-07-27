<div id="services" class="my-5">
    <div class="row mx-0 px-lg-5 justify-content-evenly">
        <div class="col-md-1"></div>
        <div class="col-md-5 col-sm-12 order-lg-2 order-md-2 text-section">
            <div class="head">
                <h2 class="head-title">{{ $settings->site_services_title_ar ?? '' }}</h2>
                <p class="head-des">{{ $settings->site_services_desc_ar ?? '' }}</p>
                <br>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="all-card">
                @foreach($allCategories as $category)
                    <div class="category-col">
                        <div class="card category-card">
                            @if(empty($category['is_more']))
                                <img src="{{ images_path($category['image']) }}" class="img-fluid"/>
                            @else
                                <a style="padding-top: 10px" href="{{ route('site.categories') }}">
                                    <img src="{{ asset('resources/site/images/moresvg.svg') }}" class="img-fluid"/>
                                </a>
                            @endif
                            <p>{{ $category['title'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    #services .text-section {
        order: 4;
    }

    #services .all-card {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Auto-adjusting columns */
        gap: 20px; /* Adjust gap between items */
    }

    #services .category-col {
        display: flex;
        justify-content: center;
    }

    #services .category-card {
        width: 100%;
        max-width: 150px; /* Adjust card width as needed */
        height: 200px; /* Fixed height */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        border: 1px solid #ccc; /* Add a border for visual clarity */
        padding: 10px; /* Add padding inside the card */
    }

    #services .category-card img {
        max-width: 100%;
        max-height: 100px; /* Adjust image height as needed */
        object-fit: contain;
    }

    #services .category-card p {
        margin-top: 10px;
        font-size: 1rem; /* Adjust font size as needed */
    }

    @media (max-width: 768px) {
        #services .text-section {
            order: 1;
            text-align: center;
        }

        #services .all-card {
            margin-top: 20px;
            grid-template-columns: repeat(2, 1fr); /* Ensures at least 2 per row on mobile */
        }
    }

    @media (min-width: 769px) {
        #services .text-section {
            text-align: right;
        }

        #services .all-card {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Auto-adjusting columns */
        }
    }

    @media (min-width: 992px) {
        #services .all-card {
            grid-template-columns: repeat(3, 1fr); /* Ensures at least 3 per row on larger screens */
        }
    }

    @media (min-width: 1200px) {
        #services .all-card {
            grid-template-columns: repeat(4, 1fr); /* Ensures at least 4 per row on extra-large screens */
        }
    }
</style>
