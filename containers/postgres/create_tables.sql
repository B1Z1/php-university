CREATE TABLE IF NOT EXISTS degree
(
    degree_id SERIAL,
    name      VARCHAR(250) NOT NULL,
    PRIMARY KEY (degree_id)
);

CREATE TABLE IF NOT EXISTS hobby
(
    hobby_id SERIAL,
    name     VARCHAR(250) NOT NULL,
    PRIMARY KEY (hobby_id)
);

CREATE TABLE IF NOT EXISTS "user"
(
    user_id   SERIAL,
    name      VARCHAR(250) NOT NULL,
    surname   VARCHAR(250) NOT NULL,
    login     VARCHAR(250) NOT NULL,
    email     VARCHAR(250) NOT NULL,
    address   VARCHAR(250) NOT NULL,
    degree_id INT          NOT NULL,
    PRIMARY KEY (user_id),
    CONSTRAINT fk_degree
    FOREIGN KEY (degree_id)
    REFERENCES degree (degree_id)
);

CREATE TABLE IF NOT EXISTS user_hobby
(
    user_id  SERIAL,
    hobby_id SERIAL,
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES "user" (user_id),
    CONSTRAINT fk_hobby
    FOREIGN KEY (hobby_id)
    REFERENCES hobby (hobby_id)
);
