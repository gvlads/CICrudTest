<?php
$this->load->view('templates/header');
?>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php print site_url();?>item/add" class="pull-right btn btn-primary btn-xs" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Add Item</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th width="60%">Item Name</th>
                        <th width="15%">Created at</th>
                        <th width="15%">Updated At</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($items as $item) { ?>
                        <tr>
                            <td><?php echo $item['item_name']; ?></td>
                            <td><?php echo unix_to_human($item['created_at']); ?></td>
                            <td><?php echo unix_to_human($item['updated_at']); ?></td>
                            <td>
                                <a title="Edit" href="<?php echo site_url();?>item/edit/<?php echo $item['item_id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
                                <a title="Delete" href="<?php echo site_url();?>item/delete/<?php echo $item['item_id'];?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php
$this->load->view('templates/footer');
?>