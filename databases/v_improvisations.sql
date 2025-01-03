CREATE VIEW v_improvisations AS
SELECT
    `exercises`.`exercise_name` AS `exercise_name`,
    `exercises`.`description` AS `description`
FROM
    `exercises`
WHERE
    (
        `exercises`.`types_of_exercise_id` = 2
    )