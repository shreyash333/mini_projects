CREATE TABLE IF NOT EXISTS `customer` (
 `customer_id` int(11) NOT NULL AUTO_INCREMENT,
 `customer_name` varchar(50) NOT NULL,
 `phone` varchar(15) NOT NULL,
 `email` varchar(50) NOT NULL,
 `customer_password` varchar(20) NOT NULL,
 `trn_date` datetime NOT NULL,
 PRIMARY KEY (`customer_id`)
 );

CREATE TABLE IF NOT EXISTS `adminuser` (
 `admin_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `admin_password` varchar(20) NOT NULL,
 PRIMARY KEY (`admin_id`)
 );

CREATE TABLE IF NOT EXISTS `movie` (
 `movie_id` int(11) NOT NULL AUTO_INCREMENT,
 `movie_name` varchar(50) NOT NULL,
 `img_url` varchar(50) NOT NULL,
 `duration` varchar(30) NOT NULL,
 `release_date` varchar(30) NOT NULL,
 `movie_type` varchar(50) NOT NULL,
 `movie_rating` varchar(4) NOT NULL,
 `views` int(12) NOT NULL,
 `description` varchar(150) NOT NULL,
 `director` varchar(50) NOT NULL,
 `writer` varchar(50) NOT NULL,
 `stars` varchar(50) NOT NULL,
 PRIMARY KEY (`movie_id`)
 );

CREATE TABLE IF NOT EXISTS `message` (
 `message_id` int(11) NOT NULL AUTO_INCREMENT,
 `sender_name` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `message_subject` varchar(150) NOT NULL,
 `main_message` varchar(600) NOT NULL,
 `trn_date` datetime NOT NULL,
 PRIMARY KEY (`message_id`)
 );

CREATE TABLE IF NOT EXISTS `booking` (
 `booking_id` int(11) NOT NULL AUTO_INCREMENT,
 `customer_id` int(11),
 `movies_id` int(11),
 `num_of_seat` int(3) NOT NULL,
 `seat_no` varchar(100) NOT NULL,
 `amount` int(5) NOT NULL,
 `show_date` DATE NOT NULL,
 `show_time` varchar(20) NULL,
 `trn_date` varchar(20) NOT NULL,
 PRIMARY KEY (`booking_id`),
 CONSTRAINT `map_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE ON DELETE SET NULL,
 CONSTRAINT `map_movie` FOREIGN KEY (`movies_id`) REFERENCES `movie` (`movie_id`) ON UPDATE CASCADE ON DELETE SET NULL
 );

INSERT INTO `movie`
VALUES (001,'Kesari','movie1.PNG','2h 30min','21 March 2019','Action, Drama, History','9.6',9684345,'Based on an incredible true story of the Battle of <br> Saragarhi in which an army of 21 Sikhs fought against <br>s 10,000 Afghans in 1897.','Anurag Singh','Girish Kohli, Anurag Singh','Akshay Kumar, Parineeti Chopra, etc'),
        (002,'Mission Mangal','movie2.PNG','2h 10min','15 August 2019','Drama, History','8.9',8995644,'Based on true events of the Indian Space Research <br> Organisation (ISRO) successfully launching <br> the Mars Orbiter Mission (Mangalyaan).','Jagan Shakti','R. Balki, Saketh Kondiparthi','Akshay Kumar, Vidya Balan, etc'),
        (003,'ChhiChhore','movie3.PNG','2h 23min','6 September 2019','Comedy, Drama','9.0',8651254,'A tragic incident forces Anirudh, a middle-aged man, to <br> take a trip down memory lane and reminisce his college <br> days along with his friends, who were labelled as losers.','Nitesh Tiwari','Piyush Gupta, Nikhil Mehrotra','Sushant Singh Rajput, Shraddha Kapoor, etc'),
        (004,'URI','movie4.PNG','2h 18min','11 January 2019','Action, Drama, War','8.5',4256212,'Indian army special forces execute a covert operation, <br> avenging the killing of fellow army men at their <br> base by a terrorist group.','Aditya Dhar','Aditya Dhar','Vicky Kaushal, Paresh Rawal, etc'),
        (005,'Super 30','movie5.PNG','2h 34min','12 July 2019','Biography, Drama','8.0',6254912,'Based on the life of Patna-based mathematician <br> Anand Kumar who runs the famed Super 30 program <br> for IIT aspirants in Patna.','Vikas Bahl','Sanjeev Dutta','Hrithik Roshan, Mrunal Thakur, etc'),
        (006,'Dream Girl','movie6.PNG','2h 12min','13 September 2019','Comedy, Romance','7.5',4216862,'Rom-com Movie, directed by Raaj Shaandilyaa, stars <br> Ayushmann Khurrana who plays a dream girl. In every <br> love story, there is always one trying to win the heart.','Raaj Shaandilyaa','Nirmaan Dsingh, Niket Pandey','Ayushmann Khurrana, Nushrat Bharucha, etc');


Insert into `adminuser`
values (001,'Shreyash','shreyash'),
        (002,'Aditya','aditya'),
        (003,'Ashwin','ashwin');