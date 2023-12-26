-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:49 PM
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
-- Table structure for table `exercise_table`
--

CREATE TABLE `exercise_table` (
  `id` int(11) NOT NULL,
  `exercise_title` varchar(20) NOT NULL,
  `exercise_question_answer` text NOT NULL,
  `author` int(50) NOT NULL,
  `members_name` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_table`
--

INSERT INTO `exercise_table` (`id`, `exercise_title`, `exercise_question_answer`, `author`, `members_name`, `is_active`, `created_date`) VALUES
(1, 'The Quick Fix', '{\"What is Sue\\u2019s response in this scenario?\":\"Test Test\",\"Does your organization have a formal change control policy?\":\"Test Test\",\"Does your organization have the ability to \\u201croll back\\u201d patches in the event of unanticipated negative impacts?\":\"Test\",\"Processes tested\":\"08-June-2021\",\"Threat actor\":\"Amit\",\"Asset impacted\":\"None\"}', 1, '', 1, '2021-06-08'),
(2, 'Audit Playbook', '{\"Why was the audit project approved to be on the internal audit plan?\":\"Lorem Ipsum1\",\"How does the process support the organization in achieving its goals?\":\"Lorem Ipsum2\",\"What enterprise risk(s) does the audit address?\":\"Lorem Ipsum3\",\"Was this process audited in the past, and if so, what were the results of the previous audit(s)?\":\"Lorem Ipsum4\",\"Have there been significant changes in the process recently or since the previous audit?\":\"Lorem Ipsum5\",\"Evaluate the design of the process audited using at least one of:\":\"Lorem Ipsum6\",\"Subject Matter Expert (SME) from a Big 4 or other consulting firm\":\"Lorem Ipsum7\",\"Recent articles from WSJ.com, HBR.org, or other leading business periodicals\":\"Lorem Ipsum8\",\"Relevant blog posts from The Protiviti View, RSM\\u2019s blog, or the IIA\\u2019s blogs\":\"Lorem Ipsum9\",\"All policies, procedure documents, and organization charts\":\"Lorem Ipsum10\",\"Key reports used to manage process effectiveness, efficiency, and success\":\"Lorem Ipsum11\",\"Access to key applications used in the process\":\"Lorem Ipsum12\",\"Description and inventory of master data for the processes being audited, incl. all data fields and attributes\":\"Lorem Ipsum13\",\"Outline (by narrative, flowchart, or both) key process steps\":\"Lorem Ipsum14\",\"Validate draft narratives and flowcharts with subject matter expert used (if any)s\":\"Lorem Ipsum15\",\"Create an initial pre-planning questionnaire with IA\\u2019s draft answers\":\"Lorem Ipsum16\",\"Process Objectives\":\"Lorem Ipsum17\",\"Process Risks\":\"Lorem Ipsum18\",\"Controls Mitigating Process Risks\":\"Lorem Ipsum19\",\"Control Attributes, including:\":\"Lorem Ipsum20\",\"Testing Procedures for Controls to be Tested During the Audit, including:\":\"Lorem Ipsum21\",\"Received approval from:\":\"Lorem Ipsum22\"}', 4, 'Jay, Amit, Kishan', 1, '2021-07-11'),
(3, 'The Quick Fix', '{\"What is Sue\\u2019s response in this scenario?\":\"we\",\"Does your organization have a formal change control policy?\":\"What\",\"Does your organization have the ability to \\u201croll back\\u201d patches in the event of unanticipated negative impacts?\":\"Does\",\"Processes tested\":\"Processes tested\",\"Threat actor\":\"Threat actor\",\"Asset impacted\":\"Asset impacted\"}', 4, 'Jay, Ketul', 1, '2021-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_form`
--

CREATE TABLE `kpi_form` (
  `id` int(11) NOT NULL,
  `kpi_id` varchar(5) DEFAULT NULL,
  `objective` text NOT NULL,
  `sub_objective` text NOT NULL,
  `kpi` text NOT NULL,
  `activity` text NOT NULL,
  `remarks` text NOT NULL,
  `month` int(11) NOT NULL,
  `year` varchar(5) NOT NULL DEFAULT '2021',
  `representation` varchar(20) NOT NULL,
  `author` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpi_form`
--

INSERT INTO `kpi_form` (`id`, `kpi_id`, `objective`, `sub_objective`, `kpi`, `activity`, `remarks`, `month`, `year`, `representation`, `author`, `created_on`) VALUES
(203, NULL, 'Level of preparedness', 'Sub-Objective', '30', '1. Incident Management \n1.1 SIEM – Splunk\n1.2 Email Incident – Office 365\n1.3 Ticketing – Youtrack\n1.4 Monitoring – Game Plan Server\n1.5 Mail reported as Phishing\n2. Vulnerability Management \n2.1Red Team – Infopercept\n2.2Penetration Testing - Infopercept\n3. Configuration Review \n3.1 Firewall – SonicWALL\n3.2 Authentication – Active Directory\n3.3 Email Protection – Office365\n3.4 Access Policy – Microsoft Active Directory \n3.5 Malware Protection – Seqrite, TrendMicro\n4. Malware Protection \n4.1. Seqrite     \n4.2.TrendMicro \n4.3. Sophos\n5. Cyber Initiatives \n5.1. Cyber Awareness\n5.2. Risk Management\n6. GRC', 'Remarks', 4, '2021', 'trend', 5, '2021-08-13 09:59:47'),
(204, NULL, 'Level of preparedness', 'Sub-Objective', '31', '1. Incident Management \n1.1 SIEM – Splunk\n1.2 Email Incident – Office 365\n1.3 Ticketing – Youtrack\n1.4 Monitoring – Game Plan Server\n1.5 Mail reported as Phishing\n2. Vulnerability Management \n2.1Red Team – Infopercept\n2.2Penetration Testing - Infopercept\n3. Configuration Review \n3.1 Firewall – SonicWALL\n3.2 Authentication – Active Directory\n3.3 Email Protection – Office365\n3.4 Access Policy – Microsoft Active Directory \n3.5 Malware Protection – Seqrite, TrendMicro\n4. Malware Protection \n4.1. Seqrite     \n4.2.TrendMicro \n4.3. Sophos\n5. Cyber Initiatives \n5.1. Cyber Awareness\n5.2. Risk Management\n6. GRC', 'Remarks', 5, '2021', 'trend', 5, '2021-08-13 09:59:47'),
(205, NULL, 'Level of preparedness', 'Sub-Objective', '32', '1. Incident Management \n1.1 SIEM – Splunk\n1.2 Email Incident – Office 365\n1.3 Ticketing – Youtrack\n1.4 Monitoring – Game Plan Server\n1.5 Mail reported as Phishing\n2. Vulnerability Management \n2.1Red Team – Infopercept\n2.2Penetration Testing - Infopercept\n3. Configuration Review \n3.1 Firewall – SonicWALL\n3.2 Authentication – Active Directory\n3.3 Email Protection – Office365\n3.4 Access Policy – Microsoft Active Directory \n3.5 Malware Protection – Seqrite, TrendMicro\n4. Malware Protection \n4.1. Seqrite     \n4.2.TrendMicro \n4.3. Sophos\n5. Cyber Initiatives \n5.1. Cyber Awareness\n5.2. Risk Management\n6. GRC', 'We have shared CIS Hardening of AWS.', 6, '2021', 'trend', 5, '2021-08-13 09:59:47'),
(206, NULL, 'Level of preparedness', 'Sub-Objective', '33', '1. Incident Management \n1.1 SIEM – Splunk\n1.2 Email Incident – Office 365\n1.3 Ticketing – Youtrack\n1.4 Monitoring – Game Plan Server\n1.5 Mail reported as Phishing\n2. Vulnerability Management \n2.1Red Team – Infopercept\n2.2Penetration Testing - Infopercept\n3. Configuration Review \n3.1 Firewall – SonicWALL\n3.2 Authentication – Active Directory\n3.3 Email Protection – Office365\n3.4 Access Policy – Microsoft Active Directory \n3.5 Malware Protection – Seqrite, TrendMicro\n4. Malware Protection \n4.1. Seqrite     \n4.2.TrendMicro \n4.3. Sophos\n5. Cyber Initiatives \n5.1. Cyber Awareness\n5.2. Risk Management\n6. GRC', 'Remarks', 7, '2021', 'trend', 5, '2021-08-13 09:59:47'),
(207, NULL, 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'line chart', 4, '2021-08-14 13:25:40'),
(208, NULL, 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(209, NULL, 'Level of preparedness', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(210, NULL, 'Level of preparedness', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(211, NULL, 'Level of preparedness', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(212, NULL, 'Level of preparedness', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(213, NULL, 'Level of preparedness', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(214, NULL, 'Level of preparedness', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(215, NULL, 'Level of preparedness', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(216, NULL, 'Level of preparedness', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(217, NULL, 'Level of preparedness', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(218, NULL, 'Level of preparedness', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(219, NULL, 'Level of preparedness', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'line chart', 4, '2021-08-14 13:26:15'),
(220, NULL, 'DDOS', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(221, NULL, 'DDOS', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(222, NULL, 'DDOS', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(223, NULL, 'DDOS', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(224, NULL, 'DDOS', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(225, NULL, 'DDOS', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(226, NULL, 'DDOS', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(227, NULL, 'DDOS', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(228, NULL, 'DDOS', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(229, NULL, 'DDOS', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(230, NULL, 'DDOS', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(231, NULL, 'DDOS', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'trend', 4, '2021-08-14 13:43:08'),
(232, NULL, 'DDOS', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(233, NULL, 'DDOS', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(234, NULL, 'DDOS', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(235, NULL, 'DDOS', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(236, NULL, 'DDOS', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(237, NULL, 'DDOS', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(238, NULL, 'DDOS', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(239, NULL, 'DDOS', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(240, NULL, 'DDOS', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(241, NULL, 'DDOS', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(242, NULL, 'DDOS', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(243, NULL, 'DDOS', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'pie chart', 4, '2021-08-14 13:44:03'),
(244, NULL, 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(245, NULL, 'Level of preparedness', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(246, NULL, 'Level of preparedness', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(247, NULL, 'Level of preparedness', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(248, NULL, 'Level of preparedness', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(249, NULL, 'Level of preparedness', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(250, NULL, 'Level of preparedness', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(251, NULL, 'Level of preparedness', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(252, NULL, 'Level of preparedness', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(253, NULL, 'Level of preparedness', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(254, NULL, 'Level of preparedness', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(255, NULL, 'Level of preparedness', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'doughnut chart', 4, '2021-08-14 13:45:56'),
(256, NULL, 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(257, NULL, 'Level of preparedness', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(258, NULL, 'Level of preparedness', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(259, NULL, 'Level of preparedness', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(261, NULL, 'Level of preparedness', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(263, NULL, 'Level of preparedness', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(264, NULL, 'Level of preparedness', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(266, NULL, 'Level of preparedness', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(267, NULL, 'Level of preparedness', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'yesno', 4, '2021-08-14 13:48:13'),
(268, NULL, 'DDOS', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'table', 4, '2021-08-14 13:48:13'),
(269, NULL, 'DDOS', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'table', 4, '2021-08-14 13:48:13'),
(270, NULL, 'DDOS', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'table', 4, '2021-08-14 13:48:13'),
(271, NULL, 'DDOS', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'table', 4, '2021-08-14 13:48:13'),
(272, NULL, 'DDOS', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'table', 4, '2021-08-14 13:48:13'),
(273, NULL, 'DDOS', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'table', 4, '2021-08-14 13:48:13'),
(274, NULL, 'DDOS', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'table', 4, '2021-08-14 13:48:13'),
(275, NULL, 'DDOS', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'table', 4, '2021-08-14 13:48:13'),
(276, NULL, 'DDOS', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'table', 4, '2021-08-14 13:48:13'),
(277, NULL, 'DDOS', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'table', 4, '2021-08-14 13:48:13'),
(278, NULL, 'DDOS', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'table', 4, '2021-08-14 13:48:13'),
(279, NULL, 'DDOS', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'table', 4, '2021-08-14 13:48:13'),
(294, NULL, 'DDOS', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(295, NULL, 'DDOS', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(298, NULL, 'DDOS', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(299, NULL, 'DDOS', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(301, NULL, 'DDOS', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(302, NULL, 'DDOS', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(303, NULL, 'DDOS', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'yesno', 4, '2021-08-14 13:59:29'),
(317, NULL, 'DDOS', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(318, NULL, 'DDOS', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(319, NULL, 'DDOS', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(320, NULL, 'DDOS', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(321, NULL, 'DDOS', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(322, NULL, 'DDOS', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(323, NULL, 'DDOS', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(324, NULL, 'DDOS', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(325, NULL, 'DDOS', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(326, NULL, 'DDOS', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(327, NULL, 'DDOS', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(328, NULL, 'DDOS', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2021', 'line chart', 4, '2021-09-09 14:08:12'),
(330, NULL, 'Objective', 'Sub-Objective', '25', 'ABCD', 'Remarks', 12, '2020', 'line chart', 4, '2021-11-17 11:17:54'),
(331, 'a.1', 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(332, 'a.2', 'Level of preparedness', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(333, 'a.3', 'Level of preparedness', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(334, 'a.4', 'Level of preparedness', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(335, 'a.5', 'Level of preparedness', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(336, 'a.6', 'Level of preparedness', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(337, 'a.7', 'Level of preparedness', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(338, 'a.8', 'Level of preparedness', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(339, 'a.9', 'Level of preparedness', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(340, 'a.10', 'Level of preparedness', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(341, 'a.11', 'Level of preparedness', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(342, 'a.12', 'Level of preparedness', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2020', 'trend', 4, '2021-11-17 11:38:08'),
(355, 'a.1', 'Level of preparedness', 'Sub-Objective', '30', 'Representative Activity and Corresponding Approche...', 'Remarks', 1, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(356, 'a.2', 'Level of preparedness', 'Sub-Objective', '31', 'Representative Activity and Corresponding Approche...', 'Remarks', 2, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(357, 'a.3', 'Level of preparedness', 'Sub-Objective', '32', 'Representative Activity and Corresponding Approche...', 'Remarks', 3, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(358, 'a.4', 'Level of preparedness', 'Sub-Objective', '33', 'Representative Activity and Corresponding Approche...', 'Remarks', 4, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(359, 'a.5', 'Level of preparedness', 'Sub-Objective', '34', 'Representative Activity and Corresponding Approche...', 'Remarks', 5, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(360, 'a.6', 'Level of preparedness', 'Sub-Objective', '35', 'Representative Activity and Corresponding Approche...', 'Remarks', 6, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(361, 'a.7', 'Level of preparedness', 'Sub-Objective', '36', 'Representative Activity and Corresponding Approche...', 'Remarks', 7, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(362, 'a.8', 'Level of preparedness', 'Sub-Objective', '37', 'Representative Activity and Corresponding Approche...', 'Remarks', 8, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(363, 'a.9', 'Level of preparedness', 'Sub-Objective', '38', 'Representative Activity and Corresponding Approche...', 'Remarks', 9, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(364, 'a.10', 'Level of preparedness', 'Sub-Objective', '39', 'Representative Activity and Corresponding Approche...', 'Remarks', 10, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(365, 'a.11', 'Level of preparedness', 'Sub-Objective', '40', 'Representative Activity and Corresponding Approche...', 'Remarks', 11, '2020', 'line chart', 4, '2021-11-17 16:05:27'),
(366, 'a.12', 'Level of preparedness', 'Sub-Objective', '41', 'Representative Activity and Corresponding Approche...', 'Remarks', 12, '2020', 'line chart', 4, '2021-11-17 16:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_table`
--

CREATE TABLE `privilege_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege_table`
--

INSERT INTO `privilege_table` (`id`, `user_id`, `privilege`, `status`) VALUES
(1, 2, 'Kpi', 1),
(2, 2, 'Project', 1),
(5, 2, 'Vission', 1),
(6, 2, 'Enterprise', 0),
(7, 2, 'Polices', 0),
(8, 2, 'Awarness', 0),
(9, 2, 'War', 0),
(10, 2, 'Quiz', 0),
(11, 4, 'Vission', 1),
(12, 4, 'Kpi', 1),
(13, 4, 'Enterprise', 1),
(14, 4, 'Polices', 1),
(15, 4, 'Awarness', 1),
(16, 4, 'War', 1),
(17, 4, 'Quiz', 1),
(18, 4, 'Project', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `quiz_master`
--

CREATE TABLE `quiz_master` (
  `user_id` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` int(10) NOT NULL,
  `quiz_time` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `correct_ans` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_master`
--

INSERT INTO `quiz_master` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `quiz_time`, `category_id`, `total_question`, `correct_ans`, `author_id`) VALUES
(1, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-21 19:00:44', 1, 5, 2, 4),
(2, 'Jay', 'Patel', 'jay.hict19@sot.pdpu.ac.in', 2147483647, '2021-10-22 17:50:18', 1, 5, 3, 4),
(3, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-22 18:00:08', 1, 5, 1, 4),
(4, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-22 18:02:00', 1, 5, 3, 4),
(5, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-22 18:11:47', 1, 3, 0, 4),
(6, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-22 18:12:15', 1, 6, 3, 4),
(7, 'Jay', 'Patel', 'jay.hict19@sot.pdpu.ac.in', 2147483647, '2021-10-22 18:13:30', 1, 5, 5, 4),
(8, 'Jay', 'Patel', 'jaypatel32157@gmail.com', 2147483647, '2021-10-22 18:15:26', 1, 5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `support_page`
--

CREATE TABLE `support_page` (
  `support_id` int(11) NOT NULL,
  `support_category` text NOT NULL,
  `query` text NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_page`
--

INSERT INTO `support_page` (`support_id`, `support_category`, `query`, `author_id`) VALUES
(1, 'B', 'Sample Query', 4),
(2, 'B', 'Sample Query', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('direct','google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'direct',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `role`, `email`, `pass`, `picture`, `created`, `modified`) VALUES
(2, 'direct', NULL, 'amit', 'shahss', 0, 'amit@gmail.com', '0cb1eb413b8f7cee17701a37a1d74dc3', NULL, '2021-05-08 23:27:11', NULL),
(3, 'facebook', '4075077432556607', 'Amitss', 'Shahs', 1, 'amit.r.shah.2005@gmail.com', NULL, 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=4075077432556607&height=200&ext=1623088669&hash=AeSPGpZpTLLBVbzKdQs', '2021-05-08 23:27:47', NULL),
(4, 'direct', NULL, 'Jay', 'Patel', 1, 'jaypatel32157@gmail.com', '7acb932299553b618a4f9245f66402e4', NULL, '2021-06-25 17:55:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vision_mission`
--

CREATE TABLE `vision_mission` (
  `id` int(11) NOT NULL,
  `vision_text` text NOT NULL,
  `vision_file` text NOT NULL,
  `mission_text` text NOT NULL,
  `mission_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vision_mission`
--

INSERT INTO `vision_mission` (`id`, `vision_text`, `vision_file`, `mission_text`, `mission_file`) VALUES
(9, 'Edited Data Security as an on-going organized practice.\r\n\r\nThat conveys savvy insurance of the Business.\r\n\r\nNot similarly as a progression of \"check in-the-crate\" projects\r\n\r\nEstablish an unmistakable working model across IT, Security, the Business, and other control capacities (Risk, Compliance, Audit)\r\nEnsure security jobs, duties and announcing lines are clear and at the correct level\r\nEstablish genuine possession and responsibility for data security controls and business insurance across the Enterprise', '../vision-mission/Experiment10-converted.pdf', 'Editec Data Security as an on-going organized practice.\r\n\r\nThat conveys savvy insurance of the Business.\r\n\r\nNot similarly as a progression of \"check in-the-crate\" projects\r\n\r\nEstablish an unmistakable working model across IT, Security, the Business, and other control capacities (Risk, Compliance, Audit)\r\nEnsure security jobs, duties and announcing lines are clear and at the correct level\r\nEstablish genuine possession and responsibility for data security controls and business insurance across the Enterprise', '../vision-mission/RTPCR.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `exercise_table`
--
ALTER TABLE `exercise_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi_form`
--
ALTER TABLE `kpi_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_table`
--
ALTER TABLE `privilege_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_master`
--
ALTER TABLE `question_master`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `Category` (`category_id`);

--
-- Indexes for table `quiz_master`
--
ALTER TABLE `quiz_master`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Category_id` (`category_id`);

--
-- Indexes for table `support_page`
--
ALTER TABLE `support_page`
  ADD PRIMARY KEY (`support_id`),
  ADD KEY `Author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision_mission`
--
ALTER TABLE `vision_mission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exercise_table`
--
ALTER TABLE `exercise_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kpi_form`
--
ALTER TABLE `kpi_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `privilege_table`
--
ALTER TABLE `privilege_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `question_master`
--
ALTER TABLE `question_master`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quiz_master`
--
ALTER TABLE `quiz_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `support_page`
--
ALTER TABLE `support_page`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vision_mission`
--
ALTER TABLE `vision_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `privilege_table`
--
ALTER TABLE `privilege_table`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_master`
--
ALTER TABLE `question_master`
  ADD CONSTRAINT `Category` FOREIGN KEY (`category_id`) REFERENCES `category_master` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_master`
--
ALTER TABLE `quiz_master`
  ADD CONSTRAINT `Category_id` FOREIGN KEY (`category_id`) REFERENCES `category_master` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support_page`
--
ALTER TABLE `support_page`
  ADD CONSTRAINT `Author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
