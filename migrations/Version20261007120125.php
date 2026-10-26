<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007120125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_logo_wall_block_item (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, logoWallBlock_id INT DEFAULT NULL, logoWall_id INT DEFAULT NULL, INDEX IDX_21B214DB7971EAE0 (logoWallBlock_id), INDEX IDX_21B214DBB1847187 (logoWall_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_logo_wall_block_item ADD CONSTRAINT FK_21B214DB7971EAE0 FOREIGN KEY (logoWallBlock_id) REFERENCES app_logo_wall_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_logo_wall_block_item ADD CONSTRAINT FK_21B214DBB1847187 FOREIGN KEY (logoWall_id) REFERENCES app_logo_wall (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_logo_wall_block_item DROP FOREIGN KEY FK_21B214DB7971EAE0');
        $this->addSql('ALTER TABLE app_logo_wall_block_item DROP FOREIGN KEY FK_21B214DBB1847187');
        $this->addSql('DROP TABLE app_logo_wall_block_item');
    }
}
