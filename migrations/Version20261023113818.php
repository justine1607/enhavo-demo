<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261023113818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_feature_item (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, position INT DEFAULT NULL, overline VARCHAR(255) DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, lead VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, featuresBlock_id INT DEFAULT NULL, INDEX IDX_8FBFB0ECDB33ED2 (featuresBlock_id), INDEX IDX_8FBFB0ECEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_features_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, INDEX IDX_A7D15C06460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_get_started_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, lead VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, code LONGTEXT DEFAULT NULL, INDEX IDX_34B2DF23460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_get_started_button (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, getStartedBlock_id INT DEFAULT NULL, INDEX IDX_4DB635E397D2E61E (getStartedBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_more_feature_item (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, position INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, moreFeaturesBlock_id INT DEFAULT NULL, INDEX IDX_E046BC3532B7C (moreFeaturesBlock_id), INDEX IDX_E046BCEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_more_features_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, INDEX IDX_49B4D924460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_nutshell_block (id INT AUTO_INCREMENT NOT NULL, node_id INT DEFAULT NULL, headline VARCHAR(255) DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, INDEX IDX_927B969460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_nutshell_item (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, text VARCHAR(255) DEFAULT NULL, nutshellBlock_id INT DEFAULT NULL, INDEX IDX_46FC82053FB6F1BB (nutshellBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_feature_item ADD CONSTRAINT FK_8FBFB0ECDB33ED2 FOREIGN KEY (featuresBlock_id) REFERENCES app_features_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_feature_item ADD CONSTRAINT FK_8FBFB0ECEE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_features_block ADD CONSTRAINT FK_A7D15C06460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_get_started_block ADD CONSTRAINT FK_34B2DF23460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_get_started_button ADD CONSTRAINT FK_4DB635E397D2E61E FOREIGN KEY (getStartedBlock_id) REFERENCES app_get_started_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_more_feature_item ADD CONSTRAINT FK_E046BC3532B7C FOREIGN KEY (moreFeaturesBlock_id) REFERENCES app_more_features_block (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_more_feature_item ADD CONSTRAINT FK_E046BCEE45BDBF FOREIGN KEY (picture_id) REFERENCES media_file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_more_features_block ADD CONSTRAINT FK_49B4D924460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_nutshell_block ADD CONSTRAINT FK_927B969460D9FD7 FOREIGN KEY (node_id) REFERENCES block_node (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_nutshell_item ADD CONSTRAINT FK_46FC82053FB6F1BB FOREIGN KEY (nutshellBlock_id) REFERENCES app_nutshell_block (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_feature_item DROP FOREIGN KEY FK_8FBFB0ECDB33ED2');
        $this->addSql('ALTER TABLE app_feature_item DROP FOREIGN KEY FK_8FBFB0ECEE45BDBF');
        $this->addSql('ALTER TABLE app_features_block DROP FOREIGN KEY FK_A7D15C06460D9FD7');
        $this->addSql('ALTER TABLE app_get_started_block DROP FOREIGN KEY FK_34B2DF23460D9FD7');
        $this->addSql('ALTER TABLE app_get_started_button DROP FOREIGN KEY FK_4DB635E397D2E61E');
        $this->addSql('ALTER TABLE app_more_feature_item DROP FOREIGN KEY FK_E046BC3532B7C');
        $this->addSql('ALTER TABLE app_more_feature_item DROP FOREIGN KEY FK_E046BCEE45BDBF');
        $this->addSql('ALTER TABLE app_more_features_block DROP FOREIGN KEY FK_49B4D924460D9FD7');
        $this->addSql('ALTER TABLE app_nutshell_block DROP FOREIGN KEY FK_927B969460D9FD7');
        $this->addSql('ALTER TABLE app_nutshell_item DROP FOREIGN KEY FK_46FC82053FB6F1BB');
        $this->addSql('DROP TABLE app_feature_item');
        $this->addSql('DROP TABLE app_features_block');
        $this->addSql('DROP TABLE app_get_started_block');
        $this->addSql('DROP TABLE app_get_started_button');
        $this->addSql('DROP TABLE app_more_feature_item');
        $this->addSql('DROP TABLE app_more_features_block');
        $this->addSql('DROP TABLE app_nutshell_block');
        $this->addSql('DROP TABLE app_nutshell_item');
    }
}
