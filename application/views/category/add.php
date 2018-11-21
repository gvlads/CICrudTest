
<?php
$this->load->view('templates/header');
?>

<div class="add-category">

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(validation_errors()) { ?>
                                <div class="alert alert-danger">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <form action="<?php echo site_url();?>category/save" method="POST" class="add-category" id="add-category">

                        <input type="hidden" class="form-control" id="category_id" name="category_id" value="">

                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="category_name">
                                    Category Name
                                    <span class="required" aria-required="true">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="category_name" value="">
                                    <div class="form-control-focus"> </div>
                                    <?php echo form_error('category_name'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-4" align="left">
                                    <a href="<?php echo site_url('category/index');?>">
                                        <button type="button" class="btn default">Cancel</button>
                                    </a>
                                    <button type="submit" name="edit_category" id="submit-category" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('templates/footer');
?>