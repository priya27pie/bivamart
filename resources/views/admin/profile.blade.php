@extends('admin.layouts.main')
@section('middle')
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<h4 class="page-title">User Profile</h4>
					<div class="row">
						<div class="col-md-9">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row">
										<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
											<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Timeline</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Settings</a>
										</li>							</ul>
									
			<form method="post" enctype="multipart/form-data" action="{{route('submit.addprofiledata'}}"  class="form-horizontal">
        {{csrf_field()}}
			<div class="tab-content mb-3" id="pills-tabContent">
			<div class="card-body tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Company Name</label>
        <input type="text" class="form-control" name="company_name" value="" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Company Title</label>
        <input type="text" class="form-control" name="title" value="" />
					</div>
				</div> 
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>GSTIN</label>
        <input type="text" class="form-control" name="gst" value="" />
					</div>
				</div> 
					<div class="col-sm-4">
       					<div class="form-group form-group-default">
 <label>Company website</label>
        <input type="text" class="form-control" name="website" value="" />
    </div>  
	</div>
    <div class="col-sm-4">
       					<div class="form-group form-group-default">
 <label>Company State</label>
       
    </div>
	</div>
     <div class="col-sm-4">
     <div class="form-group form-group-default">
  <label>Company City</label>
        <input type="text" class="form-control" name="city" value="" />
    </div> 
	</div>
     <div class="col-sm-4">
   					<div class="form-group form-group-default">
     <label>Company Pincode</label>
	 
        <input type="text" class="form-control" name="pincode" value="" />
    </div> </div>
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>Address</label>
        <input type="text" class="form-control" name="address" value="" />
					</div>
				</div>
				
			</div>
			
			

		
		</div>
			<div class=" card-body tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<div class="row mt-3">
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Contact Person</label>
        <input type="text" class="form-control" name="contact_person" value="" />
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Company Phone</label>
			<input type="text" class="form-control" name="phone" value="" />
			</div>
			</div> 
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Company Email</label>
			<input type="text" class="form-control" name="email" value="" />
			</div>
			</div>	
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Company Watsapp</label>
            <input type="text" class="form-control" name="watsapp" value="" />
			</div>
			</div>	
			</div>	
			</div>

		
			<div class="card-body  tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
			<div class="row mt-3">
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Company Logo</label>

			<span class="note">Max File size:30kb.(350*150px)</span>
			<input type="file" name="logo" onchange="return fileValidation('logo','1000')" id="logo"/>
			<img src="" width="100px">					</div>
			</div>
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Company Favicon</label>        
			<span class="note">Max File size:50kb.(20*20px)</span>

			<input type="file" name="favicon" onchange="return fileValidation('favicon','200')" id="favicon"/>
			<img src="" width="50px">
			</div>
			</div> 
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>FaceBook Link</label>
			<input type="text" class="form-control" name="fb" value="" />
			</div>
			</div>	
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Instagram Link</label>
			<input type="text" class="form-control" name="insta" value="" />		
			</div>
			</div>	
			<div class="col-md-6">
			<div class="form-group form-group-default">
			<label>Linkdin Link</label>
			<input type="text" class="form-control" name="linkdin" value="" />		
			</div>
			</div>

			</div>	

			</div>
			<div class="text-right mt-3 mb-3">
        <input type="submit" name="sub" value="Submit" class="btn btn-info" />
			</div>
		</div>
		</form>
		

		</div>
								</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

	
@endsection