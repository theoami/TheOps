CREATE VIEW v_warmsup AS
SELECT
    `exercises`.`exercise_name` AS `exercise_name`,
    `exercises`.`description` AS `description`
FROM
    `exercises`
WHERE
    (
        `exercises`.`types_of_exercise_id` = 1
    )