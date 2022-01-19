CREATE TABLE IF NOT EXISTS degree
(
    degree_id INT          NOT NULL AUTO_INCREMENT,
    name      VARCHAR(250) NOT NULL,
    PRIMARY KEY (degree_id)
);

CREATE TABLE IF NOT EXISTS hobby
(
    hobby_id INT          NOT NULL AUTO_INCREMENT,
    name     VARCHAR(250) NOT NULL,
    PRIMARY KEY (hobby_id)
);

CREATE TABLE IF NOT EXISTS person
(
    person_id INT          NOT NULL AUTO_INCREMENT,
    name      VARCHAR(250) NOT NULL,
    surname   VARCHAR(250) NOT NULL,
    login     VARCHAR(250) NOT NULL,
    email     VARCHAR(250) NOT NULL,
    password  VARCHAR(250) NOT NULL,
    address   VARCHAR(250) NOT NULL,
    degree_id INT          NOT NULL,
    PRIMARY KEY (person_id),
    CONSTRAINT fk_degree
        FOREIGN KEY (degree_id)
            REFERENCES degree (degree_id)
);

CREATE TABLE IF NOT EXISTS person_hobby
(
    person_id INT NOT NULL,
    hobby_id  INT NOT NULL,
    CONSTRAINT fk_person
        FOREIGN KEY (person_id)
            REFERENCES person (person_id),
    CONSTRAINT fk_hobby
        FOREIGN KEY (hobby_id)
            REFERENCES hobby (hobby_id)
);
