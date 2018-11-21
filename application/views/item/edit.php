
<?php
$this->load->view('templates/header');
?>

<div class="edit-item">

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

                    <form action="<?php echo site_url();?>item/save" method="POST" class="edit-item" id="edit-item">

                        <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id']; ?>">

                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="item_name">
                                    Item Name
                                    <span class="required" aria-required="true">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="item_name" value="<?php echo set_value('item_name', $item['item_name']); ?>">
                                    <div class="form-control-focus"> </div>
                                    <?php echo form_error('item_name'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-4" align="left">
                                    <a href="<?php echo site_url('item/index');?>">
                                        <button type="button" class="btn default">Cancel</button>
                                    </a>
                                    <button type="submit" name="edit_item" id="submit-category" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
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