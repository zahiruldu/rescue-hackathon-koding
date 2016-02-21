SELECT `users`.`id`,
    `users`.`first_name`,
    `users`.`last_name`,
    `users`.`email`,
    `users`.`mobile`,
    `users`.`longitude`,
    `users`.`latitude`,
    `users`.`password`,
    `users`.`user_ip`,
    `users`.`created_at`,
    `users`.`updated_at`
FROM `rescue`.`users`;
