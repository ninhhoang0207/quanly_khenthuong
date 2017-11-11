@extends('templates.master')
@section('content')
<div class="breadcrmb-wrap hidden-xs">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a> 
               </li>
               <li class="breadcrumb-item"><a href="#">Search</a> 
               </li>
               <li class="breadcrumb-item active">Submit</li>
            </ol>
         </div>
         <div class="col-sm-6"> <a href="submit.html" class="btn btn-border pull-right">
            Submit coupon
         </a> 
      </div>
   </div>
</div>
</div>
<!--end:Breadcrumbs -->
<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <section class="contact m-t-30">
      <div class="container">
         <div class="row">
            <div class="col-sm-8">
               <div class="widget">
                  <!-- /widget heading -->
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Create a Coupon
                     </h3>
                     <div class="clearfix"></div>
                  </div>
                  <div class="widget-body">
                     <!-- <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> 
                        </button>Please only submit public coupons.<strong> No private / internal coupons allowed.</strong> If in doubt please check with the merchant first. Make sure to type coupons in exactly as they appear wherever you found them as some are case sensitive. If you are entering a printable coupon, please remember to enter a url for the printable coupon..
                     </div> -->
                     @if ($errors->any())
                     @foreach ($errors->all() as $error)
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span> 
                        </button>
                        {{ $error }}
                     </div>
                     @endforeach
                     @endif
                     @if (Session::get('success'))
                     <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span> 
                        </button>
                        {{ Session::get('success') }}
                     </div>
                     @endif
                     @if (Session::get('error'))
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span> 
                        </button>
                        {{ Session::get('error') }}
                     </div>
                     @endif
                     <form method="post" class="m-t-30">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group ">
                              <label class="control-label " for="title">Title
                                    <span class="asteriskField"> *</span> 
                                 </label>
                                 <input class="form-control" id="title" name="title" type="text" required />
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group ">
                                 <label class="control-label requiredField" for="discount">Discount 
                                    <span class="asteriskField">*</span> 
                                 </label>
                                 <input class="form-control" id="discount" name="discount" type="number" max="100" min="0" required/>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group ">
                              <label class="control-label " for="title">Image
                                    <span class="asteriskField"> *</span> 
                                 </label>
                                 <input class="form-control" id="image" name="image" type="file" required />
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group" id="preview" style="display: none">
                                 <img src="" width="373" id="image_preview">
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <label class="control-label requiredField" for="offer_type">Select an Offer Type 
                              <span class="asteriskField">*</span> 
                           </label>
                           <select class="select form-control" id="offer_type" name="offer_type" required>
                              <option value="Coupon">Coupon</option>
                              <option value="In-store Coupon">In-store Coupon</option>
                              <option value="Deal">Deal</option>
                           </select>
                        </div>
                        <div class="form-group ">
                           <label class="control-label requiredField" for="store"> Stores 
                              <span class="asteriskField">*</span> 
                           </label>
                           <select class="select form-control" id="stores" name="stores" required>
                              <?php foreach ($stores as $key => $value): ?>
                                 <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                              <?php endforeach ?>
                           </select>
                        </div>
                        <div class="form-group ">
                           <label class="control-label " for="Description">Discount Description</label>
                           <textarea class="form-control" cols="40" id="description" name="description" rows="10" required></textarea>
                        </div>
                        <!-- Multiple Radios -->
                        <div class="form-group">
                           <div class="radio radio-danger">
                           <input type="radio" name="coupon_type" id="feature" value="feature" checked="checked">
                              <label for="feature">Featured Coupon $10</label>
                           </div>
                           <div class="radio radio-danger">
                              <input type="radio" name="coupon_type" id="free" value="free">
                              <label for="free">Free Coupon</label>
                           </div>
                        </div>
                        <div class="form-group m-t-10">
                           <div>
                              <button class="btn btn-danger btn-lg"  type="submit">Create Coupon</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /col -->
            <div class="col-sm-4">
               <div class="widget">
                  <!-- /widget heading -->
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Submition tips
                     </h3>
                     <div class="clearfix"></div>
                  </div>
                  <div class="widget-body">
                     <ul class="list-check list-unstyled">
                        <li>Use a brief title and description of the item</li>
                        <li>Make sure you post in the correct category</li>
                        <li>Add nice photos to your ad</li>
                        <li>Put a reasonable price</li>
                        <li>Check the item before publish</li>
                     </ul>
                  </div>
               </div>
               <div class="panel">
                  <div class="panel-heading">
                     <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4>
                  </div>
                  <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article">
                     <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                  </div>
               </div>
               <div class="panel">
                  <div class="panel-heading">
                     <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq2" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4>
                  </div>
                  <div class="panel-collapse collapse" id="faq2" aria-expanded="false" role="article">
                     <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                  </div>
               </div>
               <div class="panel">
                  <div class="panel-heading">
                     <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq3" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4>
                  </div>
                  <div class="panel-collapse collapse" id="faq3" aria-expanded="false" role="article">
                     <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                  </div>
               </div>
               <div class="widget">
                  <!-- /widget heading -->
                  <div class="widget-heading">
                     <h3 class="widget-title text-dark">
                        Submition tips
                     </h3>
                     <div class="clearfix"></div>
                  </div>
                  <div class="widget-body">
                     <address>
                        <p class="lead m-b-10">Twitter, Inc.</p>
                        1355 Market Street, Suite 900<br>
                        San Francisco, CA 94103<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                     </address>
                     <address>
                        <p class="lead m-b-10">Full Name</p>
                        <a href="mailto:#">first.last@example.com</a>
                     </address>
                  </div>
               </div>
               <!-- end:Widget -->
            </div>
            <!--/col -->
         </div>
      </div>
   </section>
</form>
@endsection
@push('scripts')
<script type="text/javascript">
   $('#stores').select2({
      placeholder : '-- Select a store --',
   });
</script>
<script type="text/javascript">
   function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#image_preview').attr('src', e.target.result);
            $('#preview').css('display', 'block');
            console.log(e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image").change(function() {
      readURL(this);
   });
</script>
@endpush