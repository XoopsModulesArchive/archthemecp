CREATE TABLE archthemecp (
    msg1     VARCHAR(209) NOT NULL DEFAULT '',
    msg2     VARCHAR(209) NOT NULL DEFAULT '',
    msg3     VARCHAR(209) NOT NULL DEFAULT '',
    link1    VARCHAR(25)  NOT NULL DEFAULT '',
    link2    VARCHAR(25)  NOT NULL DEFAULT '',
    link3    VARCHAR(25)  NOT NULL DEFAULT '',
    link4    VARCHAR(25)  NOT NULL DEFAULT '',
    link5    VARCHAR(25)  NOT NULL DEFAULT '',
    link1url VARCHAR(255) NOT NULL DEFAULT '',
    link2url VARCHAR(255) NOT NULL DEFAULT '',
    link3url VARCHAR(255) NOT NULL DEFAULT '',
    link4url VARCHAR(255) NOT NULL DEFAULT '',
    link5url VARCHAR(255) NOT NULL DEFAULT ''
)
    ENGINE = ISAM;

#
# Dumping data for table `themecp`
#

INSERT INTO archthemecp
VALUES ('This is the ArchTheme Control Panel (CP) for Xoops. (message 1)', 'Add links and messages to your theme from Admin. (message 2)', 'http://ArchangelArtifacts.com. (message 3)', 'Home', 'Contact Us', 'Downloads', 'News', '', 'index.php', '/modules/archcontact/', '/modules/mydownloads/',
        '/modules/news/', '');

