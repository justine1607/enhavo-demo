<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260930134742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_jobs_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, INDEX IDX_721AEAB460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_jobs_block_item (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, copy LONGTEXT DEFAULT NULL, jobsBlock_id INT DEFAULT NULL, INDEX IDX_9EB32FA413193496 (jobsBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_jobs_block ADD CONSTRAINT FK_721AEAB460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_jobs_block_item ADD CONSTRAINT FK_9EB32FA413193496 FOREIGN KEY (jobsBlock_id) REFERENCES app_jobs_block (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_jobs_block DROP FOREIGN KEY FK_721AEAB460D9FD7');
        $this->addSql('ALTER TABLE app_jobs_block_item DROP FOREIGN KEY FK_9EB32FA413193496');
        $this->addSql('DROP TABLE app_jobs_block');
        $this->addSql('DROP TABLE app_jobs_block_item');
    }
}
