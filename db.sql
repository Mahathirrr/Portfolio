CREATE TABLE mycontacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    avatar VARCHAR(255),
    phone VARCHAR(20),
    birthday DATE,
    province VARCHAR(100),
    country VARCHAR(100)
);

INSERT INTO mycontacts (name, title, email, avatar, phone, birthday, province, country)
VALUES ('Muhammad Mahathir', 'Junior developer', 'mhmmdmhthr@gmail.com', './assets/images/my-avatar.png', '+6281397181617', '2004-03-13', 'Aceh', 'Indonesia');
