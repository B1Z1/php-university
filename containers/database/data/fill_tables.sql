INSERT INTO hobby (name)
VALUES ('Swimming'),
       ('Sport'),
       ('Programming'),
       ('Reading'),
       ('Jogging'),
       ('Boxing'),
       ('Drawing'),
       ('Dancing');

INSERT INTO degree (id, name)
VALUES (1, 'High'),
       (2, 'Primary'),
       (3, 'Middle');

INSERT INTO product (name, description, price)
VALUES ('Zabić drozda',
        'Książka, która ukazała się w 1960 roku i natychmiast zdobyła wielką popularność. Historia dzieje się w latach 30. XX wieku. Głównymi bohaterami są Atticus Finch i jego oskarżony o gwałt na białej dziewczynie czarnoskóry klient. Pozornie prosta sprawa staje się ogromnym wydarzeniem z uwagi na panujący wszędzie rasizm.',
        150.00),
       ('Rok 1984',
        'Jeśli zerkniesz na w zasadzie dowolny ranking książek w sieci, z pewnością znajdzie się w nim pozycja „Rok 1984”. I słusznie.',
        50.00),
       ('Proces',
        'Do kategorii „książki, które warto przeczytać” bezsprzecznie należy również kolejny światowy klasyk, czyli „Proces” Kafki. To wyjątkowa opowieść o biurokracji i totalitaryzmie, które skrywają się pod płaszczykiem łagodnych przepisów. Historia opowiada o Józefie K. – prokurencie bankowym, który, mimo że nie zrobił niczego złego, zostaje aresztowany. Choć areszt jest bardzo łagodny – bohater musi tylko być pod nadzorem sądu, jego życie zmienia w najdrobniejszych szczegółach. Wstrząsająca opowieść, po którą naprawdę warto sięgnąć.',
        99.99),
       ('Duma i uprzedzenie',
        'Jeśli chodzi o ciekawe książki, nie można nie wspomnieć o kultowej pozycji Jane Austin. Akcja dzieje się na angielskiej prowincji na przełomie XVIII i XIX wieku. Państwo Bennet stoją przed wybitnie trudnym zadaniem wydania za mąż swoich pięciu córek – sprawę komplikuje fakt, że w potencjalnych kandydatach chcieliby zobaczyć szansę na podreperowanie swojej sytuacji finansowej.',
        200.00);

INSERT INTO permission (id, name)
VALUES (1, 'Administrator'),
       (2, 'Normal');

INSERT INTO user (id, name, surname, login, email, password, address, degree_id, permission_id)
VALUES (1, 'admin', 'admin', 'admin', 'admin@gmail.com', 'ueAV+R695WAsk3EPDOOnAGNLrGavow==', 'admin', 1, 1);
