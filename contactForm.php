<div id="contactForm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" style="color:red;"></button>
                <h3 class="modal-title">Need help? Contact Us!</h3>
            </div>

            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                      </div>
                      <br/>
                      <br/>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                      </div>
                      <br/>
                      <br/>
                      <div class="form-group">
                        <div class="input-group">
                          <textarea name="InputMessage" id="InputMessage" class="form-control" placeholder="Your Message" rows="5" required></textarea>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                      </div>
                </form>
            </div>

            <div class="modal-footer">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
                <button class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>