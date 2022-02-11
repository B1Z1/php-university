CREATE TABLE IF NOT EXISTS degree
(
    id   INT                                    NOT NULL AUTO_INCREMENT,
    name VARCHAR(250) CHARACTER SET utf8 UNIQUE NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS permission
(
    id   INT          NOT NULL AUTO_INCREMENT,
    name VARCHAR(250) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS hobby
(
    id   INT                                    NOT NULL AUTO_INCREMENT,
    name VARCHAR(250) CHARACTER SET utf8 UNIQUE NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS user
(
    id            INT                             NOT NULL AUTO_INCREMENT,
    name          VARCHAR(250) CHARACTER SET utf8 NOT NULL,
    surname       VARCHAR(250) CHARACTER SET utf8 NOT NULL,
    login         VARCHAR(250) UNIQUE             NOT NULL,
    email         VARCHAR(250)                    NOT NULL,
    password      VARCHAR(250)                    NOT NULL,
    address       VARCHAR(250) CHARACTER SET utf8 NOT NULL,
    degree_id     INT                             NOT NULL,
    permission_id INT                             NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_degree
        FOREIGN KEY (degree_id)
            REFERENCES degree (id),
    CONSTRAINT fk_permission
        FOREIGN KEY (permission_id)
            REFERENCES permission (id)
);

CREATE TABLE IF NOT EXISTS user_hobby
(
    user_id  INT NOT NULL,
    hobby_id INT NOT NULL,
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
            REFERENCES user (id),
    CONSTRAINT fk_hobby
        FOREIGN KEY (hobby_id)
            REFERENCES hobby (id)
);

CREATE TABLE IF NOT EXISTS product
(
    id          INT                             NOT NULL AUTO_INCREMENT,
    name        VARCHAR(128) CHARACTER SET utf8 NOT NULL,
    description TEXT CHARACTER SET utf8         NOT NULL,
    price       FLOAT                           NOT NULL,
    PRIMARY KEY (id)
);
