-- SQLite
-- SELECT 
--     name
-- FROM 
--     sqlite_schema
-- WHERE 
--     type ='table' AND 
--     name NOT LIKE 'sqlite_%';

-- DELETE from positions;
-- DELETE from educations;
-- DELETE from institutions;

INSERT into positions(id, name_tg, name_ru, name_en) VALUES
    (1,'Пажуҳишгар', 'Исследователь', 'Researcher'),
    (2,'Ходими хурди илмӣ', 'Младший научный сотрудник', 'Junior Research Fellow'),
    (3,'Ходими илмӣ', 'Научный сотрудник', 'Research Fellow'),
    (4,'Ходими калони илмӣ', 'Старший научный сотрудник', 'Senior Research Fellow'),
    (5,'Ходими пешбари илмӣ', 'Ведущий научный сотрудник', 'Leading Researcher'),
    (6,'Сарходими илмӣ', 'Главный научный сотрудник', 'Chief Researcher');

INSERT into educations(id, name_tg, name_ru, name_en) VALUES
    (1,'Миёна', 'Среднее', 'Secondary'),
    (2,'Миёнаи касбӣ', 'Среднее профессиональное', 'Secondary vocational'),
    (3,'Бакалавр', 'Бакалавр', 'Bachelor'),
    (4,'Мутахассис', 'Профессиональное', 'Professional'),
    (5,'Магистр', 'Магистр', 'Master'),
    (6,'Номзади илм', 'Кандидат наук', 'PhD.'),
    (7,'PhD', 'PhD', 'PhD'),
    (8,'Доктори илм', 'Доктор наук', 'Doctor of Sciences');

INSERT into institutions(id, name_tg, name_ru, name_en) VALUES
    (1,'Институти омӯзиши масъалаҳои давлатҳои Осиё ва Аврупо', 'Институт изучения проблем стран Азии И Европы', 'Institute of studying of the problems of Asian and European countries'),
    (2,'Маркази омӯзиши равандҳои муосир ва оянданигарии илмӣ', 'Исследовательский центр современных процессов и прогнозирования', 'Research center for contemporary processes and future planning'),
    (3,'Мустақил', 'Независимый', 'Independent');

INSERT into types(id, name_tg, name_ru, name_en) VALUES
    (1,'Мақола', 'Статья', 'Article'),
    (2,'Эълон', 'Объявление', 'Announcement'),
    (3,'Тарҷума', 'Интерпретация', 'Interpretation'),
    (4,'Баргардон', 'Перевод', 'Translation'),
    (5,'Видео', 'Видео', 'Video'),
    (6,'Аудио', 'Аудио', 'Audio');

-- DELETE from categories;
INSERT into categories(id, name_tg, name_ru, name_en) VALUES
    (1,'Иқтисод', 'Экономика', 'Economics'),
    (2,'Фалсафа', 'Философия', 'Philosophy'),
    (3,'Сиёсат', 'Политика', 'Politics'),
    (4,'Фарҳанг', 'Культура', 'Culture'),
    (5,'Кишоварзӣ', 'Сельское хозяйство', 'Agriculture'),
    (6,'Таърих', 'История', 'History'),
    (7,'Забон', 'Язык', 'Language'),
    (8,'Адабиёт', 'Литература', 'Literature'),
    (9,'Ҳуқуқ', 'Право', 'Law'),
    (10,'Технология', 'Технология', 'Technology'),
    (11,'Тиб', 'Медицина', 'Medicine'),
    (12,'Фанҳои дақиқ', 'Точные науки', 'Exact sciences'),
    (13,'Ҷомеашиносӣ', 'Социология', 'Sociology'),
    (14,'Кишваршиносӣ', 'Страноведение', 'Country Studies'),
    (15,'Худшиносӣ', 'Самопознание', 'Self-Knowledge'),
    (16,'Хурофазудоӣ', 'Суеверие', 'Superstition'),
    (17,'Ифротгароӣ', 'Экстремизм', 'Extremism');

INSERT into journalinfos(id, title_tg, body_tg, title_ru, body_ru, title_en, body_en, image) VALUES
    (1,'ДАР БОРАИ МАҶАЛЛА', 'ДАР БОРАИ МАҶАЛЛА', 'О ЖУРНАЛЕ', 'О ЖУРНАЛЕ', 'ABOUT JOURNAL', 'ABOUT JOURNAL', 'dd'),
    (2,'БАРОИ МУАЛЛИФОН', 'БАРОИ МУАЛЛИФОН', 'АВТОРАМ', 'АВТОРАМ', 'FOR AUTHORS', 'FOR AUTHORS', 'dd'),
    (3,'ҲАЙАТИ ТАҲРИРИЯ', 'ҲАЙАТИ ТАҲРИРИЯ', 'РЕДАКЦИОННАЯ КОЛЛЕГИЯ', 'РЕДАКЦИОННАЯ КОЛЛЕГИЯ', 'EDITORIAL BOARD', 'EDITORIAL BOARD', 'dd'),
    (4,'ТАМОС', 'ТАМОС', 'КОНТАКТЫ', 'КОНТАКТЫ', 'CONTACTS', 'CONTACTS', 'dd');

-- SELECT * FROM journals order by id desc limit 10;





