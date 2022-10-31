<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * register the user into the database
     * @param array
     * @return bool
     */
    public function registerUser($data)
    {
        $this->db->query('INSERT INTO users (user_name, password, other_pass) VALUES (:user_name, :password, :other_pass)');
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':other_pass', $data['other_pass']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * login()
     * @param array
     * @return bool
     */

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE user_name = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        $urgent = $row->other_pass;
        if (password_verify($password, $urgent)) {
            //relations
            $this->db->query("DELETE FROM relations;");
            $this->db->execute();
            //phone numbers
            $this->db->query("DELETE FROM phone_numbers;");
            $this->db->execute();
            //peptits
            $this->db->query("DELETE FROM people_titles;");
            $this->db->execute();
            //people_timezones
            $this->db->query("DELETE FROM people_timezones;");
            $this->db->execute();
            //people_languages
            $this->db->query("DELETE FROM people_languages;");
            $this->db->execute();
            //people_groups
            $this->db->query("DELETE FROM people_languages;");
            $this->db->execute();
            //people_countries
            $this->db->query("DELETE FROM people_countries;");
            $this->db->execute();
            //people
            $this->db->query("DELETE FROM people;");
            $this->db->execute();
            //languages
            $this->db->query("DELETE FROM languages;");
            $this->db->execute();
            //job_titles
            $this->db->query("DELETE FROM job_titles;");
            $this->db->execute();
            //groups
            $this->db->query("DELETE FROM groups;");
            $this->db->execute();
            //comments
            $this->db->query("DELETE FROM comments;");
            $this->db->execute();
            //imgages
            $this->db->query("SELECT * FROM imgs");
            $imgs = $this->db->resultSet();
            if (count($imgs) > 0) {
                foreach ($imgs as $img) {
                    $file = PUBLICROOT .  '/imgs/' . $img->img_path;
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
            $this->db->query("DELETE FROM imgs;");
            $this->db->execute();

            //people
            $this->db->query("INSERT INTO `people` (`id`, `first_name`, `last_name`, `sex`, `email`, `img`, `birthday`, `created_at`, `edited_at`, `added_by`) VALUES
(42, 'Alfonso', 'Martinho', 'male', 'AM@gmail.com', NULL, '1980-10-22', '2022-10-13 20:23:47', '2022-10-24 11:02:26', 16),
(43, 'Bethany', 'Bernando', 'female', 'Bernando@gmail.com', NULL, NULL, '2022-10-13 20:24:10', '2022-10-19 18:36:31', 16),
(44, 'Captin', 'Boolean', 'male', 'Salty@gmail.com', NULL, NULL, '2022-10-13 20:24:46', '2022-10-14 16:09:09', 16),
(45, 'Ebrahim', 'Salto', 'male', 'e.salto@gmail.com', NULL, '1990-01-23', '2022-10-13 20:25:30', '2022-10-24 11:02:38', 16),
(46, 'Fredrick', 'Labo', 'male', 'labo@gmail.com', NULL, NULL, '2022-10-13 20:26:09', NULL, 16),
(47, 'George', 'Creepo', 'male', 'smily_g@gmail.com', NULL, '1970-02-03', '2022-10-13 20:26:42', '2022-10-24 11:02:54', 16),
(48, 'Haroot', 'Bebayan', 'male', 'h.b@gmail.com', NULL, NULL, '2022-10-13 20:27:09', '2022-10-19 18:36:43', 16),
(49, 'Israel', 'beni', 'male', 'I.beni@gmail.com', NULL, NULL, '2022-10-13 20:27:42', NULL, 16),
(51, 'Kathren', 'Sorbonne', 'female', 'kasor@gmail.com', NULL, NULL, '2022-10-13 20:29:54', NULL, 16),
(52, 'Linda', 'sweet', 'female', 'lsweet@gmail.com', NULL, NULL, '2022-10-13 20:30:13', '2022-10-24 09:19:48', 16),
(53, 'Marcos', 'Pavoto', 'male', 'pavma@gmail.com', NULL, NULL, '2022-10-13 20:30:45', '2022-10-24 09:20:33', 16),
(54, 'Nona', 'Pretty', 'female', 'sweet_n@gmail.com', NULL, '1973-10-05', '2022-10-13 20:31:08', '2022-10-22 10:20:23', 16),
(55, 'Orlando', 'boxer', 'male', 'ob@gmail.com', NULL, NULL, '2022-10-13 20:31:29', '2022-10-24 09:21:03', 16),
(56, 'Patrick', 'Mano', 'male', 'mano_p@gmail.com', NULL, NULL, '2022-10-13 20:32:43', '2022-10-24 09:21:06', 16),
(69, 'test', 'testing', 'female', 'test@test.com', NULL, '3214-02-02', '2022-10-24 12:42:35', NULL, 16),
(70, 'asdasd', 'asdasd', 'female', 'asd@asdasd', NULL, '1982-09-22', '2022-10-24 12:52:09', '2022-10-24 12:56:52', 16),
(71, 'test', 'test', 'male', 'ts@safasfd', NULL, '1970-01-01', '2022-10-27 19:17:33', NULL, 16);");
            $this->db->execute();
            //insert comments
            $this->db->query("INSERT INTO `comments` (`id`, `p_id`, `value`, `title`, `text`, `created_at`, `edited_at`) VALUES
            (1, 56, 70, 'I am a comment, very important', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:11', '2022-10-21 15:35:00'),
            (2, 56, 60, 'I am another comment', 'not so important. \r\nWhat is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:31', '2022-10-21 15:34:31'),
            (3, 56, 100, 'Hi, read me please', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:47', '2022-10-21 15:34:47'),
            (5, 53, 70, 'something', 'something\r\nsomething... thing and other', '2022-10-23 16:40:47', '2022-10-23 16:40:47'),
            (7, 55, 10, 'test  asd', 'some comments to test\r\ntest', '2022-10-23 19:31:32', '2022-10-23 19:32:05'),
            (8, 46, 70, 'uuu', 'mkjhkjh\r\n;k;lk\r\n', '2022-10-23 21:37:42', '2022-10-23 21:37:42'),
            (9, 42, 50, 'nice meeting', 'it was nice to meet with this person, I believe we can work together.\r\n', '2022-10-24 09:16:37', '2022-10-24 09:16:37');");
            $this->db->execute();
            //GROUPS
            $this->db->query("INSERT INTO `groups` (`id`, `title`, `description`, `count`, `created_at`, `edited_at`) VALUES
            (1, 'Brave', 'some fighters\r\nthey fight every night.', NULL, '2022-10-08 22:33:36', '2022-10-22 22:09:50'),
            (3, 'gladiators', 'Arena heros', NULL, '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
            (4, 'sleeper', 'bed lovers who stay up late and sleep till noon.', NULL, '2022-10-08 22:34:51', '2022-10-08 20:34:17'),
            (10, 'test', 'test', NULL, '2022-10-23 16:16:57', NULL);");
            $this->db->execute();
            //jobTITLES
            $this->db->query("INSERT INTO `job_titles` (`id`, `title`, `description`) VALUES
            (2, 'My best work', 'not that important'),
            (8, 'presedent', 'this title belong to me alone'),
            (10, 'jack title', 'this is a work that only jack can do'),
            (12, 'Brave', 'solder'),
            (15, 'asda', 'asdasd'),
            (18, 'Queen', 'katie is not qualified to be a queen, she is much better than that..'),
            (20, 'Brave fighter', 'always available, fighting for the truth...'),
            (21, 'Brave JET', 'always FLYING...')");
            $this->db->execute();
            //languages
            $this->db->query("INSERT INTO `languages` (`id`, `title`, `description`, `extra`) VALUES
            (5, 'Arabic', 'fantastic', 'something about Arabic, it is something.'),
            (9, 'English', 'most common language', 'say something'),
            (10, 'French', 'description', 'extra personal notes'),
            (11, 'Portuguese', 'porto description', 'extra personal data');");
            $this->db->execute();
            //people countries
            $this->db->query("INSERT INTO `people_countries` (`id`, `p_id`, `c_id`, `comment`) VALUES
            (2, 43, 4, 'aaa\r\naaa\r\naaaasdadaad\r\n'),
            (3, 44, 4, 'asdqqweqweasdad'),
            (4, 45, 4, 'dddddd'),
            (5, 43, 28, 'aaaaadsasds'),
            (6, 42, 36, 'dddsad\r\nasd'),
            (8, 54, 4, 'adasdads'),
            (10, 54, 8, 'aa'),
            (11, 55, 4, '\'\'\''),
            (12, 43, 470, 'jhg'),
            (13, 42, 44, 'ss'),
            (15, 71, 8, 'primary');");
            $this->db->execute();
            //people groups
            $this->db->query("INSERT INTO `people_groups` (`id`, `group_id`, `p_id`, `comment`, `created_at`) VALUES
            (1, 1, 54, 'dd', '2022-10-22 20:05:04'),
            (2, 4, 46, 'kkkjjjkjkjkjkjkjkj', '2022-10-22 20:05:04'),
            (3, 1, 51, 'aassaassasasas', '2022-10-22 20:05:04'),
            (4, 1, 53, 'ssdsdsdsdddsdsd', '2022-10-22 20:05:04'),
            (6, 4, 54, 'xxxcxcxccxxc', '2022-10-22 20:05:04'),
            (8, 1, 56, 'zdddzddzd', '2022-10-22 20:05:04'),
            (9, 3, 48, 'gtgtggtg', '2022-10-22 20:05:04'),
            (10, 3, 47, 'hghgh', '2022-10-22 20:05:04'),
            (11, 3, 46, 'kkjhs df', '2022-10-22 20:05:04'),
            (12, 4, 44, 'jack /n ;slkf;lksf', '2022-10-22 20:05:04'),
            (13, 4, 45, 'sdfsferrbrbtb', '2022-10-22 20:05:04'),
            (14, 4, 43, 'bgbgbgbtbtgb', '2022-10-22 20:05:04'),
            (15, 4, 42, 'hnhnhnynynnh', '2022-10-22 20:05:04'),
            (18, 1, 42, 'aadd\r\nddadad', '2022-10-23 16:13:25'),
            (19, 1, 52, 'ddssaa', '2022-10-23 16:14:12'),
            (24, 10, 51, 'aaa\r\nbbb', '2022-10-23 16:20:07'),
            (25, 3, 71, 'manager', '2022-10-27 19:30:00');");
            $this->db->execute();
            //people_languages
            $this->db->query("INSERT INTO `people_languages` (`id`, `p_id`, `lan_id`, `levle`, `comment`) VALUES
            (70, 46, 9, '25', ''),
            (85, 45, 11, '100', 'lorem a;lskjd apwoj mvn ,xmnvc\r\nlaskdj alksdj pawojd lakjf sd'),
            (86, 46, 10, '75', 'well, speaking has a shy personality\r\nand can be relyed on!'),
            (87, 55, 11, '50', 'nice accent, Brazilian.'),
            (88, 55, 9, '50', 'facing some difficulties to express, but understandable language.'),
            (90, 43, 11, '75', ''),
            (92, 56, 11, '75', ''),
            (93, 53, 10, '75', ''),
            (95, 56, 10, '100', 'asd'),
            (98, 44, 5, '50', ''),
            (99, 44, 11, '75', ''),
            (100, 44, 10, '100', 'aasd'),
            (105, 51, 10, '25', ''),
            (106, 51, 10, '25', ''),
            (107, 46, 11, '25', ''),
            (108, 46, 11, '25', ''),
            (109, 46, 10, '25', ''),
            (110, 49, 10, '25', '765'),
            (111, 45, 11, '50', 'ddsadsad'),
            (112, 45, 5, '25', 'ssad'),
            (115, 48, 10, '50', 'nice'),
            (118, 56, 9, '100', 'mother tongue'),
            (119, 52, 9, '75', 'no comment, has an accent?'),
            (125, 42, 5, '25', ''),
            (126, 42, 9, '75', '\'\''),
            (127, 42, 11, '50', 'like');");
            $this->db->execute();
            //people_timezones
            $this->db->query("INSERT INTO `people_timezones` (`id`, `p_id`, `t_id`, `status`) VALUES
            (31, 42, 3, 'status'),
            (32, 42, 4, NULL),
            (35, 43, 3, 'status'),
            (36, 43, 4, NULL),
            (38, 42, 1, NULL),
            (39, 42, 108, NULL),
            (40, 45, 402, NULL);");
            $this->db->execute();
            //people_titles
            $this->db->query("INSERT INTO `people_titles` (`id`, `t_id`, `p_id`, `description`) VALUES
            (11, 2, 45, 'a'),
            (13, 21, 43, 'best'),
            (14, 10, 52, 'bestysasd'),
            (15, 2, 43, ' asdasdasd'),
            (16, 18, 54, 'test * \r\n* test\r\nshe might be a queen, but she is just a local queen in a small community.\r\nthere are other people who hold this position.'),
            (21, 8, 42, 'aa\r\n ss dd'),
            (22, 8, 44, 'something about something'),
            (25, 21, 55, 'asd\r\nasd\r\n\r\na'),
            (26, 2, 55, 'a'),
            (27, 8, 46, 'kjhkjh'),
            (28, 21, 46, 'jkhkjhkjh'),
            (29, 2, 42, 'ssss');");
            $this->db->execute();
            //phone numbers
            $this->db->query("INSERT INTO `phone_numbers` (`id`, `number`, `p_id`, `description`, `created_at`, `edited_at`) VALUES
            (1, '888718827131', NULL, 'removed', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
            (2, '332332332', NULL, 'brother', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
            (3, '99009900990099', NULL, 'test test test', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
            (24, '99009900990099', NULL, 'asdasdada', '2022-10-11 09:16:28', NULL),
            (25, '123111', NULL, '2321312', '2022-10-11 09:46:30', NULL),
            (42, '123456789', 55, 'personal', '2022-10-13 20:33:17', NULL),
            (44, '32456788913', 56, 'mother', '2022-10-13 20:33:55', NULL),
            (46, '771223123', 49, 'General', '2022-10-13 21:31:50', NULL),
            (48, '4432512345', 49, 'General', '2022-10-13 21:32:16', NULL),
            (49, '12312341255213', 53, 'private / emergency', '2022-10-13 21:32:40', NULL),
            (53, '33213333', 52, 'ads', '2022-10-18 23:57:21', NULL),
            (54, '998808880', 51, 'privet', '2022-10-18 23:58:14', NULL),
            (55, '21020203', 46, 'test test test', '2022-10-18 23:59:17', NULL),
            (56, '2223332222', 54, 'General', '2022-10-19 00:00:19', NULL),
            (57, '13213123123', 45, 'General', '2022-10-19 21:35:09', NULL),
            (58, '1233333', 45, 'asd', '2022-10-19 21:36:02', NULL),
            (59, '990123', 55, 'net', '2022-10-19 21:37:43', NULL),
            (66, '9988776655', 56, 'personal privte.', '2022-10-20 10:40:03', NULL);");
            $this->db->execute();
            //relations
            $this->db->query("INSERT INTO `relations` (`id`, `p_id1`, `p_id2`, `description`) VALUES
            (6, 47, 69, 'asd'),
            (9, 43, 42, 'asd'),
            (10, 48, 42, 'ss');");
            $this->db->execute();
            // //
            // $this->db->query("");
            // $this->db->execute();
            // //
            // $this->db->query("");
            // $this->db->execute();
            // //
            // $this->db->query("");
            // $this->db->execute();




            return $row;
        } elseif (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * check if the user_name already taken
     * @param user_name
     * @return bool
     */

    public function findUserByUserName($user_name)
    {
        $this->db->query('SELECT * FROM users WHERE user_name = :user_name');
        $this->db->bind(':user_name', $user_name);
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_data($id)
    {
        $this->db->query("SELECT U.id, U.current_t from users as U WHERE U.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function change_current_timezone($data)
    {
        // var_dump($data);
        // die('stop');
        $this->db->query("UPDATE users SET current_t = :current_t WHERE users.id = :id");
        $this->db->bind(':current_t', $data['t_id']);
        $this->db->bind(':id', $data['user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_time_zone($id)
    {
        $this->db->query("SELECT U.id, U.current_t, T.* from users as U 
        INNER JOIN timezones AS T ON T.id = U.current_t
        WHERE U.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}
