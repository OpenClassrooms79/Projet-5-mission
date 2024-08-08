CREATE VIEW articleView AS
SELECT a.id, a.id_user, a.title, a.content, a.views, a.date_creation, a.date_update, SUM(NOT(ISNULL(c.id))) AS commentsCount
FROM article a
LEFT JOIN comment c ON a.id = c.id_article
GROUP BY a.id, a.id_user, a.title, a.content, a.views, a.date_creation, a.date_update;