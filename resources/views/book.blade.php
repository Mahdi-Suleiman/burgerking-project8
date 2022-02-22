@extends('layouts.app')
@section('content')

<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Book A Table</h2>
            </div>
            <div class="col-12">
                <a href="{{ url('/') }}">Home</a>
                <a href="">Booking</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Booking Start -->
<div class="booking">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="booking-content">
                    <div class="section-header">
                        <p>Book A Table</p>
                        <h2>Book Your Table For Private Dinners & Happy Hours</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            reserve you table anytime and from any device. it is easy to use and reservations are instantly confirmed in real-time. Your next table reservation is a click away!
                        </p>
                        <p>

Saturday - Friday </p>
<p>

12 :00 PM - 12:00 AM</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="booking-form">
                    @if (session()->has('success'))
                    <div  style="width: 100%" class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <p class="updated">{!! session()->get('success') !!}</p></div>
                        @endif

                    <form  method="post" action="{{route('book.store') }}"
                        >
                        @csrf


                        {{-- <div class="control-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" required="required" name="name"  />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="far fa-user"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="control-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Table Number" required="required" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="control-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Mobile"  name="mobile_number"required="required" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="input-group date" id="date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Date" name="date" data-target="#date" data-toggle="datetimepicker"/>
                                <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="input-group time" id="time" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Time" name="time" data-target="#time" data-toggle="datetimepicker"/>
                                <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="input-group">
                                <select  style="
                                background-color: #fbaf32;"class="custom-select form-control" name="guest_number">
                                    <option selected>Guest</option>
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guest</option>
                                    <option value="3">3 Guest</option>
                                    <option value="4">4 Guest</option>
                                    <option value="5">5 Guest</option>
                                    <option value="6">6 Guest</option>
                                    <option value="7">7 Guest</option>
                                    <option value="8">8 Guest</option>
                                    <option value="9">9 Guest</option>
                                    <option value="10">10 Guest</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="input-group">
                                <select style="
                                background-color: #fbaf32;" class="custom-select form-control" name="number">
                                    <option selected>Table number</option>
                                    @foreach($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->number }} </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">

                            <textarea  rows="3" class="form-control" id="message" name="note" placeholder="write you order here if you want it to prepared in advance "  data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <script> function error(){
                                alert("you must login befor booking")
                            }</script>
                            @if(!Auth::check())
                            <button  onclick="error()" class="btn custom-btn" type="submit">Book Now</button>
                            @else
                            <button class="btn custom-btn" type="submit">Book Now</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->


<!-- Menu Start -->
<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Menu</p>
            <h2>Delicious Food Menu</h2>
        </div>
        <div class="menu-tab">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#burgers">Burgers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#snacks">Snacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#beverages">Beverages</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="burgers" class="container tab-pane active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/p1.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Mini cheese Burger</span> <strong>JD3.00</strong></h3>
                                    <p style="margin:14.4px 5px 0 0">60 g Beef Patty, Cheddar Cheese, Lettuce, Pickles. this meal is best choies for kids</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/p2.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Double size burger</span> <strong>JD5.00</strong></h3>
                                    <p>180 g Of Fresh Beef Patty , Cheddar Cheese, Tomato, lettuce, Pickles, Onion & our Beef Sauce.</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/p3.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Bacon, EGG and Cheese</span> <strong>JD6.00</strong></h3>
                                    <p>A Slice of Beef Bacon, egg, Smoked Cheese, Makers Sauce, Fresh Tomato , Lettuce and our Sauce</p></div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/p4.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Mushroom Burger</span> <strong>JD7.00</strong></h3>
                                    <p>Brown Mushroom Sauce With Steak, Swiss Cheese & Makers Sauce.</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/p5.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Swedish Chicken Burger</span> <strong>JD8.00</strong></h3>
                                    <p>BBQ Sauce, Mozzarella Cheese, Lettuce, Tomato, & Chicken Makers Sauce.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-burger-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="snacks" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/s1.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Spicy Tuna Poke</span> <strong>JD5.00</strong></h3>
                                    <p>Tuna fish, organic quinoa, chili, onions, leafy greens and soy sauce,.</p>

                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/s3.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Shrimp Poke</span> <strong>JD8.00</strong></h3>
                                    <p>Shrimp, black rice, green beans, carrots, scallions, red cabbage, cucumber, Served with scallion, lemon and soy sauce.</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/s2.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Asian Monk</span> <strong>JD7.00</strong></h3>
                                    <p>SPurslane, edamame, red cabbage, green chili, chicken breast, cashew, sesame seeds, peanut dressing </p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/s5.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Fajita Bowl</span> <strong>JD8.00</strong></h3>
                                    <p>Organic quinoa, avocado, chicken, lettuce, rocca cherry tomatoes, onion, cashew, parsley, bell pepper, parmesan, served with tomato salsa, sour cream </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-snack-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="beverages" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/d1.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Soft Drink</span> <strong>JD0.5</strong></h3>

                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/d2.jpg"alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caffe Americano</span> <strong>JD2.00</strong></h3>

                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/d3.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caramel Macchiato</span> <strong>JD4.00</strong></h3>

                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/d4.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Standard coffee</span> <strong>JD2.00</strong></h3>

                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/w.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>water</span> <strong>JD2.00</strong></h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-beverage-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
@endsection
