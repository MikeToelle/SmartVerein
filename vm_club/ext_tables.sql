#
# Table structure for table 'tx_vmclub_domain_model_club'
#
CREATE TABLE tx_vmclub_domain_model_club (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	club_name varchar(255) DEFAULT '' NOT NULL,
	club_short_name varchar(255) DEFAULT '' NOT NULL,
	club_founding_year varchar(255) DEFAULT '' NOT NULL,
	club_street varchar(255) DEFAULT '' NOT NULL,
	club_zip_code varchar(255) DEFAULT '' NOT NULL,
	club_city varchar(255) DEFAULT '' NOT NULL,
	club_phone varchar(255) DEFAULT '' NOT NULL,
	club_email varchar(255) DEFAULT '' NOT NULL,
	club_website varchar(255) DEFAULT '' NOT NULL,
	club_tax_office varchar(255) DEFAULT '' NOT NULL,
	club_tax_number varchar(255) DEFAULT '' NOT NULL,
	club_vat_number varchar(255) DEFAULT '' NOT NULL,
	club_registration_court varchar(255) DEFAULT '' NOT NULL,
	club_registration_number varchar(255) DEFAULT '' NOT NULL,
	club_bankname varchar(255) DEFAULT '' NOT NULL,
	club_i_b_a_n varchar(255) DEFAULT '' NOT NULL,
	club_b_i_c varchar(255) DEFAULT '' NOT NULL,
	club_d_id varchar(255) DEFAULT '' NOT NULL,
	club_organisation varchar(255) DEFAULT '' NOT NULL,
	club_organisation_number varchar(255) DEFAULT '' NOT NULL,
	club_logo int(11) unsigned NOT NULL default '0',
	club_social_media_facebook varchar(255) DEFAULT '' NOT NULL,
	club_social_media_twitter varchar(255) DEFAULT '' NOT NULL,
	club_social_media_google varchar(255) DEFAULT '' NOT NULL,
	club_social_media_instagram varchar(255) DEFAULT '' NOT NULL,
	club_social_media_printerest varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);
