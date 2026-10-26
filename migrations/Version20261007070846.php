<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007070846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_abteilung (id INT AUTO_INCREMENT NOT NULL, jobs_id INT DEFAULT NULL, position INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_48EE568548704627 (jobs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_jobs (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, ctaTitle VARCHAR(255) DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, public TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_abteilung ADD CONSTRAINT FK_48EE568548704627 FOREIGN KEY (jobs_id) REFERENCES app_jobs (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_abteilung DROP FOREIGN KEY FK_48EE568548704627');
        $this->addSql('DROP TABLE app_abteilung');
        $this->addSql('DROP TABLE app_jobs');
    }
}
