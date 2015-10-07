<?php
/**
 * Created by PhpStorm.
 * User: Abu Isaac
 * Date: 7/14/15
 * Time: 9:58 PM
 */
?>
@extends('restaurant_template')

@section('restaurant_info_header')

    @foreach($data['restaurant'] as $r)
        <div class="restaurants_info_row_one">
            <div class="rest_info_column_one col-md-6">
                <h1 itemprop="name">{{ $r->name }}</h1>
                <p><strong>
                        {{ $r->address_1.', '.$r->address_2}}<br>
                        {{ $r->city->city.', '.$r->state->state.', '.$r->zip }}
                    </strong>
                </p>
                <p>{{ $r->phone }} {{ $r->website }}</p>
            </div>

            <div class="rest_info_column_three col-md-6">
                <div class="restaurant_quicklinks">
                    <ul class="restaurant_quicklinks_main">
                        <li>
                            <a href="#">Write A Review</a>
                        </li>
                        <li>
                            <a href="#">Upload Images</a>
                        </li>
                        <li>
                            <a href="#">Invite</a>
                        </li>
                        <li>
                            <a href="#">Share</a>
                        </li>
                    </ul>
                    <ul class="restaurant_quicklinks_sec">
                        <li>
                            <a href="#">Request Online Ordering</a>
                        </li>
                        <li>
                            <p><strong>10</strong> People Requested Online Ordering</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="restaurants_info_row_two">
            <div class="rest_info_column_one col-md-4" style="padding-left:0px;">
                <div class="rest_address_info">
                    <div class="restaurant_directions">
                        <img alt="Map" src="http://maps.google.com/maps/api/staticmap?scale=2&amp;center=33.490310%2C-111.926450&amp;language=en&amp;zoom=15&amp;markers=scale%3A2%7Cshadow%3Afalse%7Cicon%3Ahttp%3A%2F%2Fyelp-images.s3.amazonaws.com%2Fassets%2Fmap-markers%2Fannotation_64x86.png%7C33.490310%2C-111.926450&amp;client=gme-yelp&amp;sensor=false&amp;size=286x135&amp;signature=UqHUGvCA_PyMwxJNTPJssFuPs1E=" height="135" width="100%">
                    </div>
                    <div class="clearfix" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" style="margin-bottom:25px;">
                        <div class="rating-large floatLeft" style="margin-left:10px;">
                            <!--<i class="star-img stars_3_half" title="3.5 star rating">
                                <img alt="3.5 star rating" class="offscreen" src="" height="303" width="84">
                            </i>-->
                            <img src="../assets/images/rating.png" alt="4" />
                            <meta itemprop="ratingValue" content="4">
                        </div>
                            <span class="review-count rating-qualifier" style="float:right;margin-right:10px;">
                                <span itemprop="reviewCount" style="font-family:roboto-regular;font-weight:normal;">123 reviews</span>
                            </span>
                    </div>
                    <br/>
                    &nbsp;&nbsp;<span class="item-cuisine-type">{{ $r->categories }}</span>

                </div>
            </div>
            <div class="rest_info_column_two col-md-8">
                <div class="restaurants_images">
                    <img src="{{ $r->img_one }}" width="30%" />
                    <img src="{{ $r->img_two }}" width="30%" />
                    <img src="{{ $r->img_three }}" width="30%" />
                </div>
            </div>
        </div>
    @endforeach
@endsection



@section('recent_review_section')
<div class="rest_review_section col-md-9" style="background-color:#ffffff;">
    <div style="width:95%;">
        <img src="../assets/img/graph.jpg" alt="" width="100%" />
    </div>
    <h2>Recent Reviews about {{ $data['restaurant'][0]['name']}}</h2>
    @foreach($data['restaurant'] as $rr)
        @if(count($rr->restaurant_reviews)==0)
            <p style="color:#2ECC71;padding-left:15px;"><em>Be the first to review this restaurants.</em></p>
        @else
            @foreach($rr->restaurant_reviews as $reviews)


                <div class="rest_review_box">
                    <div class="rest_review_user_info col-md-3">
                        <!--<div class="rest_review_user_image">
                            <img src="http://s3-media3.fl.yelpcdn.com/photo/uFUXBBKt_GBznUgrRR0STQ/60s.jpg" width="100%" />
                        </div>-->
                        <p>
                            <span class="review_author">{{ $reviews->user_name }}</span>
                            <br/>
                            <span class="review_author_loc">{{ $reviews->user_location }}</span>
                            <br/>
                            <!--Reviewed <span class="review_author_highlight">45</span> Restaurants
                            <br/>
                            <span class="review_author_highlight">1234</span> Reviews
                            <br/>
                            <span class="review_author_highlight">4</span> Followers-->
                        </p>

                    </div>
                    <div class="rest_review_info col-md-9">
                        <div class="clearfix" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <div class="rating-large floatLeft">
                                <!--<i class="star-img stars_3_half" title="{{ $rr->rating }} star rating">
                                    <img alt="{{ $rr->rating }} star rating" class="offscreen" src="" height="303" width="84">
                                </i>-->
                                <img src="../assets/images/rating.png" alt="{{ $reviews->rating }}" />
                                <meta itemprop="ratingValue" content="{{ $rr->rating }}">
                            </div>
                            <div style="float:right;height:60px;width:150px;text-align:right;">
                                <?php
                                    if($rr->source == 'yelp')
                                    {
                                    ?>
                                    <a href="{{ $reviews->source_link }}" target="_blank">
                                        <img src="../assets/img/yelp.jpg" alt="" />
                                    </a>
                                    <?php
                                    }
                                if($rr->source == 'tripadvisor')
                                {
                                    ?>
                                    <a href="{{ $reviews->source_link }}" target="_blank">
                                    <img src="../assets/img/tripadvisor.jpg" alt="" />
                                    </a>
                                <?php
                                }
                                if($rr->source == 'urbanspoon')
                                {
                                    ?>
                                    <a href="{{ $reviews->source_link }}" target="_blank">
                                    <img src="../assets/img/zomato.jpg" alt="" />
                                    </a>
                                <?php
                                }
                                if($rr->source == 'rl')
                                {
                                    ?>
                                    <a href="{{ $reviews->source_link }}" target="_blank">
                                    <img src="../assets/img/rl.jpg" alt="" />
                                    </a>
                                <?php
                                }
                                if($rr->source == 'google')
                                {
                                    ?>
                                    <a href="{{ $reviews->source_link }}" target="_blank">
                                    <img src="../assets/img/google.png" alt="" />
                                    </a>
                                <?php
                                }


                                ?>

                            </div>
                        </div>
                        <br/>
                        Reviewed on 7/14/2015 10:10 AM

                        <div class="full_review_text">
                            <p>{{ $reviews->text }}</p>
                        </div>
                        <br/>
                        <div class="review_quicklinks">
                            <ul class="floatRight">
                                <!--<li>
                                    <p>3767 People Thanked for this Review</p>
                                </li>-->
                                <li>
                                    <a href="#">Thank You</a>
                                </li>
                                <li>
                                    <a href="#">Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach
</div>
@endsection

@section('working_hours_section')
<div class="open_close_box">
    <h4>Opening - Close Hours +</h4>
    <p><strong>Today 10.00 Am to 10.00 Pm</strong></p>
</div>
@endsection
@section('specialities_section')
<div class="specialities_box">
    <h4>Specialities</h4>
    <ul>
        <li>Online Ordering</li>
        <li>Accepts Credit Cards</li>
        <li>Take Reservations</li>
        <li>Delivery</li>
    </ul>
</div>
@endsection
@section('other_info_section')
<div class="other_info_box">
    <h4>Other Information</h4>
    <ul>
        <li>
            Parking : <span>Yes</span>
        </li>
        <li>
            Take-Out : <span>Yes</span>
        </li>
        <li>
            Ambience : <span>Trendy</span>
        </li>
        <li>
            Good For Kids : <span>Yes</span>
        </li>
        <li>
            Dogs Allowed : <span>No</span>
        </li>
        <li>
            Wifi : <span>No</span>
        </li>
        <li>
            TV : <span>Yes</span>
        </li>
        <li>
            Caters : <span>Yes</span>
        </li>
    </ul>
</div>
@endsection
@section('also_viewed_restaurant_section')
<div class="also_viewed_box">
    <h4>People Also Visited</h4>
    <div class="also_visited_rest">
        <div class="also_visited_rest_image floatLeft">
            <img src="http://s3-media3.fl.yelpcdn.com/photo/uFUXBBKt_GBznUgrRR0STQ/60s.jpg" width="100%" />
        </div>
        <div class="also_visited_rest_info floatLeft">
            <p>
                <span class="review_author">Restaurant Name</span>
                <br/>
                <span class="review_author_loc">Scottsdale, AZ</span>
                <br/>
                Reviewes: <span class="review_author_highlight">45</span>
                <br/>
                <span>"Very Good Service"</span>
            </p>
        </div>

    </div>
    <div class="also_visited_rest">
        <div class="also_visited_rest_image floatLeft">
            <img src="http://s3-media3.fl.yelpcdn.com/photo/uFUXBBKt_GBznUgrRR0STQ/60s.jpg" width="100%" />
        </div>
        <div class="also_visited_rest_info floatLeft">
            <p>
                <span class="review_author">Restaurant Name</span>
                <br/>
                <span class="review_author_loc">Scottsdale, AZ</span>
                <br/>
                Reviewes: <span class="review_author_highlight">45</span>
                <br/>
                <span>"Very Good Service"</span>
            </p>
        </div>

    </div>
    <div class="also_visited_rest">
        <div class="also_visited_rest_image floatLeft">
            <img src="http://s3-media3.fl.yelpcdn.com/photo/uFUXBBKt_GBznUgrRR0STQ/60s.jpg" width="100%" />
        </div>
        <div class="also_visited_rest_info floatLeft">
            <p>
                <span class="review_author">Restaurant Name</span>
                <br/>
                <span class="review_author_loc">Scottsdale, AZ</span>
                <br/>
                Reviewes: <span class="review_author_highlight">45</span>
                <br/>
                <span>"Very Good Service"</span>
            </p>
        </div>

    </div>
    <div class="also_visited_rest">
        <div class="also_visited_rest_image floatLeft">
            <img src="http://s3-media3.fl.yelpcdn.com/photo/uFUXBBKt_GBznUgrRR0STQ/60s.jpg" width="100%" />
        </div>
        <div class="also_visited_rest_info floatLeft">
            <p>
                <span class="review_author">Restaurant Name</span>
                <br/>
                <span class="review_author_loc">Scottsdale, AZ</span>
                <br/>
                Reviewes: <span class="review_author_highlight">45</span>
                <br/>
                <span>"Very Good Service"</span>
            </p>
        </div>

    </div>
</div>
@endsection

