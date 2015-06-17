<div class="tab-pane" id="tab2">
  <div class="row">
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
      <div class="btn-group-vertical">
        <a href="#basic" class="btn btn-default btn-block" data-toggle="tab">Basic</a>
        <a href="#details" class="btn btn-default btn-block" data-toggle="tab">Details</a>
        <a href="#photo" class="btn btn-default btn-block" data-toggle="tab">Photo</a>
      </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
      <div class="tab-content">
        <div class="tab-pane active" id="basic">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="inputfullname" class="col-lg-2 control-label">First Name</label>
              <div class="col-lg-10">
                <input type="email" class="form-control" id="inputfullname" placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputlastname" class="col-lg-2 control-label">Last Name</label>
              <div class="col-lg-10">
                <input type="email" class="form-control" id="inputlastname" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputemail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="email" class="form-control" id="inputemail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputpassword" class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="inputpassword" placeholder="Password">
                <input type="password" class="form-control together" id="inputpassword2" placeholder="Password Again">
              </div>
            </div>
            <div class="form-group">
              <label for="textarea" class="col-lg-2 control-label">About Me</label>
              <div class="col-lg-10">
                <ul class="wysihtml5-toolbar"><li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-font"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a><ul class="dropdown-menu"><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" href="javascript:;" unselectable="on">Heading 4</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" href="javascript:;" unselectable="on">Heading 5</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" href="javascript:;" unselectable="on">Heading 6</a></li></ul></li><li><div class="btn-group"><a class="btn btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a><a class="btn btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a><a class="btn btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a></div></li><li><div class="btn-group"><a class="btn btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-list"></i></a><a class="btn btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a><a class="btn btn-default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a><a class="btn btn-default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a></div></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert link</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control"><ul class="list"><li><p class="text-right"><span class="text-muted pull-left listlabel">Open link in new window</span><input type="checkbox" class="bootstrap-wysihtml5-insert-link-target themecheck" checked=""></p><ul></ul></li></ul></div><div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert link</a></div></div></div></div><a class="btn btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-share"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert image</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control"></div><div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert image</a></div></div></div></div><a class="btn btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-picture-o"></i></a></li></ul><textarea id="textarea" class="form-control" rows="8" placeholder="Enter text ..." style="display: none;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="border-collapse: separate; border: 1px solid rgb(204, 204, 204); clear: none; display: block; float: none; margin: 0px; outline: rgb(85, 85, 85) none 0px; outline-offset: 0px; padding: 10px; position: relative; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; -webkit-box-shadow: none; box-shadow: none; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-left-radius: 0px; width: 100%; height: auto; background-color: rgb(255, 255, 255);"></iframe>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="details">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label for="inputAddressline1" class="col-lg-2 control-label">Address Line 1</label>
                                                            <div class="col-lg-10">
                                                                <input type="email" class="form-control" id="inputAddressline1" placeholder="First Name">
                                                                <p class="help-block">
                                                                    Street address, P.O. box, company name, c/o
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddressline2" class="col-lg-2 control-label">Address Line 2</label>
                                                            <div class="col-lg-10">
                                                                <input type="email" class="form-control" id="inputAddressline2" placeholder="First Name">
                                                                <p class="help-block">
                                                                    Apartment, suite , unit, building, floor, etc.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">City / Town</label>
                                                            <div class="col-lg-10">
                                                                <input id="city" name="city" type="text" placeholder="city" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">State / Province / Region</label>
                                                            <div class="col-lg-10">
                                                                <input id="region" name="region" type="text" placeholder="state / province / region" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Zip / Postal Code</label>
                                                            <div class="col-lg-10">
                                                                <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Country</label>
                                                            <div class="col-lg-10">
                                                                <div class="select2-container selectpicker" id="s2id_country"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">(please select a country)</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select id="country" name="country" class="selectpicker select2-offscreen" tabindex="-1">
                                                                    <option value="" selected="selected">(please select a country)</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="photo">
                                                    <p class="text-muted">
                                                        <small>This won't atually upload anything, but you will still be able to see the process</small>
                                                    </p>
                                                    <form action="assets/dropzone/test.php" class="dropzone dz-clickable">
                                                        
                                                    <div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
                                                    <div class="form-group">
                                                        <input type="file" class="filestyle" data-classbutton="btn btn-default btn-lg" data-input="false" id="filestyle-0" tabindex="-1" style="position: fixed; left: -500px;"><div class="bootstrap-filestyle input-group"><input type="text" class="form-control " disabled="" placeholder="Choose file"> <span class="input-group-btn" tabindex="0">  <label for="filestyle-0" class="btn btn-default btn-lg">	<span class="glyphicon glyphicon-folder-open"></span>   </label></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
