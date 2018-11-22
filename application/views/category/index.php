<?php
$this->load->view('templates/header');
?>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php print site_url();?>category/add" class="pull-right btn btn-primary btn-xs" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Add Category</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th width="60%">Category Name</th>
                        <th width="15%">Created at</th>
                        <th width="15%">Updated At</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categories as $category) { ?>
                        <tr>
                            <td><?php echo $category['category_name']; ?></td>
                            <td><?php echo $category['created_at']?unix_to_human($category['created_at']):''; ?></td>
                            <td><?php echo $category['updated_at']?unix_to_human($category['updated_at']):''; ?></td>
                            <td>
                                <a title="Edit" href="<?php echo site_url();?>category/edit/<?php echo $category['category_id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
                                <a title="Delete" href="<?php echo site_url();?>category/delete/<?php echo $category['category_id'];?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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