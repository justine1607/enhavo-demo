<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007113836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_logo_wall (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, ctaTitle VARCHAR(255) DEFAULT NULL, ctaLink VARCHAR(255) DEFAULT NULL, ctaTarget VARCHAR(255) DEFAULT NULL, INDEX IDX_C2BB2C28EE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_logo_wall ADD CONSTRAINT FK_C2BB2C28EE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_logo_wall DROP FOREIGN KEY FK_C2BB2C28EE45BDBF');
        $this->addSql('DROP TABLE app_logo_wall');
    }
}
