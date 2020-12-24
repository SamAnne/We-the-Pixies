SET FOREIGN_KEY_CHECKS = 0;

/* FOR TESTING */
DROP TABLE IF EXISTS wtpusers CASCADE;
DROP TABLE IF EXISTS wtpposts CASCADE;

/* TABLE CREATION */
CREATE TABLE wtpusers(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL UNIQUE,
	password  VARCHAR(255) NOT NULL, /*hashed*/
	email VARCHAR(320),
	usertype INT(2), /*0/null, 1, 2; 1=admin, 2=content creator*/ 
	time_created DATETIME DEFAULT CURRENT_TIMESTAMP,
	inactive INT(2) /*1 indicates account is inactive, otherwise active*/
);

CREATE TABLE wtpposts (
	postid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id INT NOT NULL,
	datePosted DATETIME DEFAULT CURRENT_TIMESTAMP,
	title TEXT,
	img_path varchar(1024), /*i’ll have to look into images more*/
	content TEXT,
	postType VARCHAR(10)
);

/* TEST USER */
INSERT INTO wtpusers (id, username, password, email, usertype) VALUES (00000000, 'testadmin', 'Testadminpass1!', 'test@test.com', 1);

/* ABOUT CONTENT TEST */
INSERT INTO wtpposts (postid, id, content, postType) VALUES (0, 00000000, 'this is the example text for the about page', 'about');

/* FAQ */
INSERT INTO wtpposts (id, content, postType) VALUES (00000000, 'example faq', 'faq');

SET FOREIGN_KEY_CHECKS = 0;
