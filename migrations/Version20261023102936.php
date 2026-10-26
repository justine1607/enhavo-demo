<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261023102936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_article (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, teaser LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, publicationDate DATETIME DEFAULT NULL, public TINYINT(1) DEFAULT NULL, INDEX IDX_EF678E2BEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_article ADD CONSTRAINT FK_EF678E2BEE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_article DROP FOREIGN KEY FK_EF678E2BEE45BDBF');
        $this->addSql('DROP TABLE app_article');
    }
}
