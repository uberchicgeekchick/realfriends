-- MySQL dump 10.11
--
-- Host: localhost    Database: realFriends
-- ------------------------------------------------------
-- Server version	5.0.45-Max

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allDomains`
--

DROP TABLE IF EXISTS `allDomains`;
CREATE TABLE `allDomains` (
  `fqdn/ip` varchar(255) NOT NULL,
  `network` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`fqdn/ip`,`network`),
  KEY `allDomains_networkConstraint` (`network`),
  CONSTRAINT `allDomains_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allDomains`
--

LOCK TABLES `allDomains` WRITE;
/*!40000 ALTER TABLE `allDomains` DISABLE KEYS */;
INSERT INTO `allDomains` VALUES ('gd.dystonia-dreams.org',1);
/*!40000 ALTER TABLE `allDomains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `allNetworks`
--

DROP TABLE IF EXISTS `allNetworks`;
CREATE TABLE `allNetworks` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `default` enum('yes','no') NOT NULL default 'no',
  `theme` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `theme_index` (`theme`),
  CONSTRAINT `allNetworks_themeConstraint` FOREIGN KEY (`theme`) REFERENCES `allThemes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allNetworks`
--

LOCK TABLES `allNetworks` WRITE;
/*!40000 ALTER TABLE `allNetworks` DISABLE KEYS */;
INSERT INTO `allNetworks` VALUES (1,'&hearts;DREAMS&hearts;','<b>D</b>edicated to <b>R</b>esources, <b>E</b>mpowerment, <b>A</b>cceptance, <b>M</b>anagement, & <b>S</b>upport exclusively for everybody suffering from any type of Generalized Dystonia.','yes',1);
/*!40000 ALTER TABLE `allNetworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `allSuperUsers`
--

DROP TABLE IF EXISTS `allSuperUsers`;
CREATE TABLE `allSuperUsers` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allSuperUsers`
--

LOCK TABLES `allSuperUsers` WRITE;
/*!40000 ALTER TABLE `allSuperUsers` DISABLE KEYS */;
INSERT INTO `allSuperUsers` VALUES (1,'bestFriend','b9f622f5b82ec8dadadefcbfe98f1395');
/*!40000 ALTER TABLE `allSuperUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `allThemes`
--

DROP TABLE IF EXISTS `allThemes`;
CREATE TABLE `allThemes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(35) NOT NULL,
  `css` mediumtext,
  `javascript` mediumtext,
  `html` mediumtext,
  `default` enum('yes','no') NOT NULL default 'no',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allThemes`
--

LOCK TABLES `allThemes` WRITE;
/*!40000 ALTER TABLE `allThemes` DISABLE KEYS */;
INSERT INTO `allThemes` VALUES (1,'GoodnessAndHopes','body {background-color:#ffddee;}\r\n.copyright{font-size:small; text-align:center;}',NULL,'','no');
/*!40000 ALTER TABLE `allThemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocs`
--

DROP TABLE IF EXISTS `blocs`;
CREATE TABLE `blocs` (
  `network` int(10) unsigned NOT NULL,
  `friend` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `topic` int(10) unsigned default NULL,
  `title` varchar(30) NOT NULL,
  `content` mediumtext NOT NULL,
  `type` enum('library','babble','blog','up-date','bloc','list','poll') NOT NULL default 'blog',
  `access` enum('public','network','bestFriends','no') NOT NULL default 'no',
  `written` datetime NOT NULL,
  `updated` datetime default NULL,
  PRIMARY KEY  (`network`,`friend`,`id`),
  KEY `network_index` (`network`),
  KEY `friend_index` (`friend`),
  KEY `topic_index` (`topic`),
  CONSTRAINT `blocs_friendsConstraint` FOREIGN KEY (`friend`) REFERENCES `friends` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blocs_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocs`
--

LOCK TABLES `blocs` WRITE;
/*!40000 ALTER TABLE `blocs` DISABLE KEYS */;
INSERT INTO `blocs` VALUES (1,1,1,NULL,'<em>DREAMS <strong>soars</stro','<p>\n	*sign*, feeling clean is about the best feeling in the world.  I\'m just glad to be back to baths; they\'re harder than they used to be, but they\'re way easier than they were with that damned shower bench.\n</p><p>\n	speaking of baths... I\'m sorry for disappearing the other night.  although I hope that you\'ve gotten used to that happening, its never that I\'m like ignoring you or anything... it always just means somethings happened.  usually it just means that I\'ve passed out otherwise it means somethings happened health wise, like 30% to 40 of the time.  but its never that I\'m just like being a bitch and ignoring you.  hope you know.\n</p><p>\n	anyways, back to baths and how I\'m doing.  I was transferring from my chair to the toilet(to potty before I bathed).  and I crashed severally badly.  both of my shins hit my commode\'s legs &then they smashed into the ground. than my forehead hit the edge of my commode\'s armrest and than hit it the back of my head on the edge of my bath tub.\n</p><p>\n	the worst part, and what still hurts(a lot) is that I smacked my left breast(right below my collar bone) directly into the arm of my(um-huh... again) my commode.  I\'m still very tender there; okay, it hurts like hell.  I\'m kinda worried that I may have fractured or something one of my ribs or something.\n</p><p>\n	so that\'s why I *poofed* the other morning(mine)/night(your\'s).  even yesterday; I was still pretty much recovering.  I still hurt quite a bit today, but I\'m feeling like ten times better than I have been.\n</p><p>\n	one good thing did come out of all of this though.  its that I now know, with absolute certainty, that I don\'t have osteoporosis(at least not)because if had I\'d have broken more bones than I can imagine.\n</p>\n<p>uber-chic-geek-chick: Katy G. B.; *hugs*</p>','blog','no','2007-05-11 22:28:22','2007-05-11 22:28:22'),(1,1,2,NULL,'dell smells fishy?&nbsp; &i li','<center>\n	<blockquote style=\"background-color:#666666;\">\n		<a style=\"color:ff0000;\" href=\"http://direct2dell.com/one2one/archive/2007/05/07/14120.aspx\"><i><b>\"dell will purchase SUSE Linux Enterprise Server certificates <u>from Microsoft</u>\"</b></i></a>\n	</blockquote>\n	and yeah, like my css choice, background-color:666666;, is so totally on purpose and perfectly fitting &amp;deserving.\n</center>\n<p style=\"text-indent:40px;\">\n	like since when did ms start selling &amp; owning linux?&nbsp; this is such a pretend agreement it makes me laugh, except i feel to sick.&nbsp; ms has no ip in linux or based around it, but they can bundle a bunch of \"oh you\'ll sale more\" with these contracts.&nbsp; in the last several months my fave distro and fave laptop &amp; pc maker have went up &amp; down on my \"like; what total fakes\" meter.&nbsp; which clearly dell is just clueless about it... <strong>its about our community!</strong>\n</p>\n<p style=\"text-indent:40px;\">\n	your ubuntu offering seems like nothing more than a warm and fuzzy lil hug to the community while dell goes where they feel the real money is: with b2b next to ms and that\'s just bs.\n</p>\n<p style=\"text-indent:40px;\">\n	so now let\'s see ms has tainted SUSE, dell, and by association ubuntu; i only hope they react to this.&nbsp; but who knows?&nbsp; but like bottom line is <b>ms doesn\'t own any part of linux!</b>&nbsp; purchase certs from them: you help spread this delusion that ms owns some part of linux.&nbsp; until that delusion becomes like a total hallucination and the corporate world <em>believes</em> that linux is microsoft\'s.&nbsp; which is just like this total path of confusion, that in the name of profit, you&lsquo;re more than happy to walk with them on.\n</p>\n<p style=\"text-indent:40px;\">\n	like all i want to know now is how dumb all of you companies believed the linux community to be?&nbsp; sure, you\'ll get more ms into companies while piggy backing on open-source buzz.&nbsp; but the community; we\'ve built this OS since (some of us, like me for one) were in our early teens and to even imagine the amount of stupidity that you imagined we\'d have along these lines is just like totally astounding!\n</p>\n<p style=\"text-indent:40px;\">\n	i can only imagine the board room meeting: \"oh sure they built an os, but come on? open source?, these geeks\'ll never get the business side!\"&nbsp; you couldn\'t have been more wrong!, we do, its like one of the main reasons that we\'ve poured our souls into our software.\n</p>\n<p style=\"text-indent:40px;\">\n	and than like omg!&nbsp; this whole \"protecting clients from ip infringements\"... rofl!&nbsp; just like one question will you promise to protect them from the boogie-man and the monsters that hide in they\'re server rooms and NOCs.&nbsp; oh wait, sorry, i like so just forgot: you\'re putting the boogie-man and the monsters in their NOCs.\n</p>\n<p style=\"text-indent:40px;\">\n	and though i\'m like totally sure that you\'ve made sure ubuntu(and i\'m sure canonical and like even mark shuttleworth) are stuck tightly in their contract.&nbsp; but i\'d like to see a call to action for them to show their <em><strong>true</strong></em> support for open source and drop your deal like the total read hearing it like so totally obviously was.\n</p>\n<p style=\"text-indent:40px;\">\n	only one question to you.&nbsp; its obvious that ms came to you with this deal.&nbsp; how could any reaction have been like anything but just saying like totally no way and telling ms to stick their <i>\'ip\' monster</i> back where they get all their great ideas?\n</p>\n<p style=\"text-indent:40px;\">\n	but most importantly, and saddest of all, is that GNU, linux, &amp;just like open source in general has been under-estimated this whole time... but now you\'ve(ms, novell, &amp;dell) have chosen to under-estimate something far more powerful: <u><i><b>our community!</b></i></u>\n</p>\n<p>uber-chic-geek-chick: Katy G. B.; *hugs*</p>\n','blog','no','2007-05-11 22:28:22','2007-05-11 22:28:22'),(1,1,3,NULL,'novell&lsquo;s <strong style=\"','<blockquote style=\"background-color:#aaaaaa!important; text-align:center; font-weight:bolder; text-decoration:underline; margin:2px\">\n	3. I will not be influenced by this in my decision to buy a Linux laptop.\n</blockquote>\n<p style=\"text-indent:40px;\">\n	ditto! big time!&nbsp; i\'m sure as big as Dell is their \"home\"(desktop &laptop) devision is like totally separate from their server side.&nbsp; if Dell\'s laptops work the best under linux; i\'ll be Dell\'s laptop.&nbsp; but i\'ll be sure to stay like way away from Dell\'s servers as long as this deal stands... unless i find out that Dell is buying certs.from ms for each ubuntu install they sell(anyone know?-for sure?)\n</p>\n<p style=\"text-indent:40px;\">\n	and than i need to like clarify my earlier post(after doing much research).&nbsp; i\'ll be sticking with <u><em><a href=\"http://opensuse.us/\">OpenSUSE</a></em></u>, which although they\'re like supported by novell: it still remains a community project.&nbsp; plus gawd mandriva\'s just fallen apart, so ixnay on like everything i said about <s>mandriva</s>.&nbsp; for now <a href=\"http://opensuse.us/\">OpenSUSE</a> <u><b>not SLED</b></u> will remain my distro of choice... especially because of our community.&nbsp; so long as we just like avoid being touched by this ms ip bs.&nbsp; of course if that ever happens: like can we say <i>fork, LOL</i>.&nbsp; i\'m just so relieved to feel good about <a href=\"http://opensuse.us/\">OpenSUSE</a> remaining clean of this like entire mess!\n</p>\n<p style=\"text-indent:40px;\">\n	at least novell had the strength to call ms\' bs on these ip lies: see <a href=\"http://www.linux-watch.com/news/NS8308472991.html\">Novell clarifies Microsoft <sub>*barf*</sub>\"patent collaboration agreement\"<sub>*gag*</sub></a>and <a href=\"http://news.com.com/Microsoft%2C+Novell+spar+over+Linux+agreement/2100-7344_3-6137444.html\">Novell,ms spar over Linux agreement</a>.&nbsp; dell, can &will you do the same?&nbsp; at least responde, reply, remark?&nbsp; the vidcast wasn\'t any response worth the like time it tool to shoot it.&nbsp; we(being the open source community) get tht you are, have... <em>might?</em> be doing this for money... like we get it.&nbsp; we don\'t need that explained.&nbsp; we just want an answer to your feeling on ,<sup style=\"font-variant:small-caps;\">whew.. what smells?</sup>, ms\' ip claims?\n</p>\n<p style=\"text-indent:40px;\">uber-chic-geek-chick: Katy G. B.</p>','blog','no','2007-05-13 04:12:15','2007-05-13 04:12:15'),(1,1,4,NULL,'my lil slogans','<ul>\n	<li> uber-chic-geek-chick</li>\n	<li> uber-leet-chic-geekette-chick</li>\n	<li> etc :)</li>\n</ul>\n<p style=\"text-indent:40px;\">\n	&copy;-(left) 2007: Katy G. B.\n</p>','bloc','network','2007-05-13 04:12:15','2007-05-13 04:12:15');
/*!40000 ALTER TABLE `blocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eHuggles`
--

DROP TABLE IF EXISTS `eHuggles`;
CREATE TABLE `eHuggles` (
  `network` int(10) unsigned NOT NULL,
  `eHug` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `forFriend` int(10) unsigned NOT NULL,
  `fromFriend` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `personalMessage` text NOT NULL,
  PRIMARY KEY  (`network`,`eHug`,`id`),
  KEY `network_index` (`network`),
  KEY `eHug_index` (`eHug`),
  KEY `id_index` (`id`),
  KEY `forFriend_index` (`forFriend`),
  KEY `fromFriend_index` (`fromFriend`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eHuggles`
--

LOCK TABLES `eHuggles` WRITE;
/*!40000 ALTER TABLE `eHuggles` DISABLE KEYS */;
/*!40000 ALTER TABLE `eHuggles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eHugs`
--

DROP TABLE IF EXISTS `eHugs`;
CREATE TABLE `eHugs` (
  `network` int(10) unsigned NOT NULL,
  `topic` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `title` varchar(30) default NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`network`,`topic`,`id`),
  KEY `network_index` (`network`),
  KEY `topic_index` (`topic`),
  KEY `id_index` (`id`),
  CONSTRAINT `eHugs_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eHugs_topicConstraint` FOREIGN KEY (`topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eHugs`
--

LOCK TABLES `eHugs` WRITE;
/*!40000 ALTER TABLE `eHugs` DISABLE KEYS */;
/*!40000 ALTER TABLE `eHugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `network` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `defaultView` varchar(15) default NULL,
  `last_ip` varchar(15) default NULL,
  `whatCanTheyDo` enum('everything','moderate','support') NOT NULL default 'support',
  `whenTheyJoined` datetime NOT NULL,
  `theirStory` mediumtext NOT NULL,
  PRIMARY KEY  (`network`,`id`),
  KEY `network_index` (`network`),
  KEY `friendsID_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,1,'sparklingdreams','6ce0a56b0a54e456e1beec9bb58514a1',NULL,'127.0.0.1','everything','2007-04-01 09:50:40','');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendsCSS`
--

DROP TABLE IF EXISTS `friendsCSS`;
CREATE TABLE `friendsCSS` (
  `network` int(10) unsigned NOT NULL,
  `friend` int(10) unsigned NOT NULL,
  `CSS` mediumtext NOT NULL,
  PRIMARY KEY  (`network`,`friend`),
  KEY `networkIndex` (`network`),
  KEY `friendIndex` (`friend`),
  CONSTRAINT `friensCSS_friendConstraint` FOREIGN KEY (`friend`) REFERENCES `friends` (`id`),
  CONSTRAINT `friensCSS_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendsCSS`
--

LOCK TABLES `friendsCSS` WRITE;
/*!40000 ALTER TABLE `friendsCSS` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendsCSS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendsWaiting`
--

DROP TABLE IF EXISTS `friendsWaiting`;
CREATE TABLE `friendsWaiting` (
  `network` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `defaultView` varchar(15) default NULL,
  `theirStory` mediumtext NOT NULL,
  PRIMARY KEY  (`network`,`id`),
  KEY `network_index` (`network`),
  CONSTRAINT `friendsWaiting_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendsWaiting`
--

LOCK TABLES `friendsWaiting` WRITE;
/*!40000 ALTER TABLE `friendsWaiting` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendsWaiting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iNeedSomeHelp`
--

DROP TABLE IF EXISTS `iNeedSomeHelp`;
CREATE TABLE `iNeedSomeHelp` (
  `network` int(10) unsigned NOT NULL,
  `friend` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `topic` int(10) unsigned default NULL,
  `subject` varchar(90) default NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`network`,`friend`,`id`),
  KEY `network_index` (`network`),
  KEY `friend_index` (`friend`),
  KEY `topic_index` (`topic`),
  KEY `id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iNeedSomeHelp`
--

LOCK TABLES `iNeedSomeHelp` WRITE;
/*!40000 ALTER TABLE `iNeedSomeHelp` DISABLE KEYS */;
/*!40000 ALTER TABLE `iNeedSomeHelp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iWantToHelp`
--

DROP TABLE IF EXISTS `iWantToHelp`;
CREATE TABLE `iWantToHelp` (
  `network` int(10) unsigned NOT NULL,
  `iNeedSomeHelp` int(10) unsigned NOT NULL,
  `friend` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`network`,`iNeedSomeHelp`,`friend`,`id`),
  KEY `network_index` (`network`),
  KEY `friend_index` (`friend`),
  KEY `iNeedSomeHelp_index` (`iNeedSomeHelp`),
  CONSTRAINT `iWantToHelp_friendConstraint` FOREIGN KEY (`friend`) REFERENCES `friends` (`id`),
  CONSTRAINT `iWantToHelp_iNeedSomeHelpConstraint` FOREIGN KEY (`iNeedSomeHelp`) REFERENCES `iNeedSomeHelp` (`id`),
  CONSTRAINT `iWantToHelp_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iWantToHelp`
--

LOCK TABLES `iWantToHelp` WRITE;
/*!40000 ALTER TABLE `iWantToHelp` DISABLE KEYS */;
/*!40000 ALTER TABLE `iWantToHelp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `network` int(10) unsigned NOT NULL,
  `friend` int(10) unsigned NOT NULL,
  `first name` varchar(255) NOT NULL,
  `middle name` varchar(255) NOT NULL,
  `last name` varchar(255) NOT NULL,
  `bday` date NOT NULL default '0000-00-00',
  `css` int(11) default NULL,
  `content` mediumtext NOT NULL,
  `shared` enum('public','network','friends','private') NOT NULL default 'public',
  PRIMARY KEY  (`network`,`friend`),
  KEY `network_index` (`network`),
  KEY `friend_index` (`friend`),
  KEY `css_index` (`css`),
  CONSTRAINT `profiles_friendConstraint` FOREIGN KEY (`friend`) REFERENCES `friends` (`id`),
  CONSTRAINT `profiles_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `network` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `about` varchar(255) NOT NULL,
  `rss` enum('yes','no') NOT NULL default 'yes',
  PRIMARY KEY  (`network`,`id`),
  KEY `topics_network_id` (`network`),
  KEY `topics_id_index` (`id`),
  CONSTRAINT `topics_networkConstraint` FOREIGN KEY (`network`) REFERENCES `allNetworks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-01-24 18:14:53
