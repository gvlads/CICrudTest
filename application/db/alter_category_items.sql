ALTER TABLE `testCI`.`category_items`
ADD INDEX `fk_category_items_1_idx` (`category_id` ASC);
ALTER TABLE `testCI`.`category_items`
ADD CONSTRAINT `fk_category_items_1`
  FOREIGN KEY (`category_id`)
  REFERENCES `testCI`.`categories` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `testCI`.`category_items`
ADD INDEX `fk_category_items_2_idx` (`item_id` ASC);
ALTER TABLE `testCI`.`category_items`
ADD CONSTRAINT `fk_category_items_2`
  FOREIGN KEY (`item_id`)
  REFERENCES `testCI`.`items` (`id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;