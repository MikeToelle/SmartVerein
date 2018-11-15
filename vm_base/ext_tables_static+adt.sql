DROP TABLE IF EXISTS `tx_vmbase_domain_model_masettings`;
CREATE TABLE `tx_vmbase_domain_model_masettings` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `edit_own_member_data` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_bulletin_board` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_events` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_member_list_all` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_member_list_by_groups` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_club_finances` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_download_area` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `crdate` int(10) unsigned NOT NULL DEFAULT '0',
  `cruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `t3ver_oid` int(11) NOT NULL DEFAULT '0',
  `t3ver_id` int(11) NOT NULL DEFAULT '0',
  `t3ver_wsid` int(11) NOT NULL DEFAULT '0',
  `t3ver_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `t3ver_state` smallint(6) NOT NULL DEFAULT '0',
  `t3ver_stage` int(11) NOT NULL DEFAULT '0',
  `t3ver_count` int(11) NOT NULL DEFAULT '0',
  `t3ver_tstamp` int(11) NOT NULL DEFAULT '0',
  `t3ver_move_id` int(11) NOT NULL DEFAULT '0',
  `sys_language_uid` int(11) NOT NULL DEFAULT '0',
  `l10n_parent` int(11) NOT NULL DEFAULT '0',
  `l10n_diffsource` mediumblob,
  `l10n_state` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`),
  KEY `t3ver_oid` (`t3ver_oid`,`t3ver_wsid`),
  KEY `language` (`l10n_parent`,`sys_language_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tx_vmbase_domain_model_masettings` (`uid`, `pid`, `edit_own_member_data`, `show_bulletin_board`, `show_events`, `show_member_list_all`, `show_member_list_by_groups`, `show_club_finances`, `show_download_area`, `tstamp`, `crdate`, `cruser_id`, `t3ver_oid`, `t3ver_id`, `t3ver_wsid`, `t3ver_label`, `t3ver_state`, `t3ver_stage`, `t3ver_count`, `t3ver_tstamp`, `t3ver_move_id`, `sys_language_uid`, `l10n_parent`, `l10n_diffsource`, `l10n_state`) VALUES
(1,	3,	1,	1,	0,	0,	0,	0,	0,	1522359633,	1522359633,	1,	0,	0,	0,	'',	0,	0,	0,	0,	0,	0,	0,	'a:8:{s:16:\"sys_language_uid\";N;s:20:\"edit_own_member_data\";N;s:19:\"show_bulletin_board\";N;s:11:\"show_events\";N;s:20:\"show_member_list_all\";N;s:26:\"show_member_list_by_groups\";N;s:18:\"show_club_finances\";N;s:18:\"show_download_area\";N;}',	NULL);

DROP TABLE IF EXISTS `tx_vmbase_domain_model_syssettings`;
CREATE TABLE `tx_vmbase_domain_model_syssettings` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `member_i_d_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `auto_member_i_d` smallint(5) unsigned NOT NULL DEFAULT '0',
  `club_anniversaries` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_anniversaries_email` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_member_birthdays` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_birthday_email` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `crdate` int(10) unsigned NOT NULL DEFAULT '0',
  `cruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `t3ver_oid` int(11) NOT NULL DEFAULT '0',
  `t3ver_id` int(11) NOT NULL DEFAULT '0',
  `t3ver_wsid` int(11) NOT NULL DEFAULT '0',
  `t3ver_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `t3ver_state` smallint(6) NOT NULL DEFAULT '0',
  `t3ver_stage` int(11) NOT NULL DEFAULT '0',
  `t3ver_count` int(11) NOT NULL DEFAULT '0',
  `t3ver_tstamp` int(11) NOT NULL DEFAULT '0',
  `t3ver_move_id` int(11) NOT NULL DEFAULT '0',
  `sys_language_uid` int(11) NOT NULL DEFAULT '0',
  `l10n_parent` int(11) NOT NULL DEFAULT '0',
  `l10n_diffsource` mediumblob,
  `l10n_state` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`),
  KEY `t3ver_oid` (`t3ver_oid`,`t3ver_wsid`),
  KEY `language` (`l10n_parent`,`sys_language_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tx_vmbase_domain_model_syssettings` (`uid`, `pid`, `member_i_d_format`, `auto_member_i_d`, `club_anniversaries`, `sent_anniversaries_email`, `show_member_birthdays`, `sent_birthday_email`, `tstamp`, `crdate`, `cruser_id`, `t3ver_oid`, `t3ver_id`, `t3ver_wsid`, `t3ver_label`, `t3ver_state`, `t3ver_stage`, `t3ver_count`, `t3ver_tstamp`, `t3ver_move_id`, `sys_language_uid`, `l10n_parent`, `l10n_diffsource`, `l10n_state`) VALUES
(1,	3,	'',	1,	'10,20,25,30,40,50,60,70',	0,	'',	0,	1529010607,	1522359918,	1,	0,	0,	0,	'',	0,	0,	0,	0,	0,	0,	0,	'a:7:{s:16:\"sys_language_uid\";N;s:17:\"member_i_d_format\";N;s:15:\"auto_member_i_d\";N;s:18:\"club_anniversaries\";N;s:24:\"sent_anniversaries_email\";N;s:21:\"show_member_birthdays\";N;s:19:\"sent_birthday_email\";N;}',	NULL);
