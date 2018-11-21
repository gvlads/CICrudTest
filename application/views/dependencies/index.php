<?php
$this->load->view('templates/header');
?>

<div class="row">

    <div class="col-md-4">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Categories</span>
                </div>
                <div class="actions">
                    <a id="add_tree_item" class="btn btn-circle btn-icon-only btn-default" href="javascript:;" title="Add item">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a id="delete_tree_item" class="btn btn-circle btn-icon-only btn-default" href="javascript:;" title="Delete item">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a id="refresh_tree" class="btn btn-circle btn-icon-only btn-default" href="javascript:;" title="Refresh tree">
                        <i class="fa fa-refresh"></i>
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="groups_tree">

                </div>
            </div>
        </div>
    </div>

</div>

<?php
$this->load->view('templates/footer');
?>
