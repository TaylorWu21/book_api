-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 08, 2017 at 05:54 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `book_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `image_link` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `isbn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `user_id`, `title`, `author`, `description`, `image_link`, `category`, `isbn`) VALUES
(1, 5, 'The Southern Pacific, 1901-1985', 'Don L. Hofsommer', 'Don Hofsommer chronicles the twentieth-century history of a transportation giant. Here is a story of divestiture and merger, Sunset Route, and Prosperity Special. \" . . . a treasure house of information about the Southern Pacific Company . . . . This book is a joy to read.\"--Richard C. Overton, from the Foreword', 'http://books.google.com/books/content?id=BsRvIUwLwFwC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Business & Economics', '1603441271'),
(10, 5, '1984', 'George Orwell', 'George Orwell', 'http://books.google.com/books/content?id=uyr8BAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Fiction', '9781784043735'),
(12, 6, 'Lean In', 'Sheryl Sandberg', 'Thirty years after women became 50 percent of the college graduates in the United States, men still hold the vast majority of leadership positions in government and industry. This means that women’s voices are still not heard equally in the decisions that most affect our lives. In Lean In, Sheryl Sandberg examines why women’s progress in achieving leadership roles has stalled, explains the root causes, and offers compelling, commonsense solutions that can empower women to achieve their full potential. Sandberg is the chief operating officer of Facebook and is ranked on Fortune’s list of the 50 Most Powerful Women in Business and as one of Time’s 100 Most Influential People in the World. In 2010, she gave an electrifying TEDTalk in which she described how women unintentionally hold themselves back in their careers. Her talk, which became a phenomenon and has been viewed more than two million times, encouraged women to “sit at the table,” seek challenges, take risks, and pursue their goals with gusto. In Lean In, Sandberg digs deeper into these issues, combining personal anecdotes, hard data, and compelling research to cut through the layers of ambiguity and bias surrounding the lives and choices of working women. She recounts her own decisions, mistakes, and daily struggles to make the right choices for herself, her career, and her family. She provides practical advice on negotiation techniques, mentorship, and building a satisfying career, urging women to set boundaries and to abandon the myth of “having it all.” She describes specific steps women can take to combine professional achievement with personal fulfillment and demonstrates how men can benefit by supporting women in the workplace and at home. Written with both humor and wisdom, Sandberg’s book is an inspiring call to action and a blueprint for individual growth. Lean In is destined to change the conversation from what women can’t do to what they can. This eBook edition includes a Reading Group Guide.', 'http://books.google.com/books/content?id=y9_mxZLYiiMC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Biography & Autobiography', '9780385349956'),
(14, 6, 'The Hood River Issei', 'Linda Tamura', 'Gathers oral histories from Japanese immigrants, most of them women, that discuss leaving Japan, life as farmers and orchard workers, and the World War II relocation.', 'http://books.google.com/books/content?id=BLH51A1p7qAC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'History', '0252063597'),
(15, 7, 'When a Dragon Moves In', 'Jodi Moore', 'On a beautiful day at the beach, a young boy brings his bucket, shovel, and imagination, and builds a perfect sand castle. Right away, a dragon moves in. The boy decides to befriend his dragon and they spend time roaming the shore, flying a kite, braving the waves, defying bullies, and roasting marshmallows—all while Dad is busy sunbathing and Mom is engrossed in her book. Unfortunately, no one believes the boy when he tries to share the news of this magnificent creature. That’s when the mischief begins, and the dragon becomes a force to be reckoned with. While adults will recognize the naughty antics as a ploy for attention, children will dissolve into giggles as the dragon devours every last sandwich, blows bubbles in the lemonade, and leaves claw prints in the brownies. Maybe the dragon really is running amok on the beach, or maybe it’s a little boy’s imagination that is running wild.', 'http://books.google.com/books/content?id=z5RmBgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Juvenile Fiction', '9781936261406'),
(16, 7, 'Case Studies of Minority Student Placement in Spec', 'Beth Harry', 'This book features vivid case studies that bring to life real children, school personnel, and family members from the bestselling book, Why Are So Many Minority Students in Special Education? Once again addressing the disproportionate placement of minority students in special education programs, this new book includes the voices and perspectives of all stakeholders to show the tremendous complexity of the issues and the dilemmas faced by professionals, family members, and children. Challenging questions and scenarios are offered at the end of each case study to provide thoughtful follow-up activities and topics for further study. This collection of cases can be used-on its own or as a companion to the main volume in elementary and special education courses and professional development workshops.', 'http://books.google.com/books/content?id=JYXuAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_ap', 'Education', '0807747610'),
(17, 7, 'Deadly Powder on Medical Gloves', 'Richard F. Edlich', 'Both the United Kingdom and Germany have banned the use of cornstarch on medical gloves because it can injure healthcare workers and patients and can cause life-threatening injuries and even death. For the last ten years, author Richard F. Edlich has worked to persuade the US Food and Drug Administration to ban this dangerous powder in medical environments. In \"Deadly Powder on Medical Gloves,\" he provides a detailed account of this hazardous health issure the use of medical products that are laced with irritating and potentially deadly dust in the healthcare environment. Edlich shares information about his experience and his extensive research into the use of cornstarch laden latex and nitrile glove in the medical profession. He also presents a comprehensive review of the literature relating to studies of the toxic effects of such use. In addition, he discusses a Citizen s Petition to ban cornstarch on medical gloves and examines the double glove hole puncture indication system, a revolutionary advance in surgery. \"Deadly Powder on Medical Gloves\" encourages consumers and all health professionals to only use powder-free gloves because the deadly powder may endanger lives.', 'http://books.google.com/books/content?id=9zM71zEaH3QC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Health & Fitness', '9781469744179'),
(18, 7, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', '\"There it was, hanging in the sky above the school: the blazing green skull with a serpent tongue, the mark Death Eaters left behind whenever they had entered a building... wherever they had murdered...\" When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe. Harry is convinced that Malfoy bears the Dark Mark: there is a Death Eater amongst them. Harry will need powerful magic and true friends as he explores Voldemort', 'http://books.google.com/books/content?id=R7YsowJI9-IC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Juvenile Fiction', '9781781100547'),
(19, 8, 'Lean In', 'Sheryl Sandberg', 'Thirty years after women became 50 percent of the college graduates in the United States, men still hold the vast majority of leadership positions in government and industry. This means that women’s voices are still not heard equally in the decisions that most affect our lives. In Lean In, Sheryl Sandberg examines why women’s progress in achieving leadership roles has stalled, explains the root causes, and offers compelling, commonsense solutions that can empower women to achieve their full potential. Sandberg is the chief operating officer of Facebook and is ranked on Fortune’s list of the 50 Most Powerful Women in Business and as one of Time’s 100 Most Influential People in the World. In 2010, she gave an electrifying TEDTalk in which she described how women unintentionally hold themselves back in their careers. Her talk, which became a phenomenon and has been viewed more than two million times, encouraged women to “sit at the table,” seek challenges, take risks, and pursue their goals with gusto. In Lean In, Sandberg digs deeper into these issues, combining personal anecdotes, hard data, and compelling research to cut through the layers of ambiguity and bias surrounding the lives and choices of working women. She recounts her own decisions, mistakes, and daily struggles to make the right choices for herself, her career, and her family. She provides practical advice on negotiation techniques, mentorship, and building a satisfying career, urging women to set boundaries and to abandon the myth of “having it all.” She describes specific steps women can take to combine professional achievement with personal fulfillment and demonstrates how men can benefit by supporting women in the workplace and at home. Written with both humor and wisdom, Sandberg’s book is an inspiring call to action and a blueprint for individual growth. Lean In is destined to change the conversation from what women can’t do to what they can. This eBook edition includes a Reading Group Guide.', 'http://books.google.com/books/content?id=y9_mxZLYiiMC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Biography & Autobiography', '9780385349956'),
(20, 8, 'Not Different Enough', 'Gloria Doty', 'Not Different Enough is a humorous, heart-warming and occasionally, heart-breaking recounting of the 30-year journey with my daughter and autism, Asperger', 'http://books.google.com/books/content?id=dRu3AgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Family & Relationships', '9781491855089'),
(21, 9, 'House', 'Frank E. Peretti', 'In rural Alabama, two couples find themselves in a fight for survival. Running from a maniac bent on killing them, they flee to an old house that', 'http://books.google.com/books/content?id=VYosbwOlUsgC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Fiction', '9781595543622'),
(22, 9, 'The Hunger Games', 'Suzanne Collins', 'First in the ground-breaking HUNGER GAMES trilogy, this new foiled edition of THE HUNGER GAMES is available for a limited period of time. Set in a dark vision of the near future, a terrifying reality TV show is taking place. Twelve boys and twelve girls are forced to appear in a live event called The Hunger Games. There is only one rule: kill or be killed. When sixteen-year-old Katniss Everdeen steps forward to take her younger sister', 'http://books.google.com/books/content?id=_zSzAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Juvenile Fiction', '9781407133171'),
(23, 5, 'Melonhead', 'Katy Kelly', 'In Washington, D.C., Lucy Rose', 'http://books.google.com/books/content?id=bxbX49cskgIC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Juvenile Fiction', '9780440421870'),
(24, 10, 'Learning PHP, MySQL, JavaScript, and CSS', 'Robin Nixon', 'Provides information on creating interactive Web sites using a combination of PHP, MySQL, JavaScript, and CSS.', 'http://books.google.com/books/content?id=8-QyaeyEXHkC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Computers', '9781449319267'),
(25, 10, 'Lessons in Classical Drawing (Enhanced Edition)', 'Juliette Aristides', 'The practice of drawing…distilled to its essential elements. Embedded with videos, beautifully filmed in Florence, Italy, that provide real-time drawing lessons so that any gaps in the learning process are filled in with live instruction. In this elegant and inspiring primer, master contemporary artist and author Juliette Aristides breaks down the drawing process into small, manageable lessons; introduces time-tested principles and techniques that are easily accessible; and shares the language and context necessary to understand the artistic process and create superior, well-crafted drawings.', 'http://books.google.com/books/content?id=x2bRBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Art', '9780770433949'),
(26, 10, 'Computer-Based Automation', 'Julius T. Tou', '', 'http://books.google.com/books/content?id=1vIHCAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Computers', '9781468475593'),
(27, 6, 'Blade Runner', 'Matt Hills', 'More than just a box office flop that resurrected itself in the midnight movie circuit, Blade Runner(1982) achieved extraordinary cult status through video, laserdisc, and a five-disc DVD collector', 'http://books.google.com/books/content?id=9POizW1ucK4C&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Performing Arts', '9780231504645'),
(28, 6, 'Moko; Or, Maori Tattooing', 'Horatio Gordon Robley', '\"A full survey based on the author', 'http://books.google.com/books/content?id=hV8uAAAAYAAJ&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'Decorative arts, Maori', 'PRNC:32101068189883'),
(30, 12, 'A Misplaced Massacre', 'Ari Kelman', 'On November 29, 1864, over 150 Native Americans, mostly women, children, and elderly, were slaughtered in one of the most infamous cases of state-sponsored violence in U.S. history. Kelman examines how generations of Americans have struggled with the question of whether the nation’s crimes, as well as its achievements, should be memorialized.', 'http://books.google.com/books/content?id=tyEq3Dd-4fEC&printsec=frontcover&img=1&zoom=1&edge=curl&sou', 'History', '9780674071032');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` varchar(2500) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `book_id`, `user_id`, `comment`, `time`) VALUES
(82, 24, 10, 'best php book in the market!', '2017-03-03 22:06:37.074518'),
(83, 24, 7, 'I know this book is the best!', '2017-03-03 22:11:22.001339'),
(84, 18, 7, 'this is my favorite book!', '2017-03-03 22:52:24.074912'),
(85, 23, 6, 'Can I borrow this book?', '2017-03-03 22:54:04.441383'),
(86, 15, 6, 'Thank you for letting me borrow this book!', '2017-03-03 22:56:31.292533'),
(87, 26, 7, 'Wow can I borrow this book?', '2017-03-07 21:41:37.623295'),
(88, 25, 7, 'Wow this book is amazing!', '2017-03-07 22:02:52.135370');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `favorite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `book_id`, `favorite`) VALUES
(4, 12, 30, 1),
(5, 7, 18, 1),
(8, 7, 30, 1),
(9, 7, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `rent_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `borrower_id` int(10) NOT NULL,
  `lender_id` int(10) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`rent_id`, `book_id`, `borrower_id`, `lender_id`, `return_date`) VALUES
(1, 22, 5, 9, '27 February, 2017'),
(2, 10, 9, 5, '16 March, 2017'),
(3, 23, 7, 5, '9 March, 2017'),
(5, 16, 8, 7, '31 March, 2017'),
(6, 18, 9, 7, '16 March, 2017'),
(7, 24, 7, 10, '22 March, 2017'),
(8, 15, 6, 7, '31 March, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `phone`, `password`) VALUES
(5, 'test@test.com', 'Taylor', '801-123-1212', '920688bd88d6a1ba0e177f17bdf6dddd'),
(6, 'bobby@mail.com', 'Bobby', '801-123-12', '920688bd88d6a1ba0e177f17bdf6dddd'),
(7, 'Robert@mail.com', 'Robert', '801-321-43', '920688bd88d6a1ba0e177f17bdf6dddd'),
(8, 'Will@mail.com', 'Will I Am', '801-432-43', '920688bd88d6a1ba0e177f17bdf6dddd'),
(9, 'brittanie.pham@yahoo.com', 'Phambeee', '8018158311', '8d93fa3189d6c2105a5642ec12632793'),
(10, 'taco@mail.com', 'Ted', '801-123-1234', '920688bd88d6a1ba0e177f17bdf6dddd'),
(11, 'randy@mail.com', 'Randy', '801-987-6541', '920688bd88d6a1ba0e177f17bdf6dddd'),
(12, 'jordan@mail.com', 'Jordan', '801-123-4567', '920688bd88d6a1ba0e177f17bdf6dddd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `favorite_user_id` (`user_id`),
  ADD KEY `favorite_book_id` (`book_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `borrower_id` (`borrower_id`),
  ADD KEY `lender_id` (`lender_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `rent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorite_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `favorite_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrower_id` FOREIGN KEY (`borrower_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lender_id` FOREIGN KEY (`lender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
