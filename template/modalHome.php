<div id="post" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Polls</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissable fade in" id="errorhandle">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>

                </div>
                <form>
                    <div class="form-group">
                        <label for="email">Poll Title</label>
                        <input type="text" class="form-control" id="pollTitle" placeholder="Poll Title" data-placeholder="Poll Title">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="text" class="form-control" id="choicefixed1" placeholder="Choice 1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="text" class="form-control" id="choicefixed2" placeholder="Choice 2">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="newBox">

                    </div>
                    <div class="row">
                        <div id="error"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" id="fieldadd" class="btn btn-success">+ Add</button>
                            <button type="button" id="fieldremove" class="btn btn-danger hidden">X Remove</button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-success" id="formStm">Submit</button>
            </div>
        </div>

    </div>
</div>