<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007083934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_logo_wall_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, titleAlignment VARCHAR(255) DEFAULT NULL, itemAlignment VARCHAR(255) DEFAULT NULL, grid VARCHAR(255) DEFAULT NULL, INDEX IDX_BEB5B555460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_logo_wall_block ADD CONSTRAINT FK_BEB5B555460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_logo_wall_block DROP FOREIGN KEY FK_BEB5B555460D9FD7');
        $this->addSql('DROP TABLE app_logo_wall_block');
    }
}
