-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 07:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativeitem_netflex`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `name`) VALUES
(1, 'Tom Cruise'),
(2, 'Leonardo DiCaprio'),
(3, 'Dwayne Johnson'),
(4, 'Cameron Diaz'),
(5, 'Catherine Zeta-Jones'),
(6, 'Bruce Willis'),
(7, 'Charlize Theron'),
(8, 'Christian Bale'),
(9, 'Hugh Jackman'),
(10, 'Johnny Depp'),
(11, 'Katherine Heigl'),
(12, 'Keira Knightley'),
(13, 'Meg Ryan'),
(14, 'Megan Fox'),
(15, 'Nicolas Cage'),
(16, 'Nicole kidman'),
(17, 'Brad Pitt'),
(18, 'Sandra Bullock'),
(19, 'Vin Diesel'),
(20, 'Sylvester stallone');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('155j2bgolngntio61lsaqng7vmm6efo3', '::1', 1541311295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313331313239343b),
('1p2gmpa8m66lbad6v78c3sp38qrsve57', '::1', 1541121602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313132313337333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('1srsmpakvjadlfr67i9vq7srfve6spvv', '::1', 1541062743, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036323734333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('20m378qh1t0uo5s5lo78b1sgd8ikff0v', '::1', 1541142149, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134323134393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534313134313134303b),
('2k2pn6fo320p3kdfgbrcn2vgbbaku7oe', '::1', 1541057065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035373036353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('3qado01ctj88iikijuath8lcho2m64mt', '::1', 1541062036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036323033363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('4fjkd8v8ihaek47d132vuf3cnsda4bq7', '::1', 1540975884, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937353838343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('4jat55mpep3oda57ha2o4p7q89k5f2vo', '::1', 1541140345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134303232323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534313133393831373b),
('6iskujjh4dd9p3fv373j8hd30bha0n4b', '::1', 1541057382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035373338323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('7d87r15oi1agqqvchsi2arsjhppe7oi6', '::1', 1540966532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936363438303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('7l2dl07b94fsjsj98kfju5id69141qvf', '::1', 1541051906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035313930363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('7lmets17vdanbb205ee2g8r704a2jnnr', '::1', 1540967464, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936373230393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534303936373231313b),
('7nue2batjrbg4ad2a5nmij98ntm7oo48', '::1', 1541136983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133363738343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('8tf75f924fsk6rmf0etnqh2ojecv885t', '::1', 1540970876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937303537363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('8ujqe91snodjhne0ka7d34osi9cgubqu', '::1', 1541054180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035343138303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('90a66oifdie4ct4b2j17jqani288bson', '::1', 1541062427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036323432373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('bdqfkgge8km8645ed30c6rq3rqbjl7vi', '::1', 1541061133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036313133333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('bkc1cpcatfm5nvqsa992adgs3kj2b4gi', '::1', 1541052965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035323936353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('ce8vlbkkg6c2kga7msr25d6ps1mkdsg5', '::1', 1541056732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035363733323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('ckmo8js65ug86gfjajhcqnolba8ual9s', '::1', 1541057714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035373731343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('d05mdvbkclauoprbq9218k6c62v5rfvq', '::1', 1541147975, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134373937353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657233223b757365725f656e746572696e675f74696d657374616d707c693a313534313134373635323b),
('d6bd4fth010nb8npumfu4tqejecb0cu1', '::1', 1540976968, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937363738313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('dc6cc6rqg9q6bhodposqt6jmseprbvmb', '::1', 1541147652, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134373431333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657233223b757365725f656e746572696e675f74696d657374616d707c693a313534313134373635323b),
('dqhh5t5shks3mjlm8s1h3ur7npo0o53m', '::1', 1541213934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313231333933343b),
('e7fm0pfc6mhqn19ctrn67g60q2l9vchr', '::1', 1540971726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937313732363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('ehrtd7jver03pl9rf94iln2grtog80u6', '::1', 1540968360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936383038303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534303936383131353b),
('fg38po9soib3e31qpvu8ehabvlp5b8bg', '::1', 1541137440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133373238333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('fioknk5fr0epk3smkuqlibkffekkeu3v', '::1', 1541063416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036333431363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('g1566p774bd21r4jrhel0b6gam4g10oo', '::1', 1541120345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313132303133383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('g223501i4e27495fkmfh0c0l6poqgse3', '::1', 1541059419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035393431393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('g5dvtka21bbgkodclgk4ogqa0nv76o7j', '::1', 1541223104, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313232333130343b),
('g853520kpshsn1gl3kqc4psfmufod9c8', '::1', 1541213934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313231333933343b),
('gh5fcot4vl9plem7ni161b006snoegep', '::1', 1540969302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936393133333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('gvap37ba3f5qkmcluspvqnueiqq197i4', '::1', 1540970102, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936393832373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('h2s75mrambboj171aqd9jct4npt0rn96', '::1', 1541118703, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313131383435333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('hgda2oemc8u6qtbl0lk9riaui110km8r', '::1', 1541304477, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313330343437353b),
('hhe2ku2th5ahphbtor0nme763l67u2dg', '::1', 1541090230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313039303232393b),
('hm99ti7i2290co2m49ldpsmnaaq7gljs', '::1', 1541117665, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313131373336353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('ibpn8nmsp55flkvd2mk4dgjdndd8jumi', '::1', 1541137894, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133373630303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('jbsgg0cmfh3vorepmgjm1tand5714lt4', '::1', 1540969744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936393434363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('k6e7ho5rdecgndhivg249k6um46jsaga', '::1', 1540971560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937313337353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('k9ja12hgk9v3cqnaqmmtj1nseni927qo', '::1', 1541058651, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035383635313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('kcavvv5ad0v85202spt0eq7uts76d7mq', '::1', 1541139818, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133393637343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534313133393831373b),
('le5ri4qt53iccc2gso8dstpmsn2sbikm', '::1', 1541063074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036333037343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('lrnebh8e8nckvqlmnrbmr1t1k1jgbpo5', '::1', 1541120064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313131393736343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('m63jo4udksdgfkol4r9fsu9t9iut9vd0', '::1', 1541063736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036333733363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('ma4t8mrhbtuo7sd5b2h1i5344i0b66o7', '::1', 1540967841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936373633393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534303936373231313b),
('mniiep802u6v5n2k09ie3kem9ug9jnt9', '::1', 1541052644, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035323634343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('mu7htiv7jqpq03v9efblj2iaatrec5hs', '::1', 1541121122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313132303839343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('nl9ndtenltasbunq621m99u73f1fiidh', '::1', 1541119762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313131393436333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('o4qh677vdfunvr7cqanuifv9s4roaroo', '::1', 1541058324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035383332343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('obgc5tebd6s4mohc0p7be0h7g7qv1lqb', '::1', 1541058023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035383032333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('op494s3l9stsodq96ajthdpif4s1bdfj', '::1', 1541138282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133383134353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b),
('p61crc3jl1lkih01tirtd6ekipdlnt74', '::1', 1541120828, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313132303536393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('pbuok6qaevha1skcfb85hmh6q95hqumu', '::1', 1541141144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134313133323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534313134313134303b),
('pda88pdk1ga6e8uce8m6rspfpoklto54', '::1', 1541063826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036333733363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('phee01vr6mpeg14umdvog25tloeji99m', '::1', 1540966430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936363136303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('pj230du0qamv5s7bs6qq8723iejeqver', '::1', 1541211215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313231313231353b),
('rcjbtr6tcf5aq0fuhaal8sa7d145v5bb', '::1', 1541087899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313038373839383b),
('rfg5q2sgj16cufphavil41mmp4u686p3', '::1', 1540964303, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936343133323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('s8f26m6n6nfdcfk3aecjiekra8tu7o3l', '::1', 1541211217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313231313231353b),
('smds8es1cfbseb15enl5mda507dlatgo', '::1', 1541223104, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313232333130343b),
('snghku43eajogg4k97pnp17922g04eqn', '::1', 1540976606, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937363332303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('t01ljcddd4bs43gdnvredq9htcqfla2q', '::1', 1541118994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313131383939343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('t1q2636rajq873n4kjo76u3filhetnmg', '::1', 1541051598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035313539383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('tkeq4gafdm9n31fgferr9qnsgtcg85jp', '::1', 1541053681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035333638313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('tschr8g78ld1md9rdjis48j4sdojbuth', '::1', 1540971064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303937303838313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('u64rjr10jn2tlc401prrbghijiu9rngr', '::1', 1541090156, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313038393931343b),
('u75kjfkc2gkig13a446m8jj49ovh02tn', '::1', 1540964845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534303936343637303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('uioiejljuvb4vh5c1c13q37re9rrgjec', '::1', 1541140887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313134303538373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2232223b6c6f67696e5f747970657c733a313a2230223b6163746976655f757365727c733a353a227573657231223b757365725f656e746572696e675f74696d657374616d707c693a313534313133393831373b),
('vj9j5oddflmlvspmuu24gj9kpo9u7q59', '::1', 1541136719, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313133363433383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('vprqdtnrkkl4mpc6ic38q4ruhp7qel5h', '::1', 1541061565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313036313536353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('vupisvmhaau7r855aqdkj5mpg30u8g1s', '::1', 1541055313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534313035353331333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

DROP TABLE IF EXISTS `episode`;
CREATE TABLE `episode` (
  `episode_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`episode_id`, `season_id`, `title`, `url`) VALUES
(1, 1, 'A study in Pink', 'https://www.youtube.com/watch?v=p-ro14GLU98'),
(2, 1, 'The Blink Banker', 'https://www.youtube.com/watch?v=4PKr_BVo4hg'),
(4, 3, 'Silicon Valley Season 1 Trailer', 'https://www.youtube.com/watch?v=Vm4tx1O9GAc'),
(5, 3, 'Best of Jian Yang', 'https://www.youtube.com/watch?v=8JTx8llpBxQ'),
(6, 3, 'Gilfoyle hacks Jian Yang\'s fridge', 'https://www.youtube.com/watch?v=A48AJ_5nWsc'),
(7, 4, 'Silicon Valley Season 5 Trailer', 'https://www.youtube.com/watch?v=H7pYslGR6GU'),
(8, 4, 'DInesh\'s Tesla', 'https://www.youtube.com/watch?v=yTyGF7HazEE'),
(9, 4, 'Dinesh Vs Gilfoyle', 'https://www.youtube.com/watch?v=Rtfl-EiTCFQ'),
(10, 5, 'Goku fights YouTube', 'https://www.youtube.com/watch?v=DI7imXBhC4A'),
(11, 5, 'Gaiden Part Vimeo', 'https://vimeo.com/136403370'),
(12, 5, 'HTML 5 MP4 Video', 'https://media.w3.org/2010/05/sintel/trailer.mp4	'),
(13, 5, 'HTML 5 WEBM Video', 'http://dl3.webmfiles.org/elephants-dream.webm'),
(14, 1, 'The Great Game', 'https://www.youtube.com/watch?v=J68tsSCdrXE'),
(15, 2, 'A Scandal in Belgravia', 'https://www.youtube.com/watch?v=iL52_OR79Lw'),
(16, 2, 'The Hounds of Baskerville ', 'https://www.youtube.com/watch?v=0aZOOcTt0E4'),
(17, 2, 'The Reichenbach Fall', 'https://www.youtube.com/watch?v=MAA1e4_HWdA');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` longtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'What is netflex?', 'Netflex is a subscription based video content management system. You can create your own movie & tv series website in no time using netflex. Sale them to your customers in a monthly subscription model and build up your online digital content business.'),
(2, 'What are the packages?', 'There are 4 package \r\n<ol>\r\n<li>Basic : 1 user screen for $4.99 per month</li>\r\n<li>Standard : 2 user screen for $7.99 per month</li>\r\n<li>Premium: 4 user screen for $11.99 per month</li>\r\n</ol>'),
(3, 'How many devices can i use?', 'According to your purchased package, you can access upto 1,2 or 4 devices at once from same account.');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`) VALUES
(1, 'Action & Adventure'),
(2, 'Anime'),
(3, 'Children & Family'),
(4, 'Classic'),
(5, 'Comedies'),
(6, 'Horror'),
(7, 'Documentary'),
(8, 'Romantic'),
(9, 'Sci-fi'),
(10, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'date', ''),
(2, 'package', ''),
(3, 'service_period', ''),
(4, 'payment_method', ''),
(5, 'total', ''),
(6, 'cancel_your_membership', ''),
(7, 'Click_Finish_Cancellation_below_to_cancel_your_membership', ''),
(8, 'Cancellation_will_be_effective_immedietly_after_your_confirmation', ''),
(9, 'Restart_your_membership_anytime. Your_viewing_preferences_will_be_saved_always', ''),
(10, 'cancel_plan', ''),
(11, 'Finish_Cancellation', ''),
(12, 'Edit_Profile', ''),
(13, 'Change_Email', ''),
(14, 'Current_Email', ''),
(15, 'New_Email', ''),
(16, 'Current_Password', ''),
(17, 'Frequently_asked_question', ''),
(18, 'Faq', ''),
(19, 'Refund_Policy', ''),
(20, 'Forgot_Email/_Password', ''),
(21, 'Enter_your_email_address. We_will_send_you_a_temporary_password.', ''),
(22, 'Email', ''),
(23, 'Email_me', ''),
(24, 'Movie', ''),
(25, 'Tv_Serial', ''),
(26, 'Admin', ''),
(27, 'Account', ''),
(28, 'Sign_out', ''),
(29, 'PLAY', ''),
(30, 'See_what_is_next.', ''),
(31, 'WATCH_ANYWHERE.', ''),
(32, 'CANCEL_ANYTIME.', ''),
(33, 'JOIN_TODAY', ''),
(34, 'Cancel_subscription_anytime', ''),
(35, 'Watch_from_anywhere', ''),
(36, 'Pricing_packages', ''),
(37, 'If_you_decide_Videoflix_is_not_for_you, no_problem.', ''),
(38, 'No_commitment. Cancel_online_anytime.', ''),
(39, 'Watch_TV_shows_and_movies_anytime, anywhere. From_any_device.', ''),
(40, 'Watch_on_your_tv', ''),
(41, 'Watch_on_your_phone, tablet', ''),
(42, 'Watch_on_your_pc', ''),
(43, 'Choose_one_plan_and_watch_everything.', ''),
(44, 'Monthly_price', ''),
(45, 'Screens_you_can_watch_on_at_the_same_time', ''),
(46, 'Watch_on_your_laptop, TV, phone_and_tablet', ''),
(47, 'HD_available', ''),
(48, 'Unlimited_movies_and_TV_shows', ''),
(49, 'Cancel_anytime', ''),
(50, 'DONE', ''),
(51, 'movies', ''),
(52, 'Change_Password', ''),
(53, 'New_Password', ''),
(54, 'Save', ''),
(55, 'Add_to_My_list', ''),
(56, 'Added_to_My_list', ''),
(57, 'Genre', ''),
(58, 'Year', ''),
(59, 'About', ''),
(60, 'Cast', ''),
(61, 'More', ''),
(62, 'Episode', ''),
(63, 'Search_result_for', ''),
(64, 'Tv_series', ''),
(65, 'Password', ''),
(66, 'Forget_password', ''),
(67, 'Sign_up', ''),
(68, 'Sign_up_to_start_your_membership', ''),
(69, 'Create_your_account', ''),
(70, 'Email_Address', ''),
(71, 'Register', ''),
(72, 'Who_is_watching', ''),
(73, 'MEMBERSHIP_AND_BILLING', ''),
(74, 'Cancel_Membership', ''),
(75, 'PLAN_DETAILS', ''),
(76, 'Effective_upto', ''),
(77, 'Go_Back', ''),
(78, 'Cancel', ''),
(79, 'Billing_history', ''),
(80, 'MY_PROFILE', ''),
(81, 'Manage_profiles', ''),
(82, 'language_list', ''),
(83, 'add_phrase', ''),
(84, 'add_language', ''),
(85, 'language', ''),
(86, 'option', ''),
(87, 'edit_phrase', ''),
(88, 'delete_language', ''),
(89, 'phrase', ''),
(90, 'value_required', ''),
(91, 'MY_LIST', ''),
(92, 'update_phrase', ''),
(93, 'settings_updated', ''),
(94, 'video_playlist', ''),
(95, 'sign_in', ''),
(96, 'Privacy_Policy', '');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL,
  `kids_restriction` int(11) NOT NULL DEFAULT '0',
  `url` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description_short`, `description_long`, `year`, `rating`, `genre_id`, `actors`, `featured`, `kids_restriction`, `url`) VALUES
(1, 'Sabrina', 'Magic and mischief collide as half-human, half-witch Sabrina navigates between two worlds: mortal teen life and her family\'s legacy, the Church of Night.', 'Magic and mischief collide as half-human, half-witch Sabrina navigates between two worlds: mortal teen life and her family\'s legacy, the Church of Night.', 2018, 5, 6, '[\"7\",\"9\",\"10\",\"14\",\"20\"]', 1, 0, 'https://www.youtube.com/watch?v=ybKUX6thF8Q'),
(2, 'Hold The Dark', 'In the grim Alaskan winter, a naturalist hunts for wolves blamed for killing a local boy, but he soon finds himself swept into a chilling mystery.', 'In the grim Alaskan winter, a naturalist hunts for wolves blamed for killing a local boy, but he soon finds himself swept into a chilling mystery.', 2018, 5, 1, '[\"1\",\"2\",\"3\",\"19\"]', 0, 0, 'https://www.youtube.com/watch?v=OFAwDO6b5KI'),
(3, 'Central Intelligence', 'A CIA operative contacts a former high school buddy with accounting chops to help dissolve a lethal plot against U.S. undercover agents.', 'A CIA operative contacts a former high school buddy with accounting chops to help dissolve a lethal plot against U.S. undercover agents.', 2018, 0, 1, '[]', 0, 0, 'https://www.youtube.com/watch?v=MxEw3elSJ8M'),
(4, 'Train to Busan', 'As a zombie outbreak sweeps the country, a dad and his daughter take a harrowing train journey in an attempt to reach the only city that\'s still safe.', 'As a zombie outbreak sweeps the country, a dad and his daughter take a harrowing train journey in an attempt to reach the only city that\'s still safe.', 2016, 5, 1, '[\"3\",\"6\",\"7\",\"13\",\"15\",\"17\",\"18\"]', 0, 0, 'https://www.youtube.com/watch?v=-CU3Mq-Qr9I'),
(5, 'How It Ends', 'When a mysterious disaster turns the country into a war zone, a young lawyer heads west with his future father-in-law to find his pregnant fiancée.', 'When a mysterious disaster turns the country into a war zone, a young lawyer heads west with his future father-in-law to find his pregnant fiancée.', 2018, 5, 1, '[\"1\",\"3\",\"5\",\"8\",\"12\"]', 0, 0, 'https://www.youtube.com/watch?v=WJyyJ7lexnM'),
(6, 'World War Z', 'A U.N. employee races against time and fate as he travels the world trying to stop the spread of a deadly zombie pandemic.', 'A U.N. employee races against time and fate as he travels the world trying to stop the spread of a deadly zombie pandemic.', 2013, 5, 1, '[\"2\",\"4\",\"6\",\"18\",\"20\"]', 0, 0, 'https://www.youtube.com/watch?v=Md6Dvxdr0AQ');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `screens` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 active, 0 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `name`, `screens`, `price`, `status`) VALUES
(1, 'basic', '1', '7.99', 1),
(2, 'standard', '2', '9.99', 1),
(3, 'premium', '4', '11.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE `season` (
  `season_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`season_id`, `series_id`, `name`) VALUES
(1, 1, 'Season 1'),
(2, 1, 'Season 2'),
(3, 2, 'Season 1'),
(4, 2, 'Season 2'),
(5, 3, 'Season 1');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'comma separated actor_id',
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `kids_restriction` int(11) NOT NULL,
  `episodes` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`series_id`, `title`, `description_short`, `description_long`, `genre_id`, `actors`, `year`, `rating`, `featured`, `kids_restriction`, `episodes`) VALUES
(1, 'Sherlock', 'In this updated take on Sir Arthur Conan Doyle\'s beloved mystery tales, the eccentric sleuth prowls the streets of modern London in search of clues.', 'In this updated take on Sir Arthur Conan Doyle\'s beloved mystery tales, the eccentric sleuth prowls the streets of modern London in search of clues.', 1, '[\"12\",\"13\",\"15\",\"19\"]', 2018, 4, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'site_name', 'Movie subscription portal'),
(2, 'site_email', 'noreply@netflex.com'),
(3, 'paypal_merchant_email', ''),
(4, 'invoice_address', '24/e North Huston, NY, Australia'),
(5, 'language', 'english'),
(6, 'purchase_code', 'your-product-purchase-code-goes-here'),
(7, 'privacy_policy', '<p>Effective date: November 02, 2018</p>\r\n\r\n\r\n<p>Netflex (\"us\", \"we\", or \"our\") operates the http://netflex.com website (the \"Service\").</p>\r\n\r\n<p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. Our Privacy Policy  for Netflex is managed through <a href=\"https://www.freeprivacypolicy.com/free-privacy-policy-generator.php\">Free Privacy Policy</a>.</p>\r\n\r\n<p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from http://netflex.com</p>\r\n\r\n\r\n<h2 class=\"black_text\">Information Collection And Use</h2>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<h3 class=\"black_text\">Types of Data Collected</h3>\r\n\r\n<h4 class=\"black_text\">Personal Data</h4>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (\"Personal Data\"). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<ul>\r\n<li>Email address</li><li>First name and last name</li><li>Cookies and Usage Data</li>\r\n</ul>\r\n\r\n<h4 class=\"black_text\">Usage Data</h4>\r\n\r\n<p>We may also collect information how the Service is accessed and used (\"Usage Data\"). This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<h4 class=\"black_text\">Tracking & Cookies Data</h4>\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>\r\n<p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n<p>Examples of Cookies we use:</p>\r\n<ul>\r\n    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>\r\n    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>\r\n    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Use of Data</h2>\r\n    \r\n<p>Netflex uses the collected data for various purposes:</p>    \r\n<ul>\r\n    <li>To provide and maintain the Service</li>\r\n    <li>To notify you about changes to our Service</li>\r\n    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>\r\n    <li>To provide customer care and support</li>\r\n    <li>To provide analysis or valuable information so that we can improve the Service</li>\r\n    <li>To monitor the usage of the Service</li>\r\n    <li>To detect, prevent and address technical issues</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Transfer Of Data</h2>\r\n<p>Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>\r\n<p>If you are located outside Australia and choose to provide information to us, please note that we transfer the data, including Personal Data, to Australia and process it there.</p>\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n<p>Netflex will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<h2 class=\"black_text\">Disclosure Of Data</h2>\r\n\r\n<h3 class=\"black_text\">Legal Requirements</h3>\r\n<p>Netflex may disclose your Personal Data in the good faith belief that such action is necessary to:</p>\r\n<ul>\r\n    <li>To comply with a legal obligation</li>\r\n    <li>To protect and defend the rights or property of Netflex</li>\r\n    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>\r\n    <li>To protect the personal safety of users of the Service or the public</li>\r\n    <li>To protect against legal liability</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Security Of Data</h2>\r\n<p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<h2 class=\"black_text\">Service Providers</h2>\r\n<p>We may employ third party companies and individuals to facilitate our Service (\"Service Providers\"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Links To Other Sites</h2>\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party\'s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Children\'s Privacy</h2>\r\n<p>Our Service does not address anyone under the age of 18 (\"Children\").</p>\r\n<p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Changes To This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the \"effective date\" at the top of this Privacy Policy.</p>\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Contact Us</h2>\r\n<p>If you have any questions about this Privacy Policy, please contact us:</p>\r\n<ul>\r\n        <li>By email: support@netflex.com</li>\r\n          \r\n        </ul>'),
(8, 'refund_policy', '<h1 class=\"black_text\">Returns and Refunds Policy</h1>\r\n\r\n\r\n<p>Thank you for shopping at Netflex.</p>\r\n\r\n<p>Please read this policy carefully. This is the Return and Refund Policy of Netflex. This Return and Refund Policy  for Netflex is managed by <a href=\"https://termsfeed.com/return-refund-policy/generator/\">the Return Refund Policy Generator</a>.</p>\r\n\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Digital products</h2>\r\n\r\n<p>We do not issue refunds for digital products once the order is confirmed and the product is sent.</p>\r\n\r\n<p>We recommend contacting us for assistance if you experience any issues receiving or downloading our products.</p>\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Contact us</h2>\r\n\r\n<p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>\r\n\r\n<ul>\r\n<li>\r\n    <p>By email: support@netflex.com</p>\r\n</li>\r\n</ul>\r\n\r\n'),
(9, 'stripe_publishable_key', ''),
(10, 'stripe_secret_key', ''),
(11, 'trial_period', 'off'),
(12, 'trial_period_days', '30'),
(13, 'theme', 'flixer');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_amount` int(11) NOT NULL,
  `paid_amount` float NOT NULL,
  `timestamp_from` int(11) NOT NULL,
  `timestamp_to` int(11) NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 active, 0 cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `plan_id`, `user_id`, `price_amount`, `paid_amount`, `timestamp_from`, `timestamp_to`, `payment_method`, `payment_details`, `payment_timestamp`, `status`) VALUES
(1, 3, 2, 11, 11, 1147483647, 1763736138, 'paypal', '', 1147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 admin, 0 customer',
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 1',
  `user2` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 2',
  `user3` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 3',
  `user4` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 4',
  `user1_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 banned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type`, `name`, `email`, `password`, `user1`, `user2`, `user3`, `user4`, `user1_session`, `user2_session`, `user3_session`, `user4_session`, `user1_movielist`, `user2_movielist`, `user3_movielist`, `user4_movielist`, `user1_serieslist`, `user2_serieslist`, `user3_serieslist`, `user4_serieslist`, `plan_id`, `status`) VALUES
(1, 1, 'John Doe', 'admin@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(2, 0, 'John Doe', 'user@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Jessica', 'Alex', 'Dianne', 'Smith', '1541141140', '1540815522', '1541147652', '1541140999', '[\"1\"]', '', '', '', '', '', '', '', 0, 1),
(3, 0, '', 'user2@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`episode_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
