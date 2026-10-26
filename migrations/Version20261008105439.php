<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261008105439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_contact_form (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, firstName VARCHAR(255) DEFAULT NULL, lastName VARCHAR(255) DEFAULT NULL, message LONGTEXT DEFAULT NULL, public TINYINT(1) DEFAULT NULL, ctaTitle VARCHAR(255) DEFAULT NULL, ctaLink VARCHAR(255) DEFAULT NULL, ctaTarget VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_form_block DROP selection, DROP firstName, DROP lastName, DROP message, DROP ctaTitle, DROP ctaLink, DROP ctaTarget');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE app_contact_form');
        $this->addSql('ALTER TABLE app_form_block ADD selection VARCHAR(255) DEFAULT NULL, ADD firstName VARCHAR(255) DEFAULT NULL, ADD lastName VARCHAR(255) DEFAULT NULL, ADD message LONGTEXT DEFAULT NULL, ADD ctaTitle VARCHAR(255) DEFAULT NULL, ADD ctaLink VARCHAR(255) DEFAULT NULL, ADD ctaTarget VARCHAR(255) DEFAULT NULL');
    }
}
