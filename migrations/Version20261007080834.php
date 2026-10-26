<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007080834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_jobs_block_tag (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, jobsBlock_id INT DEFAULT NULL, INDEX IDX_1595C05713193496 (jobsBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_jobs_block_tag ADD CONSTRAINT FK_1595C05713193496 FOREIGN KEY (jobsBlock_id) REFERENCES app_jobs_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_jobs_block DROP tags');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_jobs_block_tag DROP FOREIGN KEY FK_1595C05713193496');
        $this->addSql('DROP TABLE app_jobs_block_tag');
        $this->addSql('ALTER TABLE app_jobs_block ADD tags JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
    }
}
