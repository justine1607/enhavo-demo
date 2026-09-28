<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260924092748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page_page (id INT AUTO_INCREMENT NOT NULL, route_id INT DEFAULT NULL, content_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, canonicalUrl VARCHAR(255) DEFAULT NULL, metaDescription LONGTEXT DEFAULT NULL, pageTitle LONGTEXT DEFAULT NULL, public TINYINT(1) DEFAULT NULL, publicationDate DATETIME DEFAULT NULL, publishedUntil DATETIME DEFAULT NULL, noIndex TINYINT(1) DEFAULT NULL, noFollow TINYINT(1) DEFAULT NULL, openGraphTitle LONGTEXT DEFAULT NULL, openGraphDescription LONGTEXT DEFAULT NULL, createdAt DATETIME DEFAULT NULL, updatedAt DATETIME DEFAULT NULL, special VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, revisionDate DATETIME DEFAULT NULL, revisionState VARCHAR(255) DEFAULT NULL, revisionParameters JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', openGraphImage_id INT DEFAULT NULL, revisionSubject_id INT DEFAULT NULL, revisionUser_id INT DEFAULT NULL, INDEX IDX_93CEAAFABCC7F8A8 (openGraphImage_id), INDEX IDX_93CEAAFA34ECB4E6 (route_id), UNIQUE INDEX UNIQ_93CEAAFA84A0A3ED (content_id), INDEX IDX_93CEAAFA727ACA70 (parent_id), INDEX IDX_93CEAAFA7DB2BC3B (revisionSubject_id), INDEX IDX_93CEAAFA27ABAE9D (revisionUser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE routing_route (id INT AUTO_INCREMENT NOT NULL, host VARCHAR(255) DEFAULT NULL, schemes JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', methods JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', defaults JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', requirements JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', options JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', `condition` VARCHAR(255) NOT NULL, variablePattern VARCHAR(255) DEFAULT NULL, staticPrefix VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, contentClass VARCHAR(255) DEFAULT NULL, contentId INT DEFAULT NULL, INDEX name_idx (name), INDEX prefix_idx (staticPrefix), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFABCC7F8A8 FOREIGN KEY (openGraphImage_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA34ECB4E6 FOREIGN KEY (route_id) REFERENCES routing_route (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA84A0A3ED FOREIGN KEY (content_id) REFERENCES block_node (id)');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA727ACA70 FOREIGN KEY (parent_id) REFERENCES page_page (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA7DB2BC3B FOREIGN KEY (revisionSubject_id) REFERENCES page_page (id)');
        $this->addSql('ALTER TABLE page_page ADD CONSTRAINT FK_93CEAAFA27ABAE9D FOREIGN KEY (revisionUser_id) REFERENCES user_user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFABCC7F8A8');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA34ECB4E6');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA84A0A3ED');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA727ACA70');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA7DB2BC3B');
        $this->addSql('ALTER TABLE page_page DROP FOREIGN KEY FK_93CEAAFA27ABAE9D');
        $this->addSql('DROP TABLE page_page');
        $this->addSql('DROP TABLE routing_route');
    }
}
