@extends('layouts.app')

@section('content')
	<div>
	 	<div class="inner-page-header section-padding style-dark mb-5">
		    <div class="container">
		        <div class="page-title-inner text-center clearfix">
		          <div class="heading-wrapper">
		            <h1 class="text-white">Pricing</h1>
		            <div class="lead-text">
		              <p class="fw-light text-white">
		                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem fuga earum voluptatibus
		              </p>
		            </div>
		          </div>
		          <!-- End Heading -->
		          <ul class="st-breadcrumb mt-5">
		            <li><a href="index.html">Home</a></li>
		            <li class="active"><span>Pricing</span></li>
		          </ul>
		          <!-- End Breadcrumb -->
		        </div>
		        <!-- Page Title Inner -->
		    </div>
		</div>

		<section class="pricing-area section--padding">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="pricing-content padding-bottom-50px">
	                        <div class="section-content text-center">
	                            <h2 class="fw-bold mb-5">Choose Your Best One</h2>
	                            <div class="line-shape mx-auto"></div>
	                        </div>
	                    </div>
	                </div><!-- end col-lg-12 -->
	            </div><!-- end row -->

	            <ul class="switch-toggle-list d-flex align-items-center justify-content-center mb-5" id="switch-toggle">
	                <li class="month active"><a href="#">Monthly</a></li>
	                <li>
	                    <label class="switcher on">
	                        <span class="switcher-slider"></span>
	                    </label>
	                </li>
	                <li class="year"><a href="#">Yearly</a></li>
	            </ul>

	            <div class="pricing-tab-content padding-top-30px">
	                <div id="month">
	                    <div class="row">

	                        <div class="col-lg-4">
	                            <div class="card pricing-card">
	                                <h2 class="card-title">Free</h2>
	                                <h3 class="card-price">$0<span>/Month</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                   <button class="btn theme-btn pl-3 py-2 btn-plan">Choose Plan</button>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-lg-4">
	                            <div class="card pricing-card has-border">
	                                <h2 class="card-title">Standard</h2>
	                                <h3 class="card-price">$149<span>/Month</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                    <button class="btn theme-btn pl-3 py-2">Choose Plan</button>
	                                 </div>
	                            </div>
	                        </div>

	                        <div class="col-lg-4">
	                            <div class="card pricing-card">
	                                <h2 class="card-title">Premium</h2>
	                                <h3 class="card-price">$199<span>/Month</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                    <button class="btn theme-btn pl-3 py-2">Choose Plan</button>
	                                 </div>
	                            </div>
	                        </div>

	                    </div>
	                </div>

	                <div id="year">
	                    <div class="row">

	                        <div class="col-lg-4">
	                            <div class="card pricing-card">
	                                <h2 class="card-title">Basic</h2>
	                                <h3 class="card-price">$149<span>/Yearly</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                    <button class="btn theme-btn pl-3 py-2">Choose Plan</button>
	                                 </div>
	                            </div>
	                        </div>

	                        <div class="col-lg-4">
	                            <div class="card pricing-card has-border">
	                                <h2 class="card-title">Standard</h2>
	                                <h3 class="card-price">$249<span>/Yearly</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                    <button class="btn theme-btn pl-3 py-2">Choose Plan</button>
	                                 </div>
	                            </div>
	                        </div>

	                        <div class="col-lg-4">
	                            <div class="card pricing-card">
	                                <h2 class="card-title">Unlimited</h2>
	                                <h3 class="card-price">$399<span>/Yearly</span></h3>
	                                <hr class="divider">
	                                <ul class="list-items list-items-flash pb-4">
	                                    <li>Push Notifications</li>
	                                    <li>Data Transfer</li>
	                                    <li>SQL Database</li>
	                                    <li>Search & SEO Analytics</li>
	                                    <li>24/7 Phone Support</li>
	                                    <li>2 months technical support</li>
	                                    <li>2+ profitable keyword</li>
	                                </ul>
	                                <div class="btn-box">
	                                    <button class="btn theme-btn pl-3 py-2">Choose Plan</button>
	                                 </div>
	                            </div>
	                        </div>
	    
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	 </div>
@endsection