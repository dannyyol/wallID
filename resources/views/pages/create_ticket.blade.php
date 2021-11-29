@extends('layouts.app')

@section('content')
	<div>
	 	<div class="inner-page-header section-padding style-dark mb-5">
		    <div class="container">
		        <div class="page-title-inner text-center clearfix">
		          <div class="heading-wrapper">
		            <h1 class="text-white">Create Ticket</h1>
		            <div class="lead-text d-none">
		              <p class="fw-light text-white">
		                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem fuga earum voluptatibus
		              </p>
		            </div>
		          </div>
		        </div>
		    </div>
		</div>

		<div class="container py-5">
			<div class="col-md-7 mx-auto">
				<form id="ticketForm" method="POST" action="/api/create-ticket">
					<div class="form-group mb-4">
						<label>Name</label>
						<input type="text" name="name" placeholder="Name" class="form-control form-control-lg">
					</div>

					<div class="form-group mb-4">
						<label>Deadline</label>
						<input type="date" name="deadline" placeholder="Deadline Date" class="form-control form-control-lg">
					</div>

					<div class="form-group mb-4">
						<label>Description</label>
						<textarea rows="5" class="form-control form-control-lg" placeholder="Description" name="description"></textarea>
					</div>

					<button class="btn btn-primary px-5 btn-lg">Create Ticket</button>
				</form>
			</div>
		</div>
	 </div>
@endsection