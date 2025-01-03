CREATE VIEW v_lessons AS
SELECT
    `lessons`.`id` AS `id`,
    `lessons`.`lesson_date` AS `lesson_date`,
    `workplaces`.`type` AS `workplace_name`,
    `v_teachers`.`givenname` AS `teacher_givenname`,
    `v_teachers`.`surname` AS `teacher_surname`,
    `v_teachers`.`title_abbreviation` AS `teacher_title_abbreviation`,
    `v_students`.`givenname` AS `student_givenname`,
    `v_students`.`surname` AS `student_surname`,
    `v_students`.`title_abbreviation` AS `student_title_abbreviation`,
    `lesson_types`.`type` AS `lesson_type`,
    `lesson_durations`.`duration` AS `duration`,
    `lessons`.`comment` AS `comment`
FROM
    (
        (
            (
                `lessons`
            JOIN `workplaces` ON
                (
                    (
                        `lessons`.`workplace` = `workplaces`.`id`
                    )
                )
            )
        JOIN `v_teachers` ON
            (
                (
                    `lessons`.`teacher` = `v_teachers`.`user_id`
                )
            )
        )
        JOIN `v_students` ON
            (
                (
                    `lessons`.`student` = `v_students`.`user_id`
                )
            )
        JOIN `lesson_types` ON
            (
                (
                    `lessons`.`lesson_type` = `lesson_types`.`id`
                )
            )
        JOIN `lesson_durations` ON
            (
                (
                    `lessons`.`duration` = `lesson_durations`.`id`
                )
            )
    )