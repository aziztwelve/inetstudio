

-- 5. В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT), 
--    таблица с тегами tags (id INTEGER, name TEXT) и таблица связи товаров и 
--    тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)). 
--    Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.

SELECT
    goods.id,
    goods.name
FROM
    goods
INNER JOIN goods_tags ON goods.id = goods_tags.goods_id






-- 6. Выбрать без join-ов и подзапросов все департаменты, 
--    в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
SELECT
    departments.*
FROM
    departments,
    evaluations
WHERE
    evaluations.department_id = departments.id AND evaluations.gender = TRUE AND evaluations.value > 5