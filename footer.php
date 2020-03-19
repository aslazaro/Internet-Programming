    <!----- Start Footer ---->
    <!---footer class="page-footer"---->
    <!-- Footer -->
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCr96PEZ8ApmI0lrCz1wFY131q9sLfUpy4'></script>
    <script src="map.js"></script>
    
    <footer class="page-footer font-small stylish-color-dark pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h5 class="font-weight-bold mt-3 mb-1">SUPERCarRent</h5>
                    <p>For more information about our website, check the following links. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-1">Products</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">What's New?</a>
                        </li>
                        <li>
                            <a href="#!">Best Sellers</a>
                        </li>
                        <li>
                            <a href="#!">Old Designs</a>
                        </li>
                        <li>
                            <a href="#!">Customize</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-1">Useful Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Your Account</a>
                        </li>
                        <li>
                            <a href="#!">Check Status Delivery</a>
                        </li>
                        <li>
                            <a href="#!">Get Notifications</a>
                        </li>
                        <li>
                            <a href="#!">Shipping Rates</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-1">Contact</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">62 Victoria Street West, Level 10, Auckland 1010</a>
                        </li>
                        <li>
                            <a href="#!">info@supercarrent.co.nz</a>
                        </li>
                        <li>
                            <a href="#!">Tel: +6422 489 15 96</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <hr>

        <!-- Call to action -->
        <ul class="list-unstyled list-inline text-center py-0">
            <li class="list-inline-item">
                <h5 class="mb-1">Questions?</h5>
            </li>
            <!---- START modal Contact US ---->
            <li class="list-inline-item">
                <button type="button" class="btn btn-dark modalbutton" data-toggle="modal" data-target="#exampleModal">Contact us</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" style="color:black;" id="exampleModalLabel">Contact Us</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="col-lg-16 mb-8">
                                <div id="googleMap" style="width:450px; height:300px; margin-left:auto; margin-right:auto"></div>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12">
                                        <form role="form" id="frm_feedback" name="frm_feedback" method="post">
                                            <div class="alert alert-success hide"></div>
                                            <br style="clear:both">
                                            <h3 style="margin-bottom: 25px; text-align: center; color:black;">Feedback Form</h3>
                                
                                            <div class="alert alert-danger hide"></div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <input type="number" pattern="[0-9]*"  class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" type="textarea" id="comments" name="comments" placeholder="comments" maxlength="140" rows="7"></textarea>               
                                            </div>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </li>
            <!---- END modal Contact US ---->
        </ul>
        <!-- Call to action -->
        <hr>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-0">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> SUPERCarRent.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
// this is the id of the form
$("#frm_feedback").submit(function(e) {
    var string_msg = '';
 
    $.ajax({
           type: "POST",
           url: "email.php",
           data: $("#frm_feedback").serializeArray(), // serializes the form's elements.
           success: function(data)
           {
              var data  = jQuery.parseJSON(data);
 
              if(data.status) {
                $('.alert-success').toggleClass('hide');
                $('.alert-danger').addClass('hide');
                $('.alert-success').html(data.message);
               //console.log(data); // show response from the php script.
              } else {
                console.log(data);
                $('.alert-danger').toggleClass('hide');
                $('.alert-success').addClass('hide');
                string_msg = data.message.join('<br />');
                console.log(string_msg);
                $('.alert-danger').html(string_msg);
              }
           }
         });
 
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>

    <!-- Footer -->

    <!----- END Footer ---->