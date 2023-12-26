-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 03:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `category_id` int(11) NOT NULL,
  `category_title` text NOT NULL,
  `createted_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`category_id`, `category_title`, `createted_date`, `updated_date`, `status`) VALUES
(1, 'Cybersecurity Basics Quiz', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(2, 'Physical Security Quiz', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(3, 'Ransomware', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(4, 'Phishing', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(5, 'Tech Support scams quiz', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(6, 'Vendor Security quiz', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0),
(7, 'Secure Remote Access Quiz', '2021-10-21 18:59:50', '2021-10-21 18:59:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_master`
--

CREATE TABLE `question_master` (
  `question_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text DEFAULT NULL,
  `option4` text DEFAULT NULL,
  `correct_ans` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_master`
--

INSERT INTO `question_master` (`question_id`, `category_id`, `question_title`, `option1`, `option2`, `option3`, `option4`, `correct_ans`, `status`, `created_date`) VALUES
(1, 1, 'Which of the following should you do to restrict access to your files and devices?', 'Update your software once a year.', 'Share passwords only with colleagues you trust.', 'Have your staff members access information via an open Wi-Fi network.', 'Use multi-factor authentication.', 4, 1, '2021-10-21 18:59:50'),
(2, 1, 'Backing up important files offline, on an external hard drive or in the cloud, will help protect your business in the event of a cyber attack. True or False?', 'true', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(3, 1, 'Which is the best answer for which people in a business should be responsible for cybersecurity?', 'Business owners. They run the business, so they need to know cybersecurity basics and put them in practice to reduce the risk of cyber attacks', 'IT specialists, because they are in the best position to know about and promote cybersecurity within a business.', ' Managers, because they are responsible for making sure that staff members are following the right practices.', 'All staff members should know some cybersecurity basics to reduce the risk of cyber attacks.', 4, 1, '2021-10-21 18:59:50'),
(4, 1, 'Cyber criminals only target large companies. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(5, 1, 'Which of the following is the best answer for how to secure your router?', 'Change the default name and password of the router.', 'Turn off the router’s remote management.', 'Log out as the administrator once the router is set up.', 'All of the above.', 4, 1, '2021-10-21 18:59:50'),
(6, 2, 'Promoting physical security includes protecting', 'Only paper files', 'Only paper files and any computer on which you store electronic copies of those files.', 'Only paper files, flash drives, and point-of-sale devices.', 'All the above plus any other device with sensitive information on it.', 4, 1, '2021-10-21 18:59:50'),
(7, 2, 'Paper files that have sensitive information should be disposed of in a locked trash bin. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(8, 2, 'When you hit the “delete” key, that means a file is automatically removed from your computer. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(9, 2, 'Which one of these statements is true?', 'It’s best to use multi-factor authentication to access areas of the business network with sensitive information.', 'You should use the same password for key business devices to guarantee that high-level employees can access them in an emergency.', 'The best way to protect business data is to make sure no one loses any device.', 'You shouldn’t limit login attempts on key business devices, because getting locked out for having too many incorrect attempts would leave you unable to access your accounts.', 1, 1, '2021-10-21 18:59:50'),
(10, 2, 'Only people with access to sensitive data need to be trained on the importance of the physical security of files and equipment. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(11, 3, 'What is ransomware?', 'Software that infects computer networks and mobile devices to hold your data hostage until you send the attackers money.', 'Computer equipment that criminals steal from you and won’t return until you pay them.', 'Software used to protect your computer or mobile device from harmful viruses.', 'A form of cryptocurrency', 1, 1, '2021-10-21 18:59:50'),
(12, 3, 'Local backup files – saved on your computer – will protect your data from being lost in a ransomware attack. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(13, 3, 'Which of these best describes how criminals start ransomware attacks?', 'Sending a scam email with links or attachments that put your data and network at risk.', 'Getting into your server through vulnerabilities and installing malware.', 'Using infected websites that automatically download malicious software to your computer or mobile device.', 'All of the Above ', 4, 1, '2021-10-21 18:59:50'),
(14, 3, 'If you encounter a ransomware attack, the first thing you should do is pay the ransom. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(15, 3, 'Setting your software to auto-update is one way you can help protect your business from ransomware. True or False?', 'true', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(16, 4, 'Which one of these statements is correct?', 'If you get an email that looks like it’s from someone you know, you can click on any links as long as you have a spam blocker and anti-virus protection', 'You can trust an email really comes from a client if it uses the client’s logo and contains at least one fact about the client that you know to be true', 'if you get a message from a colleague who needs your network password, you should never give it out unless the colleague says it’s an emergency.', 'If you get an email from Human Resources asking you to provide personal information right away, you should check it out first to make sure they are who they say are.', 3, 1, '2021-10-21 18:59:50'),
(17, 4, 'An email from your boss asks for the name, addresses, and credit card information of the company’s top clients. The email says it’s urgent and to please reply right away. You should reply right away. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(18, 4, 'You get a text message from a vendor who asks you to click on a link to renew your password so that you can log in to its website. You should:', 'Reply to the text to confirm that you really need to renew your password.', 'Pick up the phone and call the vendor, using a phone number you know to be correct, to confirm that the request is real.', 'Click on the link. If it takes you to the vendor’s website, then you’ll know it’s not a scam.', NULL, 2, 1, '2021-10-21 18:59:50'),
(19, 4, 'Email authentication can help protect against phishing attacks. True or False?', 'true', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(20, 4, 'If you fall for a phishing scam, what should you do to limit the damage?', 'Delete the phishing email.', 'Unplug the computer. This will get rid of any malware', 'Change any compromised passwords.', NULL, 3, 1, '2021-10-21 18:59:50'),
(21, 5, 'Which of the following scenarios does NOT describe a tech support scam?', ' Someone calls and tells you they’ve found viruses on your computer, then asks for credit card information so they can bill you for tech support services', 'While you’re browsing online, an urgent message pops up telling you that there’s a problem with your computer and directs you to a website to pay', 'A caller asks you to give him remote access to your computer to fix a problem in your computer.', 'You pay a trusted security professional to check your network for intrusions, and the professional tells you that your network has a problem that needs to be fixed.', 4, 1, '2021-10-21 18:59:50'),
(22, 5, 'True or False? You can avoid scams by only taking tech support calls from well-known tech companies.', 'TRUE ', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(23, 5, 'Which of these answers describes the best way to protect against tech support scams?', 'Use a unique password for each account.', 'Scan your computer for any unknown software.', 'Hang up on callers who say your computer has a problem.', 'All of the Above', 4, 1, '2021-10-21 18:59:50'),
(24, 5, 'True or False? Small businesses should focus more on other cybersecurity threats, because tech support scammers usually target only large companies.', 'TRUE ', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(25, 5, 'Which is the best way to protect against viruses or other security threats?', 'Call your security software company to review the steps it has taken to set up virus protection and what else it has done or can do to protect your bussiness', 'Hire a new company that has made the effort to alert you to viruses on your system and offers to help you fix them.', 'Install new virus protection software that you find online.', 'Change the network password.', 1, 1, '2021-10-21 18:59:50'),
(26, 6, 'What steps should you take when selecting vendors who will have access to your sensitive information? Pick the best answer', 'Include provisions for security in your vendor contracts, like a plan to evaluate and update security controls.', 'Only do business with well-known vendors.', 'Ensure that your vendors understand your compliance rules.', 'Confirm that the vendor understands the importance of cybersecurity.', 1, 1, '2021-10-21 18:59:50'),
(27, 6, 'Anyone with access to your business network should be required to use a strong password. How long should a strong password be?', 'Passwords should be at least 8 characters with a mix of numbers, symbols, and both capital and lowercase letters.', 'Passwords should be at least 5 characters with a mix of numbers, symbols, and both capital and lowercase letters.', 'Passwords should be at least 12 characters with a mix of numbers, symbols, and both capital and lowercase letters.', 'Passwords should be at least 10 characters with a mix of numbers, symbols, and both capital and lowercase letters.', 3, 1, '2021-10-21 18:59:50'),
(28, 6, 'Requiring vendors to use multi-factor authentication to access your network makes users take an additional step beyond logging in with a password. True or False?', 'true', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(29, 6, 'Properly configured strong encryption – recommended for any devices that connect remotely to your network – can help you detect cyber attacks in your system. True or False?', 'true', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(30, 6, 'What should you do if a vendor has a breach that impacts your business data? Pick the best answer.', 'Change all network passwords.', 'Turn off all your computers and devices', 'Make sure that the vendor fixes the vulnerabilities and ensures that your information will be safe going forward.', 'Disable multi-factor authentication systems.', 3, 1, '2021-10-21 18:59:50'),
(31, 7, 'Before connecting remotely to the company network, your personal device should meet the same security requirements as company-issued devices. True or False?', 'True ', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(32, 7, 'What is a common way to help protect devices connected to the company network?', 'Only use laptops and other mobile devices with full-disk encryption.', 'Change your smartphone settings to let your devices connect automatically to public Wi-Fi.', 'Let guests and customers use the same secure Wi-Fi that you use.', 'Use the router’s pre-set password so you won’t forget it', 1, 1, '2021-10-21 18:59:50'),
(33, 7, 'Keeping your router’s default name will help security professionals identify it and thus help protect your network’s security. True or False?', 'True ', 'false', NULL, NULL, 2, 1, '2021-10-21 18:59:50'),
(34, 7, ' WPA2 and WPA3 encryption are the encryption standards that will protect information sent over a wireless network. True or False?', 'True ', 'false', NULL, NULL, 1, 1, '2021-10-21 18:59:50'),
(35, 7, 'Which of the following describes the best way to make sure you are securely accessing the company network remotely?', 'Read your company’s cybersecurity policies thoroughly.', 'Use VPN when connecting remotely to the company network.', 'Use unique, complex network passwords and avoid unattended, open workstations.', 'Do all of the above', 4, 1, '2021-10-21 18:59:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `question_master`
--
ALTER TABLE `question_master`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `Category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_master`
--
ALTER TABLE `question_master`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_master`
--
ALTER TABLE `question_master`
  ADD CONSTRAINT `Category` FOREIGN KEY (`category_id`) REFERENCES `category_master` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
