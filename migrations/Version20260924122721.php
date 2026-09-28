<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260924122721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_library_item (id INT AUTO_INCREMENT NOT NULL, file_id INT DEFAULT NULL, contentType VARCHAR(50) DEFAULT NULL, INDEX IDX_D02545FF93CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_library_item_tag (item_id INT NOT NULL, term_id INT NOT NULL, INDEX IDX_8896E590126F525E (item_id), INDEX IDX_8896E590E2C35FC (term_id), PRIMARY KEY(item_id, term_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy_taxonomy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy_term (id INT AUTO_INCREMENT NOT NULL, taxonomy_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, position INT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_C7ED653A9557E6F6 (taxonomy_id), INDEX IDX_C7ED653A727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_library_item ADD CONSTRAINT FK_D02545FF93CB796C FOREIGN KEY (file_id) REFERENCES media_file (id)');
        $this->addSql('ALTER TABLE media_library_item_tag ADD CONSTRAINT FK_8896E590126F525E FOREIGN KEY (item_id) REFERENCES media_library_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_library_item_tag ADD CONSTRAINT FK_8896E590E2C35FC FOREIGN KEY (term_id) REFERENCES taxonomy_term (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taxonomy_term ADD CONSTRAINT FK_C7ED653A9557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomy_taxonomy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taxonomy_term ADD CONSTRAINT FK_C7ED653A727ACA70 FOREIGN KEY (parent_id) REFERENCES taxonomy_term (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_file ADD item_id INT DEFAULT NULL, ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media_file ADD CONSTRAINT FK_4FD8E9C3126F525E FOREIGN KEY (item_id) REFERENCES media_library_item (id)');
        $this->addSql('CREATE INDEX IDX_4FD8E9C3126F525E ON media_file (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_file DROP FOREIGN KEY FK_4FD8E9C3126F525E');
        $this->addSql('ALTER TABLE media_library_item DROP FOREIGN KEY FK_D02545FF93CB796C');
        $this->addSql('ALTER TABLE media_library_item_tag DROP FOREIGN KEY FK_8896E590126F525E');
        $this->addSql('ALTER TABLE media_library_item_tag DROP FOREIGN KEY FK_8896E590E2C35FC');
        $this->addSql('ALTER TABLE taxonomy_term DROP FOREIGN KEY FK_C7ED653A9557E6F6');
        $this->addSql('ALTER TABLE taxonomy_term DROP FOREIGN KEY FK_C7ED653A727ACA70');
        $this->addSql('DROP TABLE media_library_item');
        $this->addSql('DROP TABLE media_library_item_tag');
        $this->addSql('DROP TABLE taxonomy_taxonomy');
        $this->addSql('DROP TABLE taxonomy_term');
        $this->addSql('DROP INDEX IDX_4FD8E9C3126F525E ON media_file');
        $this->addSql('ALTER TABLE media_file DROP item_id, DROP discr');
    }
}
