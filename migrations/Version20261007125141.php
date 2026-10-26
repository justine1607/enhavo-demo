<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007125141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_nag_screen DROP FOREIGN KEY FK_509A9241EE45BDBF');
        $this->addSql('DROP INDEX IDX_509A9241EE45BDBF ON app_nag_screen');
        $this->addSql('ALTER TABLE app_nag_screen ADD overline VARCHAR(255) DEFAULT NULL, ADD text LONGTEXT DEFAULT NULL, ADD action VARCHAR(255) DEFAULT NULL, ADD buttonTitle VARCHAR(255) DEFAULT NULL, ADD buttonLink VARCHAR(255) DEFAULT NULL, ADD public TINYINT(1) DEFAULT NULL, ADD runFrom DATETIME DEFAULT NULL, ADD runTo DATETIME DEFAULT NULL, DROP picture_id, DROP target, DROP ctaTitle, DROP ctaLink, DROP ctaTarget');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_nag_screen ADD picture_id INT DEFAULT NULL, ADD target VARCHAR(255) DEFAULT NULL, ADD ctaTitle VARCHAR(255) DEFAULT NULL, ADD ctaLink VARCHAR(255) DEFAULT NULL, ADD ctaTarget VARCHAR(255) DEFAULT NULL, DROP overline, DROP text, DROP action, DROP buttonTitle, DROP buttonLink, DROP public, DROP runFrom, DROP runTo');
        $this->addSql('ALTER TABLE app_nag_screen ADD CONSTRAINT FK_509A9241EE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_509A9241EE45BDBF ON app_nag_screen (picture_id)');
    }
}
