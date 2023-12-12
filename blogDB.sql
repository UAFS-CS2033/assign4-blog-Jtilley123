drop database if exists blogDB;
drop user if exists 'bloguser'@'localhost';

create database blogDB;
use blogDB;

create table users(
   userID int AUTO_INCREMENT,
   username varchar(30) not null, index(username),
   lastname varchar(50),
   firstname varchar(30),
   passwd varchar(30),
   email varchar(255),
   urole varchar(30),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(userID)
)engine=innodb;

CREATE TABLE posts (
    postID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    publication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    userID INT,
    FOREIGN KEY (userID) REFERENCES users(userID)
);

create user 'bloguser'@'localhost' identified by 'blogpass';
grant all privileges on blogDB.* to 'bloguser'@'localhost';

insert into users(username,lastname,firstname,passwd,email,urole)
   values('jsmith','Smith','Joe','buddy','jsmith@gmail.com','admin');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('bwilliams','Williams','Brian','pass123','bwilliams@gmail.com','author');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjones','Jones','Mike','pass1234','mjones@gmail.com','author');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjohnson','Johnson','Monica','password','mjohnson@gmail.com','author');

INSERT INTO posts (title, content, userID) VALUES
    ('Admin Post 1', 'Very first post! Enjoy my blog.', 1),
    ('Awful site', 'Why is this site so buggy???? 1 star rating.', 2),
    ('Admin Post 2', 'Some bugs were fixed in this update! Enjoy the website.', 1),
    ('Help', 'Can someone message me to tell me the meaning of life.', 2),
    ('Getting better', 'This site is getting a little better but its still horrible', 2),
    ('Best site ever!', 'This is my favorite website of all time. This is awesome I named my first child after this website', 2),
    ('Admin Post 3', 'Ive lost all motivation at this point. I dont wanna be an admin anymore', 1);

