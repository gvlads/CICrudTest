<select multiple="multiple" id="category_items" name="category_items[]">
    <?php
    if(isset($all_items) and count($all_items)>0) {
        foreach ($all_items as $item) {
            ?>
            <option value="<?php echo $item['item_id']; ?>"> <?php echo $item['item_name']; ?> </option>
            <?php
        }
    }
    ?>
</select>