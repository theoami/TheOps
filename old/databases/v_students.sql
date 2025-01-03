CREATE VIEW v_students AS
SELECT
    `users`.`id` AS `user_id`,
    `users`.`givenname` AS `givenname`,
    `users`.`surname` AS `surname`,
    `user_titles`.`abbreviation` AS `title_abbreviation`
FROM
    (
        `users`
    JOIN `user_titles` ON
        (
            (
                `users`.`title_id` = `user_titles`.`id`
            )
        )
    )
WHERE
    (`users`.`type_id` = 1)
ORDER BY
    `users`.`givenname`