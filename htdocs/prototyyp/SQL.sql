CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(11) unsigned NOT NULL,
  `token` varchar(256) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int unsigned NOT NULL,
  `userid` bigint(11) unsigned NOT NULL,
  `areaid` int unsigned NOT NULL,
  `partyid` int unsigned,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `vote` (
  `voterid` bigint(11) unsigned NOT NULL,
  `candidateid` int unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (voterid, candidateid)
);

CREATE TABLE IF NOT EXISTS `area` (
  `id` int unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `party` (
  `id` int unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE candidate ADD CONSTRAINT fk_userid 
FOREIGN KEY (userid) REFERENCES user (id) 
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `candidate` ADD FOREIGN KEY (`areaid`)
 REFERENCES `morsakabi`.`area`(`id`) 
 ON DELETE RESTRICT ON UPDATE CASCADE; 
 
 ALTER TABLE `candidate` ADD FOREIGN KEY (`partyid`) 
 REFERENCES `morsakabi`.`party`(`id`) ON DELETE RESTRICT 
 ON UPDATE CASCADE;
 
 ALTER TABLE `vote` ADD FOREIGN KEY (`voterid`) REFERENCES `morsakabi`.`user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `vote` ADD FOREIGN KEY (`candidateid`) REFERENCES `morsakabi`.`candidate`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 ALTER TABLE `vote` DROP FOREIGN KEY `vote_ibfk_1`; ALTER TABLE `vote` ADD CONSTRAINT `fk_vote_voterid` FOREIGN KEY (`voterid`) REFERENCES `morsakabi`.`user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `vote` DROP FOREIGN KEY `vote_ibfk_2`; ALTER TABLE `vote` ADD CONSTRAINT `fk_vote_candidateid` FOREIGN KEY (`candidateid`) REFERENCES `morsakabi`.`candidate`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
 